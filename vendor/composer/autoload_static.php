<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73b6a09aa9d20a7462d75959e947dbe7
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gregwar\\Captcha\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gregwar\\Captcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/gregwar/captcha',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73b6a09aa9d20a7462d75959e947dbe7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73b6a09aa9d20a7462d75959e947dbe7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
