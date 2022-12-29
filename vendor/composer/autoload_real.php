<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit0b8e678c78ef63d9ed6e6b7c1655f0ef
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit0b8e678c78ef63d9ed6e6b7c1655f0ef', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit0b8e678c78ef63d9ed6e6b7c1655f0ef', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit0b8e678c78ef63d9ed6e6b7c1655f0ef::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}