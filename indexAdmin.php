<?php 
include("db.php");
?>
<!DOCTYPE html>
<html>
   <head>
   		<title>Grocerystore.com</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Lugrasimo&family=Righteous&display=swap" rel="stylesheet">	
		<link rel="stylesheet" href="user_css/style.css"/>
		<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,700i" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

		<style>
			/* Style for the logout button */
			.logout-btn {
				background-color: #dc2626; /* Red color */
				color: #fff; /* White text color */
				border-radius: 0.375rem; /* Rounded corners */
				padding: 0.75rem 1.5rem; /* Padding */
				transition: transform 0.3s, box-shadow 0.3s; /* Transition effect for hover */
			}

			.logout-btn:hover {
				background-color: #c53030; /* Darker red color on hover */
				transform: scale(1.05); /* Scale effect on hover */
				box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Box shadow on hover */
			}

			.overlay-text h2{
				font-size: 4rem;
				font-family: 'Righteous', 'sans-serif';
				background: linear-gradient(to right, #E3651D 0%, #A0153E 50%, #FF204E 100%);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent; /* Safari */
				background-clip: text;
				text-fill-color: transparent;
			}
			
			/* Style for the chatbot button */
			.chatbot-btn {
				position: fixed;
				bottom: 75px;
				right: 20px;
				background-color: #007bff; /* Blue color */
				color: #fff; /* White text color */
				border: none;
				border-radius: 50%;
				padding: 15px;
				font-size: 16px;
				cursor: pointer;
				z-index: 999; /* Ensure it's above other elements */
				transition: background-color 0.3s;
				font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
			}

			.chatbot-btn:hover {
				background-color: #0056b3; /* Darker blue color on hover */
			}

		</style>
   </head>

   <body>
		<nav>
			<ul>
				<li><a href="Customer.php">Insert Customer</a></li>
				<li><a href="display.php">Update Customers</a></li>
				<li><a href="insertorders.php">Insert Orders</a></li>
				<li><a href="displayorders.php">Update Orders</a></li>
				<li><a href="insertproduct.php">Insert Products</a></li>
				<li><a href="displayproduct.php">Display Products</a></li>
				<li><span class="centered-link"><a href="insertsuppliers.php">Insert Suppliers</a></span></li>
				<li><span class="centered-link"><a href="displaysuppliers.php">Update Suppliers</a></span></li>
				<li><a href="FrontPage.php" class="logout-btn">Logout</a></li> 
			</ul>
		</nav>
	
		<div class="introduction">
			<video autoplay loop muted plays-inline class="back_video">
				<source src = "vid5.mp4" type = "video/mp4">
			</video>
			<div class="overlay-text">
				<h2>Welcome To Fresh Harbor</h2>
			</div>
		</div>
	   <button id="chatbot-btn" class="chatbot-btn">Chat</button>

		<footer class="footer">
			<p>&copy; Fresh Harbor 2024. All rights reserved.</p>
		</footer>
		<script>
			document.getElementById('chatbot-btn').addEventListener('click', function() {
				window.location.href = 'chatbot.html';
			});
		</script>
   </body>
</html>
