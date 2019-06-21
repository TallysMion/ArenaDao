<?php

$response = array();

if(isset($_POST["id"])){

    $id 		    = $_POST["id"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("DELETE FROM `usuarioatividade` WHERE  id='$id'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Registro de Atividade Removido";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao Remover Registro";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>