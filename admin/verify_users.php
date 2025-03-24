<?php

session_start();
include 'dbconn.php';
if(isset($_GET['user_active'])){ ?>
    <script> window.onload=function(){ document.getElementById("pills-active-tab").click(); } </script>
<?php }else if(isset($_GET['user_deactive_tab'])){ ?>
    <script> window.onload=function(){ document.getElementById("pills-deactive-tab").click(); } </script>
<?php }else if(isset($_GET['user_female_tab'])){ ?>
    <script> window.onload=function(){ document.getElementById("pills-female-tab").click(); } </script>
<?php }else if(isset($_GET['user_male_tab'])){ ?>
    <script> window.onload=function(){ document.getElementById("pills-male-tab").click(); } </script>
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
  
  

 if (isset($_POST['verify_btn'])) {
    $dltID = $_POST['verify_id'];
    $sql_verify = "UPDATE `user_regiter` SET `verified`=1 WHERE `id`= '$dltID' ";

    if (mysqli_query($conn, $sql_verify)) {
?>
      <script>
        alert("User Verified Successfully");
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("User Not Verified");
      </script>
  <?php
    }
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
  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users Details</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/styleAdmin.css" rel="stylesheet">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="./img/logon.png" type="image/x-icon">
  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php
      include 'panelHeader.php';
      ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->

          <?php
          include 'toppanel.php';
          ?>
          
          <div>
                        <?php
                        $sql = "SELECT * FROM `user_regiter`";
                        ?>
                        <div class="row ">
                          <!-- Profil card -->
                          <div class="card shadow mb-4">
                            <div class="card-body">
                              <div class="table-responsive">
                                               
                                <!--<button type="button" id="export_excel" onclick="download_to_excel()">Excel</button>-->
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                  <thead class="table-success">
                                    <tr>
                                      <th aria-sort="descending" class="sorting sorting_desc">Created_Date</th>
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
                                        $sql_plan = "SELECT * FROM `user_regiter` WHERE `verified`='' OR `verified`='$b'  ORDER BY created_at DESC";
                                        
                                    $result = mysqli_query($conn, $sql_plan);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                      <tr>
                                        <td  aria-sort="descending" class="sorting sorting_desc"><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['prof']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><a href="../user_image/<?php echo $row['adhar_pan_voter_image']; ?>" target="_blank"><img src="../user_image/<?php echo $row['adhar_pan_voter_image']; ?>" width="100" height="100"  /></a></td>
                                        <td class="d-flex">
                                          <button type="button" name="verified" class="btn btn-success mr-3" data-bs-toggle="modal" data-bs-target="#verified<?php echo $row['id']; ?>" data-bs-whatever="@verified"><i class="fa fa-check" aria-hidden="true"></i></button>
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
                                                <!-- Begin Page Content -->
                                                <!-- <div class="container-fluid"> -->
                                                <!-- Page Heading -->
                                                <div class="row card shadow mb-4">
                                                  <!-- Profil card -->
                                                  <!-- <div class="card shadow mb-4"> -->
                                                  <div class=" py-3">
                                                    <h4 class="m-0 font-weight-bold text-primary text-center">Profile</h4>
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
                                                                <button class="btn btn-link collapsed" id="showMore" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Show More
                                                                </button>
                                                              </h6>
                                                            </div>
                                                            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion_sm">
                                                              <div class="">
                                                                <div class="mt-0 ">
                                                                  <b class="bold_title">Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                  <b class="bold_title">Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                  <b class="bold_title">Collage :</b> <?php echo $row['collage']; ?><br>
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
                                      <div class="modal fade" id="delet_user_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
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
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button name="verify_btn" type="submit" class="btn btn-danger" id="verify_btn">Yes, Confirm</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <!--end Modal delete -->
                                    <?php $a++;  } ?>
                                  </tbody>
                                </table>
                                <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Active</button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
         
          
        </div>
        <!-- End of Main Content -->

        <?php
        include 'panelFooter.php';
        ?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

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
            $('.dataTable').dataTable( {
                "aaSorting": [[ 1, "desc" ]]
            } );
        } );
    </script>
    
                    <script type="text/javascript">
                        function download_to_excel()
                        { 
                        
                        var tab_text="<table><tr>";
                        var textRange = ''; 
                        var j=0;
                        var tab = document.getElementById('dataTable'); // id of table
                        
                        for(j = 0 ; j < tab.rows.length ; j++) 
                        {     
                            tab_text += tab.rows[j].innerHTML+"</tr>";
                        }
                        
                        tab_text +="</table>";
                        
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


  </body>

  </html>
<?php


} else {
  header("location:index.php");
}
?>