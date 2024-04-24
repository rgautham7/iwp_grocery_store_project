<?php
include("db.php");

if (isset($_POST['grocery2'])) {
    $supplier_id = $_POST['supplier_id'];
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['address'];

    if (!empty($supplier_id) && !empty($product_id) && !empty($name) && !empty($date) && !empty($quantity) && !empty($phoneNo) && !empty($address)) {
        $sql = "INSERT INTO `supplier` (`supplier_id`, `product_id`, `name`, `date`, `quantity`, `phoneNo`, `address`)
                VALUES ('$supplier_id', '$product_id', '$name', '$date', '$quantity', '$phoneNo', '$address')";

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
    <title>Supplier Form</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-image: url('css/supplier.jpg');
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

        form {
            display: grid;
            gap: 10px;
        }

        label {
            display: grid;
            grid-template-columns: 120px 1fr;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #23527c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Supplier Form</h2>
        <form action="" method="POST">
            <label>
                Supplier ID:
                <input type="text" name="supplier_id">
            </label>

            <label>
                Product ID:
                <input type="text" name="product_id">
            </label>

            <label>
                Name:
                <input type="text" name="name">
            </label>

            <label>
                Date:
                <input type="text" name="date">
            </label>

            <label>
                Quantity:
                <input type="text" name="quantity">
            </label>

            <label>
                Phone No:
                <input type="text" name="phoneNo">
            </label>

            <label>
                Address:
                <input type="text" name="address">
            </label>

            <input type="submit" name="grocery2" value="INSERT">
        </form>
    </div>
</body>
