<?php
session_start();
include "../include/db.php";
if (isset($_GET['listId'])) {
    $listId = $_GET['listId'];

    $userId = $_SESSION['userId'];

    $query = "delete from shared where listId='$listId' AND userId = '$userId'";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);


}
?>