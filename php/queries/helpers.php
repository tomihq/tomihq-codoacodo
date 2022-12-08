<?php

    function usersToObj($users){
        $personsObj = Array();
        
        foreach ($users as $key => $user) {
            $person = new Person($user["name"], $user["surname"], $user["email"]);
            $person->setID($user["id"]);
            array_push($personsObj, $person->getPerson()); 
            
        }
        
        return $personsObj;
    }

    function userToObj($user){
         $person = new Person($user["name"], $user["surname"], $user["email"]);
         if(isset($user["id"])){
            $person->setID($user["id"]); 
         }
         $personObj = $person->getPerson();
         return $personObj;
    }



?>