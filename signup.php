<?php
include("connect.php");

$error_message = ''; // Initialize error message variable

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize user input to prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if the email is already registered
    $check_query = "SELECT * FROM clerks WHERE username='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0){
        // Set error message if email is already registered
        $error_message = "Email already registered";
    } else {
        // Insert new user into database
        $insert_query = "INSERT INTO clerks (name,username, password) VALUES ('user','$email', '$password')";
        if(mysqli_query($conn, $insert_query)){
            // Redirect to login page after successful signup
            header("Location: ./login.php");
            exit();
        } else {
            // Set error message if signup fails
            $error_message = "Signup failed. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online grocery shopping - Sign Up</title>
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
            opacity: 0.6;
        }
        .sign-up-btn {
            background-color: #10B981;
            color: #fff; 
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .sign-up-btn:hover {
            background-color: rgba(16, 185, 129, 0.9);
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
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen text-center relative z-10">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 transition duration-300 ease-in-out hover:shadow-lg">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <button type="submit" name="submit" class="w-full sign-up-btn focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center transition duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            Sign up
                        </button>
                        <?php if(isset($error_message)): ?>
                            <p class="text-red-500"><?php echo $error_message; ?></p>
                        <?php endif; ?>
                    </form>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
