<?php

namespace Theme\Lib;

class Input {
    
    public function get($key, $default = null) {
        if(isset($_POST[$key]))
            return $_POST[$key];
        if(isset($_GET[$key]))
            return $_GET[$key];

        $json = $this->_getJson();
        return isset($json[$key]) ? $json[$key] : $default;
    }

    public function all() {
        $json = $this->_getJson();
        return ($_POST + $_GET + $json);
    }
    
    public function has($key) {
        $v = new Validation();
        $v->validate(array('data' => $this->get($key)), array('data' => array('required')));
        $errors = $v->errors();
        return empty($errors) ? true : false;
    }

    public function choose($names) {
        $output = array();

        foreach($names as $n) {
            $output[$n] = '';
        };

        foreach($this->all() as $key => $val) {
            if(in_array($key, $names))
                $output[$key] = $val;
        }

        return $output;
    }

    protected function _getJson() {
        $data = json_decode(file_get_contents("php://input"));
        return !empty($data) ? (array) $data : array();
    }
}
