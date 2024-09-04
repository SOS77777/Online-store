<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include_once '../config.php';
$id = $_GET['id'];
$valQuery = "SELECT * FROM product where id=$id";
$res = mysqli_query($connection, $valQuery);
$data = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm your purchase</title>
    <style>
        input {
            display: none;
        }

        .main {
            width: 30%;
            padding: 30px;
            box-shadow: 1px 1px 10px silver;
            margin-top: 17%;
        }
    </style>
</head>

<body>
    <center>
        <div class="main">
            <h2>are you want buying this product</h2>
            <form action="insert_card.php" method="post">
                <input type="text" name="id" readonly value="<?php echo $data['id'] ?>">
                <input type="text" name="name" readonly value="<?php echo $data['name'] ?>">
                <input type="text" name="price" readonly value="<?php echo $data['price'] ?>">
                <button type="submit" name="addToCard" class="btn btn-warning">Confirm the adding</button>
                <br>
                <a href="shop.php">return to show products</a>
            </form>
        </div>
    </center>
</body>

</html>