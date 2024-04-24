<?php 
include("db.php");

$userType = '';

if(isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];
}

?>

<!DOCTYPE html>
<html>
   <head>
   	<title>
   		Grocerystore.com
   	</title>
   	<link rel="stylesheet" href="user_css/style.css"/>
   	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,700i" rel="stylesheet">
   </head>
   <body>
	
    <nav>
        <ul>
            <?php if($userType === 'admin'): ?>
            <li><a href="Customer.php">Insert Customer</a></li>
            <li><a href="display.php">Update Customers</a></li>
            <li><a href="insertorders.php">Insert Orders</a></li>
            <li><a href="displayorders.php">Update Orders</a></li>
            <li><a href="insertproduct.php">Insert Products</a></li>
            <li><a href="displayproduct.php">Display Products</a></li>
            <li><span class="centered-link"><a href="insertsuppliers.php">Insert Suppliers</a></span></li>
            <li><span class="centered-link"><a href="displaysuppliers.php">Update Suppliers</a></span></li>
            <?php else: ?>
            <li><a href="insertorders.php">Insert Orders</a></li>
            <li><a href="displayorders.php">View Orders</a></li>
            <li><a href="insertproduct.php">Insert Products</a></li>
            <li><a href="displayproduct.php">View Products</a></li>
            <?php endif; ?>
        </ul>
    </nav>
	
   	<div class="introduction">
		
		<video autoplay loop muted plays-inline class="back_video">
			<source src="vid5.mp4" type="video/mp4">
		</video>
		<div class="overlay-text">
			<h2>Welcome To Fresh Harbor</h2>
		</div>
   	</div>
   	<footer class="footer">
		<p>&copy; Fresh Harbor 2024. All rights reserved.</p>
   	</footer>
   </body>
</html>
