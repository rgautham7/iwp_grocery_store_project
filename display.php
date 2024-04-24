<?php
include("db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer List</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Lugrasimo&family=Righteous&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('css/customer.jpg');
            background-size: cover;
            background-position: center;
            color: #333; /* Set text color to black */
        }

        h2 {
            font-family: 'Righteous', 'sans-serif';
            font-size: 2rem;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            margin: 5px 5px 5px 5px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff; /* Set link color to blue */
        }

        a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
    </style>
</head>

<body>
    <h2>Customer List</h2>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $sel = "SELECT * FROM `customer` ";
        $qrydisplay = mysqli_query($db, $sel);

        while ($row = mysqli_fetch_array($qrydisplay)) {
            $customer_id = $row['customer_id'];
            $Name = $row['Name'];
            $phoneNo = $row['phoneNo'];
            $address = $row['address'];

            echo "<tr>
                <td>$customer_id</td>
                <td>$Name</td>
                <td>$phoneNo</td>
                <td>$address</td>
                <td><a href='edit.php?edit=$customer_id'>Edit</a></td>
                <td><a href='delete.php?deletecustomer_id=$customer_id'>Delete</a></td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>
