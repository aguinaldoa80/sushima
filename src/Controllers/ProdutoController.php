<?php

namespace MeuProjeto\Controllers;

use MeuProjeto\Models\ProdutoModel;
use MeuProjeto\Models\UserModel;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class ProdutoController {

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

    public function produtos() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('produtos.html'));
        }
    }

    public function cadastro_produtos() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
        } else {
            return $this->response->setContent($this->twig->render('cadastroprodutos.php'));
        }
    }

    public function manageProdutos() {
        if (!UserModel::getUser()) {
            $re = new RedirectResponse('/login');
            $re->send();
            return;
        }
        if($_POST['option'] == 'enableProduto'){
            $model = new ProdutoModel();
            $model->enableProduct($_POST['id'], $_POST['ativo']);
            return;
        }
        if ($_POST['option'] == 'buscaProdutos') {
            $modeloProduto = new ProdutoModel();
            echo($modeloProduto->listAllProducts());
            return;
        }
        if ($_POST['option'] == 'buscaProdutosByTexto') {
            $modeloProduto = new ProdutoModel();
            $str = $_POST['palavra'];
            echo($modeloProduto->listAllProductsByTexto($str));
            return;
        }
        $erro = [];
        $option = trim($_POST['option']);
        $produto = trim($_POST['produto']);
        $descricao = trim($_POST['descricao']);
        $preco = str_replace('.', '', $_POST['preco']);
        $preco = str_replace(',', '.', $preco);
        $imagem = $_POST['imagem'];

        if ($option == "saveProduto") {
            if (strlen($produto) < 10 || strlen($produto) > 99) {
                $erro['produto'] = "Produto deve ter entre 10 e 100 letras.";
                echo json_encode($erro);
                return;
            }
            if (strlen($preco) <= 0) {
                $erro['preco'] = "Preço é de preenchimento obrigatório.";
                echo json_encode($erro);
                return;
            }
            if (isset($imagem) && strlen($imagem) > 53000) {
                $erro['imagem'] = "A imagem não pode ser maior que 40Kb.";
                echo json_encode($erro);
                return;
            }
            if ($preco <= 0.00) {
                $erro['preco'] = "Preço não pode ser menor ou igual a zero.";
                echo json_encode($erro);
                return;
            }
            $id = 0;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                if ($id > 0) {
                    $erro['goTo'] = "/admin/produtos";
                }
            }
            $modelo = new ProdutoModel();
            if ($modelo->saveProduto($id, $produto, $descricao, $preco, $imagem)) {
                $erro['resposta'] = "sucesso";
                echo json_encode($erro);
                return;
            }
        }
        $erro['naoinseriu'] = "Erro ao inserir, contate o administrador do sistema.";
        echo json_encode($erro);
    }

    public function listProductsToUpdateAndroid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if($data[0]['senha'] == "123456"){
                $model = new ProdutoModel();
                $update = $data[0]['update'];
                echo($model->listAllProducts2($update));
            }
        }
    }

    function show($id) {
        $prod = new ProdutoModel();
        $x = $prod->getProduto($id);
        return $this->response->setContent($this->twig->render('cadastroprodutos.php', array('produto' => $x)));
    }

}
