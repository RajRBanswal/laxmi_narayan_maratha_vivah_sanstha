<?php
$url = "$_SERVER[REQUEST_URI]";
$actual_link = urldecode($url);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laxmi Narayan Maratha Vivah Sanstha</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:wght@400;500;600&family=Petit+Formal+Script&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

</head>

<body data-bs-spy="scroll" data-bs-target="#navBar" id="weddingHome">

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <header class="top-header">
        <div class="container py-lg-1 py-2">
            <div class="row align-items-center">
                <div class="col-lg-3 col-12 text-center text-lg-start">
                    <p class="mb-0"><i class="fa fa-phone"></i> +91-9881749829</p>
                </div>
                <div class="col-lg-5 col-12 text-center text-lg-end mt-lg-0 mt-1">
                    <p class="mb-0 fs-4">Laxmi Narayan Maratha Vivah Sanstha</p>
                </div>

                <div class="col-lg-4 col-12 text-center text-lg-end mt-lg-0 mt-1">
                    <p class="owner_name mb-0">प्रो. प्रा. ऋषिकेश राजकुमार गुंजाळ (BE)</p>
                </div>
            </div>
        </div>
    </header>


    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="px-5">
            <nav class="navbar navbar-light navbar-expand-xl" id="navBar">
                <a href="index.html" class="navbar-brand text-center">
                    <img src="./img/logo.png" alt="" srcset="">
                    <!-- लक्ष्मी नारायण मराठा विवाह संस्था -->
                    <p class="text-primary fw-bold mb-0">
                        लक्ष्मी नारायण <br>मराठा <br>विवाह संस्था
                    </p>
                    <!-- <p class="text-primary fw-bold mb-0">
                            लक्ष्मी नारायण <br><span style="color:#ff83cd">मराठा</span> <br> <span class="text-success">विवाह संस्था </span>
                        </p> -->
                    <!-- <p class="text-primary fw-bold mb-0">
                            Laxmi Narayan <br><span style="color:#ff83cd">Maratha</span> <br> <span class="text-success">Vivah Sanstha </span>
                        </p> -->
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                    <div class="navbar-nav ms-auto border-top">
                        <a href="./index.php" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/index.php' ? 'active' : ''; ?>">Home</a>
                        <a href="./about.php" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/about.php' ? 'active' : ''; ?>">About</a>
                        <a href="./view_members.php?name=Unmarried Grooms" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/view_members.php?name=Unmarried Grooms' ? 'active' : ''; ?>">Unmarried Grooms</a>
                        <a href="./view_members.php?name=Unmarried Brides" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/view_members.php?name=Unmarried Brides' ? 'active' : ''; ?>">Unmarried Brides</a>
                        <a href="./view_members.php?name=Divorcee Grooms" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/view_members.php?name=Divorcee Grooms' ? 'active' : ''; ?>">Divorcee Grooms</a>
                        <a href="./view_members.php?name=Divorcee Brides" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/view_members.php?name=Divorcee Brides' ? 'active' : ''; ?>">Divorcee Brides</a>
                        <a href="./contact.php" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/contact.php' ? 'active' : ''; ?>">Contact</a>
                        <?php if (isset($_SESSION['userName'])) { ?>
                            <a href="./user_dashboard.php" class="nav-item nav-link active"><?php echo $_SESSION['userName']; ?></a>
                        <?php } else { ?>
                            <a href="./login.php" class="nav-item nav-link <?php echo $actual_link == '/LaxmiNarayanMarathaVivahSanstha/login.php' ? 'active' : ''; ?>">Login</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->