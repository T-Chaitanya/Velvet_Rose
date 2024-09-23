<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$err=False;
$servername = "localhost";
$username = "msu_user";
$password = "pa55word";
$dbname = "midterm_exam_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['email'])){
    if (strlen($_POST["password"])<strlen($_POST["lastname"]) or (strlen($_POST["lastname"])==0) or (strlen($_POST["firstname"])==0)){
        $err = True;
    }
    else {
        $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $sql = "INSERT INTO administrators (`emailAddress`, `password`, `firstName`, `lastName`) VALUES ('" . $_POST["email"] . "','" . $pass . "','" . $_POST["firstname"] . "','" . $_POST["lastname"] . "')";
        $result = $conn->query($sql);
        header('Location: table.php');
        exit();
    }
}
$conn->close();
?>

<div class="container mt-5">
    <form action="register.php" method="POST">
        <h1>Tata Chaitanya Stock Search Membership Registration</h1>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Enter Email:</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Enter Password:</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Last Name:</label>
            <div class="col-sm-10">
                <input name="lastname" type="text" class="form-control" id="inputEmail" placeholder="Last Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">First Name:</label>
            <div class="col-sm-10">
                <input name="firstname" type="text" class="form-control" id="inputPassword" placeholder="First Name">
            </div>
        </div>
        <?php if($err){
            echo "Enter valid details.";
        }
        ?>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Create new account</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>