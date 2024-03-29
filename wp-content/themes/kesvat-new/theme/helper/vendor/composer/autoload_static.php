<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6af271486472de91f86a693539edcd1c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6af271486472de91f86a693539edcd1c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6af271486472de91f86a693539edcd1c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
