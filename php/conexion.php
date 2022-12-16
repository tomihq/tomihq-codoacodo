<?php

function connection(){
    $server = "localhost";
    $user = "root";
    $password = "UsuarioRoot123!";
    $database = "codoacodo";

    $mysqli = new mysqli($server, $user, $password, $database);


    return $mysqli;
}


?>