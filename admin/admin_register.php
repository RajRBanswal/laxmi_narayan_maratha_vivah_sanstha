<?php

include 'dbconn.php';

if (isset($_POST['ad_register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql2 = "INSERT INTO `admin`( `name`, `email`, `mobile`, `password`) VALUES ('$name','$email','$mobile','$password')";


    if (mysqli_query($conn, $sql2)) {

?>
        <script>
            alert('Admin Registered');
            window.location.href = 'index.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Admin could Not be Register');
            window.location.href = 'admin_register.php';
        </script>
<?php
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styleAdmin.css" rel="stylesheet">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="./img/logon.png" type="image/x-icon">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- <div class="card-body p-0"> -->
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <!--<img class=" login-img-logo" src="../images/GoldenWClogo003.png" alt="">-->
                    <img class="login-img-name" src="../images/wonderfull_logo.png" alt="">
                </div>
                <div class="col-lg-6">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="" class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="InputEmail">Full Name<span class="text-danger">*</span></label>

                                    <input name="name" type="text" class="form-control form-control-user" id="name" placeholder="Full Name" required>
                                </div>
                                <div class="col-sm-6">
                                <label for="InputEmail">E-Mail<span class="text-danger">*</span></label>

                                    <input name="email" type="email" class="form-control form-control-user" id="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="InputEmail">Mobile<span class="text-danger">*</span></label>

                                <input name="mobile" type="tel" class="form-control form-control-user" id="mobile" placeholder="Mobile" required>
                            </div>
                            <div class="form-group">
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                <label for="InputPassword">Password<span class="text-danger">*</span></label>

                                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                <!-- </div> -->
                                <!-- <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div> -->
                            </div>
                            <button type="submit" name="ad_register" href="index.php" class="btn btn-primary btn-user btn-block" id="submitbtn">Register Account</button>
                        </form>
                        <hr>                    
                        <div class="text-center">
                            <a class="small" href="index.php">Already have an account? Login!</a>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>