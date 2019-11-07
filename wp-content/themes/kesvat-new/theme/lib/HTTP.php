<?php

namespace Theme\Lib;

class HTTP {
    
    public function contentLength($length) {
        header('Content-Length: ' . $length);
    }
    
    public function contentType($type) {
        header("Content-type: $type");
    }

    public function contentRange($start, $end, $size) {
        header('Accept-Ranges: bytes');
        header("Content-Range: bytes $start-$end/$size");
    }
    
    public function fileName($name) {
        header('Content-Disposition: attachment; filename="' . $name . '"');
    }
    
    public function responseCode($code = null) {
        if(function_exists('http_response_code')) {
            return http_response_code($code);
        }

        $return = 200;
        if($code !== null) {
            header('X-PHP-Response-Code: ' . $code, true, $code);
            if(!headers_sent())
                $return = $code;
        }

        return $return;
    }
    
}
