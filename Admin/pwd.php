<?php
$password = 'admin@123'; // Replace 'admin' with the actual password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;


?>
