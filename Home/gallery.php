<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Gallery</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap')
    </style>
</head>
<style>
    .gri{
        padding: 20px;
        width: 33%;
    }
</style>
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
<div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white" style="background-image: url('Images/test.jpg'); height: 550px; position: relative;">
    <h1 class="mb-10 h1" style="position: absolute; bottom: 75px; left: 50%; transform: translateX(-50%); color: #FFFFFF; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); font-family: Caveat; font-size:58px; font-optical-sizing: auto; font-weight: 645; font-style: normal;">Unveiling Velvet Rose's Innovative Elegance</h1>

    <p style="position: absolute; bottom: 5%; left: 50%; transform: translateX(-50%); color: #FFFFFF; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); font-family: 'Roboto', sans-serif; font-size: 1.2rem; font-weight: 500; ">
        Dive into the visual poetry of Velvet Rose's photo gallery, where opulence meets innovation. Explore the avant-garde design of our luxurious spaces, savor the culinary artistry in vibrant hues, and let the images transport you to a world where every detail sparks an extraordinary experience. Uncover the allure of Velvet Rose, where each photo paints a story of luxury reimagined.
    </p>
</div>
<?php
$folderPath = 'Gallery'; // Replace with the actual path to your folder

// Get all files and directories in the folder
$files = scandir($folderPath);

// Remove the special entries "." and ".." from the array
$files = array_diff($files, array('.', '..'));

// Convert the array to a list of file names
$fileNames = array_values($files);
// Number of columns in the grid
$columns = 3;

echo '<ul class="list-group list-group">';

// Loop through the images
for ($i = 0; $i < count($fileNames); $i=$i+3) {
    // Open a new row for every $columns images
//    if ($i % $columns == 0) {
//        echo '<div class="row">';
//    }

    // Display each image in a grid cell
    echo '<li class="list-group-item">';
    echo '<img src="Gallery/' . $fileNames[$i] . '" width=400 alt="Image ' . ($i) . '" class="img-fluid gri">';
    echo '<img src="Gallery/' . $fileNames[$i+1] . '" width=400 alt="Image ' . ($i + 1) . '" class="img-fluid gri">';
    echo '<img src="Gallery/' . $fileNames[$i+2] . '" width=400 alt="Image ' . ($i + 2) . '" class="img-fluid gri">';
    echo '</li>';

    // Close the row after every $columns images
    if ($i % $columns == $columns - 1 || $i == count($fileNames) - 1) {
        echo '</div>';
    }
}

echo '</ul>';
?>

<!---->
<!--    <li class="list-group-item"><img src=""></li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
<!--<ul class="list-group list-group-horizontal-sm">-->
<!--    <li class="list-group-item">An item</li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
<!--<ul class="list-group list-group-horizontal-md">-->
<!--    <li class="list-group-item">An item</li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
<!--<ul class="list-group list-group-horizontal-lg">-->
<!--    <li class="list-group-item">An item</li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
<!--<ul class="list-group list-group-horizontal-xl">-->
<!--    <li class="list-group-item">An item</li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
<!--<ul class="list-group list-group-horizontal-xxl">-->
<!--    <li class="list-group-item">An item</li>-->
<!--    <li class="list-group-item">A second item</li>-->
<!--    <li class="list-group-item">A third item</li>-->
<!--</ul>-->
</body>
</html>