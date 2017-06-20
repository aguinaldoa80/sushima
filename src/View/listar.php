<?php

include ("conexion.php");
$query = "SELECT * FROM usuario WHERE estado = 1 ORDER BY id desc;";
$resultado = mysqli_query($conexion, $query);

if(!$resultado){
    die("Error");
}else{
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo["data"][] = $data;
    }
    echo json_encode($arreglo);
}
mysqli_free_result($resultado);
mysqli_close($conexion);