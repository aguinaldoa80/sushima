<?php
namespace MeuProjeto\src;

use MeuProjeto\Util\Conexao;
use PDO;

$sql = "select * from produtos";
$p_sql = Conexao::getInstance()->prepare($sql);
$p_sql->execute();

echo(json_encode('oi'));
//return $p_sql->fetchAll(PDO::FETCH_ASSOC);
//echo(json_encode(MeuProjeto\Models\UserModel::getUser()));

