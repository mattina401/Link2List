<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-22
 * Time: 오후 5:00
 */


include "../connectdb.php";
$data = json_decode(file_get_contents("php://input"));


$email = $dbhandle->real_escape_string($data->email);
$password = $dbhandle->real_escape_string($data->password);
$encodedPass = sha1($password);

$check = $dbhandle->query("SELECT email FROM user WHERE email = '$email' AND password = '$encodedPass'");

if (!$check) {
    die($dbhandle->error);
}

// check valid user
if($check->num_rows > 0) {
    $_SESSION['userinfo'] = $email;
    echo 'succeed';
    
} else {
    echo 'wrong email or password';
}