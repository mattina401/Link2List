<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-19
 * Time: 오후 6:25
 */

include "../connectdb.php";
$data = json_decode(file_get_contents("php://input"), true);

$userId = $_SESSION['userId'];

$listId = $data['listId'];
$_SESSION['listId'] = $data['listId'];


$query ="SELECT * FROM item WHERE userId = '$userId' AND listId = '$listId'";

$rs=$dbhandle->query($query);

while($row=$rs->fetch_assoc()){
    $data[]=$row;
}
print json_encode($data, true);

?>