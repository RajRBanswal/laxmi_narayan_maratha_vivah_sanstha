<?php

session_start();
include 'dbconn.php';

if (isset($_GET['free_user'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-FreeUser-tab").click();
    }
  </script>
<?php } else if (isset($_GET['paid_user'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-PaidUsers-tab").click();
    }
  </script>
<?php } else if (isset($_GET['plan_expire_user'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-PlanExpUsers-tab").click();
    }
  </script>
<?php }


if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  require("./top_header.php");
  require("./sidebar.php");
  require("./navbar.php");
?>

  <div class="mb-4 px-3 py-1 ">
    <!-- Profil card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary ">Plan Purchase history</h4>
      </div>
      <div id="admin" class="card-body">
        <nav>
          <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
            <li class="nav-item userTab " role="presentation">
              <button class="nav-link coral-green active" id="pills-PaidUsers-tab" data-bs-toggle="pill" data-bs-target="#pills-PaidUsers" type="button" role="tab" aria-controls="pills-PaidUsers" aria-selected="false">Paid Users</button>
            </li>
            <li class="nav-item userTab " role="presentation">
              <button class="nav-link coral-green" id="pills-PlanExpUsers-tab" data-bs-toggle="pill" data-bs-target="#pills-PlanExpUsers" type="button" role="tab" aria-controls="pills-PlanExpUsers" aria-selected="false">Plan Expired Users</button>
            </li>

          </ul>
          <div class="tab-content bg-light" id="pills-tabContent">
            <!-- -------------Paid users tab--------------- -->
            <div class="tab-pane fade show active" id="pills-PaidUsers" role="tabpanel" aria-labelledby="pills-PaidUsers-tab">
              <div>
                <?php
                $sql = "SELECT * FROM `user_regiter` WHERE `status` = '1'";
                ?>
                <div class="row ">
                  <!-- Profil card -->
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead class="table-success">
                            <tr>
                              <th>Name</th>
                              <th>E-Mail</th>
                              <th>Mobile</th>
                              <th>Gender</th>
                              <th>Plan</th>
                              <th>Duration</th>
                              <th>Plan Expiry Date</th>
                              <th>Marital Status</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql_plan = "SELECT * FROM `user_regiter` WHERE `type_plan`!='Free' AND `status` = '1'";
                            $result = mysqli_query($conn, $sql_plan);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                              <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td style="font-weight:bold"><?php echo $row['type_plan']; ?></td>
                                <td style="font-weight:bold"><?php echo $row['plan_duration'] . " Months"; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($row['plan_expiry_date'])); ?></td>
                                <td><?php echo $row['marStat']; ?></td>
                                <td class="d-flex"><?php if ($row['status'] == 1) {
                                                      echo '<form action="" method="post">';
                                                      echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                      echo '<button type="submit" name="user_status2" class="btn btn-success btn-sm mr-3" data-bs-target="#status1' . $row['id'] . '" data-bs-whatever="@status1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"><i class="fas fa-check-circle active_btn"></i></button>';
                                                      echo '</form>';
                                                    } else {
                                                      echo '<form action="" method="post">';
                                                      echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                      echo '<button type="submit" name="user_status1" class="btn btn-danger btn-sm mr-3" data-bs-target="#status2' . $row['id'] . '" data-bs-whatever="@status2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive"><i class="fas fa-exclamation-circle deactive_btn"></i></button>';
                                                      echo '</form>';
                                                    } ?>
                                  <button type="button" name="view_user" class="btn btn-warning btn-sm mr-3" data-bs-toggle="modal" data-bs-target="#view_active_user<?php echo $row['id']; ?>" data-bs-whatever="@view" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"><i class="fas fa-eye"></i></button>
                                </td>
                              </tr>
                              <!-- ---------view users ----------- -->
                              <div class="modal fade" id="view_active_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                  <form method="POST" action="">
                                    <!-- Modal User Profile View -->
                                    <div class="modal-content">
                                      <div class="modal-header card-header ">
                                        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body " style="padding: 2rem;">
                                        <!-- Begin Page Content -->
                                        <!-- <div class="container-fluid"> -->
                                        <!-- Page Heading -->
                                        <div class="row card shadow mb-4">
                                          <!-- Profil card -->
                                          <!-- <div class="card shadow mb-4"> -->
                                          <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                          </div>
                                          <div class="card-body col-lmd-12">
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
                                                <?php
                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                ?>
                                                  <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php
                                                }
                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                ?>
                                                  <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php  }
                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                  // echo $row['city'];
                                                ?>
                                                  <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php  } ?>
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
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                  <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                              </div>
                                              <!-- </ul> -->
                                            </div>
                                          </div>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <div class="modal-footer">
                                          <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                          <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                    <!--end Modal User Profile View -->
                                  </form>
                                </div>
                              </div>
                            <?php  } ?>
                          </tbody>
                        </table>
                        <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Active</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------end of paid users tab--------------- -->
            <!-- -------------Expire Plan users tab--------------- -->
            <div class="tab-pane fade" id="pills-PlanExpUsers" role="tabpanel" aria-labelledby="pills-PlanExpUsers-tab">
              <div>
                <?php

                $sql = "SELECT * FROM `user_regiter` WHERE `status` = '1'";
                ?>
                <div class="row ">
                  <!-- Profil card -->
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead class="table-success">
                            <tr>
                              <th>Name</th>
                              <th>E-Mail</th>
                              <th>Mobile</th>
                              <th>Gender</th>
                              <th>Plan</th>
                              <th>Duration</th>
                              <th>Plan Expiry Date</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $today = date("Y-m-d");
                            $sql_plan = "SELECT * FROM `user_regiter` WHERE `type_plan`!='Free' AND `plan_expiry_date` < '$today'";
                            $result = mysqli_query($conn, $sql_plan);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                              <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['type_plan']; ?></td>
                                <td style="font-weight:bold"><?php echo $row['plan_duration'] . " Months"; ?></td>
                                <td style="font-weight:bold"><?php echo date("d-m-Y", strtotime($row['plan_expiry_date'])); ?></td>
                                <td class="d-flex"><?php if ($row['status'] == 1) {
                                                      echo '<form action="" method="post">';
                                                      echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                      echo '<button type="submit" name="user_status2" class="btn btn-success btn-sm mr-3" data-bs-target="#status1' . $row['id'] . '" data-bs-whatever="@status1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"><i class="fas fa-check-circle active_btn"></i></button>';
                                                      echo '</form>';
                                                    } else {
                                                      echo '<form action="" method="post">';
                                                      echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                                      echo '<button type="submit" name="user_status1" class="btn btn-danger btn-sm mr-3" data-bs-target="#status2' . $row['id'] . '" data-bs-whatever="@status2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive"><i class="fas fa-exclamation-circle deactive_btn"></i></button>';
                                                      echo '</form>';
                                                    } ?>
                                  <button type="button" name="view_user" class="btn btn-warning btn-sm mr-3" data-bs-toggle="modal" data-bs-target="#view_active_user<?php echo $row['id']; ?>" data-bs-whatever="@view" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"><i class="fas fa-eye"></i></button>
                                  <!--<button type="button" name="delete_user" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delet_actuser_modal<?php echo $row['id']; ?>" data-bs-whatever="@delet"><i class="fas fa-trash-alt"></i></button>-->
                                </td>
                              </tr>
                              <!-- ---------view users ----------- -->
                              <div class="modal fade" id="view_active_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                  <form method="POST" action="">
                                    <!-- Modal User Profile View -->
                                    <div class="modal-content">
                                      <div class="modal-header card-header ">
                                        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body " style="padding: 2rem;">
                                        <!-- Begin Page Content -->
                                        <!-- Page Heading -->
                                        <div class="row card shadow mb-4">
                                          <!-- Profil card -->
                                          <!-- <div class="card shadow mb-4"> -->
                                          <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                          </div>
                                          <div class="card-body col-lmd-12">
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
                                                <?php
                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                ?>
                                                  <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php
                                                }
                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                ?>
                                                  <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php  }
                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                $resultid = mysqli_query($conn, $sql1);
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                  // echo $row['city'];
                                                ?>
                                                  <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                <?php  } ?>
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
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                  <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                              </div>
                                              <!-- </ul> -->
                                            </div>
                                          </div>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <div class="modal-footer">
                                          <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                          <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                    <!--end Modal User Profile View -->
                                  </form>
                                </div>
                              </div>
                              <!------------ Modal delete ------------------>
                              <div class="modal fade" id="delet_actuser_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
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
                                        <button name="delete_btn" type="submit" class="btn btn-danger btn-sm" id="dlt_btn">Confirm</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!--end Modal delete -->
                            <?php  } ?>
                          </tbody>
                        </table>
                        <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Active</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------end of Expire Plan users tab--------------- -->
          </div>
        </nav>
      </div>
    </div>
  </div>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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