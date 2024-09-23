<!DOCTYPE html>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>The Velvet Rose</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon"/>
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css"/>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function alert_notify(tittle,r_id) {
        if(r_id){
            Swal.fire({
                title: tittle,
                text: "Your Confirmation Number is "+r_id,
                icon: 'success',
                confirmButtonText: 'Cool!'
            });
        }else {
            Swal.fire({
                title: tittle,
                text: "Please provide different email.",
                icon: 'error',
                confirmButtonText: 'Okay!'
            }).then((result) => {
                window.location = "index.php";
            });
        }
    };

</script>
<?php
$today=date('Y-m-d');
$tomorrow=date('Y-m-d', strtotime("+1 day"));
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-2"> <!-- Container wrapper -->
    <div class="container-fluid"> <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="index.php">
            <img src="Images/logo3.jpg" height="16" alt="Logo" loading="lazy" style="margin-top: -1px" data-builder-edit="image" data-builder-name="image1">
        </a> <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i></button> <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample"> <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" data-builder-edit="text" data-builder-href="href1" href="book.php?checkin=<?php echo $today?>&checkout=<?php echo $tomorrow;?>&adults=1&children=0&rooms=1">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-builder-edit="text" data-builder-href="href2" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-builder-edit="text" data-builder-href="href3" href="index.php#latest">Explore</a>
                </li>
            </ul> <!-- Left links -->
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary btn-rounded me-3" data-builder-edit="button" data-builder-name="button1" onclick="location.href = 'track.php'">
                    Manage Booking
                </button>
            </div>
        </div> <!-- Collapsible wrapper -->
    </div> <!-- Container wrapper -->
</nav>
<?php
$date1 = date_create($_GET["checkin"]);
$date2 = date_create($_GET["checkout"]);
$date_diff = date_diff($date1, $date2);
$date_diff_cnt = (int) $date_diff->format('%d days');
$total_final = $_GET["total"] + $_GET["total"]*0.2;
?>
<?php
if (isset($_GET["c_last_name"])){
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=hotel_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $date1 = date_create($_GET["checkin"]);
    $date2 = date_create($_GET["checkout"]);
    $date_diff = date_diff($date1, $date2);

    $sql1 = "SELECT * FROM customer WHERE email='".$_GET["email_id"]."'";
//    print_r($sql1);
    $result1 = $conn->query($sql1);
    if ($result1->rowCount() > 0) {
        echo "<script> alert_notify('Email Already Registered!!','')</script>";
    }else{
    $sql = "INSERT INTO customer (last_name, first_name, address, phone_number, email) VALUES ('".$_GET["c_last_name"]."','".$_GET["c_first_name"]."','".$_GET["address"]."','".$_GET["ph_number"]."','".$_GET["email_id"]."')";

    $result = $conn->query($sql);

    $sql2 = "SELECT customer_id FROM customer WHERE email='".$_GET["email_id"]."'";

    $result2 = $conn->query($sql2);
    $row = $result2->fetch(PDO::FETCH_ASSOC);


    $sql3 = "INSERT INTO reservation(check_in, check_out, confirmation_status, total_cost, customer_id, room_id,num_adult,num_child,num_rooms) VALUES ('".$_GET["checkin"]."','".$_GET["checkout"]."',1,'".$total_final."','".$row["customer_id"]."','".$_GET["id"]."','".$_GET["adults"]."','".$_GET["children"]."','".$_GET["rooms"]."')";
    $result3 = $conn->query($sql3);

    $sql4 = "SELECT reservation_id FROM reservation WHERE customer_id='".$row["customer_id"]."'";

    $result4 = $conn->query($sql4);
    $row2 = $result4->fetch(PDO::FETCH_ASSOC);
    $r_id = $row2["reservation_id"];
    echo "<script>alert_notify('Reservation Success!',".$r_id.")</script>";
    }

}

?>
<!--Main Navigation-->
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h2 class="summary-charges-heading">Traveller Details</h2>
<!--                        <form method="GET" action="#">-->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="c_last_name" name="c_last_name" class="form-control" required/>
                                        <label class="form-label" for="ph_number" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                            Enter Traveller's Last Name
                                        </label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 86.4px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="c_first_name" name="c_first_name" class="form-control" required/>
                                        <label class="form-label" for="ph_number" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                            Enter Traveller's First Name
                                        </label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 96px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="textarea" name="address" id="address" class="form-control" required/>
                                <label class="form-label" for="address" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                    Address
                                </label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="phone" name="ph_number" id="ph_number" class="form-control" required/>
                                <label class="form-label" for="ph_number" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                    Phone Number
                                </label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name="email_id" id="email_id" class="form-control" required/>
                                <label class="form-label" for="email_id" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                    Email Address
                                </label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5"><!-- 2 column grid layout with text inputs for the first and last names -->
                        <h2 class="summary-charges-heading">Price Summary</h2>



                                    <div class="summary-charges-item-con ihclcb-font-size summary-total-price">
                                        <div class="summary-charges-item-name">


                                            Cost ($) <?php echo $_GET["total"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>( </span><span class="summary-card-rooms-count"><?php echo $_GET["rooms"];?></span>
                                            <span>Room<label class="summary-card-rooms-count-suffix" style="display: none;">s </label> x
							                <span class="summary-card-nights-count"><?php echo $date_diff_cnt; ?></span>
                                                Night<label class="summary-card-nights-count-suffix" style="display: none;">s </label> )
                                            </span>
                                            <br>
                                        </div>
                                        <div class="summary-charges-item-value">

                                            <span class="cart-currency-symbol">Tax ($)</span>
                                            <span class="cart-total-price"><?php echo $_GET["total"] * 0.2;?></span>
                                            <br>
                                            <b>
                                            <span class="cart-currency-symbol">Total ($)</span>
                                            <span class="cart-total-price"><?php echo $total_final; ?></span></b>
                                        </div>
                                        <div id="inclusive-taxes">Inclusive of all taxes.</div>
                                    </div>
                                </div>
                                <div class="summary-soldout-message" style="display: none;">
                                    <div class="summary-of-soldout-rooms"></div>
                                    <div class="soldout-room-info">You have chosen has been sold out.<br><br></div>
                                    <div class="soldout-summary-info">Please check for alternate dates and occupancy combinations.<br><br></div>
                                    <div class="soldout-apologize">We apologize for the inconvenience.<br><br></div>
                                    <div class="sold-out-addRoom" onclick="addAnotherRoom()">
                                        <a href="#">
                                            <button class="cm-btn-primary sold-out-add-room-button">ADD ANOTHER ROOM + </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button onclick="bookRoom()" class="btn btn-primary btn-block mb-4" >
                            Book Now
                        </button> <!-- Register buttons -->
<!--    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    function bookRoom(){
        if(document.getElementById("c_last_name").value && document.getElementById("c_first_name").value && document.getElementById("email_id").value && document.getElementById("address").value && document.getElementById("ph_number").value) {
            var curl = window.location;
            var inp = "&c_last_name=" + document.getElementById("c_last_name").value + "&c_first_name=" + document.getElementById("c_first_name").value + "&address=" + document.getElementById("address").value + "&ph_number=" + document.getElementById("ph_number").value + "&email_id=" + document.getElementById("email_id").value;
            window.location.href = curl + inp;
        }else{
            alert("Enter Valid Input");
        }
    }
</script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

</body>
</html>