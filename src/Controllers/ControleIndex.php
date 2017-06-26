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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //echo json_encode("é post");
            $data = json_decode(file_get_contents("php://input"), true);
            if ($data[0]['option']) {
                if ($data[0]['option'] == 'cadastrar') {
                    echo json_encode("consegui");
                }
            }

            //$vaso = json_encode($data,JSON_UNESCAPED_UNICODE);
            //echo $vaso;

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        /* if(isset($_POST['data'])){
          //echo(json_encode(print_r('asdfasd'));
          print_r(json_encode('aguinaldo'));
          }else{
          $user = new \MeuProjeto\Models\ModeloLista();
          echo ($user->listagem());
          } */
//        return $this->response->setContent($this->twig->render('welcome.php'));
    }


}
