<?php

$response = array();

if(isset($_POST["Nome"])){

    $nome 		= $_POST["Nome"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("INSERT INTO `ga`(Nome) VALUES ('$nome')");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "GA Cadastrado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Cadastro nao pode ser completado, Nome de GA ja existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>