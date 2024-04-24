<?php 
include("db.php");

if (isset($_POST['grocery2'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $exp_date = $_POST['exp_date'];

    if (!empty($product_id) && !empty($name) && !empty($description) && !empty($price) && !empty($exp_date)) {
        $sql = "INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `exp_date`)
                VALUES ('$product_id', '$name', '$description', '$price', '$exp_date')";

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
    <title>Product Details</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-image: url('css/product.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
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
            width: 100%;
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
        <h2>Product Details</h2>
        <form action="" method="POST">
            <label>Product ID:</label>
            <input type="text" name="product_id">

            <label>Product Name:</label>
            <input type="text" name="name">

            <label>Description:</label>
            <input type="text" name="description">

            <label>Price:</label>
            <input type="text" name="price">

            <label>Expiry Date:</label>
            <input type="text" name="exp_date">

            <input type="submit" name="grocery2" value="INSERT">
        </form>
    </div>
</body>
</html>
