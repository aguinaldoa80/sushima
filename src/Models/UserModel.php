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
class UserModel {

    public function insertUsuario($nome, $email, $documento, $endereco, $cidade, $estado, $cep, $telefone, $senha) {
        try {
            $sql = "insert into users (username, email, password, active, documento, endereco, cidade, estado, cep, telefone, plano)"
                    . " values (upper(:username), lower(:email), md5(:password), 1, :documento, upper(:endereco), upper(:cidade), :estado, :cep, :telefone, 1)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":username", $nome);
            $p_sql->bindParam(":email", $email);
            $p_sql->bindParam(":password", $senha);
            $p_sql->bindParam(":documento", $documento);
            $p_sql->bindParam(":endereco", $endereco);
            $p_sql->bindParam(":cidade", $cidade);
            $p_sql->bindParam(":estado", $estado);
            $p_sql->bindParam(":cep", $cep);
            $p_sql->bindParam(":telefone", $telefone);
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

    public function validaLogin($login, $senha) {
        try {
            $sql = "SELECT id, username, email, active, documento, endereco, cidade, estado, cep, telefone, plano FROM users WHERE email = lower(?) and password = md5(?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $login);
            $p_sql->bindValue(2, $senha);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function consultaDocumento($doc) {
        try {
            $sql = "SELECT id, username FROM users WHERE documento = binary(:doc)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindParam(":doc", $doc);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            
        }
    }

    public static function getUser() {
        if (isset($_SESSION['noh']['usuario'])) {
            $nome = explode(" ", $_SESSION['noh']['usuario']->username);
            $user = $_SESSION['noh']['usuario'];
            $user->username = $nome[0];
            return $_SESSION['noh']['usuario'];
        }
        return null;
    }

    public static function getUser1() {
//        $user = new UserEntity();
//        $listPermission = array();
//        $auth_factory = new AuthFactory($_COOKIE);
//        $auth = $auth_factory->newInstance();
//        if ($auth->isValid()) {
//            $sql = "select * from users where id = :id";
//            $psql = Conexao::getInstance()->prepare($sql);
//            $psql->bindValue(":id", $auth->getId());
//            $psql->execute();
//            $rows = $psql->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($rows as $key => $row) {
//                $user->setId($row['id']);
//                $user->setNome($row['username']);
//                $user->setEmail($row['email']);
//                $user->setActive($row['active']);
//                $user->setDocumento($row['documento']);
//                $user->setEndereco($row['endereco']);
//                $user->setCidade($row['cidade']);
//                $user->setEstado($row['estado']);
//                $user->setCep($row['cep']);
//                $user->setPlano($row['plano']);
//                $user->setTelefone($row['telefone']);
////                print_r($user->getFullname());
//            }
//            $sql = "select fkuser, fkpermission,permission from users_permissions as up, permissions as 
//              p,users as u where up.fkuser = :fk and up.fkuser = u.id and up.fkpermission = p.id order by p.permission";
//            $psql = Conexao::getInstance()->prepare($sql);
//            $psql->bindValue(":fk", $user->getId());
//            $psql->execute();
//            $rows = $psql->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($rows as $key => $row) {
//                $permission = new PermissionEntity();
//                $permission->setId($row['fkpermission']);
//                $permission->setPermission($row['permission']);
//                array_push($listPermission, $permission);
//            }
//
//            $user->setPermissions($listPermission);
////             foreach ($listPermission as $p) {
////                print_r($p->getPermission().'<br>');
////            }
////            self::hasRole(['galinha', 'jacaré']);
//            return $user;
//        }
//        return null;
    }

    public static function hasRole($regras) {
        $user = self::getUser();
        if ($user) {
            foreach ($regras as $regra) {
//                print_r($value);
                foreach ($user->getPermission() as $p) {
                    if ($p->getPermission() == $regra) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

}
