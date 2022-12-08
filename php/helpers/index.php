<?php

function sanitizeData($string){
    global $mysqli;
    return $mysqli->real_escape_string($string);
}

?>