<?php
include 'dbconn.php';
if (isset($_POST['sendLink'])) {

    $username = $_POST['otpMob'];
    $sql = "SELECT * FROM  `admin` where `email`='$username' ";
    if ($sql) {
?>
        <script>
            $('exists').style.display = (block);
            $('dsntExist').style.display = (none);
        </script>
    <?php
    } else {
    ?>
        <script>
            $('exists').style.display = (none);
            $('dsntExist').style.display = (block);
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

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styleAdmin.css" rel="stylesheet">

    <!-- favicon icon -->
    <!--<link rel="shortcut icon" href="./img/logon.png" type="image/x-icon">-->
    <link rel="icon" href="./img/logo.png" type="image/x-icon">

    <style>
        .login-img-name {
            height: auto;
        }

        .shadow-lg {
            box-shadow: 0 0 5px #000 !important;
        }

        .btn-primary1 {
            color: #fff;
            background-color: #e91a7f;
            border-color: #e91a7f;
        }

        .btn-primary1:hover {
            color: #fff;
            background-color: #f560a6;
            ;
        }

        #togglePassword {
            cursor: pointer;
            margin-top: -33px;
            float: right;
            margin-right: 25px;
        }
    </style>
</head>

<body class="">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 58px;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block p-4">
                                <img src="./img/logo.png" width="100%" class="login-img-name" alt="...">
                                <h2 class="text-primary fw-bold mb-0">
                                    लक्ष्मी नारायण <span style="color:#ff83cd">मराठा</span> <span class="text-success">विवाह संस्था </span>
                                </h2>
                            </div>
                            <div class="col-lg-6 border">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="login.php">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user" id="InputEmail" placeholder="Enter Email or Mobile no...." required>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user" id="InputPassword" placeholder="Password" required>
                                            <i class="fa fa-eye" id="togglePassword" style=""></i>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="admin_Login" class="btn btn-primary1 btn-user btn-block" id="admin_login_btn"> Login</button>
                                    </form>
                                    <hr>
                                    <!-- <div class="row">
                                        <div class="text-center col-lg-6 col-12">
                                            <a class="small" data-toggle="modal" data-target="#enterEmail">Forgot Password?</a>
                                        </div>
                                        <div class="text-center col-lg-6 col-12">
                                            <?php
                                            // $admTwo = mysqli_query($conn, "SELECT * FROM `admin`");
                                            // $rowCount = mysqli_num_rows($admTwo);
                                            // if ($rowCount < 2) {
                                            ?>
                                                <a class="small" href="admin_register.php">Create an Account!</a>
                                            <?php // } ?>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shubhangi.shinde1501@gmail.com -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#InputPassword');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="enterEmail" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Varification</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" type="text" id="otpMob" name="otpMob" placeholder="Enter a Valid Mobile Number" required>
                            <!-- <p id="result"></p> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="forget-password.php"></a><button type="button" type="submit" name="sendLink" class="btn btn-warning">Send link</button>
                    <!-- <button type="button" href="login-page.php" class="btn btn-success">Go Back</button> -->
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