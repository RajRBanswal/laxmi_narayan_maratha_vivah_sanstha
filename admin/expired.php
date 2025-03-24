<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
    $adId = $_SESSION['admin_id'];
    if (isset($_POST['user_status2'])) {
        $id = $_POST['status_id'];
        $sql = "UPDATE `user_regiter` SET `status`='0' WHERE `id`= '$id' ";
        mysqli_query($conn, $sql);
    }
    if (isset($_POST['user_status1'])) {
        $id = $_POST['status_id'];
        $sql = "UPDATE `user_regiter` SET `status`='1' WHERE `id`= '$id' ";
        mysqli_query($conn, $sql);
    }
    //  delete query
    if (isset($_POST['delete_btn'])) {
        $dltID = $_POST['delete_id'];
        $sql_dlt = "DELETE FROM `user_regiter` WHERE `id`='$dltID'";
        $remove = mysqli_query($conn, $sql_dlt);

        if (mysqli_query($conn, $sql_dlt)) {
?>
            <script>
                alert("Deleted Successfully");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Could not Delete");
            </script>
    <?php
        }
    }
    require("./top_header.php");
    require("./sidebar.php");
    require("./navbar.php");
    ?>

    <div class="mb-4 px-3 py-1 ">
        <!-- Page Heading -->
        <div id="admin" class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center">Users with Expired Membership</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-success">
                            <tr>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Mobile</th>
                                <th>Specification</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Marital Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $today = date("Y-m-d");
                            $res = mysqli_query($conn, "SELECT * FROM `user_regiter`");
                            while ($row = mysqli_fetch_array($res)) {
                                // while ($ro = mysqli_fetch_array($res)) {
                                $expiry = date('Y-m-d', strtotime($row['plan_expiry_date']));
                                // echo $expiry." ".(string)$today."<br>";
                                if ($expiry <= (string)$today) {

                            ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['specialization']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['marStat']; ?></td>
                                        <td class="d-flex"><?php if ($row['status'] == 1) {
                                                                echo '<form action="" method="post">';
                                                                echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                                echo '<button type="submit" name="user_status2" class="btn btn-success mr-3" data-bs-target="#status1' . $row['id'] . '" data-bs-whatever="@status1"><i class="fas fa-check-circle active_btn"></i></button>';
                                                                echo '</form>';
                                                            } else {
                                                                echo '<form action="" method="post">';
                                                                echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                                echo '<button type="submit" name="user_status1" class="btn btn-danger mr-3" data-bs-target="#status2' . $row['id'] . '" data-bs-whatever="@status2"><i class="fas fa-exclamation-circle deactive_btn"></i></button>';
                                                                echo '</form>';
                                                            } ?>
                                            <button type="button" name="view_user" class="btn btn-warning mr-3" data-bs-toggle="modal" data-bs-target="#view_ex_user<?php echo $row['id']; ?>" data-bs-whatever="@view"><i class="fas fa-eye"></i></button>
                                            <button type="button" name="delete_user" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delet_expireduser_modal<?php echo $row['id']; ?>" data-bs-whatever="@delet"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <!-- ---------view users ----------- -->
                                    <div class="modal fade" id="view_ex_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <form method="POST" action="">
                                                <!-- Modal User Profile View -->
                                                <div class="modal-content">
                                                    <div class="modal-header card-header ">
                                                        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body " style="padding: 2rem;">
                                                        <div class="row" style="line-height: 2;">
                                                            <div class="col-md-4">
                                                                <div class="text-center">
                                                                    <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="../user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                <b>Name :</b> <?php echo $row['name']; ?><br>
                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                <b>Country :</b> <?php echo $row['country']; ?><br>
                                                                <b>State :</b> <?php echo $row['state']; ?><br>
                                                                <b>City :</b> <?php echo $row['city']; ?><br>
                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                <?php
                                                                // $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                // if ($res) {
                                                                ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                <?php
                                                                // }
                                                                ?>
                                                            </div>
                                                            <!-- </ul> -->

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                        <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!--end Modal User Profile View -->
                                            </form>
                                        </div>
                                    </div>
                                    <!------------ Modal delete ------------------>
                                    <div class="modal fade" id="delet_expireduser_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="example">Confirm To Delete User?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="modal-body">
                                                        Do You Really Want to Delete this User?
                                                        <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end Modal delete -->
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Active</button> -->
                </div>
            </div>
        </div>
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

<?php
    include 'panelFooter.php';
} else {
    header("location:index.php");
}
?>