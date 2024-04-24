<?php
include("db.php");

$getproduct_id = $_GET['edit'];

$seledittwo = "SELECT * FROM `product` WHERE `product_id` = '$getproduct_id'";
$qry = mysqli_query($db, $seledittwo);
$selassoc = mysqli_fetch_assoc($qry);

$product_id = $selassoc['product_id'];
$name = $selassoc['name'];
$description = $selassoc['description'];
$price = $selassoc['price'];
$exp_date = $selassoc['exp_date'];

if(isset($_POST['updateedit'])) {
    $product_id =  $_POST['product_id'];
    $name =  $_POST['name'];
    $description =  $_POST['description'];
    $price =  $_POST['price'];
    $exp_date =  $_POST['exp_date'];

    $seleditt = "UPDATE `product` SET `name`='$name',`description`='$description',`price`='$price', `exp_date`='$exp_date' WHERE `product_id` = '$product_id'";
    $qry = mysqli_query($db, $seleditt);

    if($qry) {
        header("location: displayproduct.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Update</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-image: url('css/product.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
            color: #fff; /* Set text color to white */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent black background */
            padding: 20px;
            border-radius: 5px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 3px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            color: #fff;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<form method="POST" action="">
    <label for="product_id">Product ID:</label>
    <input type="text" name="product_id" id="product_id" value="<?php echo $product_id; ?>" placeholder="Product ID"><br>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name"><br>

    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="<?php echo $description; ?>" placeholder="Description"><br>

    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="<?php echo $price; ?>" placeholder="Price"><br>

    <label for="exp_date">Expiry Date:</label>
    <input type="text" name="exp_date" id="exp_date" value="<?php echo $exp_date; ?>" placeholder="Expiry Date"><br>

    <input type="submit" name="updateedit" value="Update">
</form>

</body>
</html>
