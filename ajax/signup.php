<?php
session_start();

include "../include/db.php";

if (isset($_GET['signupEmail'])) {
    $signupEmail = $_GET['signupEmail'];
    $signupPassword = $_GET['signupPassword'];
    $encodedPass = sha1($signupPassword);


    $query = "INSERT INTO user(email,password)  VALUES ('$signupEmail','$encodedPass')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);




    $getId = "SELECT userId FROM user WHERE email ='$signupEmail' AND password = '$encodedPass'";
    $resultForId = $dbhandle->query($getId) or die($dbhandle->error . __LINE__);



    if ($resultForId->num_rows > 0) {
        // 500 Internal Server Error
        $resultForId = $resultForId->fetch_assoc();
        $userId = $resultForId['userId'];

        $_SESSION['userId'] = $userId;

    }




    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>