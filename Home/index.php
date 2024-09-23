<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>The Velvet Rose</title>
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

</head>
<?php
$today=date('Y-m-d');
//$today1 = date('Y-d-m');
//echo $today1;
$tomorrow=date('Y-m-d', strtotime("+1 day"));
$check_out_min = $tomorrow;
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
                    <a class="nav-link" data-builder-edit="text" data-builder-href="href3" href="#latest">Explore</a>
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
<!--Main Navigation-->
<section class="mb-10 background-radial-gradient overflow-hidden">
    <style> .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%), radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-3 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    <span data-builder-edit="text" data-builder-name="text1">
                        Velvet Rose!
                    </span>
                    <br>
                    <span style="color: hsl(218, 81%, 75%)" data-builder-edit="text" data-builder-name="text2">
                        Ultimate stay awaits!
                    </span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)" data-builder-edit="text"
                   data-builder-name="text3">
                    Discover the allure of the Velvet Rose – a symbol of timeless elegance and beauty. Our exquisite collection celebrates the rich hues and soft textures of this cherished flower, offering luxury and sophistication to elevate any occasion. Explore our stunning range and indulge in the romance of the Velvet Rose today.
                </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong">
                </div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong">
                </div>
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="GET" action="book.php"> <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label>Check-In Date</label>
                                    <div class="form-outline">
                                        <input type="date" id="checkin" name="checkin" class="form-control" min="<?php echo $today;?>" required/>
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
                                        <input type="date" id="checkout" name="checkout" class="form-control" min="<?php echo $check_out_min;?>" required/>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 96px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" name="adults" id="adults" class="form-control" min="1" value="1" required>
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
                                <input type="number" name="children" id="children" class="form-control" min="0" value="0" required>
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
                                <input type="number" name="rooms" id="rooms" class="form-control" min="1" value="1" required>
                                <label class="form-label" for="rooms" data-builder-edit="text" data-builder-name="text6" style="margin-left: 0px;">
                                    Number of Rooms
                                </label>
                                <div class="form-notch">
                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                    <div class="form-notch-middle" style="width: 96.8px;"></div>
                                    <div class="form-notch-trailing"></div>
                                </div>
                            </div><!-- Checkbox -->
                            <button type="submit" class="btn btn-primary btn-block mb-4" data-builder-edit="button" data-builder-name="button1" aria-controls="#picker-editor">
                                Book Now
                            </button> <!-- Register buttons -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section draggable="false" class="container pt-5" data-v-271253ee="">
    <section class="mb-10 text-center">
        <h2 class="fw-bold mb-5">
            <span data-builder-edit="text" data-builder-name="text1">
                Velvet Amenities
            </span>
            <u class="text-primary" data-builder-edit="text" data-builder-name="text2"></u>
        </h2>
        <div class="row gx-lg-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                        <img src="Images/swimmingpool.jpg" class="w-100" data-builder-edit="image" data-builder-name="image2" alt="" aria-controls="#picker-editor">
                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                             style="left: 0; bottom: 0">
                            <path fill="#fff" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                            </path>
                        </svg>
                    </div>
                    <div class="card-body"><h5 class="fw-bold" data-builder-edit="text" data-builder-name="text5">
                            Swimming Pool</h5>
                        <p class="text-muted" data-builder-edit="text" data-builder-name="text6">
                            Dive into serenity at our hotel's sparkling swimming pool, where crystal-clear waters and lush surroundings create a tranquil oasis for relaxation and rejuvenation. Whether you're seeking a refreshing morning swim or a leisurely afternoon by the water, our pool provides the perfect escape, blending modern elegance with a touch of tropical paradise.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                        <img src="Images/dining.jpg" class="w-100" data-builder-edit="image" data-builder-name="image2" alt="" aria-controls="#picker-editor">
                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                             style="left: 0; bottom: 0">
                            <path fill="#fff"
                                  d="M0,96L48,128C96,160,192,224,288,240C384,256,480,224,576,213.3C672,203,768,213,864,202.7C960,192,1056,160,1152,128C1248,96,1344,64,1392,48L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                            </path>
                        </svg>
                    </div>
                    <div class="card-body"><h5 class="fw-bold" data-builder-edit="text" data-builder-name="text5">
                            Dining</h5>
                        <p class="text-muted" data-builder-edit="text" data-builder-name="text6">
                            Savor culinary excellence at Velvet Rose's dining haven, where every dish is a masterpiece crafted with passion. Immerse yourself in an ambiance of sophistication, as our culinary artisans blend flavors to create an unforgettable dining experience, promising a symphony for your senses.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                        <img src="Images/board.jpg" class="w-100"
                                data-builder-edit="image" data-builder-name="image3" alt=""
                                aria-controls="#picker-editor">
                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                             style="left: 0; bottom: 0">
                            <path fill="#fff"
                                  d="M0,288L48,256C96,224,192,160,288,160C384,160,480,224,576,213.3C672,203,768,117,864,85.3C960,53,1056,75,1152,69.3C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="card-body"><h5 class="fw-bold" data-builder-edit="text" data-builder-name="text7">Board
                            Room</h5>
                        <p class="text-muted" data-builder-edit="text" data-builder-name="text8">Elevate your meetings at Velvet Rose's boardroom, a perfect blend of sophistication and functionality. Our meticulously designed space ensures executive excellence, providing a refined atmosphere for strategic collaborations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section id="latest" draggable="false" class="container pt-5" data-v-271253ee="">
    <section class="mb-10"><h2 class="fw-bold mb-5 text-center" data-builder-edit="text" data-builder-name="text1">
            Tourist Attractions</h2>
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-4-strong rounded-4 mb-4" data-mdb-ripple-color="light">
                    <a target="new" href="https://brooklynbridgepark.org/?gad_source=1">
                        <img src="Images/bridge.jpg" class="w-100" alt=""
                         data-builder-edit="image" data-builder-name="image1" aria-controls="#picker-editor">
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-md-0"><h3 class="fw-bold" data-builder-edit="text" data-builder-name="text2">
                    Brooklyn's Oasis: Nature Meets Skyline Bliss.</h3>
                <div class="mb-2 text-danger small"><i class="fas fa-globe-americas me-2" data-builder-edit="icon"
                                                       data-builder-name="icon1"
                                                       aria-controls="#picker-editor"></i><span data-builder-edit="text"
                                                                                                data-builder-name="text3">Travels</span>
                </div>
                <p class="text-muted" data-builder-edit="text" data-builder-name="text4">Discover an urban oasis along the iconic Brooklyn waterfront at Brooklyn Bridge Park. Immerse yourself in a breathtaking blend of natural beauty, city skyline views, and vibrant recreational spaces. Our park offers an unparalleled escape, featuring lush greenery, scenic promenades, and diverse activities for all ages. Whether you're seeking a serene stroll, family-friendly fun, or a perfect backdrop for a leisurely afternoon, Brooklyn Bridge Park welcomes you to a dynamic fusion of nature and city life. Join us in creating unforgettable moments against the backdrop of one of the world's most famous bridges. Your adventure begins here, where Brooklyn's charm meets the majesty of the East River.</p></div>
        </div>
        <div class="row gx-lg-5 align-items-center mb-5 flex-lg-row-reverse">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-4-strong rounded-4 mb-4" data-mdb-ripple-color="light">
                    <a target="new" href="https://www.amnh.org/"><img src="Images/americanmuseum.jpg" class="w-100" alt=""
                         data-builder-edit="image" data-builder-name="image2" aria-controls="#picker-editor">
                    </a></div>
            </div>
            <div class="col-md-6 mb-4 mb-md-0"><h3 class="fw-bold" data-builder-edit="text" data-builder-name="text5">
                    Time, Nature, Wonder—Discover it All.</h3>
                <div class="mb-2 text-primary small"><i class="fas fa-palette me-2" data-builder-edit="icon"
                                                        data-builder-name="icon2"
                                                        aria-controls="#picker-editor"></i><span
                            data-builder-edit="text" data-builder-name="text6">Art</span></div>
                <p class="text-muted" data-builder-edit="text" data-builder-name="text7">Embark on a captivating journey through time and nature at the American Museum of Natural History, where curiosity meets discovery. Immerse yourself in the wonders of our planet and beyond with awe-inspiring exhibits, interactive displays, and unparalleled scientific marvels. From ancient civilizations to the mysteries of the cosmos, our museum invites you to explore the extraordinary tapestry of life. Join us on an adventure that transcends boundaries, fuels imagination, and celebrates the beauty of our world. Unearth the past, embrace the present, and ignite your passion for knowledge at the American Museum of Natural History – where every visit is an expedition into the extraordinary.
                </p></div>
        </div>
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="bg-image hover-overlay ripple shadow-4-strong rounded-4 mb-4" data-mdb-ripple-color="light">
                    <a target="new" href="https://www.thewallstreetexperience.com/blog/story-behind-legendary-charging-bull/">
                        <img src="Images/bull.jpg" class="w-100" alt=""
                             data-builder-edit="image" data-builder-name="image3" aria-controls="#picker-editor"></a></div>
            </div>
            <div class="col-md-6 mb-4 mb-md-0"><h3 class="fw-bold" data-builder-edit="text" data-builder-name="text8">
                    Symbolizing Financial Strength: Wall Street's Icon.</h3>
                <div class="mb-2 text-warning small"><i class="fas fa-money-bill me-2" data-builder-edit="icon"
                                                        data-builder-name="icon3"
                                                        aria-controls="#picker-editor"></i><span
                            data-builder-edit="text" data-builder-name="text9">Business</span></div>
                <p class="text-muted" data-builder-edit="text" data-builder-name="text10">
                    Revitalize your spirit amidst the financial heartbeat of Wall Street with our iconic Charging Bull. Immerse yourself in the symbol of strength, resilience, and financial optimism. Explore our website for an immersive experience and discover the inspiration that awaits you at this legendary landmark. Embrace the energy, seize opportunities, and embark on your journey to success.
                </p>

            </div>
        </div>
    </section>
</section>
<section draggable="false" class="container pt-5" data-v-271253ee="">
    <section class="mb-10 text-center text-lg-start"><h2 class="fw-bold mb-5 text-center"><span data-builder-edit="text"
                                                                                                data-builder-name="text1">Trusted by</span><u
                    class="mx-2" data-builder-edit="text" data-builder-name="text2">the best</u><span
                    data-builder-edit="text" data-builder-name="text3">companies</span></h2>
        <div class="row gx-lg-5">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="card mb-3 shadow-2-strong">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5"><img
                                        src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/logo4-1.png"
                                        alt="" class="img-fluid rounded-4 mb-4 mb-lg-0" data-builder-edit="image"
                                        data-builder-name="image1" aria-controls="#picker-editor"></div>
                            <div class="col-lg-7"><h5 class="fw-bold" data-builder-edit="text"
                                                      data-builder-name="text4">Mattle</h5>
                                <ul class="list-unstyled mb-0"><a href="#!" class="px-1 text-muted"> <i
                                                class="fab fa-facebook" data-builder-edit="icon"
                                                data-builder-name="icon1" aria-controls="#picker-editor"></i> </a> <a
                                            href="#!" class="px-1 text-muted"> <i class="fab fa-twitter"
                                                                                  data-builder-edit="icon"
                                                                                  data-builder-name="icon2"
                                                                                  aria-controls="#picker-editor"></i>
                                    </a> <a href="#!" class="px-1 text-muted"> <i class="fab fa-linkedin-in"
                                                                                  data-builder-edit="icon"
                                                                                  data-builder-name="icon3"
                                                                                  aria-controls="#picker-editor"></i>
                                    </a></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card mb-3 shadow-2-strong">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5"><img
                                        src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/logo3-1.png"
                                        alt="" class="img-fluid rounded-4 mb-4 mb-lg-0" data-builder-edit="image"
                                        data-builder-name="image2" aria-controls="#picker-editor"></div>
                            <div class="col-lg-7"><h5 class="fw-bold" data-builder-edit="text"
                                                      data-builder-name="text5">Coutiquee</h5>
                                <ul class="list-unstyled mb-0"><a href="#!" class="px-1 text-muted"> <i
                                                class="fab fa-github" data-builder-edit="icon" data-builder-name="icon4"
                                                aria-controls="#picker-editor"></i> </a> <a href="#!"
                                                                                            class="px-1 text-muted"> <i
                                                class="fab fa-twitter" data-builder-edit="icon"
                                                data-builder-name="icon5" aria-controls="#picker-editor"></i> </a> <a
                                            href="#!" class="px-1 text-muted"> <i class="fab fa-linkedin-in"
                                                                                  data-builder-edit="icon"
                                                                                  data-builder-name="icon6"
                                                                                  aria-controls="#picker-editor"></i>
                                    </a></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card mb-3 shadow-2-strong">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5"><img
                                        src="https://mdbootstrap.com/img/Photos/new-templates/landing-page/logo6-1.png"
                                        alt="" class="img-fluid rounded-4 mb-4 mb-lg-0" data-builder-edit="image"
                                        data-builder-name="image3" aria-controls="#picker-editor"></div>
                            <div class="col-lg-7"><h5 class="fw-bold" data-builder-edit="text"
                                                      data-builder-name="text6">Dingdish</h5>
                                <ul class="list-unstyled mb-0"><a href="#!" class="px-1 text-muted"> <i
                                                class="fab fa-facebook" data-builder-edit="icon"
                                                data-builder-name="icon7" aria-controls="#picker-editor"></i> </a> <a
                                            href="#!" class="px-1 text-muted"> <i class="fab fa-twitter"
                                                                                  data-builder-edit="icon"
                                                                                  data-builder-name="icon8"
                                                                                  aria-controls="#picker-editor"></i>
                                    </a> <a href="#!" class="px-1 text-muted"> <i class="fab fa-linkedin-in"
                                                                                  data-builder-edit="icon"
                                                                                  data-builder-name="icon9"
                                                                                  aria-controls="#picker-editor"></i>
                                    </a></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section draggable="false" class="container pt-5" data-v-271253ee="">
    <section class="mb-10">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0"><h2 class="fw-bold mb-4" data-builder-edit="text"
                                                   data-builder-name="text1">Contact us</h2>
                <p class="text-muted mb-4" data-builder-edit="text" data-builder-name="text2">
                    Indulge in the exquisite offerings at The Velvet Rose hotel, where luxury meets comfort. Enjoy opulent accommodations, world-class dining, and personalized service. Immerse yourself in our state-of-the-art spa, rejuvenate in the pristine swimming pool, and conduct business seamlessly in our sophisticated boardroom. With attention to every detail, The Velvet Rose ensures a stay that transcends expectations, making your experience truly memorable.
                </p>
                <p class="text-muted mb-2" data-builder-edit="text" data-builder-name="text3">Velvet Rose Hotel<br>
                    123 Opulence Lane,<br>
                    Manhattan, New York, NY 10001,<br>
                    United States of America</p>
                <p class="text-muted mb-2" data-builder-edit="text" data-builder-name="text4">+1 (555) 123-4567</p>
                <p class="text-muted mb-2" data-builder-edit="text" data-builder-name="text5">info@velvetrosehotel.com</p></div>
            <div style="max-width:50%;" class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.3549711044534!2d-73.96462882415263!3d40.798192771380705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f6224e9fd003%3A0xf8c200dfb35769dc!2s123%20Manhattan%20Ave%2C%20New%20York%2C%20NY%2010025!5e0!3m2!1sen!2sus!4v1710155438491!5m2!1sen!2sus" width="30" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
                <div class="col-md-6 mb-4 mb-md-0">
                <form action="#"> <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4"><input type="text" id="name_feed" class="form-control" required> <label
                                class="form-label" for="name_feed" data-builder-edit="text"
                                data-builder-name="text6" style="margin-left: 0px;">Name</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 42.4px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div> <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4"><input type="email" id="email_feed" class="form-control" required> <label
                                class="form-label" for="email_feed" data-builder-edit="text"
                                data-builder-name="text7" style="margin-left: 0px;">Email address</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 88.8px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div> <!-- Message input -->
                    <div data-mdb-input-init class="form-outline mb-4"><textarea required class="form-control" id="message_feed"
                                                             rows="8"></textarea> <label class="form-label"
                                                                                         for="message_feed"
                                                                                         data-builder-edit="text"
                                                                                         data-builder-name="text8"
                                                                                         style="margin-left: 0px;">Message</label>
                        <div class="form-notch">
                            <div class="form-notch-leading" style="width: 9px;"></div>
                            <div class="form-notch-middle" style="width: 60px;"></div>
                            <div class="form-notch-trailing"></div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button id="send" class="btn btn-primary btn-block mb-4" data-builder-edit="button"
                            data-builder-name="button1" >Send
                    </button>
                </form>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("send").onclick=function() {
        if(document.getElementById("name_feed").value && document.getElementById("email_feed").value && document.getElementById("message_feed").value)
        {
            Swal.fire({
                title: 'Success!',
                text: 'Your feedback has been sent successfully!',
                icon: 'success',
                confirmButtonText: 'Cool!'
            });
        }
    };

</script>
<script>
    document.getElementById("checkin").onblur=function(){
        var res=(this.value);
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