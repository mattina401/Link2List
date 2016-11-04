<?php
include "../include/db.php";
if (isset($_GET['listId'])) {
    $listId = $_GET['listId'];

    $query = "delete from list where listId='$listId'";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $query2 = "delete from shared where listId='$listId'";
    $result2 = $dbhandle->query($query2) or die($dbhandle->error . __LINE__);


}
?>