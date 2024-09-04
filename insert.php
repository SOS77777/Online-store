<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: register/login.php");
}

include_once 'config.php';

if (isset($_POST['upload'])) {

    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productImageOnTemp = $_FILES['image']['tmp_name'];
    $productImageOnServer = "productImage/" . modifyImageName($_FILES['image']['name']);

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];

        $selectQuery = "SELECT image FROM product WHERE id=$id";
        $result = mysqli_query($connection, $selectQuery);
        $product = mysqli_fetch_assoc($result);
        $currentImage = $product['image'];

        if (!empty($productImageOnTemp)) {
            if (file_exists($currentImage)) {
                unlink($currentImage);
            }
            move_uploaded_file($productImageOnTemp, $productImageOnServer);
            $updateQuery = "UPDATE product SET name='$productName', price='$productPrice', image='$productImageOnServer' WHERE id=$id";
        } else {
            $updateQuery = "UPDATE product SET name='$productName', price='$productPrice' WHERE id=$id";
        }

        mysqli_query($connection, $updateQuery);
        header('location: products.php');
    } else {
        $insertQuery = "INSERT INTO product(name, price, image) VALUES ('$productName','$productPrice','$productImageOnServer')";
        mysqli_query($connection, $insertQuery);
        move_uploaded_file($productImageOnTemp, $productImageOnServer);
        header('location: products.php');
    }
}

function modifyImageName($imageName)
{
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $new_file_name = time() + rand(1, 1100101) . '.' . $extension;
        return $new_file_name;
    }
}
