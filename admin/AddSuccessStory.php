<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  // insert query
  if (isset($_POST['save_story'])) {
    $couple_name = $_POST['couple_name'];
    $location = $_POST['location'];
    $msg = $_POST['message'];
    $wedding_date = $_POST['wedding_date'];
    $filename = $_FILES["cplImg"]["name"];
    $tempname = $_FILES["cplImg"]["tmp_name"];
    $folder = "couple_img/" . $filename;
    $sql = mysqli_query($conn, "INSERT INTO `success_story`(`name`, `location`,`wedding_date`, `message`, `filename`) VALUES ('$couple_name','$location','$wedding_date','$msg','$filename')");
    if ($sql) {
      move_uploaded_file($tempname, $folder)
?>
      <script>
        alert("form submitted successfully");
        window.location.href = "AddSuccessStory.php"
      </script>
    <?php
    } else {
    ?>
      <script>
        alert('There was a problem, please try again.');
      </script>
    <?php
    }
  }
  //  update query
  if (isset($_POST['update_story'])) {
    $couple_name = ucwords($_POST['couple_name']);
    $location = ucwords($_POST['location']);
    $msg = ucwords($_POST['message']);
    $filename1 = $_POST['cplImg1'];
    $filename = $_FILES['cplImg']['name'];
    $tempname = $_FILES['cplImg']['tmp_name'];
    $folder = "couple_img/" . $filename;
    // echo $_FILES["cplImg"]["name"];
    $editID = $_POST['edit_id'];
    // ---------------
    if (!empty($_FILES["cplImg"]["name"])) {
      $sql_edit = "UPDATE `success_story` SET `name`='$couple_name',`location`='$location',`message`='$msg',`filename`='$filename' WHERE `id`='$editID' ";
      $update_q =  mysqli_query($conn, $sql_edit);
      if (move_uploaded_file($tempname, $folder)) {
        echo '<script>alert("image uploaded successfully");</script>';
      } else {
        echo '<script>alert("image not uploaded");</script>';
      }
    } else {

      $update_q = mysqli_query($conn, "UPDATE `success_story` SET `name`='$couple_name',`location`='$location',`message`='$msg' WHERE `id`='$editID' ");
    }
  }
  //  delete query
  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    $sql_dlt = "DELETE FROM `success_story` WHERE `id`='$dltID'";
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
        <h6 class="m-0 font-weight-bold text-primary text-center">Success Story</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="mb-3" style="text-align:right;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planModal" data-bs-whatever="@create"><i class="fa-regular fa-plus"></i> Story</button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered xyzr" id="dataTable" width="100%" cellspacing="0">
            <thead class="table-success">
              <tr>
                <th>Date</th>
                <th>Couple name</th>
                <th>Location</th>
                <th>Message</th>
                <th>img</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql_plan = "SELECT * FROM `success_story`";
              $result = mysqli_query($conn, $sql_plan);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['wedding_date']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['message']; ?></td>
                  <td><a target="_black" href="couple_img/<?php echo $row['filename']; ?>" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i></a></td>
                  <td class="d-flex"><button type="button" name="update_story" class="btn btn-primary mr-3" data-bs-toggle="modal" data-bs-target="#update_story<?php echo $row['id']; ?>" data-bs-whatever="@update"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" name="delete_story" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-bs-whatever="@delet"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
                <div class="modal fade" id="update_story<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <!-- Modal update -->
                      <div class="modal-content">
                        <div class="modal-header card-header ">
                          <h5 class="modal-title" id="exampleModalLabel">Update story</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body " style="padding: 2rem;">
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="couple_name" class="col-form-label">Couple name :</label>
                              <input name="couple_name" type="text" class="form-control" id="couple_name" value="<?php echo $row['name']; ?>" placeholder="<?php echo $row['name']; ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="location" class="col-form-label">Location :</label>
                              <input name="location" type="text" class="form-control" id="location" value="<?php echo $row['location']; ?>" placeholder="<?php echo $row['location']; ?>">
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="cplImg" class="col-form-label">Image:</label>
                              <input type="file" class="form-control" name="cplImg" id="cplImg">
                              <input type="hidden" class="form-control" name="cplImg1" id="cplImg1" value="<?php echo $row['filename']; ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="message" class="col-form-label ">Message :</label>
                              <textarea name="message" type="text" class="form-control" id="message" value="<?php echo $row['message']; ?>" placeholder="<?php echo $row['message']; ?>"><?php echo $row['message']; ?></textarea>
                            </div>
                            <input name="edit_id" type="hidden" class="form-control" id="edit_id" value="<?php echo $row['id']; ?>">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button name="update_story" type="submit" class="btn btn-primary" id="updt_story">Save</button>
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
                      <form action="" method="post">
                        <div class="modal-header">
                          <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
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
              <?php  } ?>

              <!--end Modal delet -->
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
                <h5 class="modal-title" id="exampleModalLabel">New Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body row" style="padding: 2rem;">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="couple_name" class="col-form-label">Couple name :</label>
                    <input name="couple_name" type="text" class="form-control" id="couple_name" required>
                  </div>
                  <div class="mb-3 col-md-3">
                    <label for="location" class="col-form-label">Location :</label>
                    <input name="location" type="text" class="form-control" id="location">
                  </div>
                  <div class="mb-3 col-md-3">
                    <label for="location" class="col-form-label">wedding_date :</label>
                    <input name="wedding_date" type="date" class="form-control" id="wedding_date" required>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="message" class="col-form-label">Message :</label>
                    <textarea name="message" class="form-control" id="message"></textarea>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="cplImg" class="col-form-label ">Image :</label>
                    <input type="file" class="form-control" name="cplImg" id="cplImg" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button name="save_story" type="submit" class="btn btn-primary">Save Story</button>
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