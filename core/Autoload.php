<?php

class Autoload
{
    private static $dirs = [];

    public static function register()
    {
        spl_autoload_register(function ($class)
        {
            foreach (self::$dirs as $dir) {
                if (file_exists($file = $dir . '/' . $class . '.php')) require $file;
            }
        });
    }

    public static function directories($list)
    {
        self::$dirs = $list;
    }

}
