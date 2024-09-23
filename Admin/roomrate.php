<?php
session_start();

require_once('db.php');

// Function to fetch the rate per night for a given room type
function getRatePerNight($roomType, $conn) {
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT cost FROM room WHERE room_type = ?");
    $stmt->execute([$roomType]); // Use an array to pass the parameter safely
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['cost'];
}

// Fetch rate per night for each room type
$singleRoomRate = getRatePerNight("Single Room", $conn);
$deluxeRoomRate = getRatePerNight("Deluxe Room", $conn);
$suiteRoomRate = getRatePerNight("Suite Room", $conn);
$executiveRoomRate = getRatePerNight("Executive Room", $conn);

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
                        <li><a href="roomtype.php">Room Types</a></li>
                        <li><a href="room.php">Rooms List</a></li>
                    </ul>
                </li>

                <li class="current"><a href="#rooms" class="gallery">Rates</a>
                    <span class="arrow"></span>
                    <ul id="rooms">

                        <li class="current"><a href="roomrate.php">Room Rates</a></li>

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
        <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/plugins/charCount.js"></script>
        <script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
        <script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="js/custom/general.js"></script>
        <script type="text/javascript" src="js/custom/forms.js"></script>
        <script>
            function inc(chk) {
                $('.incl').each(function() {

                    sid = ($(this).val().split("|"));
                    if (chk.checked != true)
                        $('#' + jQuery(this).attr('data') + '').val(sid[0])
                    else
                        $('#' + jQuery(this).attr('data') + '').val(sid[1])
                });
            }
            window.onload = function() {

                inc(document.getElementById('inclusive'));
            }
        </script>

        <div class="centercontent tables">

            <div class="pageheader notab">
                <h1 class="pagetitle">Room Rates List</h1>
               
                <form method="post">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="submit radius2" onclick="window.location='update-charges.php'; return false;">Update Charges</button>
                </form>
            </div><!--pageheader-->

            <div id="contentwrapper" class="contentwrapper">

                <form method="post">

                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick" id="dyntable1">
                        <colgroup>
                            <col class="con0" style="width: 4%" />
                            <col class="con1" />
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="head0" width="16%">Room Type</th>
                                <th class="head0">Rate per night</th>
                                <th class="head0">Rate For Ext. Adult</th>
                                <th class="head0">Rate For Ext. Child</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <!--    <tr>
                                <th class="head0">Room Type</th>
                                <th class="head0">Rate per night</th>
                                <th class="head0">Rate For Ext. Adult</th>
                                <th class="head0">Rate For Ext. Child</th>

                            </tr> -->
                        </tfoot>
                        <tbody>

                            <input name="room_type[]" type="hidden" value="2" />
                            <input name="rate_type[]" type="hidden" value="1" />
                            <input name="roomrate[]" type="hidden" value="34" />

                            <tr>
                                <td class="con0">Single Room</td>
                                <td class="con0">
                                    <input type="text" name="rate[]" class="smallinput" value="<?php echo $singleRoomRate . '.00'; ?>" readonly />
                                </td>

                                <td class="con0">
                                    <input type="text" name="adult[]" id="a0" class="smallinput" value="50.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="a0" class="incl" value="50.00|0.00" />
                                </td>
                                <td class="con0">
                                    <input type="text" name="child[]" id="c0" class="smallinput" value="50.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="c0" class="incl" value="50.00|0.00" />
                                </td>
                            </tr>
                            <input name="room_type[]" type="hidden" value="2" />
                            <input name="rate_type[]" type="hidden" value="2" />
                            <input name="roomrate[]" type="hidden" value="35" />

                            <tr>
                                <td class="con0">Deluxe Room</td>
                                <td class="con0">
                                     <input type="text" name="rate[]" class="smallinput" value="<?php echo $deluxeRoomRate . '.00'; ?>" readonly />
                                </td>

                                <td class="con0">
                                    <input type="text" name="adult[]" id="a1" class="smallinput" value="75.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="a1" class="incl" value="75.00|0.00" />
                                </td>
                                <td class="con0">
                                    <input type="text" name="child[]" id="c1" class="smallinput" value="75.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="c1" class="incl" value="75.00|0.00" />
                                </td>
                            </tr>
                            <input name="room_type[]" type="hidden" value="4" />
                            <input name="rate_type[]" type="hidden" value="1" />
                            <input name="roomrate[]" type="hidden" value="36" />

                            <tr>
                                <td class="con0">Suite Room</td>
                                <td class="con0">
                                <input type="text" name="rate[]" class="smallinput" value="<?php echo $suiteRoomRate . '.00'; ?>" readonly />
                                </td>

                                <td class="con0">
                                    <input type="text" name="adult[]" id="a2" class="smallinput" value="80.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="a2" class="incl" value="80.00|0.00" />
                                </td>
                                <td class="con0">
                                    <input type="text" name="child[]" id="c2" class="smallinput" value="80.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="c2" class="incl" value="80.00|0.00" />
                                </td>
                            </tr>

                            <input name="room_type[]" type="hidden" value="4" />
                            <input name="rate_type[]" type="hidden" value="1" />
                            <input name="roomrate[]" type="hidden" value="36" />

                            <tr>
                                <td class="con0">Executive Room</td>
                                <td class="con0">
                                <input type="text" name="rate[]" class="smallinput" value="<?php echo $executiveRoomRate . '.00'; ?>" readonly />
                                 </td>

                                <td class="con0">
                                    <input type="text" name="adult[]" id="a2" class="smallinput" value="100.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="a2" class="incl" value="100.00|0.00" />
                                </td>
                                <td class="con0">
                                    <input type="text" name="child[]" id="c2" class="smallinput" value="100.00" onkeypress="return nmbonly1(event)" readonly/>
                                    <input type="hidden" data="c2" class="incl" value="100.00|0.00" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div align="right">
                        <input name="roomtype" type="hidden" value="" />
                        <input name="ratetype" type="hidden" value="" />
                        <input name="season" type="hidden" value="" />
                        <input name="source" type="hidden" value="" />
                        <input name="opr" type="hidden" value="room-rate" />
                        <br />

                    </div>
                </form>
            </div><!--contentwrapper-->

        </div><!-- centercontent -->


    </div><!--bodywrapper-->

</body>

</html>