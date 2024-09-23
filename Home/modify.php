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
    <!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

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
        }
        Swal.fire({
            title: tittle,
            text: "Please provide different email.",
            icon: 'error',
            confirmButtonText: 'Okay!'
        }).then((result)=> {
            window.location = "index.php";
        });
    };
</script>
<?php
$today=date('Y-m-d');
$tomorrow=date('Y-m-d', strtotime("+1 day"));
$check_out_min = $tomorrow;

$checkin = "";
$checkout = "";
$num_adult = "";
$num_child = "";
$num_rooms = "";
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

if(isset($_GET["confirm_number"])){
    $r_id = $_GET["confirm_number"];
    $sql = "SELECT * FROM reservation WHERE reservation_id='".$_GET["confirm_number"]."'";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $checkin=date("Y-m-d", strtotime($row['check_in']));
        $checkout=date("Y-m-d", strtotime($row['check_out']));
        $num_adult=$row['num_adult'];
        $num_child=$row['num_child'];
        $num_rooms=$row['num_rooms'];
        $total_cost=$row['total_cost'];
    }
//    print_r($_GET["confirm_number"]);
}else if(isset($_GET["c_last_name"])){
    $last_name = $_GET["c_last_name"];
    $email = $_GET["email_id"];
    $sql = "SELECT * FROM customer WHERE last_name='".$last_name."' and email='".$email."'";
    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $c_id = $row["customer_id"];
    $sql = "SELECT * FROM reservation WHERE customer_id='".$c_id."'";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $checkin=date("Y-m-d", strtotime($row['check_in']));
        $checkout=date("Y-m-d", strtotime($row['check_out']));
        $num_adult=$row['num_adult'];
        $num_child=$row['num_child'];
        $num_rooms=$row['num_rooms'];
        $total_cost=$row['total_cost'];
        $r_id = $row['reservation_id'];
    }
}
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
<div class="card bg-glass">
    <div class="card-body px-4 py-5 px-md-5">
        <form method="POST" action="modify2.php"> <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label>Check-In Date</label>
                    <div class="form-outline">
                        <input type="date" id="checkin" name="checkin" min="<?php echo $today;?>" class="form-control"/>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 86.4px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label>
                        Check Out Date
                    </label>
                    <div class="form-outline">
                        <input type="date" id="checkout" name="checkout" min="<?php echo $check_out_min;?>" class="form-control"/>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 96px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>
                </div>
            </div> <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="adults" id="adults" min="1" value="1" class="form-control">
                <label class="form-label" for="adults" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                    Number of Adults
                </label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="children" id="children" min="0" value="0" class="form-control">
                <label class="form-label" for="children" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                    Number of Children
                </label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="rooms" id="rooms" min="1" value="1" class="form-control">
                <label class="form-label" for="rooms" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                    Number of Rooms
                </label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>
<!--            <div>-->
<!--                Total Cost: --><?php //echo $total_cost;?>
<!--            </div>-->
            <input type="hidden" id="postId" name="postId" value="<?php echo $r_id?>" />
            <button type="submit" name="modify" class="btn btn-primary btn-block mb-4" data-builder-edit="button" data-builder-name="button1" aria-controls="#picker-editor">
                Modify Reservation
            </button>
            <?php if(isset($_GET["modify"])){
                echo "<script>alert('Modified Reservation Successfully!!')</script>";
            }else if(isset($_GET["cancel"])){
                echo "<script>alert('Canceled Reservation Successfully!!')</script>";
            }

            ?>

            <button type="submit" name="cancel" class="btn btn-primary btn-block mb-4" data-builder-edit="button" data-builder-name="button1" aria-controls="#picker-editor">
                Cancel Reservation
            </button><!-- Register buttons -->
        </form>
    </div>
</div>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
<script>
    document.getElementById("checkin").value = "<?php echo $checkin?>";
    document.getElementById("checkout").value = "<?php echo $checkout?>";
    document.getElementById("adults").value = "<?php echo $num_adult?>";
    document.getElementById("children").value = "<?php echo $num_child?>";
    document.getElementById("rooms").value = "<?php echo $num_rooms?>";

</script>
<script>
    document.getElementById("checkin").onblur=function(){
        var res=new Date(this.value);
        // res.setDate(res.getDate()+1);
        document.getElementById("checkout").setAttribute("min",res);
    }
    document.getElementById("adults").onblur=function(){
        if (this.value<1) {
            alert("Enter valid input");
            document.getElementById("adults").value=1;
        }
    }
    document.getElementById("rooms").onblur=function(){
        if (this.value<1) {
            alert("Enter valid input");
            document.getElementById("rooms").value=1;
        }
    }
    document.getElementById("children").onblur=function(){
        if (this.value<0) {
            alert("Enter valid input");
            document.getElementById("children").value=0;
        }
    }
</script>
</body>
</html>