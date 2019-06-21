<?php

$response = array();

if(isset($_POST["Nome"]) && isset($_POST["tipoEntrada"]) && isset($_POST["pontuacao"])){

    $nome 		= $_POST["Nome"];
    $tipoEntrada= $_POST["tipoEntrada"];
    $pontuação  = $_POST["pontuacao"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("INSERT INTO `atividade`(Nome, tipoEntrada, pontuacao) VALUES ('$nome', '$tipoEntrada', '$pontuação')");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Atividade Cadastrado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Cadastro nao pode ser completado, Atividade ja existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}


?>