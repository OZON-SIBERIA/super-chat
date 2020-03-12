<?php
require_once "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\UserController;
use App\ChatController;

$loader = new Twig_Loader_Filesystem('../src/Template');
$twig = new Twig_Environment($loader);
\App\Twig_Initiator::twig_init($twig);

$map = [
    "GET" => [
        '/' => [UserController::class, "indexAction"],
        '/user/auth' => [UserController::class, "indexAction"],
        '/user/auth/logout' => [UserController::class, "logoutAction"]
    ],
    "POST" => [
        '/user/reg' => [UserController::class, "regAction"],
        '/user/auth/login' => [UserController::class, "authAction"],
        '/chat' => [ChatController::class, "indexAction"]
    ]
];


$request = Request::createFromGlobals();
$mapper = $map[$request->getMethod()][$request->getPathInfo()];
$response = call_user_func($mapper, $request);

$response->send();