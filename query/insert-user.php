<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-21
 * Time: 오후 12:05
 */

include "../connectdb.php";

$data = json_decode(file_get_contents("php://input"));


$email = $dbhandle->real_escape_string($data->email);
$password = $dbhandle->real_escape_string($data->password);
$confirmpassword = $dbhandle->real_escape_string($data->confirmPassword);

$check = $dbhandle->query("SELECT email FROM user WHERE email = '$email'");

if (!$check) {
    die($dbhandle->error);
}

// check email already exists in DB or not
if($check->num_rows > 0) {
    echo 'email already exists';
} else {
    $query = "INSERT INTO user (email, password) VALUES(?, ?)";


    $q = $dbhandle->prepare($query);
    if ($q === FALSE) {
        die ("Mysql Error: " . $dbhandle->error);
    }

    $encodedPass = sha1($password);

    $q->bind_param("ss", $email, $encodedPass);


    $q->execute();
    echo 'succeed';
}


?>