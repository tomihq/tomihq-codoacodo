<?php
require(__DIR__ .'/../uuid.php');

function createUserQuery($fields, $paramsAmount, $bindParams, $person){
        $mysqli = connection();

        $uuid = UUID::v4();
        $stmt = $mysqli -> prepare("INSERT INTO person ($fields) 
        VALUES ($paramsAmount)");
        $stmt -> bind_param($bindParams, $uuid, ...$person);
        $stmt->execute();

        return $uuid;

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

function updateUserQuery($data, $fields = '', $bindParams = '', $filter = 'id=?'){
    $mysqli = connection();

    try {
        
        $stmt = $mysqli -> prepare("SELECT email, id FROM person WHERE email=?");
        $stmt -> bind_param("s", $data["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $rs = $result->fetch_assoc(); 
        
        if(is_null($rs) || $data["id"] === $rs["id"] || $data["id"]==='tempPassword'){
            $stmt = $mysqli -> prepare("UPDATE person SET $fields WHERE $filter");
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