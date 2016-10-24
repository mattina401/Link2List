<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-19
 * Time: 오후 11:46
 */
include "../connectdb.php";
$data = json_decode(file_get_contents("php://input"), true);


$email = $_SESSION['userinfo'];
$query = "SELECT * FROM user WHERE email = '$email'";
$check = $dbhandle->query($query);

if (!$check) {
    die($dbhandle->error);
}

while($row=$check->fetch_assoc()){
    $userId = $row['userId'];
    $_SESSION['userId'] = $row['userId'];

}

$getList = $dbhandle->query("SELECT * FROM  list WHERE userId = '$userId'");

if (!$getList) {
    die($dbhandle->error);
}

while($row1=$getList->fetch_assoc()){

    $data[]=$row1;
}


print json_encode($data);


?>
