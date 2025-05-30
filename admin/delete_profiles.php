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

  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    // $sql_dlt = "DELETE FROM `user_regiter` WHERE `id`='$dltID'";
    $sql_dlt = "UPDATE `user_regiter` SET `deleted_profile`='0' WHERE `id`= '$dltID' ";
    $remove = mysqli_query($conn, $sql_dlt);

    if (mysqli_query($conn, $sql_dlt)) {
    ?>
      <script>
        alert("Restore Successfully");
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Could not Restore");
      </script>
  <?php
    }
  }
  require("./top_header.php");
  require("./sidebar.php");
  require("./navbar.php");
  ?>

  <div class="mb-4 px-3 py-1 ">
    <!-- Profil card -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <form action="users.php" method="POST">
            <div class="row">
              <div class="form-group col-lg-3">
                <label for="" class="text-dark">Date from:</label>
                <input type="date" class="form-control" id="birthday" name="form_date">
              </div>
              <div class="form-group col-lg-3">
                <label for="" class="text-dark">Date to:</label>
                <input type="date" class="form-control" id="birthday" name="to_date">
              </div>
              <div class="form-group col-lg-2">
                <button type="submit" class="btn btn-info " style="margin-top:32px;">Search</button>
              </div>
            </div>
          </form>

          <button type="button" id="export_excel" class="btn btn-primary" onclick="download_to_excel()">Excel</button>
          <table class="table table-bordered dataTables" data-order='[[ 0, "desc" ]]' id="dataTable" width="100%" cellspacing="0">
            <thead class="table-success">
              <tr>
                <th data-class-name="priority">Registration Date</th>
                <th>M_ID</th>
                <th>Name</th>
                <!--<th>E-Mail</th>-->
                <th>Mobile</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Profession</th>
                <th>Docs</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              // if(isset($_POST['form_date']) || isset($_POST['to_date'])){
              //     $to_date = $_POST['to_date'];
              //     $form_date = $_POST['form_date'];
              //     $sql_plan = "SELECT * FROM `user_regiter` WHERE `created_at` BETWEEN '$form_date' AND '$to_date' ORDER BY id DESC";
              // }else{
              $sql_plan = "SELECT * FROM `user_regiter` WHERE `deleted_profile`=1 ORDER BY id DESC";
              // }


              $result = mysqli_query($conn, $sql_plan);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['member_id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <!--<td><?php //echo $row['email']; 
                          ?></td>-->
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['prof']; ?></td>
                  <td><button type="button" name="view_doc" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#documents<?php echo $row['id']; ?>" data-bs-whatever="@documents_view" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Document"><i class="fa fa-file-archive" aria-hidden="true"></i></button></td>
                  <td class="d-flex"><?php if ($row['status'] == 1) {
                                        echo '<form action="" method="post">';
                                        echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                        echo '<button type="submit" name="user_status2" class="btn btn-sm btn-success mr-1" data-bs-target="#status1' . $row['id'] . '" data-bs-whatever="@status1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active"><i class="fas fa-check-circle active_btn"></i></button>';
                                        echo '</form>';
                                      } else {
                                        echo '<form action="" method="post">';
                                        echo '<input type="hidden" name="status_id" value="' . $row['id'] . '">';
                                        echo '<button type="submit" name="user_status1" class="btn btn-sm btn-danger mr-1" data-bs-target="#status2' . $row['id'] . '" data-bs-whatever="@status2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deactive"><i class="fas fa-exclamation-circle deactive_btn"></i></button>';
                                        echo '</form>';
                                      } ?>
                    <button type="button" name="view_user" class="btn btn-sm btn-warning mr-1" data-bs-toggle="modal" data-bs-target="#view_user<?php echo $row['id']; ?>" data-bs-whatever="@view" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View"><i class="fas fa-eye"></i></button>
                    <button type="button" name="restore_user" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#restore_user_modal<?php echo $row['id']; ?>" data-bs-whatever="@restore" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore"><i class="fas fa-trash-restore"></i></button>
                  </td>
                </tr>
                <!-- ---------view users ----------- -->
                <div class="modal fade" id="documents<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <form method="POST" action="">
                      <!-- Modal User Profile View -->
                      <div class="modal-content">
                        <div class="modal-header card-header ">
                          <h5 class="modal-title" id="exampleModalLabel">Document For Verify Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row" style="color:#000;">

                            <div class="col-md-6 p-4">
                              <div class="text-center">
                                <h5><?php echo $row['name']; ?></h5>
                                <img class="img-fluid" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="../user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                              </div>
                            </div>
                            <div class="col-md-6 p-4">
                              <div class="text-center">
                                <label>Documents for User Profile Verification</label>
                                <?php if ($row['adhar_pan_voter_image'] == "" || $row['adhar_pan_voter_image'] == null) {
                                  echo "<h5 class='mt-5' style='color:red;'>Document Not Available - Contact " . $row['phone'] . "</h5>";
                                } else { ?>
                                  <img class="img-fluid " style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="../user_image/<?php echo $row['adhar_pan_voter_image']; ?>" alt="Upload Image">
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                          <div class="row m-auto">
                            <div class="col-lg-4 m-auto">
                              <div class="row m-auto">
                                <?php if ($row['adhar_pan_voter_image'] != null) {
                                  if ($row['verified'] != 1) {
                                ?>
                                    <div class="col-6">
                                      <button type="button" name="verified" class="btn btn-sm btn-success mr-1 form-control" data-bs-toggle="modal" data-bs-target="#verified<?php echo $row['id']; ?>" data-bs-whatever="@verified"> Verify <i class="fa fa-check" aria-hidden="true"></i></button>
                                    </div>
                                  <?php } else { ?>
                                    <div class="col-6">
                                      <button type="button" name="rejected" class="btn btn-sm btn-danger mr-1 form-control" data-bs-toggle="modal" data-bs-target="#rejected<?php echo $row['id']; ?>" data-bs-whatever="@rejected"> Reject <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </div>
                                  <?php }
                                } else {   ?>
                                  <div class="col-6">
                                    <button type="button" name="rejected" class="btn btn-sm btn-danger mr-1 form-control" data-bs-toggle="modal" data-bs-target="#rejected<?php echo $row['id']; ?>" data-bs-whatever="@rejected"> Reject <i class="fa fa-times" aria-hidden="true"></i></button>
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button name="" type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                  </div>
                  </form>
                </div>
        </div>
        <div class="modal fade" id="verified<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="VerifiedUserModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="VerifiedUserModalLabel">Confirm To Verified User?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post">
                <div class="modal-body">
                  Do You Really Want to Verify this User?
                  <input name="verify_id" type="hidden" class="form-control" id="verify_id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button name="verify_btn" type="submit" class="btn btn-sm btn-danger" id="verify_btn">Yes, Confirm</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="rejected<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="RejectedUserModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="RejectedUserModalLabel">Confirm To Reject User?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post">
                <div class="modal-body">
                  Do You Really Want to Reject this User?
                  <input name="reject_id" type="hidden" class="form-control" id="reject_id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button name="reject_btn" type="submit" class="btn btn-sm btn-danger" id="reject_btn">Yes, Confirm</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="view_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
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
                    <div class="card-body col-md-12">
                      <div class="row" style="line-height: 2;">
                        <div class="col-md-4">
                          <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="../user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                          </div>
                        </div>
                        <div class="col-md-8">
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
                          <div id="accordion_sm">
                            <div class="">
                              <div class="" id="headingOne">
                                <h6 class="mb-0">
                                  <button class="btn btn-sm btn-link collapsed" id="showMore" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Show More
                                  </button>
                                </h6>
                              </div>
                              <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion_sm">
                                <div class="">
                                  <div class="mt-0 ">
                                    <b class="bold_title">Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                    <b class="bold_title">Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                    <b class="bold_title">Gender :</b> <?php echo $row['gender']; ?><br>
                                    <b class="bold_title">Profession :</b> <?php echo $row['prof']; ?><br>
                                    <b class="bold_title">Specialization :</b> <?php echo $row['specialization']; ?><br>
                                    <b class="bold_title">Birth Date :</b> <?php echo $row['bDate']; ?><br>
                                    <b class="bold_title">Age :</b> <?php echo $row['age']; ?><br>
                                    <b class="bold_title">Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                    <b class="bold_title">Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                    <b class="bold_title">Income :</b> <?php echo $row['income']; ?><br>
                                    <?php
                                    $user_id = $row['id'];
                                    $res = mysqli_query($conn, "SELECT * FROM `table_plan` WHERE `user_id`= '$user_id'");
                                    if ($res) {
                                    ?>
                                      <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                    <?php
                                    } else {
                                      echo "<h6>Failed to Load Membership data</h6>";
                                    }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- </ul> -->
                          </div>
                        </div>
                        <!-- </ul> -->
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->
                  <!-- </div> -->
                  <div class="modal-footer">
                    <!-- <button name="update_plan" type="submit" class="btn btn-sm btn-primary" id="updt_btn">Save</button> -->
                    <button name="" type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
              <!--end Modal User Profile View -->
            </form>
          </div>
        </div>
        <div class="modal fade" id="restore_user_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="example">Confirm To Restore User?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post">
                <div class="modal-body">
                  Do You Really Want to Restore this User?
                  <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button name="delete_btn" type="submit" class="btn btn-sm btn-danger" id="dlt_btn">Confirm</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--end Modal delete -->
        <?php $a++;
              } ?>
      </tbody>
      </table>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
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
          <a class="btn btn-info" href="login_pane.php">Logout</a>
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