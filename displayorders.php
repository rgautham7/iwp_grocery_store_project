<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url('css/order.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        .delete-link {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order List</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sel = "SELECT * FROM `orders` ";
                $qrydisplay = mysqli_query($db, $sel);

                while ($row = mysqli_fetch_array($qrydisplay)) {
                    $order_id = $row['order_id'];
                    $customer_id = $row['customer_id'];
                    $product_id = $row['product_id'];
                    $quantity = $row['quantity'];
                    $price = $row['Price'];
                    $date = $row['date'];

                    echo "<tr>
                            <td>$order_id</td>
                            <td>$customer_id</td>
                            <td>$product_id</td>
                            <td>$quantity</td>
                            <td>$price</td>
                            <td>$date</td>
                            <td><a class='edit-link' href='editorders.php?edit=$order_id'>Edit</a></td>
                            <td><a class='delete-link' href='deleteorders.php?deleteorder_id=$order_id'>Delete</a></td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
