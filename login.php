<?php
include("connect.php");

$error_message = '';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM clerks WHERE username='$email' AND password='$password' AND name='admin'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        // Redirect to admin page if user is admin
        include("indexAdmin.php");
        exit();
    } 
    else {
        $query1 = "SELECT * FROM clerks WHERE username='$email' AND password='$password'";
        $result1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($result1) > 0){
            // Redirect to user page if user is not admin
            include("indexUser.php");
            exit();
        } 
        else {
            $error_message = "Invalid credentials";
        }
    }
}
else {
    $error_message = " ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online grocery shopping</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Lugrasimo&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="pics/logoo.png" style="border-radius: 50%;">
    <style>
        .h1-font{
            font-family: 'Abril Fatface';
        }
        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.6;
        }
        .sign-in-btn {
            background-color: #3b82f6;
            color: #fff; 
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .sign-in-btn:hover {
            background-color: rgba(59, 130, 246, 0.9);
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <section class="relative">
        <video id="bg-video" autoplay muted loop>
            <source src="pics/loginPageVideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="relative z-10 flex flex-col items-center justify-center h-screen px-6 py-8 mx-auto text-center">
            <div class="w-full transition duration-300 ease-in-out bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 hover:shadow-lg">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white h1-font">
                        Sign in to your account
                    </h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white h1-font">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white h1-font">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <!-- <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div> -->
                                <!-- <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div> -->
                            </div>
                            <a href="./forgot_password.php" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" name="submit" class="flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white transition duration-300 ease-in-out rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            Sign in
                        </button>
                        <?php if(isset($error_message)): ?>
                            <p class="text-red-500"><?php echo $error_message; ?></p>
                        <?php endif; ?>
                    </form>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don't have an account yet? <a href="./signup.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
