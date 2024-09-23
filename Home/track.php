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
<div class="card bg-glass">
    <div class="card-body px-4 py-5 px-md-5">
        <form method="GET" action="modify.php"> <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="confirm_number" id="confirm_number" class="form-control" required/>
                    <label class="form-label" for="confirm_number" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                        Confirmation Number
                    </label>
                    <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 96.8px;"></div>
                        <div class="form-notch-trailing"></div>
                    </div>
                </div>
            </div>
            <button type="submit" id="reserve" class="btn btn-primary btn-block mb-4" data-builder-edit="button" data-builder-name="button1" aria-controls="#picker-editor">
                Get Reservation Details
            </button>
        </form>
    </div>
</div><!-- Email input -->

            <div class="card bg-glass">
                <h6><center>Or</center></h6>
                <div class="card-body px-4 py-5 px-md-5">
                    <form method="GET" action="modify.php"> <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row">
            <div data-mdb-input-init class="form-outline mb-4">

                <input type="text" name="c_last_name" id="c_last_name" class="form-control" required/>
                <label class="form-label" for="c_last_name" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                    Enter Traveller's Last Name
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

            <button type="submit" id="reserve" class="btn btn-primary btn-block mb-4" data-builder-edit="button" data-builder-name="button1" aria-controls="#picker-editor">
                Get Reservation Details
            </button>

        </form>
    </div>
</div>
<?php

?>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

<script>
const submitit=document.getElementById("reserve");
submitit.addEventListener("click",function () {
if(!document.getElementById("confirm_number").value){
    if (document.getElementById("email_id").value && document.getElementById("c_last_name").value) {
        window.location("modify.php");
    }
}else{
    if(document.getElementById("confirm_number").value){
        window.location("modify.php");
    }
}
});

</script>
</body>
</html>