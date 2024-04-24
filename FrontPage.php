<?php
include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Grocery Shopping</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Lugrasimo&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="pics/logoo.png" style="border-radius: 50%;">
    <style>
        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 1; /* Set opacity to 1 to remove the overlay */
        }
        .button {
            background-color: #10B981;
            color: #fff; 
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .button:hover {
            background-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content {
            max-width: 800px;
        }
        .title {
            font-family: 'Righteous', 'sans-serif';
            font-size: 3.5rem;
            line-height: 1.2;
            color: #fff;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, #FFA732 0%, #D20062 50%, #A7D129 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; /* Safari */
            background-clip: text;
            text-fill-color: transparent;
        }
        .subtitle {
            font-family: 'Lobster Two';
            font-size: 2rem;
            line-height: 1.6;
            color: #fff;
            margin-bottom: 2rem;
        }
        .abril-font{
            font-family: 'Abril Fatface';
        }
    </style>
</head>
<body>
    <section class="relative">
        <video id="bg-video" autoplay muted loop>
            <source src="css/g2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="relative z-10 flex flex-col items-center justify-center h-screen px-6 py-8 mx-auto text-center">
            <div class="content">
                <h1 class="title">Welcome to FRESH HARBOR</h1>
                <p class="subtitle">Explore our wide range of products and enjoy hassle-free shopping from the comfort of your home.</p>
                <a href="login.php" class="inline-block px-8 py-4 text-lg font-medium rounded-lg button abril-font">Start Shopping</a>
            </div>
        </div>
    </section>
</body>
</html>
