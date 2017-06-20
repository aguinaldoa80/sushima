<?php

namespace MeuProjeto\Models;

use MeuProjeto\Util\Conexao;
use PDO;
use Symfony\Component\Config\Definition\Exception\Exception;

class ModeloLista {

    public function __construct() {
        
    }

    public function show($id) {
        try {
            $sql = "";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return "Dados do produto $id.";
    }

    public function listagem() {
        try {
            $sql = "SELECT * FROM usuario WHERE estado = 1 ORDER BY id desc";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $rows = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $key => $row) {
                $arreglo["data"][] = $row;
                //$user->setId($row['id']);
            }
            return json_encode($arreglo);
        } catch (Exception $ex) {
            
        }
    }

    public function atualizar($id, $nome) {
        try {
            $sql = "UPDATE datatables_demo SET first_name = :nome WHERE id = :idusuario";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":nome", $nome);
            $p_sql->bindParam(":idusuario", $id);
            $p_sql->execute();
        } catch (Exception $ex) {
            
        }
    }

    public function deletar($id) {
        try {
            $sql = "DELETE FROM datatables_demo WHERE id = :idusuario";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":idusuario", $id);
            $p_sql->execute();
        } catch (Exception $ex) {
            
        }
    }

    public function find($id) {
        try {
            $sql = "select * from produtos where id = $id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            
        }
    }

    public function existeUsuario($nome) {
        try {
            $sql = "SELECT * FROM datatables_demo WHERE first_name = :nome";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":nome", $nome);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            
        }
    }

}
