<?php
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-19
 * Time: 오후 8:21
 */
include "../connectdb.php";

$data=json_decode(file_get_contents("php://input"));
$item = $data->item;



$query ="DELETE FROM list_in_list WHERE item=('".$item."')";

$dbhandle -> query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);

?>