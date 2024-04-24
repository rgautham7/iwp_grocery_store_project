<?php
include("db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Supplier Orders</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('css/supplier.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child,
        td:first-child {
            border-left: none;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        tr:last-child td {
            border-bottom: none;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Supplier Orders</h2>
    <table>
        <tr>
            <th>Supplier ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $sel = "SELECT * FROM `supplier` ";
        $qrydisplay = mysqli_query($db, $sel);

        while ($row = mysqli_fetch_array($qrydisplay)) {
            $supplier_id = $row['supplier_id'];
            $product_id = $row['product_id'];
            $name = $row['name'];
            $date = $row['date'];
            $quantity = $row['quantity'];
            $phoneNo = $row['phoneNo'];
            $address = $row['address'];

            echo "<tr>
                <td>$supplier_id</td>
                <td>$product_id</td>
                <td>$name</td>
                <td>$date</td>
                <td>$quantity</td>
                <td>$phoneNo</td>
                <td>$address</td>
                <td><a href='editsupplier.php?edit=$supplier_id'>Edit</a></td>
                <td><a href='deletesupplier.php?deletesupplier_id=$supplier_id'>Delete</a></td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>
