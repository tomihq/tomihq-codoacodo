<?php

    function loginQuery($data){
        $email = $data["email"];
        $password = $data["password"];

        $result = getUsersQuery("WHERE email=?", "email, password, tempPassword", ["s", $email]);
        $userFound = $result->fetch_assoc(); 
        if(is_null($userFound)){
            return array("ok" => false, "body" => "No existe ningun usuario registrado bajo ese email");
        }
        $passwordHashed = $userFound["password"];

        if(password_verify($password, $passwordHashed)){
            $headers = array('alg'=>'HS256','typ'=>'JWT');
            $payload = array('email'=>$userFound["email"], 'exp'=>(time() + 60));
            $jwt = generate_jwt($headers, $payload);
            setcookie("token", $jwt, time()+3600, "/");
            if(!isset($_SESSION["email"])){
                session_start();
                $_SESSION["email"] = $email;
            }
            
            if($userFound["tempPassword"]===1){
                return array("ok" => true, "body" =>array("token" => $jwt, "tempPassword" => true));
            }
                return array("ok" => true, "body" =>array("token" => $jwt));
        }else{
            return array("ok" => false, "body" => "Datos erróneos");
        }
       


    }
?>