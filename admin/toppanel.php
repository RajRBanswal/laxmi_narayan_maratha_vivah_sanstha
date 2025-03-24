<?php
include 'dbconn.php';
$adId = $_SESSION['admin_id'];
if (isset($adId)) {
    $result = mysqli_query($conn, "SELECT * FROM `admin` where `id` = $adId ");
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!--font awesome icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- favicon icon -->
            <!--<link rel="icon" href="./img/logon.png" type="image/x-icon">-->
            <link rel="icon" href="./img/logo.png" type="image/x-icon">

            <!-- Custom styles for this template-->
            <link href="css/styleAdmin.css" rel="stylesheet">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@400;800&family=Baloo+2:wght@400;800&family=Lora:wght@400;700&family=Noto+Serif+Khojki:wght@400;700&display=swap" rel="stylesheet">

        </head>

        <body>

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-dark border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - Admin Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php $adminName = mysqli_query($conn, "SELECT * FROM `admin` WHERE  `id` = $adId ");
                                                                                        while (mysqli_fetch_array($adminName)) {
                                                                                            echo ucfirst($row['name']);
                                                                                        }   ?>
                            </span>
                            <img class="img-profile rounded-circle" src="img/admin.png">
                        </a>
                        <!-- Dropdown - Admin Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="adminDropdown">
                            <a class="dropdown-item" data-toggle="modal" data-target="#adminModal">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Admin Profile
                            </a>
                            <a class="dropdown-item" href="./adminDashboard.php">
                                <i class="fa-solid fa-house-chimney fa-sm fa-fw mr-2 text-gray-400"></i>
                                Admin Dashboard
                            </a>
                            <a class="dropdown-item" data-toggle="modal" data-target=".updtAdminDetailModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Update Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- ----------------admin profile popup -->
            <div class="modal fade" id="adminModal" tabuserDashboard="-1" role="dialog" aria-labelledby="adminModaltitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adminModaltitle">Admin Profile</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--<b class="bold_title">Name :</b> <?php echo $row['name']; ?><br>-->
                            <b class="bold_title">E-mail :</b> <?php echo $row['email']; ?><br>
                            <b class="bold_title">Phone Number :</b> <?php echo $row['mobile']; ?><br>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <!-- <a class="btn btn-primary" href="logout.php">Logout</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------update model ----------------------- -->
            <?php
            if (isset($_POST['updateProfile'])) {
                $name = $_POST['name'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $editP = $_POST['edit_P'];

                $sql = mysqli_query($conn, "UPDATE `admin` SET `name` = '$name' ,`email`='$email',`mobile`='$mobile' where `id` = '$editP' ");
            }
            ?>
            <div class="modal fade updtAdminDetailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="">
                        <!-- Modal update -->
                        <div class="modal-content">
                            <div class="modal-header card-header ">
                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body " style="padding: 2rem;">
                                <div class="row">
                                    <div class="mt-0 col-md-4">
                                        <div class="form-group">
                                            <label>Your Name </label>
                                            <input class="form-control" type="text" id="adName" name="name" value="<?php echo  ucwords($row['name']); ?>" placeholder="<?php echo  ucwords($row['name']); ?>">
                                            <p id="name"></p>
                                        </div>
                                    </div>
                                    <div class="mt-0 col-md-4">
                                        <div class="form-group">
                                            <label>Your Email </label>
                                            <input class="form-control" type="text" id="adMail" name="email" value="<?php echo  $row['email']; ?>" placeholder="<?php echo  $row['email']; ?>">
                                            <p id="name"></p>
                                        </div>
                                    </div>
                                    <div class="mt-0 col-md-4">
                                        <div class="form-group">
                                            <label>Your Mobile no. </label>
                                            <input class="form-control" type="text" id="adMob" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="<?php echo  $row['mobile']; ?>">
                                            <p id="name"></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input name="edit_P" type="hidden" class="form-control" id="edit_P" value="<?php echo $row['id']; ?>">

                                        <button name="updateProfile" type="submit" class="btn btn-warning" id="updt_btn">Update</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end Modal update -->
                    </form>
                <?php }
                ?>

                </div>
            </div>
        </body>

        </html>
    <?php }
    ?>