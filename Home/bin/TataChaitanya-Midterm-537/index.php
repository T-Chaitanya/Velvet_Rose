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
    <div class="container mt-5">
        <form action="login.php" method="POST">
            <h1>Tata Chaitanya Stock Info</h1>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">User Name:</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
            <?php
                if(isset($_GET["logout"])){
                    echo "You have been successfully logged out.";
                    echo "<br><br>";
                }
                else if(isset($_GET["error"])){
                    echo "Wrong Password";
                    echo "<br><br>";
                }
            ?>
        </form>
        <form action="register.php">
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-success">Register new account</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>