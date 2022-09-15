<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
include_once 'config/core.php';
include_once 'config/database.php';
include_once 'objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isValidToken()) {
    echo json_encode(array("data" => $user->getList()));
} else {
    echo json_encode(array("message" => "Access denied."));
}
 