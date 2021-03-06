<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc2c03ccf8016dd0ac83ccef85b67ccd
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdc2c03ccf8016dd0ac83ccef85b67ccd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdc2c03ccf8016dd0ac83ccef85b67ccd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
