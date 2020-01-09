<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Exception\AuthException;
use App\Service\Registration;
use App\Service\Authorization;

/**
 * @Route("/user")
 */
class UserController {
    /**
     * @Route("/", name="user_index"
     */
    public static function index():Response {
        return Response::create(
            Registration::twig()->render('auth.twig', ['user'=>Authorization::getAuthUser()])
        );
    }

    public static function auth(Request $request):Response {
        $login    = filter_var($request->get('login', ''), FILTER_SANITIZE_STRING);
        $password = $request->get('password', '');
        try {
            Authorization::login($login, $password);
        }
        catch (AuthException $e) {
            return Response::create(
                Registration::twig()->render('auth.twig', array(
                    'error' => $e->getMessage(),
                    'user'  => Authorization::getAuthUser()
                ))
            );
        }
        return RedirectResponse::create('/');
    }
    /**
     * @Route("/reg", name="user_reg, methods={"GET", "POST"})
     */
    public static function reg(Request $request):Response {
        $login    = filter_var($request->get('login', ''), FILTER_SANITIZE_STRING);
        $password = $request->get('password', '');
        try {
            Authorization::register($login, $password);
            Authorization::login($login, $password);
        }
        catch (AuthException $e) {
            return Response::create(
                Registration::twig()->render('auth.twig', array(
                    'error' => $e->getMessage(),
                    'user'  => Authorization::getAuthUser()
                ))
            );
        }
        return RedirectResponse::create('/');
    }

    public static function logout(Request $request):Response {
        Authorization::logout();

        return RedirectResponse::create('/auth');
    }
}