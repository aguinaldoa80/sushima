<?php

namespace MeuProjeto\Models;

use MeuProjeto\Util\Conexao;
use PDO;

class ModeloProduto {
    
    public function __construct() {
    }
    public function show($id){
        try {
        $sql = "";
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return "Dados do produto $id.";
    }
    
    public function listagem(){
        try{
            $sql = "select * from produtos";
             $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->execute();

            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
            
            
        } catch (Exception $ex) {

        }
        
    }
    public function find($id){
        try{
            $sql = "select * from produtos where id = $id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
            
            
        } catch (Exception $ex) {

        }
        
    }
    
}
