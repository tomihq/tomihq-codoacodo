<?php

require(__DIR__ .'/../helpers/global-config.php');
function createPersonEventQuery($data){
    
    $mysqli = connection();
    try {
        $stmt = $mysqli -> prepare("INSERT INTO person_event (idPerson, idEvent, inscriptionDate, inscriptionTime, description)
        VALUES (?, ?, ?, ?, ?)");
        $actualDate = date('Y-m-d');
        $actualTime = date("H:i:s");
        $stmt -> bind_param("sisss", $data["uuid"], $data["event"], $actualDate, $actualTime, $data["talkAbout"]);
        $stmt->execute();
        echo json_encode(array("success" => true, "title"=> "¡Proceso realizado con éxito!", "msg" => "Hemos recibido tu solicitud. ¡Gracias!"));
    } catch (\Throwable $th) {
        echo json_encode(array("success"=>false, "title" => "Oops", "msg" => "Algo salió mal."));
    }
    $stmt -> close();
    $mysqli -> close();


}


function getPersonDataInEvent($email = ''){
    $filter = '';
    $mysqli = connection();
    try {
        if(isset($email) && !empty($email)){
            $filter = "and p.email=?";
        }
        $stmt = $mysqli -> prepare("SELECT e.name, CONCAT(p.name, ' ', p.surname)'personName', e.id, pe.inscriptionDate, pe.inscriptionTime, pe.description
        FROM person as p JOIN person_event as pe ON p.id = pe.idPerson JOIN event as e ON e.id = pe.idEvent
        $filter");
        if(isset($email) && !empty($email)){
            $stmt -> bind_param("s", $email);
        }
        $stmt->execute();
        $personEvent = $stmt->get_result();
        return $personEvent;
       
    } catch (\Throwable $th) {
        echo json_encode(array("success"=>false, "title" => "Oops", "msg" => "Algo salió mal."));
    }
    $stmt -> close();
    $mysqli -> close();

}



?>