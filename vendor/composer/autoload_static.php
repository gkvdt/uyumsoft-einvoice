<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b8e678c78ef63d9ed6e6b7c1655f0ef
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gkvdt\\UyumsoftEfinvoice\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gkvdt\\UyumsoftEfinvoice\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b8e678c78ef63d9ed6e6b7c1655f0ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b8e678c78ef63d9ed6e6b7c1655f0ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b8e678c78ef63d9ed6e6b7c1655f0ef::$classMap;

        }, null, ClassLoader::class);
    }
}
