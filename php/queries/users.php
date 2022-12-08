<?php
require('uuid.php');

function createUserQuery($person, $talkAbout){
    $mysqli = connection();
    try {
        $uuid = UUID::v4();
        $stmt = $mysqli -> prepare("INSERT INTO person (id, name, surname, email) 
        VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $uuid, $person["name"], $person["surname"], $person["email"]);
        $stmt->execute();

        $stmt = $mysqli -> prepare("INSERT INTO person_event (idPerson, idEvent, description)
        VALUES (?, ?, ?)");
        $event = 1; 
        $stmt -> bind_param("sis", $uuid, $event, $talkAbout);
        $stmt->execute();

        echo json_encode(array("success" => true, "title"=> "¡Proceso realizado con éxito!", "msg" => "Hemos recibido tu solicitud. ¡Gracias!"));
    } catch (\Throwable $th) {
        
        echo json_encode(array("success"=>false, "title" => "Oops", "msg" => "Algo salió mal."));

    }
    $stmt -> close();
    $mysqli -> close();

}

function getUsersQuery($filter = '', $fields = '*', $bindParams = ''){
    $mysqli = connection();
    $stmt = $mysqli -> prepare("SELECT $fields FROM person $filter");
   
    if(isset($bindParams) && !empty($bindParams)){
        $dataTypes = $bindParams[0];
        unset($bindParams[0]);
        $stmt -> bind_param($dataTypes, ...$bindParams);
    }

    $stmt -> execute();
    $users = $stmt->get_result();

    $stmt -> close();
    $mysqli -> close();


    return $users;

}

function updateUserQuery($data, $fields = '', $bindParams = ''){
    $mysqli = connection();
   
    try {
        
        $stmt = $mysqli -> prepare("SELECT email, id FROM person WHERE email=?");
        $stmt -> bind_param("s", $data["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $rs = $result->fetch_assoc(); 
        
        if(is_null($rs) || $data["id"] === $rs["id"]){
            $stmt = $mysqli -> prepare("UPDATE person SET $fields WHERE id=?");
            if(isset($bindParams) && !empty($bindParams)){
                $dataTypes = $bindParams[0];
                unset($bindParams[0]);
                $stmt -> bind_param($dataTypes, ...$bindParams);
            }        
            $status = $stmt -> execute();
            echo json_encode(array("ok"=>true, "title" => "¡Proceso exitoso!", "msg"=> "Se ha editado el usuario correctamente"));
        }else{
            echo json_encode(array("ok"=>true, "title" => "No hemos hecho nada", "msg"=> "El email ya ha sido tomado por otro usuario."));
        }

    } catch (\Throwable $th) {
        echo json_encode(array("ok"=>false, "title" => "No hemos hecho nada", "msg"=> "Oops, algo salió mal"));
    }
    $stmt -> close();
    $mysqli -> close();

}

function deleteUserQuery($id){
    $mysqli = connection();

    try {
        $stmt = $mysqli -> prepare("DELETE FROM person_event WHERE idPerson=?");
        $stmt -> bind_param("s", $id);
        $stmt->execute();
    
        $stmt = $mysqli -> prepare("DELETE FROM person WHERE id=?");
        $stmt -> bind_param("s", $id);
        $stmt->execute();
        echo json_encode(array("ok"=>true, "msg"=> "Se ha eliminado al usuario correctamente"));
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("ok"=>false, "msg"=> "Oops, algo salió mal"));
    }
    $stmt -> close();
    $mysqli -> close();


}




?>