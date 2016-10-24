<?php
include "../connectdb.php";
if(isset($_GET['taskID'])){
$taskID = $_GET['taskID'];

$query="delete from item where itemId='$taskID'";
$result = $dbhandle->query($query) or die($dbhandle->error.__LINE__);

$result = $dbhandle->affected_rows;

echo $json_response = json_encode($result);
}
?>