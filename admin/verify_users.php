<?php

session_start();
include 'dbconn.php';
if (isset($_GET['user_active'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-active-tab").click();
    }
  </script>
<?php } else if (isset($_GET['user_deactive_tab'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-deactive-tab").click();
    }
  </script>
<?php } else if (isset($_GET['user_female_tab'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-female-tab").click();
    }
  </script>
<?php } else if (isset($_GET['user_male_tab'])) { ?>
  <script>
    window.onload = function() {
      document.getElementById("pills-male-tab").click();
    }
  </script>
  <?php }
if (isset($_SESSION['admin_id'])) {

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
  $adId = $_SESSION['admin_id'];
  require("./top_header.php");
  require("./sidebar.php");
  require("./navbar.php");
  ?>

  <div class="mb-4 px-3 py-1 ">
    <?php
    $sql = "SELECT * FROM `user_regiter`";
    ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">All Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">

          <!--<button type="button" id="export_excel" onclick="download_to_excel()">Excel</button>-->
          <table class="table table-bordered dataTable" id="example" width="100%" cellspacing="0">
            <thead class="table-success">
              <tr>
                <th aria-sort="descending" class="sorting sorting_desc">Created_Date</th>
                <th>MemberId</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Mobile</th>
                <th>Profession</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Document</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;
              $b = 0;
              $sql_plan = "SELECT * FROM `user_regiter` WHERE `verified`='$a' AND `status`='$b'  ORDER BY created_at DESC";

              $result = mysqli_query($conn, $sql_plan);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td aria-sort="descending" class="sorting sorting_desc"><?php echo $row['created_at']; ?></td>
                  <td class="fw-bold text-pink"><?php echo $row['member_id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['prof']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><a href="../user_image/<?php echo $row['adhar_pan_voter_image']; ?>" target="_blank"><img src="../user_image/<?php echo $row['adhar_pan_voter_image']; ?>" width="100" height="100" /></a></td>
                  <td class="d-block g-3 justify-content-center align-items-center">
                    <button type="button" name="verified" class="btn btn-success mb-2 " data-bs-toggle="modal" data-bs-target="#verified<?php echo $row['id']; ?>" data-bs-whatever="@verified"><i class="fa fa-check" aria-hidden="true"></i> <small>Activate Now</small></button>
                    <button type="button" name="view_user" class="btn btn-warning mr-3" data-bs-toggle="modal" data-bs-target="#view_user<?php echo $row['id']; ?>" data-bs-whatever="@view"><i class="fas fa-eye"></i></button>
                    <button type="button" name="delete_user" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delet_user_modal<?php echo $row['id']; ?>" data-bs-whatever="@delet"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <!-- ---------view users ----------- -->

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
                              <b>Gender :</b> <?php echo $row['gender']; ?><br>
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
                <div class="modal fade" id="delet_user_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Confirm To Delete User?</h5>
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

                <div class="modal fade" id="verified<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="VerifiedUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="VerifiedUserModalLabel">Confirm To Activate User?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <!-- <form action="" method="post"> -->
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mb-3">
                            <label class="text-dark">Plan Duration <span style="color:red">&nbsp;*</span></label>
                            <select name="planDuration" id="planDuration<?php echo $row['id']; ?>" class="form-control form-select" required>
                              <option value="">Choose one</option>
                              <option value="6">6 Months</option>
                              <option value="12">12 Months</option>
                            </select>
                            <input name="verify_id" type="hidden" class="form-control" id="verify_id<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                          </div>
                        </div>

                        <h5 class="text-dark">Do You Really Want to Verify this User?</h5>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="verify_btn" type="button" class="btn btn-danger" id="verify_btn" onclick="getData()">Yes, Confirm</button>
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
                <script>
                  function getData() {
                    let verify_id = $('#verify_id<?php echo $row['id']; ?>').val()
                    let value = $('#planDuration<?php echo $row['id']; ?>').val();
                    if (value === '6') {
                      $.ajax({
                        url: 'verify_users_data.php',
                        type: "POST",
                        data: {
                          planDuration: value,
                          verify_id: verify_id,
                          plan_heading: 'Silver',
                          label: 'silver',
                          plan_price: '1200',
                          plan_id: '1',
                          verify_btn: "verify_btn"
                        },
                        cache: false,
                        success: function(result) {
                          var data = JSON.parse(result);
                          if (data['status'] == 201) {
                            alert("User data updated successfully");
                            window.location.href = 'verify_users.php';
                          } else if (data['status'] == 422) {
                            alert("User data not updated");
                          }
                        }
                      });
                    } else {
                      $.ajax({
                        url: 'verify_users_data.php',
                        type: "POST",
                        data: {
                          planDuration: value,
                          verify_id: verify_id,
                          plan_heading: 'Gold',
                          label: 'gold',
                          plan_price: '2000',
                          plan_id: '2',
                          verify_btn: "verify_btn"
                        },
                        cache: false,
                        success: function(result) {
                          var data = JSON.parse(result);
                          if (data['status'] == 201) {
                            alert("User data updated successfully");
                            window.location.href = 'verify_users.php';
                          } else if (data['status'] == 422) {
                            alert("User data not updated");
                          }
                        }
                      });
                    }
                  }
                </script>
                <!--end Modal delete -->
              <?php $a++;
              } ?>
            </tbody>
          </table>
          <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Active</button> -->
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'panelFooter.php';
  ?>

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

  <script>
    $(document).ready(function() {
      $('.dataTable').dataTable({
        "aaSorting": [
          [1, "desc"]
        ]
      });
    });
  </script>

  <script type="text/javascript">
    function download_to_excel() {

      var tab_text = "<table><tr>";
      var textRange = '';
      var j = 0;
      var tab = document.getElementById('dataTable'); // id of table

      for (j = 0; j < tab.rows.length; j++) {
        tab_text += tab.rows[j].innerHTML + "</tr>";
      }

      tab_text += "</table>";

      var a = document.createElement('a');
      var data_type = 'data:application/vnd.ms-excel';
      a.href = data_type + ', ' + encodeURIComponent(tab_text);
      //setting the file name
      a.download = 'UserData.xls';
      //triggering the function
      a.click();
      //just in case, prevent default behaviour
      e.preventDefault();

    }
  </script>

<?php
} else {
  header("location:index.php");
}
?>