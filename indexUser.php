<?php 
include("db.php");
?>

<!DOCTYPE html>
<html>
   <head>
   	<title>
   		Grocerystore.com
   	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Lugrasimo&family=Righteous&display=swap" rel="stylesheet">
   	<link rel="stylesheet" href="user_css/style.css"/>
   	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,700i" rel="stylesheet">
	<style>
		.logout-btn {
		    background-color: #dc2626; 
		    color: #fff; 
		    border-radius: 0.375rem;
		    padding: 0.75rem 1.5rem; 
		    transition: transform 0.3s, box-shadow 0.3s;
		}

		.logout-btn:hover {
		    background-color: #c53030;
		    transform: scale(1.05);
		    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
		}
		.chatbot-btn {
			position: fixed;
			bottom: 75px;
			right: 20px;
			background-color: #007bff; 
			color: #fff;
			border: none;
			border-radius: 50%;
			padding: 15px;
			font-size: 16px;
			cursor: pointer;
			z-index: 999;
			transition: background-color 0.3s;
		}

		.chatbot-btn:hover {
			background-color: #0056b3;
		}

		.overlay-text h2{
			font-family: 'Righteous', 'sans-serif';
			background: linear-gradient(to right, #FFA732 0%, #D20062 50%, #A7D129 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
		}
   	</style>
   </head>
   <body>
	
	   <nav>
		<ul>
            <li><a href="insertorders.php">Insert Orders</a></li>
            <li><a href="displayorders.php">View Orders</a></li>
            <li><a href="insertproduct.php">Insert Products</a></li>
            <li><a href="displayproduct.php">View Products</a></li>
			
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
	   <button id="chatbot-btn" class="chatbot-btn" >Chat with us</button>
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
