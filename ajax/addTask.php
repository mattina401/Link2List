<?php
session_start();
include "../connectdb.php";
if (isset($_GET['task'])) {
    $task = $_GET['task'];
    $status = "0";
    $updatedTime = date("Y-m-d",time());
    //$updatedTime = time();

    $userId = $_SESSION['userId'];
    $listId = $_SESSION['listId'];

    $query = "INSERT INTO item(itemName,userId,listId, status, updatedTime)  VALUES ('$task','$userId','$listId', '$status','$updatedTime')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>

