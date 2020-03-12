<?php

namespace App;

use App\Twig_Initiator;
use App\Authentication;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController
{
    public static function indexAction(Request $request): Response
    {
        return Response::create(Twig_Initiator::twig()->render('auth.twig'));
    }
}