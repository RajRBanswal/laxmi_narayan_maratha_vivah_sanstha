<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    $sql_dlt = "DELETE FROM `inquiry` WHERE `id`='$dltID' ";
    $remove = mysqli_query($conn, $sql_dlt);

    if (mysqli_query($conn, $sql_dlt)) {
?>
      <script>
        alert("Deleted Successfully");
        window.location.href = 'inquiry.php';
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Could not Delete");
        window.location.href = 'inquiry.php';
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
        <h4 class="m-0 font-weight-bold text-primary">Inquiry</h4>
      </div>
      <div class="card-body">
        <div class="row">

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="table-success">
                <tr>
                  <th>Name</th>
                  <th>E-Mail</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM `inquiry`");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><button type="button" name="delete_user" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delet_user_modal<?php echo $row['id']; ?>" data-bs-whatever="@delet" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button></td>
                  </tr>

                  <div class="modal fade" id="delet_user_modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="example">Confirm To Delete Inquiry?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                          <div class="modal-body">
                            Do You Really Want to Delete this Inquiry?
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
                <?php  } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end Modal create -->
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
          <a class="btn btn-primary" href="login_pane.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'panelFooter.php';
} else {
  header("location:index.php");
} ?>