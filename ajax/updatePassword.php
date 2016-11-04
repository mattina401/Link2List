<?php
//should set the path session.save_path = "/tmp"
session_start();
include "../include/db.php";

if (isset($_GET['newPassword'])) {
    $newPassword = $_GET['newPassword'];
    $encodedPass = sha1($newPassword);
    $userId = $_SESSION['userId'];

    $query = "UPDATE user SET password = '$encodedPass' WHERE userId = '$userId'";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);


    $result = $dbhandle->affected_rows;

    // update password success
    if($result > 0) {
        echo "1";
    }
    //update password fail
    else {
        echo "2";
    }


}
