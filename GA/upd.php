<?php

$response = array();

if(isset($_POST["Nome"]) && isset($_POST["NomeA"])){

    $Nome 		= $_POST["Nome"];
    $NomeA 		= $_POST["NomeA"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("UPDATE `ga` SET `Nome`='$Nome' WHERE `Nome`='$NomeA'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "GA Atualizado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro, GA nao encontrado ou Nome ja Existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>