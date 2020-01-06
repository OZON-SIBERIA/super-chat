<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController {
    /**
     * @Route("/", name="user_index"
     */
    public static function index() {
        return Response::create(
            Registry::twig()->render('auth.twig', ['user'=>Auth::getAuthUser()])
        );
    }

    public static function auth() {
        
    }
}