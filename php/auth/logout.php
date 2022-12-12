<?php 
    if(isset($_COOKIE["token"])){
        unset($_COOKIE['token']);
        unset($_SESSION['email']);
        setcookie("token", '', 1, "/");
        echo json_encode(array("ok" => true));
        exit;
    }

    echo json_encode(array("ok" => false));
    die();

?>