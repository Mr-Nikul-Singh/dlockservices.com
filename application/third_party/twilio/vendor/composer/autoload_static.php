<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e8b03e4d6b11cf5c1863d8295108e52
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e8b03e4d6b11cf5c1863d8295108e52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e8b03e4d6b11cf5c1863d8295108e52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4e8b03e4d6b11cf5c1863d8295108e52::$classMap;

        }, null, ClassLoader::class);
    }
}
