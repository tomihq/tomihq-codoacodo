<?php
    require('conexion.php');
    require('person.php');
    require('./queries/users.php');
    require('./queries/helpers.php');
    require('./queries/person_event.php');
 
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $talkAbout = $_POST["talkAbout"];

    $result = getUsersQuery("WHERE email=?", 'email', ["s", $email]);
    $user = $result->fetch_assoc(); 

    $person = array($name, $surname, $email);

    //TODO: Actualizar a: Si YA existe usuario(else) entonces verifico si ya está en la tabla de person_event, si ya lo está entonces tiro ese echo de que ya ingreso, caso contrario lo ingreso a person_event.

    if(is_null($user)){
        $uuid = createUserQuery('id, name, surname, email', '?, ?, ?, ?', 'ssss', $person);  
        $data = array("uuid" => $uuid, "event" => 1, "talkAbout" => $talkAbout);
        createPersonEventQuery($data);
        exit;
    }else{
        echo json_encode(array("success" => true,"title"=>"¡Atención!", "msg" => "El email que ha ingresado ya ha enviado una respuesta a este formulario"));
        exit;
    }
   

    

?>