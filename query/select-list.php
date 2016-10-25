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

$arr = array();
if ($getList->num_rows > 0) {
    while ($row = $getList->fetch_assoc()) {
        $arr[] = $row;
    }
}

echo $json_response = json_encode($arr);

?>
