<?php
    require('conexion.php');
    require('person.php');
    require('./queries/users.php');
    require('./queries/helpers.php');
    require('./queries/person_event.php');
    global $uuid;
 
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = strtolower($_POST["email"]);
    $talkAbout = $_POST["talkAbout"];

    $result = getUsersQuery("WHERE email=?", 'email, id', ["s", $email]);
    
    $user = $result->fetch_assoc(); 
    $person = array($name, $surname, $email);

    
    if(is_null($user)){
        $uuid = createUserQuery('id, name, surname, email', '?, ?, ?, ?', 'ssss', $person);  
    }else{
        $uuid = $user["id"];
       
    }

    $eventsFound = getPersonDataInEvent($email);
    $user = $eventsFound->fetch_assoc(); 

    if(is_null($user)){
        
        $data = array("uuid" => $uuid, "event" => 1, "talkAbout" => $talkAbout);
        
        createPersonEventQuery($data);
    }else{
        echo json_encode(array("success" => true,"title"=>"¡Atención!", "msg" => "El email que ha ingresado ya ha enviado una respuesta a este formulario"));
        exit;
    }
      
    
   

    

?>