<?php

$response = array();

if(isset($_POST["id"]) && isset($_POST["data"]) && isset($_POST["status"])){

    $id 		    = $_POST["id"];
    $data 		    = $_POST["data"];
    $status 		= $_POST["status"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("UPDATE `usuarioatividade` SET `data`='$data',`status`='$status' WHERE `id`='$id'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Registro de Atividade Atualizado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao atualizar registro de atividade";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>