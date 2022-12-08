<?php
    require('conexion.php');
    require('person.php');
    require('./queries/users.php');
 
    $res = '';

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $talkAbout = $_POST["talkAbout"];

    $result = getUsersQuery("WHERE email=?", 'email', ["s", $email]);
    $user = $result->fetch_assoc(); 

    $person = new Person(trim($name), trim($surname), $email);
    $personObj = $person->getPerson();

    if(is_null($user)){
        createUserQuery($personObj, $talkAbout);   
        
    }else{
        echo json_encode(array("success" => true,"title"=>"¡Atención!", "msg" => "El email que ha ingresado ya ha enviado una respuesta a este formulario"));
    
    }
   

    

?>