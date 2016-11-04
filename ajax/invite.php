<?php
session_start();
include "../include/db.php";

$data = json_decode(file_get_contents("php://input", true));
$email = $dbhandle->real_escape_string($data->email);
$listId = $dbhandle->real_escape_string($data->listId);
$ownerId = $_SESSION['userId'];

$q = "select userId from user where email= '$email'";
$check = $dbhandle->query($q) or die($dbhandle->error . __LINE__);

if ($check->num_rows == 0) {
    echo "no user";
} else {

    while ($row = $check->fetch_assoc()) {
        $userId = $row['userId'];
    }

    $query = "INSERT INTO shared (listId, userId, toggle, ownerId) VALUES ('$listId','$userId','0','$ownerId' )";

    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    echo"succeed";
}

?>