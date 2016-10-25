
<?php
session_start();
include "../connectdb.php";
if (isset($_GET['listName'])) {
    $listName = $_GET['listName'];
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO list (listName, userId) VALUES ('$listName','$userId')";
    $result = $dbhandle->query($query) or die($dbhandle->error . __LINE__);

    $result = $dbhandle->affected_rows;

    echo $json_response = json_encode($result);
}
?>

