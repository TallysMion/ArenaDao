<?php

$response = array();

if(isset($_POST["Nome"]) && isset($_POST["Login"]) && isset($_POST["Senha"])){

    $Nome 		= $_POST["Nome"];
    $Login 		= $_POST["Login"];
    $Senha 		= $_POST["Senha"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();

    $result = $db->conection->query("INSERT INTO `usuario`(Login, Senha, Nome) VALUES ('$Login', '$Senha', '$Nome')");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Usuario Cadastrado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Cadastro nao pode ser completado, Usuario ja existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>