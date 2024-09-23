<?php
session_start();

require_once('db.php');

// SQL query to retrieve room numbers and room types
$sql = "SELECT room_id, room_type, available_quantity, accomodates_people,create_date FROM room";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Fetch all rows as an associative array
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Management System</title>
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
    </strong>



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
                        <li class="current"><a href="roomtype.php">Room Types</a></li>
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
        <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/custom/general.js"></script>
        <script type="text/javascript" src="js/custom/tables.js"></script>

        <div class="centercontent tables">

            <div class="pageheader notab">
                <h1 class="pagetitle">Room Types List</h1>
                <!--
                <form method="post">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="submit radius2" onclick="window.location='add-roomtype.php'; return false;">Add Room Type</button>
                </form>
                -->
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper">

                <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick" id="dyntable2">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0" width="5%" style='font-size: 12px;'>Room Type</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Max (adult/child)</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Create Date</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Available Quantity</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Status</th>

                        </tr>
                    </thead>
                    <tfoot>
                    <!--    <tr>
                            <th class="head0" width="5%" style='font-size: 12px;'>Room Type</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Max (adult/child)</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Create Date</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Available Quantity</th>
                            <th class="head0" width="5%" style='font-size: 12px;'>Status</th>

                        </tr> -->
                    </tfoot>
                    <tbody>
                        <?php
                        if (!empty($rooms)) {
                            // Output data of each row
                            foreach ($rooms as $row) {
                                echo "<tr>";
                                //echo "<td class='aligncenter'>";
                                echo "<td class='con0' style='font-size: 12px;'>" . $row["room_type"] . "</td>";
                                echo "<td class='con0' style='font-size: 12px;'>" . $row["accomodates_people"] . "</td>";
                                echo "<td class='con0' style='font-size: 12px;'>" . $row["create_date"] . "</td>";
                                echo "<td class='con0' style='font-size: 12px;'>" . $row["available_quantity"] . "</td>";
                                echo "<td class='con0' style='font-size: 12px;'><font color='#009900'>Available</font></td>";
                                // echo "<td class='actions aligncenter'>";
                                //echo "<a href='add-room.php?id=" . $row["room_id"] . "' class='btn btn4 btn_search' title='view record'></a>";
                                //echo "<a href='#' id='" . $row["room_id"] . "' tbl='hms_room' class='btn btn4 btn_trash delete' title='delete record'></a>";
                                //echo "</td>"; -->
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='aligncenter'>No records found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>

            </div><!--contentwrapper-->

        </div><!-- centercontent -->


    </div><!--bodywrapper-->

</body>

</html>