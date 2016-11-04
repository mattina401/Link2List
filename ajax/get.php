<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-27
 * Time: 오후 9:49
 */

include "../include/db.php";


$query = "SELECT * FROM user";
$result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

$arr = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}

# JSON-encode the response
echo $json_response = json_encode($arr);
