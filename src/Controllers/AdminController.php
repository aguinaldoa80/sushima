<?php

namespace MeuProjeto\Controllers;

use MeuProjeto\Models\UserModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class AdminController {

    private $response;
    private $twig;
    private $request;
    private $sessao;

    function __construct(Response $response, RequestContext $request, Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->twig = $twig;
        $this->request = $request;
        $this->sessao = $sessao;
    }

    public function dashboard() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('dashboard.html'));
        }
    }
    public function cotacoes() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('cotacoes.html'));
        }
    }
    public function manageCotacoes() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('managecotacoes.html'));
        }
    }

}
