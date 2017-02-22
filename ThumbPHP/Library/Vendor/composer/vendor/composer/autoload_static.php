<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb542fbd2c68b85c9baabbb68a2403f8d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb542fbd2c68b85c9baabbb68a2403f8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb542fbd2c68b85c9baabbb68a2403f8d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
