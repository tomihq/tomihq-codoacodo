<?php

function createTicketPerson($fields, $paramsAmount, $bindParams, $data){
        $mysqli = connection();

        $uuid = UUID::v4();
        $stmt = $mysqli -> prepare("INSERT INTO ticket_person ($fields) 
        VALUES ($paramsAmount)");
        $stmt -> bind_param($bindParams, $uuid, ...$data);
        $stmt->execute();
        return array("ok" => true, "data" => $uuid);
    

}


function getTicketPersonDataByEmail($fields = 'e.name, tp.price, tp.dateCreated, tp.timeCreated', $email = ''){
    $filter = '';
    $mysqli = connection();
    try {
        if(isset($email) && !empty($email)){
            $filter = "and p.email=?";
        }
        $stmt = $mysqli -> prepare("SELECT $fields 
        FROM person AS P 
        JOIN ticket_person AS tp
        ON p.id = tp.idPerson
        JOIN ticket as t
        ON t.id = tp.ticket
        JOIN event AS e
        ON e.id = t.id
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