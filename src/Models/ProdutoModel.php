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

    public function insertProduto($produto, $descricao, $preco, $imagem) {
        try {
            $sql = "insert into produtos (produto, descricao, preco, imagem, ativo)"
                    . " values (upper(:produto), upper(:descricao), :preco, :imagem, 1)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":produto", $produto);
            $p_sql->bindParam(":descricao", $descricao);
            $p_sql->bindParam(":preco", $preco);
            $p_sql->bindParam(":imagem", $imagem);
            $p_sql->execute();
//            print_r($p_sql->debugDumpParams());
            return true;
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }
    }

    public function consultaEmail($email) {
        try {
            $sql = "SELECT id, username FROM users WHERE email = binary(lower(:email))";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":email", $email);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            
        }
    }
}
