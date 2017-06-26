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
class ProdutoModel {

    public function saveProduto($id, $produto, $descricao, $preco, $imagem) {
        try {
            $sql = "";
            if ($id > 0) {
//                $sql = "update produtos set produto = :produto', descricao = :descricao, preco = :preco, imagem = :imagem where id = :id ";
                $sql = "update produtos set produto = :produto, descricao = :descricao, preco = :preco, imagem = :imagem where id = :id";
            } else {
                $sql = "insert into produtos (produto, descricao, preco, imagem, ativo)"
                        . " values (upper(:produto), upper(:descricao), :preco, :imagem, 1)";
            }
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":produto", $produto);
            $p_sql->bindParam(":descricao", $descricao);
            $p_sql->bindParam(":preco", $preco);
            $p_sql->bindParam(":imagem", $imagem);
            if ($id > 0) {
                $p_sql->bindParam(":id", $id);
            }

            $p_sql->execute();
//            print_r($p_sql->debugDumpParams());
            return true;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function getProduto($id) {
        try {
            $sql = "select id, produto, descricao, preco, imagem, ativo from produtos where id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":id", $id);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            
        }
    }

    public function listAllProducts() {
        try {
            $sql = "select id, produto, descricao, preco, imagem, ativo from produtos order by produto";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $rows = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $key => $row) {
                $arreglo[] = $row;
            }
            return json_encode($arreglo, JSON_UNESCAPED_UNICODE);
        } catch (Exception $ex) {
            
        }
    }

}
