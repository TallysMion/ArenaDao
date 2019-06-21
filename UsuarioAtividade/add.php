<?php

$response = array();

if(isset($_POST["data"]) && isset($_POST["status"]) && isset($_POST["usuario"]) && isset($_POST["atividade"])){

    $data 		    = $_POST["data"];
    $status 		= $_POST["status"];
    $usuario 		= $_POST["usuario"];
    $atividade      = $_POST["atividade"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("INSERT INTO `usuarioatividade`(data, status, usuario, atividade) VALUES ('$data', '$status', '$usuario', '$atividade')");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Registro de Atividade Concluido";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao registrar atividade";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>