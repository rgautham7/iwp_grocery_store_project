<?php
include("connect.php");

$error_message = '';
$success_message = '';

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
    } else {
        $check_query = "SELECT * FROM clerks WHERE username='$email'";
        $check_result = mysqli_query($conn, $check_query);

        if(mysqli_num_rows($check_result) > 0){
            $verification_code = rand(100000, 999999);

            $update_query = "UPDATE clerks SET username='$email' WHERE username='$email'";
            if(mysqli_query($conn, $update_query)){
                $success_message = "Verification code has been sent to your email address";
            } else {
                $error_message = "Failed to send verification code. Please try again later.";
            }
            
            $success_message = "Verification code has been sent to your email address";
        } else {
            $error_message = "Email not found. Please enter a registered email address.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Online grocery shopping</title>
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
        .forgot-password-btn {
            background-color: #10B981;
            color: #fff; 
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .forgot-password-btn:hover {
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
                        Forgot Your Password?
                    </h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <button type="submit" name="submit" class="w-full forgot-password-btn focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 flex items-center justify-center transition duration-300 ease-in-out">
                            Send Verification Code
                        </button>
                        <?php if(isset($error_message)): ?>
                            <p class="text-red-500"><?php echo $error_message; ?></p>
                        <?php elseif(isset($success_message)): ?>
                            <p class="text-green-500"><?php echo $success_message; ?></p>
                        <?php endif; ?>
                    </form>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Remembered your password? <a href="./login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
