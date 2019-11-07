<?php

namespace Theme\Lib;

class Validation {
    
    public $message = array(), $error = array(), $label = array();
    private $rule, $input;

    public function validate($inputs, $rules, $label = array(), $message = array()) {
        $this->input = $inputs;
        $this->rule = $rules;

        if(!empty($label))
            $this->setLabel($label);
        if(!empty($message))
            $this->setMessage($message);

        foreach($rules as $k => $v) {
            if((is_array($v) || $v instanceof \Traversable)){
                foreach($v as $a) {
                    if(strpos($a, ':')) {
                        $pos = strpos($a, ':');
                        $function = substr($a, 0, $pos);
                        $param = explode(',', substr($a, $pos + 1));

                        if($this->$function($this->input[$k], $param) == false) {
                            $this->error[$k][] = $function;
                        }
                    }
                    else {
                        $function = $a;

                        if(!$this->$function($this->input[$k])) {
                            $this->error[$k][] = $function;
                        }
                    }
                }
            }

        }
    }

    public function setLabel(array $label) {
        foreach($label as $k => $v)
            $this->label[$k] = $v;
    }
    
    public function setMessage(array $message) {
        foreach($message as $k => $v)
            $this->message[$k] = $v;
    }
    
    public function errors() {
        if(empty($this->error))
            return array();
        
        $output = array();
        foreach($this->error as $field => $array) {
            foreach($array as $v) {
                if(!empty($this->label[$field]))
                    $label = $this->label[$field];
                else
                    $label = $field;

                $msg = isset($this->message[$v]) ? $this->message[$v] : '{field} has validation error(s).';
                $output[$field][] = str_replace('{field}', $label, $msg);
            }
        }
        return $output;
    }
    
    public function error($field) {
        if(empty($this->error[$field]))
            return array();
        
        $output = array();
        foreach($this->error[$field] as $e) {
            $label = !empty($this->label[$field]) ? $this->label[$field] : $field;
            $msg = str_replace('{field}', $label, $this->message[$e]);
            $output[] = $msg;
        }
        return $output;
    }

    public function passes() {
        return empty($this->error);
    }

    public function fails() {
        return !empty($this->error);
    }
    
    public function set($field, $default = null, $index = null) {
        if(is_array($this->input[$field]) && !empty($index)) {
            if(!is_array($index))
                $index = array($index);
            
            $value = $this->fetchFromArray($this->input[$field], $index);
            return is_array($value) ? array_shift($value) : $value;
        }
        if(is_array($this->input[$field]))
            return array_shift($this->input[$field]);
        
        return !empty($this->input[$field]) ? $this->input[$field] : $default;
    }
    
    public function setSelect($field, $value, $default = null) {
        if(empty($this->input[$field]) || empty($value)) {
            if($default == true) {
                return ' selected="selected"';
            }
            return '';
        }

        if(is_array($this->input[$field])) {
            if(in_array($value, $this->input[$field])) {
                return ' selected="selected"';
            }
        }
        else {
            if($this->input[$field] == $value) {
                return ' selected="selected"';
            }
        }

        return '';
    }
    
    public function setRadioCheck($field, $value, $default = null) {
        if(empty($this->input[$field]) || empty($value)) {
            if($default == true) {
                return ' checked="checked"';
            }
            return '';
        }

        if(is_array($this->input[$field])) {
            if(in_array($value, $this->input[$field])) {
                return ' checked="checked"';
            }
        }
        else {
            if($this->input[$field] == $value) {
                return ' checked="checked"';
            }
        }

        return '';
    }

    // validation functions
    private function required($value) {
        return $value === 0 || $value === '0' || $value === 0.0 || !empty($value);
    }
    
    private function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    
    private function emails($value) {
        if(strpos($value, ',') === false) {
            return $this->email(trim($value));
        }

        foreach(explode(',', $value) as $email) {
            if(trim($email) != '' && $this->email(trim($email)) == false) {
                return false;
            }
        }

        return true;
    }
    
    private function regexMatch($value, $param) {
        return preg_match($param[0], $value);
    }
    
    private function matches($value, $param) {
        return (!empty($value) && $value == $param[0]);
    }
    
    private function minLength($value, $param) {
        if(function_exists('mb_strlen'))
            return (mb_strlen($value) < $param[0]) ? false : true;

        return (strlen($value) < $param[0]) ? false : true;
    }
    
    private function maxLength($value, $param) {
        if(function_exists('mb_strlen'))
            return (mb_strlen($value) > $param[0]) ? false : true;

        return (strlen($value) > $param[0]) ? false : true;
    }
    
    private function min($value, $param) {
        return $value >= $param[0];
    }
    
    private function max($value, $param) {
        return $value <= $param[0];
    }

    private function between($value, $param) {
        return $value >= $param[0] && $value <= $param[1];
    }

    private function length($value, $param) {
        if(function_exists('mb_strlen'))
            return (mb_strlen($value) != $param[0]) ? false : true;

        return (strlen($value) != $param[0]) ? false : true;
    }
    
    private function alpha($value) {
        return (!preg_match('/^\p{L}[\p{L} _.-]+$/u', $value)) ? false : true;
    }
    
    private function alphaNumeric($value) {
        return (!preg_match("/^([a-z0-9])+$/i", $value)) ? false : true;
    }
    
    private function alphaDash($value) {
        return (!preg_match("/^([-a-z0-9_-])+$/i", $value)) ? false : true;
    }
    
    private function numeric($value) {
        return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $value);
    }
    
    private function integer($value) {
        return (bool) preg_match('/^[\-+]?[0-9]+$/', $value);
    }
    
    private function decimal($value) {
        return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $value);
    }
    
    private function greaterThan($value, $param) {
        if(!is_numeric($value)) {
            return false;
        }
        return $value > $param[0];
    }

    private function lessThan($value, $param) {
        if(!is_numeric($value)) {
            return false;
        }
        return $value < $param[0];
    }
    
    private function ip($value, $param) {
        $which = strtolower($param[0]);
        switch($which) {
            case 'ipv4':
                $flag = FILTER_FLAG_IPV4;
                break;
            case 'ipv6':
                $flag = FILTER_FLAG_IPV6;
                break;
            default:
                $flag = '';
                break;
        }

        return (bool) filter_var($value, FILTER_VALIDATE_IP, $flag);
    }
    
    public function in($value, $param) {
        foreach((array) $value as $f) {
            foreach($param as $p) {
                if($p == $f)
                    return true;
            }
        }
        return false;
    }
    
    public function natural($value) {
        return (bool) preg_match('/^[0-9]+$/', $value);
    }

    public function notNegative($val) {
        return $val >= 0;
    }

    public function notPositive($val) {
        return $val <= 0;
    }

    public function phone($val) {
        return preg_match("/^([0-9\s\-\+\(\)]*)$/", $val);
    }

    public function json($val) {
        if(!is_string($val))
            return false;

        json_decode($val);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function naturalNoZero($value) {
        if(!preg_match('/^[0-9]+$/', $value)) {
            return false;
        }
        if($value == 0) {
            return false;
        }

        return true;
    }

    //
    
    public function prepUrl($str = '') {
        if($str == 'http://' or $str == '') {
            return '';
        }
        if(substr($str, 0, 7) != 'http://' && substr($str, 0, 8) != 'https://') {
            $str = 'http://' . $str;
        }

        return $str;
    }
    
    public function validBase64($str) {
        return (bool) !preg_match('/[^a-zA-Z0-9\/\+=]/', $str);
    }

    public function encodePhpTags($str) {
        return str_replace(array('<?php', '<?PHP', '<?', '?>'), array('&lt;?php', '&lt;?PHP', '&lt;?', '?&gt;'), $str);
    }

    private function fetchFromArray($array, $index, $step = 0) {
        if(is_array($index)) {
            if($step == count($index) - 1)
                return isset($array[$index[$step]]) ? $array[$index[$step]] : null;

            return isset($array[$index[$step]]) ? $this->fetchFromArray($array[$index[$step]], $index, $step + 1) : null;
        }

        if(!isset($array[$index])) {
            return false;
        }

        return $array[$index];
    }

    // extra validation
    private function date($val) {
        $parts = explode('-', $val);
        if(!isset($parts[0]) || !isset($parts[1]) || !isset($parts[2]))
            return false;

        return checkdate($parts[1], $parts[2], $parts[0]);
    }
    
}