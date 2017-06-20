<?php

namespace MeuProjeto\Controllers;

use MeuProjeto\Models\ModeloLista;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Twig_Environment;

class ControleLista {

    private $response;
    private $twig;
    private $request;
    private $dados;
    private $cliente;
    private $route;

    function __construct(Response $response, RequestContext $request, Twig_Environment $twig) {
//        $this->dados = null;
        $this->response = $response;
        $this->request = $request;
        $this->dados = null;

//        if (substr(strtolower($this->request->getPathInfo()), 0, 7) == '/create') {
//        } else {
//            echo('usuário não tem permissão');
//        }
//        print_r($request->getPathInfo());
        $this->twig = $twig;
    }

    public function msgInicial() {
        return $this->response->setContent('Msg inicial pg contato');
    }

    public function senddata() {
        return $this->response->setContent($this->twig->render('senddata.html'));
    }

    public function insertdata() {
        return $this->response->setContent($this->twig->render('senddata.html'));
    }

    public function lista() {
        return $this->response->setContent($this->twig->render('listar.php'));
    }

    public function listagem() {
        $usuario = new ModeloLista();
        echo($usuario->listagem());
    }

    public function manageusers() {
        //$data = $_POST['frm'];

        if (isset($_POST['option']) && $_POST['option'] == 'registrar2') {// change submit to cc
//              $v = new MyValidator($_POST[]);
//            $v->rule('lengthMin', 'nome', 200)->message('Nome deve ter mais de 200 caracteres');
            $id = $_POST['idusuario'];
            $nome = $_POST['nome'];
            $this->atualizar($id, $nome);
            $chi = ['resposta' => 'ok'];
//            echo json_encode($id . ' - ' . $nome);
            echo json_encode($chi);
        } else
        if (isset($_POST['option']) && $_POST['option'] == 'eliminar') {
            $id = $_POST['idusuario'];
            $this->remove($id);
            $chi = ['resposta' => 'ok'];
            echo json_encode($chi);
        } else
        if (isset($_POST['option']) && $_POST['option'] == 'registrar') {
            $id = $_POST['idusuario'];
            $u = new ModeloLista();
            if($u->existeUsuario($_POST['nome'])) {
                $chi = ['resposta' => 'existe'];
            } else {
                $chi = ['resposta' => 'ok'];
            }
            echo json_encode($chi);
        } else {
            echo json_encode("não deu");
        }
//        $usuario = new ModeloLista();
//            echo($usuario->listagem());
    }

    public function removerAcentos($string) {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç)/", "/(ç)/"), explode(" ", "a A e E i I o O u U n N C c"), $string);
    }

    public function atualizar($id, $nome) {
        $u = new ModeloLista();
        $u->atualizar($id, $nome);
    }

    public function registrar($nome) {
        $u = new ModeloLista();
        return $u->existeUsuario($nome);
    }

    public function remove($id) {
        $u = new ModeloLista();
        $u->deletar($id);
    }

    public function usuarios() {
        return $this->response->setContent($this->twig->render('usuarios.html'));
    }

}
