<?php
include "../include/db.php";

$data = json_decode(file_get_contents("php://input", true));
$listName = $dbhandle->real_escape_string($data->listName);
$description = $dbhandle->real_escape_string($data->description);
$listId = $dbhandle->real_escape_string($data->listId);


$query = "update list set listName='$listName', description='$description'  where listId='$listId'";

$result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

$result = $dbhandle->affected_rows;

$json_response = json_encode($result);

?>