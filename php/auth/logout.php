<?php 

    if(isset($_COOKIE["token"])){
        unset($_COOKIE['token']);
        setcookie('token', '', time() - 3600, '/'); 
        header('Location: /tomihq-codoacodo/');
        echo json_encode(array("ok" => true));
        exit;
    }

    echo json_encode(array("ok" => false));
    exit;

?>