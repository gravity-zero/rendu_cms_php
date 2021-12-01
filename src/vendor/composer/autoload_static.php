<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc3b1af437f05642094856c4da598d65
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CMS_PHP\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CMS_PHP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'CMS_PHP\\Controllers\\Articles' => __DIR__ . '/../..' . '/Controllers/Articles.php',
        'CMS_PHP\\Controllers\\DotEnv' => __DIR__ . '/../..' . '/Controllers/DotEnv.php',
        'CMS_PHP\\Controllers\\Homepage' => __DIR__ . '/../..' . '/Controllers/Homepage.php',
        'CMS_PHP\\Controllers\\Router' => __DIR__ . '/../..' . '/Controllers/Router.php',
        'CMS_PHP\\Models\\Database' => __DIR__ . '/../..' . '/Models/Database.php',
        'CMS_PHP\\Models\\Users' => __DIR__ . '/../..' . '/Models/Users.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc3b1af437f05642094856c4da598d65::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc3b1af437f05642094856c4da598d65::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcc3b1af437f05642094856c4da598d65::$classMap;

        }, null, ClassLoader::class);
    }
}
