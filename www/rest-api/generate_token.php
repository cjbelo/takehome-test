<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// generate json web token
include_once 'config/core.php';
include_once 'libs/php-jwt-main/src/BeforeValidException.php';
include_once 'libs/php-jwt-main/src/ExpiredException.php';
include_once 'libs/php-jwt-main/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-main/src/JWT.php';
use \Firebase\JWT\JWT;

$tokenData = array(
    "iat" => $issued_at,
    "exp" => $expiration_time,
    "iss" => $issuer,
    "data" => array("key" => $key)
);

// set response code
http_response_code(200);

// generate jwt
$jwt = JWT::encode($tokenData, $key, 'HS256');
echo json_encode(array("token" => $jwt));
