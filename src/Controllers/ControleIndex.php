<?php

namespace MeuProjeto\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class ControleIndex {

    private $response;
    private $twig;

    function __construct(Response $response, RequestContext $rq, Twig_Environment $twig) {
        $this->response = $response;
        $this->twig = $twig;
    }

    public function index() {
      
        return $this->response->setContent($this->twig->render('welcome.php'));
    }


}
