
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
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
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<body>
<!--Main Navigation-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
                <strong>Hotel</strong>
            </a>
            <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#intro">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow"
                           target="_blank">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Attractions</a>
                    </li>
                </ul>

                <ul class="navbar-nav d-flex flex-row">

                    <button data-mdb-ripple-init="" type="button" class="btn btn-outline-light me-3">
                        Book now
                    </button>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="col-md-6 mb-4 mb-md-0">
        <form action="#"> <!-- Name input -->
            <div class="form-outline mb-4"><input type="text" id="name_feed" class="form-control" required> <label
                        class="form-label" for="name_feed" data-builder-edit="text"
                        data-builder-name="text6" style="margin-left: 0px;">Name</label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 42.4px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div> <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4"><input type="email" id="email_feed" class="form-control" required/> <label
                        class="form-label" for="email_feed" data-builder-edit="text"
                        data-builder-name="text7" style="margin-left: 0px;">Email address</label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div> <!-- Message input -->
        </form>
    </div>
    </div>
<form>
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" id="form1Example1" class="form-control" />
        <label class="form-label" for="form1Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="form1Example2" class="form-control" />
        <label class="form-label" for="form1Example2">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
        </div>

        <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
        </div>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("send").onclick=function() {
            if(document.getElementById("name_feed").value && document.getElementById("email_feed").value && document.getElementById("message_feed").value) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your feedback has been sent successfully!',
                    icon: 'success',
                    confirmButtonText: 'Cool!'
                });
            }
            else{

            }
        };

    </script>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
</body>
</html>




