<?php
$sn = "localhost";
$dbuser = "root";
$dbpws = "";
$db = "project 3 database";

$conn = mysqli_connect($sn, $dbuser, $dbpws, $db);

if (!$conn){
    die();
}