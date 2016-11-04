<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kim
 * Date: 2016-10-28
 * Time: 오후 11:48
 */

$_SESSION['userId'] = null;

if($_SESSION['userId'] == null) {

    //log out
    echo "1";
}