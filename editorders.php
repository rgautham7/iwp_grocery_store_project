<?php
include("db.php");

$getorder_id = $_GET['edit'];

$seledittwo = "SELECT * FROM `orders` WHERE `order_id` = '$getorder_id'";
$qry = mysqli_query($db, $seledittwo);
$selassoc = mysqli_fetch_assoc($qry);

$order_id = $selassoc['order_id'];
$customer_id = $selassoc['customer_id'];
$product_id = $selassoc['product_id'];
$quantity = $selassoc['quantity'];
$Price = $selassoc['Price'];
$date = $selassoc['date'];

if(isset($_POST['updateedit'])) {
    $order_id =  $_POST['order_id'];
    $customer_id =  $_POST['customer_id'];
    $product_id =  $_POST['product_id'];
    $quantity =  $_POST['quantity'];
    $Price =  $_POST['Price'];
    $date =  $_POST['date'];

    $seleditt = "UPDATE `orders` SET `customer_id`='$customer_id',`product_id`='$product_id',`quantity`='$quantity', `Price`='$Price', `date`='$date' WHERE `order_id` = '$order_id'";
    $qry = mysqli_query($db, $seleditt);

    if($qry) {
        header("location: displayorders.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('css/order.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="order_id">Order ID:</label>
        <input type="text" name="order_id" id="order_id" value="<?php echo $order_id; ?>"><br>
        
        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>"><br>
        
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id" value="<?php echo $product_id; ?>"><br>
        
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>"><br>
        
        <label for="Price">Price:</label>
        <input type="text" name="Price" id="Price" value="<?php echo $Price; ?>"><br>
        
        <label for="date">Date:</label>
        <input type="text" name="date" id="date" value="<?php echo $date; ?>"><br>
        
        <input type="submit" name="updateedit" value="Update">
    </form>
</body>
</html>
