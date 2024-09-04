<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: register/login.php");
  exit();
}

include_once 'config.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $selectQuery = "SELECT image FROM product WHERE id=$id";
  $imageFileOnServer = mysqli_query($connection, $selectQuery);

  $row = mysqli_fetch_assoc($imageFileOnServer) ?? ["test"];
  $imagePath = implode('', $row);

  if (file_exists($imagePath)) {
    unlink($imagePath);
  }

  $delQuery = "DELETE FROM product WHERE id=$id";
  mysqli_query($connection, $delQuery);

  header("refresh:3;url=products.php");
  echo "<div style='text-align: center; margin-top: 50px;'>
    <h2 style='color: green;'>تم الحذف بنجاح!</h2>
    <p>ستتم إعادتك إلى صفحة المنتجات خلال 3 ثوانٍ...</p>
  </div>";
  exit();
}
