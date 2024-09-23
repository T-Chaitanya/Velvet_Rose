<?php
session_start();

require_once('db.php'); // Assuming you have a separate file for database connection



// Check if the username and password are set
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    // Redirect back to login page with an error message
    header("Location: adminhome.php?error=missing_credentials");
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];
//var_dump($username, $password);

// Check if the username is empty
if (empty($username)) {
    // Username is empty, set error message and redirect back to login page
    $_SESSION['error'] = 'Please enter username.';
    header("Location: adminhome.php?error=empty_username");
    exit();
}

// Check if the password is empty
if (empty($password)) {
    // Password is empty, set error message and redirect back to login page
    $_SESSION['error'] = 'Please enter password.';
    //header("Location: adminhome.php?error=empty_password");
    header("Location: adminhome.php?error=user_not_found&username=" . urlencode($username));
    exit();
}

// Fetch user data from database based on username
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Debug: Print the result of the SQL query
//var_dump($user);

// After executing the SQL query, check if $user exists
if (!$user) {
    // User not found, redirect back to login page with an error message
    $_SESSION['error'] = 'Username not found.Please try again.';
    header("Location: adminhome.php?error=user_not_found");
    exit();
}

// Check if the password is correct
if (!password_verify($password, $user['password'])) {
    // Password incorrect, redirect back to login page with an error message
    $_SESSION['error'] = 'Incorrect password. Please try again.';
    //header("Location: adminhome.php?error=password_incorrect");
    header("Location: adminhome.php?error=password_incorrect&username=" . urlencode($username));
    exit();
}



if ($user && password_verify($password, $user['password'])) {
    // Set session variable to indicate user is logged in
    $_SESSION['username'] = $username;
    // Redirect user to the next page on successful login
    header("Location: dashboard.php");
} else {
    // Redirect user back to login page with error message
    //header("Location: index.html?error=1");
    header("Location: adminhome.php?error=1");
}
?>
