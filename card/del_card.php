<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include_once '../config.php';
$selectQuery = "DELETE FROM addcard WHERE id=$_GET[id]";
$res = mysqli_query($connection, $selectQuery);
header('location: card.php');
