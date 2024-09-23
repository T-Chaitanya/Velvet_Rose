<?php
session_start();

require_once('db.php');

// Variable to store the success message
$success_message = "";
// Variable to store the error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (!empty($_POST['name']) && !empty($_POST['type'])) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO roomlist (room_no, room_type, create_date, status) VALUES (?, ?, CURDATE(), 'Available')");

        // Bind parameters
        $stmt->bind_param("is", $room_no, $room_type);

        // Set parameters
        $room_no = $_POST['name'];
        $room_type = $_POST['type'];


        try {
            // Execute the statement
            if ($stmt->execute()) {
                // Check if insertion was successful
                if ($stmt->affected_rows > 0) {
                    $success_message = "Saved Successfully!";
                } else {
                    $error_message = "Error: Unable to insert data.";
                }
            }
        } catch (mysqli_sql_exception $e) {
            // Check for duplicate entry error
            if ($e->getCode() == 1062) {
                $error_message = "Error: Duplicate entry for room number " . $_POST['name'];
            } else {
                $error_message = "Error: " . $e->getMessage();
            }
        }

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    } else {
        $error_message = "Please fill all required fields";
    }
}

// Function to display success message
function displaySuccessMessage()
{
    global $success_message;
    if (!empty($success_message)) {
        echo "<script>alert('$success_message');</script>";
    }
}

// Function to display error message
function displayErrorMessage()
{
    global $error_message;
    if (!empty($error_message)) {
        echo "<script>alert('$error_message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Management System</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>

    <!-- Move the displaySuccessMessage() function outside the script tags -->
    <script>
        function nmbonly(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode
            if (unicode != 8) {
                if (unicode != 9) {
                    if (unicode < 48 || unicode > 57)
                        return false
                }
            }
        }

        function nmbonly1(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode
            if (unicode != 8) {
                if (unicode != 9) {
                    if (unicode != 46) {
                        if (unicode < 48 || unicode > 57)
                            return false
                    }
                }
            }
        }
        // onkeypress="return nmbonly(event)"
    </script>
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
                        <li><a href="change-password.php">Edit Password</a></li>
                        <li><a href="users.php">Admin Users list</a></li>
                        <li><a href="javascript:void(0)" onclick="document.logout.submit();">Sign Out</a></li>
                    </ul>
                </li>



            </ul>


            <a class="togglemenu"></a>
            <br /><br />
        </div>

        <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/charCount.js"></script>
        <script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
        <script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="js/custom/general.js"></script>
        <script type="text/javascript" src="js/custom/forms.js"></script>
        <script type="text/javascript" src="js/custom/editor.js"></script>

        <script>
            function val() {
                if (document.getElementById('name').value == '') {
                    alert('Enter Room No. ');
                    document.getElementById('name').focus();
                    return false;
                }
                if (document.getElementById('type').value == '') {
                    alert('Select Room Type');
                    document.getElementById('type').focus();
                    return false;
                }

            }
        </script>

        <div class="centercontent">

            <div class="pageheader notab">
                <h1 class="pagetitle">
                    Add New Room</h1>
                <span class="pagedesc"></span>
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper">

                <form action="add-room.php" method="post">
                    <!-- <form class="stdform" action="" method="post" onsubmit="return val()"> -->
                    <div class="two_third dashboard_left">
                        <p>
                            <strong>Room No</strong><br />
                            <input type="text" name="name" id="name" value="" class="longinput" style="width:150px;" />
                        </p>

                        <p>
                            <strong>Room Type</strong><br />
                            <select name="type" id="type">
                                <option value="">--Select--</option>
                                <option value="Single Room">Single Room</option>
                                <option value="Deluxe Room">Deluxe Room</option>
                                <option value="Suite Room">Suite Room</option>
                                <option value="Executive Room">Executive Room</option>
                            </select>
                        </p>

                        <!--
<p>
<strong>Phone Extension</strong><br />
<input type="text" name="phone" id="phone" value="" class="smallinput" style="width:250px;" />
</p>-->


                        <p class="stdformbutton">
                            <button class="submit radius2">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
                            <input type="hidden" name="opr" value="add-room" />
                        </p>

                    </div>



                </form>
            </div>
        </div>
    </div>
    <!-- Display success and error messages -->
    <?php displaySuccessMessage(); ?>
    <?php displayErrorMessage(); ?>
</body>

</html>