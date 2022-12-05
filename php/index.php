<?php
    require('conexion.php');
    require('person.php');
    require('uuid.php');

    global $stmt, $mysqli;
    $res = '';

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $talkAbout = $_POST["talkAbout"];

  
    $mysqli = connection();
    $stmt = $mysqli -> prepare("SELECT * FROM person WHERE email=?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); 

    $person = new Person($name, $surname, $email);
    $personObj = $person->getPerson();

    if(is_null($user)){
        $res = registerPerson($personObj, $talkAbout);
        
    }else{
        $res = array("success" => true, "msg" => "Ya has aplicado para ser un orador");
    
    }

    $stmt -> close();
    $mysqli -> close(); 
    echo json_encode($res);

    function registerPerson($person, $talkAbout){
        global $stmt, $mysqli;
        $resp = '';
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

            $resp = array("success" => true, "msg" => "Hemos recibido tu solicitud. ¡Gracias!");
            return $resp;
        } catch (\Throwable $th) {
            
            $resp = array("success"=>false, "msg" => "Algo salió mal.");
            return $resp;
        }
    }

    

?>