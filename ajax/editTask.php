<?php
session_start();
include "../include/db.php";
$data = json_decode(file_get_contents("php://input", true));
$itemId = $dbhandle->real_escape_string($data->itemId);
$editInput = $dbhandle->real_escape_string($data->editInput);
$updatedTime = date("Y-m-d",time());

$query = "UPDATE item SET itemName = '$editInput', updatedTime ='$updatedTime' WHERE itemId = '$itemId'";

$result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

$result = $dbhandle->affected_rows;

echo $json_response = json_encode($result);

?>
