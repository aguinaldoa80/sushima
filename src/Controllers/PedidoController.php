<?php

namespace MeuProjeto\Controllers;

use MeuProjeto\Models\ClienteModel;
use MeuProjeto\Models\PedidoModel;
use MeuProjeto\Models\ProdutoModel;
use MeuProjeto\Models\UserModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class PedidoController {

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

    public function pedidos() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('pedidos.html'));
        }
    }
    public function teste() {
        $model = new PedidoModel();
        echo($model->listAllPedidos());
    }
    public function managePedidos() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
            return;
        }
        $model = new PedidoModel();
        echo($model->listAllPedidos());
    }
    public function makePedido() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($data[0]['senha'] == "123456") {
//                print_r($data);
                $model = new ClienteModel();
                $cliente = (array) $data[1];
                $pedido = (array) $data[2];
                $listProdutos = (array) $data[3];
                echo($model->savePedido($cliente,$pedido,$listProdutos));
               
            }
        }
    }

}
