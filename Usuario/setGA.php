<?php

$response = array();

if(isset($_POST["Login"]) && isset($_POST["ga"])){

    $Login		    = $_POST["Login"];
    $ga 		    = $_POST["ga"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("UPDATE `usuario` SET `ga`='$ga' WHERE `Login`='$Login'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Usuario Atualizado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao Atualizar Usuario, GA nao Encontrado";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>