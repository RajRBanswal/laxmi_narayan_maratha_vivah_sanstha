<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
    $adId = $_SESSION['admin_id'];
    $timehours = date("h:i");
    if ($timehours == '09:00') {
        $date = date("Y-m-d");
        $exdate = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `status`=1");
        while ($exrow = mysqli_fetch_array($exdate)) {
            // echo $date;
            if ($exrow['plan_expiry_date'] <= $date && $exrow['plan_expiry_date'] != NULL) {
                $id = $exrow['id'];
                $exupdate = mysqli_query($conn, "UPDATE `user_regiter` SET `payment_status`='0',`plan_duration`='',`type_plan`='Free', `label`='other',`plan_price`='0',`type_plan_id`='0',`plan_expiry_date`=NULL,`visible_prof`='' WHERE `id`='$id'");
                if ($exupdate) {

                    header("location:./adminDashboard.php");
                }
            }
        }
    }
    require("./top_header.php");
    require("./sidebar.php");
    require("./navbar.php");
?>
    <style>
        .admin_d_count .card {
            margin: 10px 0px !important;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            background: #fff;
        }
        .shadow1 {
            box-shadow: 0px 0px 2px #d9d9d9 !important;
        }

        .card-header {
            padding: .5rem .5rem !important;
        }

        #wrapper #content-wrapper {
            background-color: #fff !important;
        }
    </style>

    <div class="container">

        <div class="row admin_d_count">
            <div class=" col-md-12 mb-4 ">
                <div class="card shadow1 py-3">
                    <?php
                    $sql2 = "SELECT * FROM `user_regiter` WHERE `status` = 1 ";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    ?>
                    <div class="">
                        <h5 class="m-0 font-weight-bold  text-lg text-center">Search Users</h5>
                    </div>
                    <div class="card-body">
                        <form action="users.php" method="POST">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <label for="" class="">Date from:</label>
                                    <input type="date" class="form-control" id="birthday" name="form_date">
                                </div>
                                <div class="col-lg-4 col-12">
                                    <label for="" class="">Date to:</label>
                                    <input type="date" class="form-control" id="birthday" name="to_date">
                                </div>
                                <div class="col-lg-2 col-12">
                                    <button type="submit" class="btn btn-info" style="margin-top: 30px;">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Profil card -->
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $sql = "SELECT * FROM `user_regiter`";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Total Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="users.php#pills-allUser" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $date = Date("Y-m-d");
                    // echo $date;
                    $res = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `created_at` = '$date'");
                    $cnt = mysqli_num_rows($res);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Today's Register</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $cnt; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="verify_users.php" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $sql2 = "SELECT * FROM `user_regiter` WHERE `status` = 1 ";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Active Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count2; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="users.php?user_active=user_active" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $sql3 = "SELECT * FROM `user_regiter` WHERE `status` = 0";
                    $result3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($result3);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Deactive Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count3; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="users.php?user_deactive_tab=user_deactive_tab" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $sql4 = "SELECT * FROM `user_regiter` WHERE `gender` = 'Female'";
                    $result4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($result4);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Female Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count4; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="users.php?user_female_tab=user_female_tab" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $sql5 = "SELECT * FROM `user_regiter` WHERE `gender` = 'Male'";
                    $result5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($result5);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Male Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count5; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="users.php?user_male_tab=user_male_tab" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `success_story`");
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Married Users</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="AddSuccessStory.php" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `inquiry`");
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Contacts/Inquiry</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="inquiry.php" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `type_plan` = 'Free'");
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Free Members</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="plan_paid_free_users.php?free_user=free_user" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card shadow1">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `plan_price` != 'Free'");
                    $count = mysqli_num_rows($res);
                    ?>
                    <div class="card-header bg-pink text-white py-2">
                        <p class="m-0 font-weight-bold text-center">Paid Members</p>
                    </div>
                    <div class="card-body">
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <p class="font-weight-bold"><?php echo $count; ?></p>
                        </div>
                        <div class="text-lg text-center text-dark" style="margin: -10px;">
                            <a href="plan_paid_free_users.php?paid_user=paid_user" class="text-primary">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow1">
                    <?php
                    $today = date("Y-m-d");
                    $res = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `plan_expiry_date` <= '$today'");
                    $count = mysqli_num_rows($res);
                    ?>
                    <a href="expired.php">
                        <div class="card-header bg-pink text-white py-2">
                            <p class="m-0 font-weight-bold text-center">Expired Membership</p>
                        </div>
                        <div class="card-body">
                            <div class="text-lg text-center text-dark" style="margin: -10px;">
                                <p class="font-weight-bold"><?php echo $count; ?></p>
                            </div>
                            <div class="text-lg text-center text-dark" style="margin: -10px;">
                                <a href="plan_paid_free_users.php?plan_expire_user=plan_expire_user" class="text-primary">View All</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- Content Row -->
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabuserDashboard="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        setInterval(function() {
            window.location.reload();
        }, 5 * 60000);
    </script>
<?php
    include 'panelFooter.php';
} else {
    header("location:index.php");
}
?>