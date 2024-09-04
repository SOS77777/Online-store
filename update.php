<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: register/login.php");
}

include_once 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $selectQuery = "SELECT * FROM product WHERE id=$id";
    $result = mysqli_query($connection, $selectQuery);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found!";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <title>Update Product</title>
    <style>
        body {
            font-family: "Cairo", sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3>Update Product</h3>
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image">
                <img src="<?php echo $product['image']; ?>" alt="Current Image" style="width: 100px; height: 100px; margin-top: 10px;">
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>

</html>