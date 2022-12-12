<?php

function createPersonEventQuery($data){
    $mysqli = connection();
    try {
        $stmt = $mysqli -> prepare("INSERT INTO person_event (idPerson, idEvent, description)
        VALUES (?, ?, ?)");
        $stmt -> bind_param("sis", $data["uuid"], $data["event"], $data["talkAbout"]);
        $stmt->execute();
        echo json_encode(array("success" => true, "title"=> "¡Proceso realizado con éxito!", "msg" => "Hemos recibido tu solicitud. ¡Gracias!"));
    } catch (\Throwable $th) {
        echo json_encode(array("success"=>false, "title" => "Oops", "msg" => "Algo salió mal."));
    }
    $stmt -> close();
    $mysqli -> close();


}



?>