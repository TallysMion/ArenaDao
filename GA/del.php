<?php

$response = array();

if(isset($_POST["Nome"])){

    $Nome 		    = $_POST["Nome"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("DELETE FROM `ga` WHERE  Nome='$Nome'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "GA Removido";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao Remover GA";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>