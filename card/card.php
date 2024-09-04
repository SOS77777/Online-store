<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Card</title>
        <style>
            h3 {
                font-family: "Cairo", sans-serif;
                font-weight: bold;
            }

            main {
                width: 40%;
                margin-top: 30px;
            }

            table {
                box-shadow: 1px 1px 10px silver;
            }

            thead {
                background-color: #3498DB;
                color: white;
                text-align: center;
            }

            tbody {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <center>
            <h3>
                Your reserved products
            </h3>
        </center>
        <?php
        include_once '../config.php';
        $selectQuery = "SELECT * FROM addcard";
        $res = mysqli_query($connection, $selectQuery);
        while ($row = mysqli_fetch_array($res)) {
            echo "<center>
        <main>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Product name</th>
                        <th scope='col'>product price</th>
                        <th scope='col'>Delete product</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td><a href='del_card.php?id=$row[id]' class='btn btn-danger'>delete</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </center>";
        } ?>
        <center>
            <a href="shop.php">return to shop</a>
        </center>
    </body>

    </html>

<?php } ?>