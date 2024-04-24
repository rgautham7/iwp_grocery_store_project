<?php
include("db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-image: url('css/product.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
            color: #333; /* Set text color to black for better contrast */
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Set text color to black for better contrast */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td a {
            text-decoration: none;
            color: #337ab7;
            transition: color 0.3s ease; /* Smooth transition for link color */
        }

        td a:hover {
            color: #23527c; /* Darker blue color on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Product List</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $sel = "SELECT * FROM `product` ";
            $qrydisplay = mysqli_query($db, $sel);
            while ($row = mysqli_fetch_array($qrydisplay)) {
                $product_id = $row['product_id'];
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $exp_date = $row['exp_date'];

                echo "<tr>
                        <td>$product_id</td>
                        <td>$name</td>
                        <td>$description</td>
                        <td>$price</td>
                        <td>$exp_date</td>
                        <td><a href='editproduct.php?edit=$product_id'>Edit</a></td>
                        <td><a href='deleteproduct.php?deleteproduct_id=$product_id'>Delete</a></td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
