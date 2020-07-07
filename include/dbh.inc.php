<?php

$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'inspiration';

$conn = mysqli_connect( $servername, $dbUsername, $dbPassword, $dbName );

if  (!$conn) {
    die("connection fail: ".mysqli_connect_error());
}
