<?php
session_start();
include "../include/db.php";
if (isset($_GET['listId'])) {
    $listId = $_GET['listId'];
}


$query = "select * from list where listId= '$listId'";
$result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

$arr = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>