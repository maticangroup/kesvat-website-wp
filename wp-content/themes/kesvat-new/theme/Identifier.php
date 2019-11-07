<?php

namespace Theme;

class Identifier
{

    protected static $defaultLang = 'en';
    protected static $currentLang = '';

    private static $blocks = array(
    );
    private static $terms = array(
        'category' => array(
            'un-pro' => 'unlimited_products',
            'limited-pro' => 'limited_products'
        ),
    );
    private static $posts = array(
        'page' => array(
            'Material_Overview' => 122
        )
    );

    private static $googleKeys = array(
        'public_key' => '6LcF2x4TAAAAAJOdBckyFhehoLc6Sh7r6MHSDf9s',
        'secret_key' => '6LcF2x4TAAAAAMivq8HjkCrv6g5WU4g4XkgIVCPO'
    );

    private static $types = array(
    );

    public static function init()
    {
    }

    public static function term($name, $taxonomy = 'category')
    {
        return isset(self::$terms[$taxonomy][$name]) ? self::$terms[$taxonomy][$name] : 0;
    }

    public static function block($name)
    {
        return isset(self::$blocks[$name]) ? self::$blocks[$name] : 0;
    }

    public static function googleKeys($name)
    {
        return isset(self::$googleKeys[$name]) ? self::$googleKeys[$name] : 0;
    }

    public static function post($name, $type = 'post')
    {
        return isset(self::$posts[$type][$name]) ? self::$posts[$type][$name] : 0;
    }

    public static function type($name)
    {
        return isset(self::$types[$name]) ? self::$types[$name] : '';
    }

}

Identifier::init();