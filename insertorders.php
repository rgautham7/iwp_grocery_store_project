<?php 
include("db.php");

if (isset($_POST['grocery2'])) {
    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $Price = $_POST['Price'];
    $date = $_POST['date'];

    if (!empty($order_id) && !empty($customer_id) && !empty($product_id) && !empty($quantity) && !empty($Price) && !empty($date)) {
        $sql = "INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `quantity`, `Price`, `date`)
                VALUES ('$order_id', '$customer_id', '$product_id', '$quantity', '$Price', '$date')";

        $qry = mysqli_query($db, $sql);
        
        if ($qry) {
            echo "Inserted successfully";
        }
    } else {
        echo "All fields must be filled";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url('css/order.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7); 
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: calc(100% - 22px); 
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Details</h2>
        <form action="" method="POST">
            <label>Order ID:</label>
            <input type="text" name="order_id">

            <label>Customer ID:</label>
            <input type="text" name="customer_id">

            <label>Product ID:</label>
            <input type="text" name="product_id">

            <label>Quantity:</label>
            <input type="text" name="quantity">

            <label>Price:</label>
            <input type="text" name="Price">

            <label>Date:</label>
            <input type="text" name="date">

            <input type="submit" name="grocery2" value="INSERT">
        </form>
    </div>
</body>
</html>
