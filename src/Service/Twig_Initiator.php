<?php


namespace App;


class Twig_Initiator {
    protected static $data;

    protected function __construct() {
    }

    public static function twig_init($twig) {
        self::$data['twig'] = $twig;
    }

    public static function twig() {
        return self::$data['twig'];
    }
}