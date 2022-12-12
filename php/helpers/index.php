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

function generate_jwt($headers, $payload, $secret = 'secret') {
	$headers_encoded = base64url_encode(json_encode($headers));
	
	$payload_encoded = base64url_encode(json_encode($payload));
	
	$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
	$signature_encoded = base64url_encode($signature);
	
	$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
	
	return $jwt;
}


function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

function is_jwt_valid($jwt, $secret = 'secret') {
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);
	$signature_provided = $tokenParts[2];

	$expiration = json_decode($payload)->exp;
	$is_token_expired = ($expiration - time()) < 0;

	$base64_url_header = base64url_encode($header);
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);

	$is_signature_valid = ($base64_url_signature === $signature_provided);
	
	if ($is_token_expired || !$is_signature_valid) {
		return FALSE;
	} else {
		return TRUE;
	}
}

function passwordValidations($password, $confirmPassword){
	if(strcmp($password, $confirmPassword) !== 0){
        echo json_encode(array("success" => true,"title"=>"¡Error!", "msg" => "Las contraseñas no coinciden."));
        exit;
      }


      if(!validatePassword($password)){
        echo json_encode(array("success" => true,"title"=>"¡Error!", "msg" => "La contraseña no es valida"));
        exit;
      }
}


?>