<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit24c93f1fbcf268003ebd8dfbd37d8eef
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit24c93f1fbcf268003ebd8dfbd37d8eef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit24c93f1fbcf268003ebd8dfbd37d8eef::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
