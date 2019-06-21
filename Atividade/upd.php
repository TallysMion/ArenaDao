<?php

$response = array();

if(isset($_POST["NomeA"]) && isset($_POST["Nome"]) && isset($_POST["tipoEntrada"]) && isset($_POST["pontuacao"])){

    $NomeA 		= $_POST["NomeA"];
    $Nome 		= $_POST["Nome"];
    $tipoEntrada= $_POST["tipoEntrada"];
    $pontuacao  = $_POST["pontuacao"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("UPDATE `atividade` SET `Nome`='$Nome', `tipoEntrada`='$tipoEntrada', `pontuacao`='$pontuacao' WHERE `Nome`='$NomeA'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Atividade Atualizada";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Atualizacao nao pode ser completada, Nome ja existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>