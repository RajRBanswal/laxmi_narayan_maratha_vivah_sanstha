<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    $sql_dlt = "UPDATE `misuse_data` SET `status`=0 WHERE `id`='$dltID' ";
    $remove = mysqli_query($conn, $sql_dlt);

    if (mysqli_query($conn, $sql_dlt)) {
?>
      <script>
        alert("Deleted Successfully");
        window.location.href = 'all_misuse_report.php';
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Could not Deleted");
        window.location.href = 'all_misuse_report.php';
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
    <div class="card shadow mb-4 ">
      <div class="card-header">
        <h3 class="text-center">Misuse Reports</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!--<button type="button" id="export_excel" onclick="download_to_excel()">Excel</button>-->
          <table class="table table-bordered dataTables" data-order='[[ 0, "desc" ]]' id="dataTable" width="100%" cellspacing="0">
            <thead class="table-success">
              <tr>
                <th data-class-name="priority">Date</th>
                <th>Type of Issue</th>
                <th>Sub</th>
                <th>Desc</th>
                <th>Requester</th>
                <th>Email</th>
                <th>Mobile</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $a = 1;

              $sql_plan = "SELECT * FROM `misuse_data` WHERE `status`=1 ORDER BY id DESC";
              $result = mysqli_query($conn, $sql_plan);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['type_of_issue']; ?></td>
                  <td><?php echo $row['subject']; ?></td>
                  <!--<td><?php //echo $row['email']; 
                          ?></td>-->
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['requester']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td>
                    <button type="button" name="Deleted" class="btn btn-sm btn-danger mr-1 form-control" data-bs-toggle="modal" data-bs-target="#Deleted<?php echo $row['id']; ?>" data-bs-whatever="@Deleted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr>
                <div class="modal fade" id="Deleted<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="DeletedUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="DeletedUserModalLabel">Confirm To Delete Report?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="post">
                        <div class="modal-body">
                          Do You Really Want to Delete this Report?
                          <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button name="delete_btn" type="submit" class="btn btn-sm btn-danger" id="delete_btn">Yes, Confirm</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php $a++;
              } ?>
            </tbody>
          </table>
        </div>
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