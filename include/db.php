<?php

$dbhandle=new mysqli('link2listnet.ipagemysql.com','link2list','Jeon1318?','link2list');
//$dbhandle=new mysqli('localhost','root','','link2list');

if ($dbhandle->connect_error) {
    die('Connect Error (' . $dbhandle->connect_errno . ') '
        . $dbhandle->connect_error);
}