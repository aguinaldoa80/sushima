<?php

namespace MeuProjeto\Controllers;

use MeuProjeto\Models\UserModel;
use MeuProjeto\Validators\ValidaCPFCNPJ;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class UserController {

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

    public function validaLogin() {
        $modelo = new UserModel();
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $usuario = $modelo->validaLogin($login, $senha);
        if ($usuario) {
            $this->sessao->add("usuario", $usuario);
            echo "/dashboard";
        } else {
            echo 'errologin';
        }
    }

    public function login() {
        if ($this->sessao->get("usuario") == "") {
            return $this->response->setContent($this->twig->render('login.php'));
        } else {
            $re = new RedirectResponse('/dashboard');
            $re->send();
        }
    }

    public function logout() {
        $this->sessao->del();
        $re = new RedirectResponse('/');
        $re->send();
    }

    public function cadastro() {
        if (UserModel::getUser()) {
            $this->logout();
        } else {
            return $this->response->setContent($this->twig->render('cadastro.php'));
        }
    }

    public function manageUsers() {
        $user = new UserModel();
        $erro = [];
        $option = trim($_POST['option']);
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $documento = preg_replace("/\D+/", "", trim($_POST['documento']));
        $endereco = trim($_POST['endereco']);
        $cidade = trim($_POST['cidade']);
        $estado = trim($_POST['estado']);
        $cep = preg_replace("/\D+/", "", trim($_POST['cep']));
        $telefone = preg_replace("/\D+/", "", trim($_POST['telefone']));
        $senha = trim($_POST['senha']);
        $resenha = trim($_POST['resenha']);
        if ($option == "insertUser") {
            if (strlen($nome) < 10 || strlen($nome) > 99) {
                $erro['nome'] = "Nome deve ter entre 10 e 100 letras.";
                echo json_encode($erro);
                return;
            }
//            $dominio = explode('@', $email);
//            if (!checkdnsrr($dominio[1], 'A')) {
//                 $erro['email'] = "aguinaldo email inválido.";
//                echo json_encode($erro);
//                return;
//            } else {
//                print_r('aguinaldo email válido!');
//                return;
//            }
            if (strlen($email) < 10 || strlen($endereco) > 149) {
                $erro['email'] = "E-mail inválido.";
                echo json_encode($erro);
                return;
            }
            $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
            if (preg_match($er, $email)) {
//                return true;
            } else {
                $erro['email'] = "E-mail inválido.";
                echo json_encode($erro);
                return;
            }
            if ($user->consultaEmail($email)) {
                $erro['email'] = "E-mail já esta em uso.";
                echo json_encode($erro);
                return;
            }
            $validaDocumento = new ValidaCPFCNPJ($documento);
            $formatado = $validaDocumento->formata();
            if (!$formatado) {
                $erro['documento'] = "CPF ou CNPJ inválido.";
                echo json_encode($erro);
                return;
            }
            if ($user->consultaDocumento($documento)) {
                $erro['documento'] = "Documento já esta em uso.";
                echo json_encode($erro);
                return;
            }
            if (strlen($endereco) < 10 || strlen($endereco) > 149) {
                $erro['endereco'] = "Endereço deve ter entre 10 e 150 letras.";
                echo json_encode($erro);
                return;
            }
            if (strlen($cidade) < 3 || strlen($cidade) > 99) {
                $erro['cidade'] = "Cidade deve ter entre 3 e 100 letras.";
                echo json_encode($erro);
                return;
            }
            if ($estado == "escolha") {
                $erro['estado'] = "Escolha um estado.";
                echo json_encode($erro);
                return;
            }
            if (strlen($cep) < 8) {
                $erro['cep'] = "C.e.p. é obrigatório";
                echo json_encode($erro);
                return;
            }
            if (strlen($telefone) < 12) {
                $erro['telefone'] = "Telefone é obrigatório";
                echo json_encode($erro);
                return;
            }
            if (strlen($senha) < 8 || strlen($senha) > 16 || strlen($resenha) < 8 || strlen($resenha) > 16) {
                $erro['senha'] = "Campo senha e repita a senha deve ter entre 8 e 16 caracteres cada.";
                echo json_encode($erro);
                return;
            }
            if ($resenha != $senha) {
                $erro['senha'] = "As senhas estão difentes uma da outras.";
                echo json_encode($erro);
                return;
            }
            if ($user->insertUsuario($nome, $email, $documento, $endereco, $cidade, $estado, $cep, $telefone, $senha)) {
                $modelo = new UserModel();
                $usuario = $modelo->validaLogin($email, $senha);
                if ($usuario) {
                    $this->sessao->add("usuario", $usuario);
                    $erro['goTo'] = "/dashboard";
                    echo json_encode($erro);
                    return;
                }
            }
            $erro['goTo'] = "/cadastro";
            echo json_encode($erro);
        }
    }

}
