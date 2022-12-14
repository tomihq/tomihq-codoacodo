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


?>