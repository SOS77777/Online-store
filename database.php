<?php

$hostName = "db";
$dbUser = "root";
$dbPassword = "password";
$dbName = "online_shop";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
