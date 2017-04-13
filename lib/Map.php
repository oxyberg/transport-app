<?php

class Map
{

    private static $adj = [], $countries = [], $transportPaths = [];

    public static function load($filename)
    {
        $file = file_get_contents($filename);
        $data = json_decode($file, true);
        self::$adj = $data['adjadency'];
        self::$countries = $data['countries'];
        self::$transportPaths = $data['transport'];
    }

    public static function getAdj()
    {
        return self::$adj;
    }

    public static function getCountries()
    {
        return self::$countries;
    }

    public static function getTransportPaths()
    {
        return self::$transportPaths;
    }

}
