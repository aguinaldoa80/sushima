<?php

namespace MeuProjeto\Models;

use Exception;
use MeuProjeto\Util\Conexao;
use PDO;

/**
 * Description of UserModel
 *
 * @author master
 */
class PedidoModel {

    public function listAllPedidos() {
        try {

            $sql = "select p.id as pedidoid, ps.descricao as statuspedido, c.nome, c.endereco, c.telefone, c.email, p.create_at, "
                    . "f.descricao as formapgto from pedidos as p, pedidostatus as ps, clientes as c, formapagamento "
                    . "as f where c.id = p.fkclientes and ps.id = p.fkstatus and f.id = p.fkpagamento order by p.id desc";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            $rows = $p_sql->fetchAll(PDO::FETCH_OBJ);


            foreach ($rows as $key => $row) {
                $are[] = array($row, $this->listProdutosFromPedido($row->pedidoid));
            }

            return json_encode($are, JSON_UNESCAPED_UNICODE);
        } catch (Exception $ex) {
            
        }
    }

    public function listProdutosFromPedido($idped) {
        try {

            $sql = "select p.id as produtoid, p.produto, p.preco, ip.qtde, ip.fkpedido from produtos"
                    . " as p, itenspedido as ip where p.id = ip.fkproduto and ip.fkpedido = ".$idped;
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->execute();
            $rows = $p_sql->fetchAll(PDO::FETCH_OBJ);


            foreach ($rows as $key => $row) {
                $are[] = $row;
            }

            return $are;
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
