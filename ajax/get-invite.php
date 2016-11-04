<?php
session_start();
include "../include/db.php";

$userId = $_SESSION['userId'];

$query = "SELECT * FROM shared WHERE userId='$userId' AND toggle='0'";

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
