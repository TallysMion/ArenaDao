<?php

$response = array();

if(isset($_POST["ga"])){

    $ga 		    = $_POST["ga"];

    require_once '../db_connect.php';

    $db = new DB_CONNECT();

    $result = $db->conection->query("SELECT * FROM `usuario` WHERE  ga='$ga'");


    if($result->num_rows > 0){
        $response["success"] = 1;
        $response["itens"] = $result->num_rows;
        $response["data"] = array();
        $lista = array();
        for($i = 0; $i < $result->num_rows; $i++) {
            $response["data"][] = $result->fetch_array(MYSQLI_ASSOC);
        }
        echo json_encode($response);
    }else{
        $response["success"] = 0;
        $response["mensage"] = "Usuarios não encontrados!";
        echo json_encode($response);
    }

}else{
    $response["success"] = 0;
    $response["mensage"] = "Complete os Dados";
    echo json_encode($response);
}



?>