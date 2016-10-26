<?php
session_start();
include "../connectdb.php";
if (isset($_GET['sharedId'])) {
    $sharedId = $_GET['sharedId'];



    $query = "UPDATE shared SET toggle = '1' WHERE sharedId = '$sharedId'";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}

?>
