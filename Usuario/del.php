<?php

$response = array();

if(isset($_POST["Login"])){

    $Login 		    = $_POST["Login"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("DELETE FROM `usuario` WHERE Login='$Login'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Usuario Removido";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao Remover Usuario";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>