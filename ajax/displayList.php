<?php
session_start();

include "../include/db.php";

$userId = $_SESSION['userId'];

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
