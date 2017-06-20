<?php

namespace MeuProjeto;

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use MeuProjeto\Models\UserModel;
use MeuProjeto\Util\Sessao;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;
use Twig_Function;
use Twig_Loader_Filesystem;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$sessao = new Sessao();
$sessao->start();

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

include 'routes.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/View');
$twig = new Twig_Environment($loader);
$session = new Sessao;
//Cria uma função statica para ser chamada nos templates.
$function = new Twig_Function('AuthUser', function() {
    return UserModel::getUser();
}
);

$twig->addFunction($function);

$requestContext = new RequestContext();
$requestContext->fromRequest(Request::createFromGlobals());
$response = new Response();

// tratar !!!!!
$urlMatcher = new UrlMatcher($rotas, $requestContext);
$atributos = $urlMatcher->match($requestContext->getPathInfo());
//print_r($atributos);

$controlador = new $atributos['_controller']($response, $requestContext, $twig, $sessao);

if (isset($atributos['_method'])) {
    $metodo = $atributos['_method'];
    if (isset($atributos['_param'])) {
        $controlador->$metodo($atributos['_param']);
    } else {
        $controlador->$metodo();
    }
}


$response->send();






