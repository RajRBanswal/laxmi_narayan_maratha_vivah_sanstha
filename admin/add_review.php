<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  // insert query
  if (isset($_POST['save_review'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $msg = $_POST['message'];
    $filename = $_FILES["cplImg"]["name"];
    $tempname = $_FILES["cplImg"]["tmp_name"];
    $folder = "couple_img/" . $filename;
    $sql = mysqli_query($conn, "INSERT INTO `review`(`name`, `date`, `location`, `message`, `filename`) VALUES ('$name','$date','$location','$msg','$filename')");
    if ($sql) {
      if (move_uploaded_file($tempname, $folder)) {
        echo '<script>alert("image uploaded successfully");</script>';
      } else {
        echo '<script>alert("image not uploaded");</script>';
      }
?>
      <script>
        alert("form submitted successfully");
      </script>
    <?php
    } else {
    ?>
      <script>
        alert('There was an error');
      </script>
    <?php
    }
  }
  //  update query
  if (isset($_POST['update_review'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $msg = $_POST['message'];
    $editID = $_POST['edit_id'];
    $filename1 = $_POST['cplImg1'];
    $filename = $_FILES['cplImg']['name'];
    $tempname = $_FILES['cplImg']['tmp_name'];
    $folder = "couple_img/" . $filename;
    // echo $_FILES["cplImg"]["name"];
    $editID = $_POST['edit_id'];
    // ---------------
    if (!empty($_FILES["cplImg"]["name"])) {
      $sql_edit = "UPDATE `review` SET `name`='$name',`date`='$date',`location`='$location',`message`='$msg',`filename`='$filename' WHERE `id`='$editID' ";;
      $update_q =  mysqli_query($conn, $sql_edit);
      if (move_uploaded_file($tempname, $folder)) {
        echo '<script>alert("image uploaded successfully");</script>';
      } else {
        echo '<script>alert("image not uploaded");</script>';
      }
    } else {
      $sql_edit = "UPDATE `review` SET `name`='$name',`date`='$date',`location`='$location',`message`='$msg' WHERE `id`='$editID' ";;
      $update_q = mysqli_query($conn, $sql_edit);
    }
    if ($update_q) {
    ?>
      <script>
        alert("Updated Successfully");
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Could not update");
      </script>
    <?php
    }
  }
  //  delete query
  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    $sql_dlt = "DELETE FROM `review` WHERE `id`='$dltID'";
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
    <!-- Profil card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Review's</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="mb-3" style="text-align:right;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planModal" data-bs-whatever="@create"><i class="fa-regular fa-plus"></i> Review</button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-success">
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Message</th>
                <th>Image</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql_plan = "SELECT * FROM `review`";
              $result = mysqli_query($conn, $sql_plan);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['message']; ?></td>
                  <td><a href="couple_img/<?php echo $row['filename']; ?>" target="_blank"><img src="couple_img/<?php echo $row['filename']; ?>" alt="" width="50" height="50"></a></td>
                  <td class="d-flex"><button type="button" name="update_review" class="btn btn-primary mr-3" data-bs-toggle="modal" data-bs-target="#update_review<?php echo $row['id']; ?>" data-bs-whatever="@update"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" name="delete_review" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-bs-whatever="@delet"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <div class="modal fade" id="update_review<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <!-- Modal update -->
                      <div class="modal-content">
                        <div class="modal-header card-header ">
                          <h5 class="modal-title" id="exampleModalLabel">Update reveiw</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body " style="padding: 2rem;">
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="name" class="col-form-label">Name :</label>
                              <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" placeholder="<?php echo $row['name']; ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="date" class="col-form-label">Date :</label>
                              <input name="date" type="text" class="form-control" id="date" value="<?php echo $row['date']; ?>" placeholder="<?php echo $row['date']; ?>">
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="location" class="col-form-label">Location :</label>
                              <input name="location" type="text" class="form-control" id="location" value="<?php echo $row['location']; ?>" placeholder="<?php echo $row['location']; ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="cplImg" class="col-form-label">Image:</label>
                              <input type="file" class="form-control" name="cplImg" id="cplImg">
                              <input type="hidden" class="form-control" name="cplImg1" id="cplImg1" value="<?php echo $row['filename']; ?>">
                            </div>

                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="message" class="col-form-label ">Message :</label>
                              <textarea name="message" type="text" class="form-control" id="message" value="<?php echo $row['message']; ?>" placeholder="<?php echo $row['message']; ?>"><?php echo $row['message']; ?></textarea>
                              <input name="edit_id" type="hidden" class="form-control" id="edit_id" value="<?php echo $row['id']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button name="update_review" type="submit" class="btn btn-primary" id="updt_review">Save</button>
                          <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!--end Modal update -->
                    </form>
                  </div>
                </div>
                <!-- Modal delet -->
                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="post">
                        <div class="modal-body">
                          Do You Really Want to Delete this Row?
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
                <!--end Modal delet -->
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Modal create -->
      <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">New Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body row" style="padding: 2rem;">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="col-form-label">Name :</label>
                    <input name="name" type="text" class="form-control" id="name">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="date" class="col-form-label">Date :</label>
                    <input name="date" type="text" class="form-control" id="date">
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="location" class="col-form-label">Location :</label>
                    <input name="location" type="text" class="form-control" id="location">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="message" class="col-form-label ">Message :</label>
                    <textarea name="message" type="text" class="form-control" id="message"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="cplImg" class="col-form-label ">Image :</label>
                    <input type="file" class="form-control" name="cplImg" id="cplImg">
                  </div>
                </div>
                <input name="edit_id" type="hidden" class="form-control" id="edit_id" value="<?php echo $row['id']; ?>">
              </div>
              <div class="modal-footer">
                <button name="save_review" type="submit" class="btn btn-primary">Save review</button>
                <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--end Modal create -->
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
          <a class="btn btn-primary" href="login_pane.php">Logout</a>
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