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
<?php
$today=date('Y-m-d');
//$today1 = date('Y-d-m');
//echo $today1;
$tomorrow=date('Y-m-d', strtotime("+1 day"));
$check_out_min = $tomorrow;
?>
<style>
    .roomwide{
        width: 25%;
    }
</style>
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
                    <a class="nav-link" data-builder-edit="text" data-builder-href="href1" disabled abled href="#">Book Now</a>
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
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-2"> <!-- Container wrapper -->
    <div class="container-fluid">
<form action="book.php" method="GET" class="row align-items-center">
    <div class="col-auto">
        <div data-mdb-input-init class="form-outline">
            <input type="date" name="checkin" id="checkin" class="form-control" min="<?php echo $today;?>"/>
            <label class="form-label" for="checkin">Check-In Date</label>
        </div>
    </div>
    <div class="col-auto">
        <div data-mdb-input-init class="form-outline">
            <input type="date" name="checkout" id="checkout" class="form-control" min="<?php echo $check_out_min;?>"/>
            <label class="form-label" for="checkout">Check-Out Date</label>
        </div>
    </div>
    <div class="col-auto">
        <div data-mdb-input-init class="form-outline">
            <input type="number" name="adults" id="adults" min="1" value="1" class="form-control" />
            <label class="form-label" for="adults">Number of Adults</label>
        </div>
    </div>
    <div class="col-auto">
        <div data-mdb-input-init class="form-outline">
            <input type="number" name="children" id="children" min="0" value="0" class="form-control" />
            <label class="form-label" for="children">Number of children</label>
        </div>
    </div>
    <div class="col-auto">
        <div data-mdb-input-init class="form-outline">
            <input type="number" name="rooms" id="rooms" min="1" value="1" class="form-control" />
            <label class="form-label" for="rooms">Number of Rooms</label>
        </div>
    </div>
    <div class="col-auto">
        <button data-mdb-ripple-init type="submit" class="btn btn-primary">Submit</button>
    </div>
</form></div>
</nav>
<br>
<div class="container">

<?php
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

    $sql = "SELECT room_id,description,room_type,cost,image_url,accomodates_people FROM room WHERE available_quantity>0";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $total_cost=$row["cost"]*(int) $date_diff->format('%d days')*$_GET["rooms"];
            echo '
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-md-6 mb-4 mb-md-0"> 
                    <div class="bg-image hover-overlay ripple shadow-4-strong rounded-4 mb-4 ripple-surface-light" data-mdb-ripple-color="light" style=""> 
                        <img src="Images/'. $row["image_url"].'" class="w-100" alt="" data-builder-edit="image" data-builder-name="image1" aria-controls="#picker-editor"> </div>
                </div> 
                <div class="col-md-6 mb-4 mb-md-0"> 
                    <h3 class="fw-bold" data-builder-edit="text" data-builder-name="text2" contenteditable="true">'.$row["room_type"].'</h3> 
                    
                    <p class="text-muted" data-builder-edit="text" data-builder-name="text4" contenteditable="true">'.$row["description"].'</p> 
                    <div class="row gx-lg-5 align-items-center mb-5">
                        <div class="col-md-2 mb-2 mb-md-0">
                        <div style="text-align:justify; font-size: large"><i class="fas fa-2x fa-users"></i> '.$row["accomodates_people"].'</div>
                        </div>
                        <div class="col-md-2 mb-2 mb-md-0">
                        <div style="text-align:justify; font-size: large"><i class="fas fa-2x fa-money-check-dollar"></i> $'.$row["cost"].'</div>
                        </div>
                    
                        <div class="col-md-2 mb-2 mb-md-0">
                            <ul class="list-group list-group-horizontal">
                              <li class="list-group-item"> <i class="fas fa-xl fa-wifi"></i><p style="text-align:center; font-size: large">Wifi</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-tv"></i><p style="text-align:center; font-size: large">TV</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-key"></i><p style="text-align:center; font-size: large">Keys</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-snowflake"></i><p style="text-align:center; font-size: large">AC</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-mug-hot"></i><p style="text-align:center; font-size: large">Breakfast</p></li>
                            </ul>
                            <ul class="list-group list-group-horizontal">
                              <li class="list-group-item"> <i class="fas fa-xl fa-water"></i><p style="text-align:center; font-size: large">Pool</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-shirt"></i><p style="text-align:center; font-size: large">Iron</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-car"></i><p style="text-align:center; font-size: large">Cab</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-trash"></i><p style="text-align:center; font-size: large">Trash</p></li>
                              <li class="list-group-item"><i class="fas fa-xl fa-bolt"></i><p style="text-align:center; font-size: large">Backup</p></li>
                            </ul>
                          
                        </div>
                        
                    </div>
                    <div class="row gx-lg-2 align-items-center mb-2">
                    
                    <div class="col-4">
                    <p id="total" style="text-align:center; font-size: large">Total: $'.$total_cost.'</p>
                        <button onclick="bookHotel('. $row["room_id"].','.$total_cost.')" type="submit" class="btn btn-primary btn-block mb-4" data-builder-edit="button"
                            data-builder-name="button1">Book
                    </button>
                    </div>
                    </div>
                    
                    
                </div>
            </div>';

        }
    } else {
        echo "0 results";
    }
//    $conn->close();
    ?>

</div>

<script>
    document.getElementById("checkin").value = "<?php echo $_GET["checkin"]?>";
    document.getElementById("checkout").value = "<?php echo $_GET["checkout"]?>";
    document.getElementById("adults").value = "<?php echo $_GET["adults"]?>";
    document.getElementById("children").value = "<?php echo $_GET["children"]?>";
    document.getElementById("rooms").value = "<?php echo $_GET["rooms"]?>";
    function bookHotel(id,total){
        var chkin = document.getElementById("checkin").value;
        var chkout = document.getElementById("checkout").value;
        var adults = document.getElementById("adults").value;
        var children = document.getElementById("children").value;
        var rooms = document.getElementById("rooms").value;
        location.href = `summary.php?id=${id}&checkin=${chkin}&checkout=${chkout}&adults=${adults}&children=${children}&rooms=${rooms}&total=${total}`;
    }
</script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
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