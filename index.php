<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: register/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <title>Online_Shop</title>
</head>

<body>
  <center>
    <div class="main">
      <h2>Online_Shop</h2>
      <img src="image/logo.jpg" alt="loaded" width="450px">
      <form action="insert.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="ProductName" name="name">
        <br>
        <input type="text" placeholder="ProductPrice" name="price">
        <br>
        <input type="file" name="image" id="file" style="display:none">
        <label for="file">Choose Photo</label>
        <button name="upload"> Upload Prodect </button>
        <br>
        <a href="products.php">Show all Products</a>
      </form>
    </div>
    <p><b>Developer Sohiub<b></p>
  </center>
</body>

</html>