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

$confirmPassword = $dbhandle->real_escape_string($data->confirmPassword);
$password = $dbhandle->real_escape_string($data->password);
$userId = $_SESSION['userId'];

if($password != $confirmPassword) {
    echo "confirm password is not match new password";
} else {
    $encodedPass = sha1($password);
    $query = "UPDATE user SET password = '$encodedPass' WHERE userId = '$userId'";

    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo "succeed";
}
