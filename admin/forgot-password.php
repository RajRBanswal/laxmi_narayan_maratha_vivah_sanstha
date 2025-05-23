<?php
include "dbconn.php";
if (isset($_POST['reset'])) {
    $mail = $_POST['email'];
    $psswd = $_POST['psswd'];
    $cnfPsswd = $_POST['cnfPsswd'];
    $sql = mysqli_query($conn, "SELECT * FROM `admin` where `email`='$mail' ");
    $row = mysqli_fetch_array($sql);
    if ($sql) {
        if ($row['email'] == $mail) {
            $updt = mysqli_query($conn, "UPDATE `admin` SET `password` = '$psswd'");
            if ($updt) {
                echo "alert('You can now login with your new password');";
            } else {
                echo "alert('There was a Problem, Please try again');";
            }
        }
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

    <title>Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styleAdmin.css" rel="stylesheet">
<!-- favicon -->
<link rel="shortcut icon" href="./img/logon.png" type="image/x-icon">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                                <img class=" login-img-logo" src="../images/GoldenWClogo003.png" alt="">
                                <img class=" login-img-name" src="../images/Golden WC logo 004.png" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="E-Mail">
                                        </div>
                                        <div class="form-group" id="psswdhide">
                                            <label class="control-label" for="email">Password</label>
                                            <input id="psswd" name="psswd" type="" class="form-control input-md form-control-user" required>
                                        </div>
                                        <div class="form-group"  id="cnfpsswdhide">
                                            <label class="control-label" for="email">Confirm Password</label>
                                            <input id="cnfPsswd" name="cnfPsswd" type="" class="form-control input-md form-control-user" required>
                                        </div>
                                        <a href="" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="admin_register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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