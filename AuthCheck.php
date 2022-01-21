<?php

require 'FetchAuthToken.php';
require 'phpJWT/src/BeforeValidException.php';
require 'phpJWT/src/ExpiredException.php';
require 'phpJWT/src/JWK.php';
require 'phpJWT/src/JWT.php';
require 'phpJWT/src/SignatureInvalidException.php';

use Firebase\JWT\JWT;

function AuthorizationCheck(){

$UniqKeyCheck = "unique_key";

$DecryptKey = "decrypt_key";

$key = "main_key";
$payload = array(
    "id" => "596731569",
    "name" => "User1",
  "uniquekey" => "unique_key"
);

$jwt = JWT::encode($payload, $key);
  
$RecievedToken = getBearerToken();
$DecryptedToken = openssl_decrypt($RecievedToken, "AES-256-CBC", $DecryptKey);
$decoded = JWT::decode($DecryptedToken, $key, array('HS256'));
$decoded_array = (array) $decoded;
$DecodedUniqId = $decoded_array["uniquekey"];

if($DecryptedToken == $jwt){ 
	if($DecodedUniqId == $UniqKeyCheck){
		return true;
	}
  else {
    return false;
  }
}
  
else {
   return false;
}

}

?>