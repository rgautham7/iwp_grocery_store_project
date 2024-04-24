<?php
// Include database connection
include("db.php");

// Retrieve customer ID from GET parameter
$getcustomer_id = $_GET['edit'];

// Fetch customer details from the database
$seledittwo = "SELECT * FROM `customer` WHERE `customer_id` = '$getcustomer_id'";
$qry = mysqli_query($db, $seledittwo);
$selassoc = mysqli_fetch_assoc($qry);

// Extract customer details
$customer_id = $selassoc['customer_id'];
$Name = $selassoc['Name'];
$phoneNo = $selassoc['phoneNo'];
$address = $selassoc['address'];

// Update customer details if form is submitted
if (isset($_POST['updateedit'])) {
    // Retrieve updated values from POST
    $customer_id = $_POST['customer_id'];
    $Name = $_POST['Name'];
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['address'];

    // Update customer details in the database
    $seleditt = "UPDATE `customer` SET `Name`='$Name', `phoneNo`='$phoneNo', `address`='$address' WHERE `customer_id` = '$customer_id'";
    $qry = mysqli_query($db, $seleditt);

    // Redirect to display page after update
    if ($qry) {
        header("location: display.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Customer</h1>
        <form method="POST" action="">
            <!-- Input fields for customer details with labels -->
            <label for="customer_id">Customer ID:</label>
            <input type="text" name="customer_id" value="<?php echo $customer_id; ?>" readonly><br>

            <label for="Name">Name:</label>
            <input type="text" name="Name" value="<?php echo $Name; ?>"><br>

            <label for="phoneNo">Phone Number:</label>
            <input type="text" name="phoneNo" value="<?php echo $phoneNo; ?>"><br>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>"><br>

            <input type="submit" name="updateedit" value="Update">
        </form>
    </div>
</body>
</html>
