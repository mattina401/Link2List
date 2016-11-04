
<?php
session_start();
include "../include/db.php";
if (isset($_GET['listId'])) {
    $listId = $_GET['listId'];
$_SESSION['listId'] = $listId;
    echo $listId;
}
?>

