<?php


namespace App;


use Doctrine\ORM\EntityManager;

class Registration {
    /**
     * @var Registration $instance
     */
    protected static $data;
    /**
     * @var EntityManager $entity_manager
     */
    protected static $entity_manager;
    protected function __construct() {
    }
    public static function init(EntityManager $entity_manager, \Twig_Environment $twig) {
        self::$data['entity_manager'] = $entity_manager;
        self::$data['twig']           = $twig;
    }
    public static function twig(): \Twig_Environment {
        return self::$data['twig'];
    }
    public static function entityManager(): EntityManager {
        return self::$data['entity_manager'];
    }
}