<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-19
 * Time: 오후 6:25
 */

include "../connectdb.php";

$userId = $_SESSION['userId'];

$query ="SELECT * FROM item WHERE userId = '$userId'";

$rs=$dbhandle->query($query);

while($row=$rs->fetch_assoc()){
    $data[]=$row;
}
print json_encode($data);

?>