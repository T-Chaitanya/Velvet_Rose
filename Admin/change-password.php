<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if old password, new password, and confirm password are set
    if (isset($_POST['opass']) && isset($_POST['npass']) && isset($_POST['cpass'])) {
        // Sanitize user input to prevent SQL injection
        $old_password = $_POST['opass'];
        $new_password = $_POST['npass'];
        $confirm_password = $_POST['cpass'];

        // Check if new password matches confirm password
        if ($new_password !== $confirm_password) {
            // Passwords don't match, display error
            echo "<script>alert('Password and Confirm Password do not match');</script>";
        } else {
            // Include database connection
            require_once('db.php');

            // Retrieve old password from the database
            $username = $_SESSION['username'];
            $sql = "SELECT password FROM admin WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify old password
            if ($row && password_verify($old_password, $row['password'])) {
                // Old password is correct, update password in the database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE admin SET password = :password WHERE username = :username";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bindParam(':password', $hashed_password);
                $update_stmt->bindParam(':username', $username);
                if ($update_stmt->execute()) {
                    // Password updated successfully
                    echo "<script>alert('Password changed successfully');</script>";
                } else {
                    // Error updating password
                    echo "<script>alert('Error changing password');</script>";
                }
            } else {
                // Old password is incorrect, display error
                echo "<script>alert('Incorrect old password');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Management System</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
</head>

<body class="withvernav">
    <form action="adminhome.php" method="post" name="logout">
        <input name="opr" value="logout" type="hidden" />
    </form>
    <div class="bodywrapper">
        <div class="topheader">
            <div class="left">
                <h1 class="logo">Hotel Velvet Rose Management<span> System</span></h1>
                <span class="slogan">Site admin</span>

                <br clear="all" />

            </div><!--left-->

            <div class="right">
                <div class="userinfo">
                    <img src="images/icons/admin.jpg" height="25" alt="" />
                    <span class="slogan">
                        <?php
                        // Check if the session variable is set
                        if (isset($_SESSION['username'])) {
                            echo "Welcome, " . $_SESSION['username']; // Display the username
                        } else {
                            echo "Site admin"; // Default text if the username is not set
                        }
                        ?>
                    </span>
                </div><!--userinfo-->

                <div class="userinfodrop">
                    <div class="avatar"><a href="#">
                            <img src="images/admin.jpg" height="95" alt="" />

                        </a>

                    </div>
                    <div class="userdata">
                        <h4>Administrator</h4>
                        <span class="email">apnigang@gmail.com</span>
                        <ul>
                            <li><a href="editprofile.php">Edit Profile</a></li>
                            <li><a href="change-password.php">Change Password</a></li>
                            <li><a href="javascript:void(0)" onclick="document.logout.submit();">Sign Out</a></li>
                        </ul>
                    </div><!--userdata-->
                </div><!--userinfodrop-->
            </div><!--right-->
        </div><!--topheader-->

        <div class="header">
            <ul class="headermenu">
                <li class="current"><a href="dashboard.php"><span class="icon icon-chart"></span>Admin</a></li>

            </ul>
            <div class="headerwidget">
                <div class="earnings">
                    <div class="one_half">

                    </div>
                    <div>
                        <h4>date</h4>
                        <h4><?php echo date('d/m/Y'); ?></h4>
                    </div>
                </div>
            </div>


        </div>

        <div class="vernav2 iconmenu">
            <ul>
                <li class="current"><a href="#rtype" class="gallery">Rooms</a>
                    <span class="arrow"></span>
                    <ul id="rtype">
                        <li><a href="roomtype.php">Room Types</a></li>
                        <li><a href="room.php">Rooms List</a></li>
                    </ul>
                </li>
                <li class="current"><a href="#rooms" class="gallery">Rates</a>
                    <span class="arrow"></span>
                    <ul id="rooms">
                        <li><a href="roomrate.php">Room Rates</a></li>
                        <li><a href="extracharge.php">Extra Charge</a></li>
                    </ul>
                </li>
                <li class="current"><a href="#tax" class="gallery">Settings</a>
                    <span class="arrow"></span>
                    <ul id="tax">
                        <li class="current"><a href="change-password.php">Edit Password</a></li>
                        <li><a href="users.php">Admin Users list</a></li>
                        <li><a href="javascript:void(0)" onclick="document.logout.submit();">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
            <a class="togglemenu"></a>
            <br /><br />
        </div>

        <div class="centercontent">

            <div class="pageheader">
                <h1 class="pagetitle">Change Admin Password</h1>
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper">

                <div id="basicform" class="subcontent">


                    <form class="stdform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return val()">

                        <p>
                            <label>Username</label>
                            <span class="field">
                                <input type="username" name="username" id="username" class="smallinput" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly />
                            </span>
                        </p>

                        <p>
                            <label>Old Password</label>
                            <span class="field"><input type="password" name="opass" id="opass" class="smallinput" /></span>
                        </p>
                        <p>
                            <label>New Password</label>
                            <span class="field"><input type="password" name="npass" id="npass" class="smallinput" /></span>
                        </p>
                        <p>
                            <label>Confirm New Password</label>
                            <span class="field"><input type="password" name="cpass" id="cpass" class="smallinput" /></span>
                        </p>

                        <p class="stdformbutton">
                            <button class="submit radius2" type="submit">Change Password</button>
                            <input type="hidden" value="changepassword" name="admin" />
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>


                    </form>

                    <br />

                </div>

            </div><!--contentwrapper-->

        </div><!-- centercontent -->


    </div><!--bodywrapper-->

</body>

</html>
