<?php

namespace Theme;

class AutoLoad {

    public function __construct() {
        spl_autoload_register(array($this, 'classLoader'));
    }

    public function classLoader($name) {
        $explode = explode('\\', $name);
        $class = end($explode);
        if (class_exists($class, false))
            return true;

        $paths = array(
            dirname(__FILE__) . '/' . $class . '.php',
            dirname(__FILE__) . '/lib/' . $class . '.php',
            dirname(__FILE__) . '/lib/jDateTime-master/' . $class . '.php',
        );

        foreach ($paths as $path) {
            if (is_readable($path))
                include_once $path;
        }
    }

}

new AutoLoad();