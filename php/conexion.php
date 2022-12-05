<?php

function connection(){
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "codoacodo";

    $mysqli = new mysqli($server, $user, $password, $database);


    return $mysqli;
}


?>