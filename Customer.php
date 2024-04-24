<?php 
include("db.php");

if (isset($_POST['grocery2'])) {
    $customer_id = $_POST['customer_id'];
    $Name = $_POST['Name'];
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['address'];

    if (!empty($customer_id) && !empty($Name) && !empty($phoneNo) && !empty($address)) {
        $sql = "INSERT INTO `customer` (`customer_id`, `Name`, `phoneNo`, `address`)
                VALUES ('$customer_id', '$Name', '$phoneNo', '$address')";

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
    <title>Customer Details</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('css/customer.jpg'); /* Set background image */
            background-size: cover; /* Cover the entire background */
            background-repeat: no-repeat; /* Do not repeat the background image */
            background-position: center; /* Center the background image */
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Add opacity to the background color */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        form input[type="text"] {
            width: calc(100% - 22px);
            padding: 8px;
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
        <h2>Customer Details</h2>
        <form action="" method="POST">
            <label for="customer_id">ID:</label>
            <input type="text" name="customer_id" id="customer_id">

            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name">

            <label for="phoneNo">Phone No:</label>
            <input type="text" name="phoneNo" id="phoneNo">

            <label for="address">Address:</label>
            <input type="text" name="address" id="address">

            <input type="submit" name="grocery2" value="INSERT">
        </form>
    </div>
</body>
</html>
