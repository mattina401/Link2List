<?php
//should set the path session.save_path = "/tmp"
session_start();
include "../include/db.php";

if (isset($_GET['loginEmail'])) {
    $loginEmail = $_GET['loginEmail'];
    $loginPassword = $_GET['loginPassword'];
    $encodedPass = sha1($loginPassword);


    $query = "SELECT userId FROM user WHERE email ='$loginEmail' AND password = '$encodedPass'";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);



    if ($result->num_rows > 0) {
        // 500 Internal Server Error
        $result = $result->fetch_assoc();
        $userId = $result['userId'];

        $_SESSION['userId'] = $userId;

        // login success
        echo "1";
    } else {
        // login fail
        echo "2";
    }

}
