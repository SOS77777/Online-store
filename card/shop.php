<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        h3 {
            font-family: "Cairo", sans-serif;
            font-weight: bold;
        }

        .card {
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .card img {
            width: 100%;
            height: 170px;
        }

        main {
            width: 60%;

        }

        #aa {
            margin-left: 70px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>

    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a id="aa" class="navbar-brand" href="card.php">Mycard</a>
                <div class="d-flex">
                    <a class="nav-link text-white me-3" href="card.php">Orders</a>
                    <a class="nav-link text-white" href="../logout.php">Logout</a>
                </div>
            </div>
        </nav>

        <center>
            <h3>Available Products</h3>
        </center>

        <?php
        include_once '../config.php';
        $selectQuery = "SELECT * FROM product";
        $result = mysqli_query($connection, $selectQuery);
        while ($row = mysqli_fetch_array($result)) {
            echo "
        <center>
        <main>
        <div class='card' style='width: 18rem;'>
                <img src='../$row[image]' class='card-img-top' alt='image'>
                <div class='card-body'>
                <h5 class='card-title'>$row[name]</h5>
                <p class='card-text'>$row[price]</p>
                <a href='val.php?id=$row[id]' class='btn btn-success'>Add to cart</a>
         </div>
            </div>
         </main>
     </center>
     ";
        }
        ?>

    </body>

</html>