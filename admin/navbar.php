<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <?php $adminsprofile = mysqli_query($conn, "SELECT * FROM `admin` WHERE `id` = $adId ");
    $adminsprofiledata = mysqli_fetch_array($adminsprofile) ?>
    <!-- Main Content -->
    <div id="content">
        <nav class="navbar navbar-expand navbar-light topbar mb-3 static-top shadow" style="background-color: #001d70 !important;">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

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
                        <span class="mr-2 text-white fs-5"> <?php $adminName = mysqli_query($conn, "SELECT * FROM `admin` WHERE  `id` = $adId ");
                                                            while ($adminData = mysqli_fetch_array($adminName)) {
                                                                echo ucfirst($adminData['name']);
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
                        <!--<b class="bold_title">Name :</b> <?php echo $adminsprofiledata['name']; ?><br>-->
                        <b class="bold_title">E-mail :</b> <?php echo $adminsprofiledata['email']; ?><br>
                        <b class="bold_title">Phone Number :</b> <?php echo $adminsprofiledata['mobile']; ?><br>
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
                                        <input class="form-control" type="text" id="adName" name="name" value="<?php echo  ucwords($adminsprofiledata['name']); ?>" placeholder="<?php echo  ucwords($adminsprofiledata['name']); ?>">
                                        <p id="name"></p>
                                    </div>
                                </div>
                                <div class="mt-0 col-md-4">
                                    <div class="form-group">
                                        <label>Your Email </label>
                                        <input class="form-control" type="text" id="adMail" name="email" value="<?php echo  $adminsprofiledata['email']; ?>" placeholder="<?php echo  $adminsprofiledata['email']; ?>">
                                        <p id="name"></p>
                                    </div>
                                </div>
                                <div class="mt-0 col-md-4">
                                    <div class="form-group">
                                        <label>Your Mobile no. </label>
                                        <input class="form-control" type="text" id="adMob" name="mobile" value="<?php echo $adminsprofiledata['mobile']; ?>" placeholder="<?php echo  $adminsprofiledata['mobile']; ?>">
                                        <p id="name"></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input name="edit_P" type="hidden" class="form-control" id="edit_P" value="<?php echo $adminsprofiledata['id']; ?>">

                                    <button name="updateProfile" type="submit" class="btn btn-warning" id="updt_btn">Update</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end Modal update -->
                </form>

            </div>
        </div>