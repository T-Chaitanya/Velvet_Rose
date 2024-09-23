<?php
session_start();

// Check if the error parameter is set in the URL
if (isset($_GET['error'])) {
    // Get the error code from the URL
    $errorCode = $_GET['error'];

    // Define error messages based on error codes
    $errorMessages = [
        'user_not_found' => 'User not found.Please correct the username and try again.',
        'password_incorrect' => 'Incorrect password.Please correct the password and try again.',
        // Add more error messages as needed
    ];

    // Check if the error code exists in the error messages array
    if (array_key_exists($errorCode, $errorMessages)) {
        // Display the corresponding error message
        $errorMessage = $errorMessages[$errorCode];
    } else {
        // Default error message if the error code is not recognized
        $errorMessage = 'An error occurred.';
    }
} else {
    // Default error message if no error parameter is set
    $errorMessage = '';
}

// Retrieve the username from the URL parameter if available
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login Page | Admin </title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Function to validate the login form
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var errorMessage = document.getElementById("error_message");

            // Check if username or password is empty
            if (username.trim() === "") {
                //alert("Please enter valid username.");
                //return false; // Prevent form submission
                errorMessage.textContent = "Please enter valid username.";
                errorMessage.style.display = "block";
                return false; // Prevent form submission
            }

            if (password.trim() === "") {
                //alert("Please enter valid password.");
                //return false; // Prevent form submission
                errorMessage.textContent = "Please enter valid password.";
                errorMessage.style.display = "block";
                return false; // Prevent form submission
            }
            // Clear error message and hide it if validation passes
            errorMessage.textContent = "";
            errorMessage.style.display = "none";
            return true; // Allow form submission if validation passes
        }
    </script>
</head>

<body class="loginpage">
    <div class="loginbox">
        <div class="loginboxinner">
            <div class="logo">
                <img src="images/logo3.jpg" alt="Hotel Velvet Rose" width="300" height="130">
            </div><!--logo-->

            <br clear="all" /><br />

                <!-- Display error message if set -->
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error" style="color: white;font-size: 14px;"><?php echo $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); // Clear the error message 
                    ?>
                <?php endif; ?>

            <form id="login" method="post" action="login.php" onsubmit="return validateForm();">
                <div class="username">
                    <div class="usernameinner">
                        <input type="text" name="username" id="username" placeholder="Username"  value="<?php echo $username; ?>"/>
                    </div>
                </div>

                <div class="password">
                    <div class="passwordinner">
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                </div>


                <div>
                <button type="submit">Sign In</button>
                <input type="hidden" name="opr" value="login" />
                <!--<div class="keep"><input type="checkbox" /> Keep me logged in</div> -->
                </div>
            </form>
        </div><!--loginboxinner-->
    </div><!--loginbox-->

</body>

</html>