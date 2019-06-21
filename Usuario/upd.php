<?php

$response = array();

if(isset($_POST["LoginA"]) && isset($_POST["SenhaA"]) && isset($_POST["Login"]) && isset($_POST["Senha"]) && isset($_POST["Nome"])){

    $LoginA		    = $_POST["LoginA"];
    $SenhaA		    = $_POST["SenhaA"];
    $Login 	    	= $_POST["Login"];
    $Senha   		= $_POST["Senha"];
    $Nome    		= $_POST["Nome"];


    require_once '../db_connect.php';

    $db = new DB_CONNECT();
    $result = $db->conection->query("UPDATE `usuario` SET `Login`='$Login',`Senha`='$Senha', `Nome`='$Nome' WHERE `Login`='$LoginA' AND `Senha`='$SenhaA'");

    if($result == true){
        $response["success"] = 1;
        $response["mensage"] = "Usuario Atualizado";
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Erro ao Atualizar Usuario, Login ja existente";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>