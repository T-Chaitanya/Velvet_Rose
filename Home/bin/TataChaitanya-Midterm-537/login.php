<?php
//echo password_hash("s3sam3",PASSWORD_DEFAULT);
$servername = "localhost";
$username = "msu_user";
$password = "pa55word";
$dbname = "midterm_exam_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email_id = $_POST["email"];
$sql = "SELECT emailAddress, password FROM administrators WHERE emailAddress='".$email_id."'";

$result = $conn->query($sql);
$valid_password = 0;
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $u_password = $row["password"];
  $pass = $_POST["password"];
  $valid_password = password_verify($pass,$u_password);
  print_r ($valid_password);
  if ($valid_password){
      header('Location: table.php');
      exit();
      }
  else{
      header('Location: index.php?error=1');
      exit();
  }
}
else {
    header('Location: index.php?error=1');
    exit();
}
$conn->close();
?>
