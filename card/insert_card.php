<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include_once '../config.php';
if (isset($_POST['addToCard'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $insertQuery = "INSERT INTO `addcard`(`name`, `price`) VALUES ('$name','$price')";
    mysqli_query($connection, $insertQuery);
    header('location: card.php');
}
