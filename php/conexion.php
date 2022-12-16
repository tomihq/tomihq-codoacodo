<?php

function connection(){
    $server = "localhost";
    $user = "id20003014_user";
    $password = "UsuarioRoot123!";
    $database = "id20003014_codoacodo";

    $mysqli = new mysqli($server, $user, $password, $database);


    return $mysqli;
}


?>