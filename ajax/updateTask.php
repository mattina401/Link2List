<?php
include "../include/db.php";
if(isset($_GET['taskID'])){
$status = $_GET['status'];
$taskID = $_GET['taskID'];
$query="update item set status='$status' where itemId='$taskID'";

$result = $dbhandle->query($query) or die($dbhandle->error.__LINE__);

$result = $dbhandle->affected_rows;

$json_response = json_encode($result);
}
?>