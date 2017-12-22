<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf62d9b2e5c5054f3660cfcbac7939f84
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf62d9b2e5c5054f3660cfcbac7939f84::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf62d9b2e5c5054f3660cfcbac7939f84::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}