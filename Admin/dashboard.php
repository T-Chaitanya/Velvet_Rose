<?php
session_start();
require_once('db.php');

// SQL query to count the total number of rows in the roomlist table
$countSql = "SELECT COUNT(*) AS total_rooms FROM roomlist";

// Prepare the count statement
$countStmt = $conn->prepare($countSql);

// Execute the count statement
$countStmt->execute();

// Fetch the result
$totalRooms = $countStmt->fetch(PDO::FETCH_ASSOC);

// Total number of rooms in the roomlist table
$totalRoomCount = $totalRooms['total_rooms'];

// SQL query to count the guests in the reservation table
$countSql1 = "SELECT COUNT(*) AS total_guests FROM reservation";

// Prepare the count statement
$countStmt1 = $conn->prepare($countSql1);

// Execute the count statement
$countStmt1->execute();

// Fetch the result
$totalGuests = $countStmt1->fetch(PDO::FETCH_ASSOC);

// Total number of guests in the reservation table
$totalGuestCount = $totalGuests['total_guests'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Velvet Rose Management System</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
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
    <script>
        // JavaScript function to toggle the visibility of the userinfo dropdown
        function toggleUserinfo() {
            var dropdown = document.getElementById("userinfoDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
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

                <div class="userinfodrop" style="position: absolute; top: 10px; right: 10px;">
                    <div class="avatar"><a href="#">
                            <img src="images/admin.jpg" height="95" alt="" />
                        </a>
                    </div>
                    <div class="userdata" id="userinfoDropdown">
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
                <li style="pointer-events: none;"><a href="front-office.php"><span class="icon icon-flatscreen"></span>Front Office</a></li>
                <!-- <li  ><a href="booking.php"><span class="icon icon-pencil"></span></span>Booking</a></li> -->
            </ul>
            <div class="headerwidget">
                <div class="earnings">
                    <div class="one_half"></div>
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
        <script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="js/custom/general.js"></script>
        <script type="text/javascript" src="js/custom/dashboard.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery(".chzn-select").chosen();
                jQuery('.stdtable a.checkin').click(function() {
                    var dar = jQuery(this).attr('id');
                    var tbl = jQuery(this).attr('tbl');
                    var c = confirm('Continue ?');
                    if (c) jQuery(this).parents('tr').fadeOut(function() {
                        var http = false;
                        if (navigator.appName == "Microsoft Internet Explorer") {
                            http = new ActiveXObject("Microsoft.XMLHTTP");
                        } else {
                            http = new XMLHttpRequest();
                        }
                        http.abort();
                        http.open("GET", "adm-action.php?opr=checkin&id=" + dar + "&tbl=" + tbl, true);
                        http.onreadystatechange = function() {
                            if (http.readyState == 4) {}
                        }
                        http.send(null);
                        jQuery(this).remove();
                    });
                    return false;
                });
            });

            function popupwindow(url, title, w, h) {
                var left = (screen.width / 2) - (w / 2);
                var top = (screen.height / 2) - (h / 2);
                return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
            }
        </script>

        <div class="centercontent">
            <div class="pageheader">
                <h1 class="pagetitle">Dashboard</h1>
                <span class="pagedesc"></span>
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper">
                <div id="updates" class="subcontent">
                    <div class="notibar announcement">
                        <a class="close"></a>
                        <h3>Announcement</h3>
                        <p>Welcome to Hotel Velvet Rose Management System</p>
                    </div>
                </div>
            </div><!--contentwrapper-->

            <div id="contentwrapper" class="contentwrapper">

                <div class="two_third dashboard_left">
                    <div class="contenttitle2 nomargintop">
                        <h3>Menu</h3>
                    </div>
                    <ul class="shortcuts">
                        <li><a href="room.php" class="settings"><span>Rooms List</span></a></li>
                        <li><a href="roomrate.php" class="analytics"><span>Room Rates</span></a></li>
                        <li><a href="users.php" class="users"><span>Users</span></a></li>
                    </ul>
                    <br clear="all" />
                </div>

            </div><!--contentwrapper-->

            <div id="contentwrapper" class="contentwrapper">

                <div class="one_third last dashboard_right">
                    <div class="contenttitle2 nomargintop">
                        <h3>Overview</h3>
                    </div>
                    <ul class="toplist">
                        <li>
                            <div>
                                <span class="three_fourth">
                                    <span class="left">
                                        <span class="title"><a href="#">Rooms</a></span>
                                        <span class="desc">Total Rooms</span>
                                    </span>
                                </span>
                                <span class="one_fourth last">
                                    <span class="right">
                                        <span class="h3"><?php echo $totalRoomCount; ?></span>
                                    </span>
                                </span>
                                <br clear="all" />
                            </div>
                        </li>
                        <li>
                            <div>
                                <span class="three_fourth">
                                    <span class="left">
                                        <span class="title"><a href="#">GUEST</a></span>
                                        <span class="desc">Total Guests</span>
                                    </span>
                                </span>
                                <span class="one_fourth last">
                                    <span class="right">
                                        <span class="h3"><?php echo $totalGuestCount; ?></span>
                                    </span>
                                </span>
                                <br clear="all" />
                            </div>
                        </li>
                    </ul>
                </div>


            </div><!--contentwrapper-->
            <br clear="all" />
        </div><!-- centercontent -->
    </div><!--bodywrapper-->
</body>

</html>