<?php

namespace MeuProjeto\Models;

use Exception;
use MeuProjeto\Entities\ClienteEntity;
use MeuProjeto\Entities\PedidoEntity;
use MeuProjeto\Entities\ProdutoEntity;
use MeuProjeto\Util\Conexao;
use PDO;

/**
 * Description of UserModel
 *
 * @author master
 */
class ClienteModel {

    public function savePedido($cliente, $pedido, $listProd) {
        $totalClient = $this->getTotalPedidoFromClient($listProd);
        $totalServer = $this->getTotalPedidoFromServer($listProd);
        if ($totalServer != $totalClient) {
            $resposta['situacao'] = "ko";
            $resposta['idserver'] = "null";
            $resposta['dataserver'] = "null";
            $resposta['clienteid'] = "null";
            return json_encode($resposta, JSON_UNESCAPED_UNICODE);
        }
        try {
            $sql = "";
            if ($cliente['idcliente'] > 1) {
                if ($this->getCliente($cliente['idcliente'])) {
                    $sql = "update clientes set nome = upper(:nome), endereco = "
                            . "upper(:endereco), telefone = :telefone, email= :email "
                            . "where id = :id";
                } else {
                    return;
                }
            } else {
                $sql = "insert into clientes (nome, endereco, telefone, email)"
                        . " values (upper(:nome), upper(:endereco), :telefone, :email)";
            }
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":nome", $cliente['nome']);
            $p_sql->bindParam(":endereco", $cliente['endereco']);
            $p_sql->bindParam(":telefone", $cliente['telefone']);
            $p_sql->bindParam(":email", $cliente['email']);
            if ($cliente['idcliente'] > 1) {
                $p_sql->bindParam(":id", $cliente['idcliente']);
            }
            $p_sql->execute();

            if ($cliente['idcliente'] > 1) {
                
            } else {
                $cliente['idcliente'] = $this->getClienteId();
            }
            /*
             * aki vem a proximo código;
             */
            if ($this->createPedido($cliente['idcliente'], $pedido['formapgto'])) {
                $idServer = $this->getPedidoIdServer();
                $this->saveProdutosIntoPedido($idServer, $listProd);
                $resposta['situacao'] = "ok";
                $resposta['idserver'] = $idServer;
                $resposta['dataserver'] = date("Y-m-d H:m:s");
                $resposta['clienteid'] = $cliente['idcliente'];
                $jarvs = 'ok='.$idServer.'='.date("Y-m-d H:m:s").'='.$cliente['idcliente'];
                return json_encode($jarvs, JSON_UNESCAPED_UNICODE);
            } else {
                return;
            }
            echo json_encode("deu ruim");
//            print_r($p_sql->debugDumpParams());
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function saveProdutosIntoPedido($idPedidoServer, $listProd) {

        try {
            for ($i = 0; $i < count($listProd); $i++) {
                $sql = "insert into itenspedido (fkpedido, fkproduto, qtde) values "
                        . "(:fkpedido, :fkproduto, :qtde)";
                $p_sql = Conexao::getInstance()->prepare($sql);
                $p_sql->bindParam(":fkpedido", $idPedidoServer);
                $p_sql->bindParam(":fkproduto", $listProd[$i]['idprod']);
                $p_sql->bindParam(":qtde", $listProd[$i]['qtde']);
                $p_sql->execute();
            }
//            print_r($p_sql->debugDumpParams());
            return true;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function createCliente($cliente) {

        try {
            $sql = "insert into clientes (nome, endereco, telefone, email) values "
                    . "(:n, :e, :t, :email)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":n", $cliente['nome']);
            $p_sql->bindParam(":e", $cliente['endereco']);
            $p_sql->bindParam(":t", $cliente['telefone']);
            $p_sql->bindParam(":email", $cliente['email']);
            $p_sql->execute();
//            print_r($p_sql->debugDumpParams());
            return true;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function createPedido($idcliente, $idpagamento) {

        try {
            $sql = "insert into pedidos (fkstatus, fkpagamento, fkclientes) values "
                    . "(1, :fkpagamento, :fkclientes)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":fkclientes", $idcliente);
            $p_sql->bindParam(":fkpagamento", $idpagamento);
            $p_sql->execute();
//            print_r($p_sql->debugDumpParams());
            return true;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function getCliente($id) {
        try {
            $sql = "select id, endereco, telefone, email from clientes where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":id", $id);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            
        }
    }

    public function getClienteId() {
        try {
            $sql = "select max(id) as ultimo from clientes";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $row = $p_sql->fetchAll(PDO::FETCH_OBJ);
            return $row[0]->ultimo;
        } catch (Exception $ex) {
            
        }
    }

    public function getTotalPedidoFromServer($listProd) {
        $total = 0.00;
        try {
            for ($i = 0; $i < count($listProd); $i++) {
                $sql = "select preco from produtos where id = :id";
                $p_sql = Conexao::getInstance()->prepare($sql);
                $p_sql->bindParam(":id", $listProd[$i]['idprod']);
                $p_sql->execute();
                $row = $p_sql->fetchAll(PDO::FETCH_OBJ);
                $total += (($row[0]->preco) * ($listProd[$i]['qtde']));
            }
//            print_r($p_sql->debugDumpParams());
            return $total;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function getTotalPedidoFromClient($listProd) {
        $total = 0.00;
        try {
            for ($i = 0; $i < count($listProd); $i++) {
                $total += (($listProd[$i]['preco']) * ($listProd[$i]['qtde']));
            }
//            print_r($p_sql->debugDumpParams());
            return $total;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function getPedidoIdServer() {
        try {
            $sql = "select max(id) as ultimo from pedidos";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $row = $p_sql->fetchAll(PDO::FETCH_OBJ);
            return $row[0]->ultimo;
        } catch (Exception $ex) {
            
        }
    }

    public function listAllProducts() {
        try {

            $sql = "select id, produto, descricao, preco, imagem, ativo, update_at from produtos order by produto";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $rows = $p_sql->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $key => $row) {
                $arreglo[] = $row;
            }
            return json_encode($arreglo, JSON_UNESCAPED_UNICODE);
        } catch (Exception $ex) {
            
        }
    }

    public function listAllProductsByTexto($texto) {
//        print_r($texto);
        try {
            $sql = "select id, produto, descricao, preco, imagem, ativo, update_at from produtos "
                    . "WHERE produto LIKE $texto OR descricao LIKE $texto order by produto";
            $p_sql = Conexao::getInstance()->prepare($sql);
//            $p_sql->bindParam(":text", $texto);
            $p_sql->execute();
//            print_r($p_sql->debugDumpParams());

            $rows = $p_sql->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $key => $row) {
                $arreglo[] = $row;
            }
            return json_encode($arreglo, JSON_UNESCAPED_UNICODE);
        } catch (Exception $ex) {
            
        }
    }

    public function listAllProducts2($data) {
        try {
            $condicao = "";
            if ($data != "") {
                $condicao = " where update_at > :data ";
            }
            $sql = "select id, produto, descricao, preco, imagem, ativo, update_at from produtos" . $condicao . "order by produto";
            $p_sql = Conexao::getInstance()->prepare($sql);
            if ($data != "") {
                $p_sql->bindParam(":data", $data);
            }
            $p_sql->execute();

            $rows = $p_sql->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $key => $row) {
                $arreglo[] = $row;
            }
            return json_encode($arreglo, JSON_UNESCAPED_UNICODE);
        } catch (Exception $ex) {
            
        }
    }

}
