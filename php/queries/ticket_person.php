<?php

function createTicketPerson($fields, $paramsAmount, $bindParams, $data){
        $mysqli = connection();

        $uuid = UUID::v4();
        if (!$stmt = $mysqli->prepare("INSERT INTO ticket_person ($fields) VALUES ($paramsAmount)")) {
            echo json_encode(array("data" => $stmt->error));
        }
        if (!$res = $stmt->bind_param($bindParams, $uuid, ...$data)) {
            echo json_encode(array("data2" => $stmt->error));
        }

        if (!$res = $stmt->execute()) {
            echo json_encode(array("data3" => $stmt->error));
        }

        return array("ok" => true, "data" => $uuid);
    

}


function getTicketPersonDataByEmail($fields = 'e.name, tp.price, tp.dateCreated, tp.timeCreated', $email = ''){
    $filter = '';
    $mysqli = connection();

    if(isset($email) && !empty($email)){
            $filter = "and p.email=?";
    }

    $stmt = $mysqli->prepare("SELECT $fields 
    FROM person AS p 
    JOIN ticket_person AS tp
    ON p.id = tp.idPerson
    JOIN ticket as t
    ON t.id = tp.ticket
    JOIN event AS e
    ON e.id = t.id
    $filter");

    if(isset($email) && !empty($email)){
        if (!$res = $stmt->bind_param("s", $email)) {
            echo json_encode(array("s" => $stmt->error));
        }
    }

     if (!$res = $stmt->execute()) {
        echo json_encode(array("data3" => $stmt->error));
    }

    $personEvent = $stmt->get_result();
    return $personEvent;
       
   
    $stmt -> close();
    $mysqli -> close();

}



?>