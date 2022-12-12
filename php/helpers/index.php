<?php
global $passwordRegex; 
$passwordRegex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/";

function sanitizeData($string){
    global $mysqli;
    return $mysqli->real_escape_string($string);
}

function validatePassword($password){
    global $passwordRegex;
    return preg_match($passwordRegex, $password);
}

?>