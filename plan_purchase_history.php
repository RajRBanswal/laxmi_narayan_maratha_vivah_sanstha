<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $user_id = $_SESSION['userId'];

?>

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Membership Purchase History</div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-success">
                        <tr>
                            <th>Plan Name</th>
                            <th>Purchase Date</th>
                            <th>Expiry Date</th>
                            <th>Plan Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `table_plan` WHERE `user_id` = '$user_id'");
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['type_plan']; ?></td>
                                <td><?php echo $row['plan_purchase_date']; ?></td>
                                <td><?php echo $row['plan_expiry_date']; ?></td>
                                <td><?php echo $row['plan_price']; ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require("./layouts/footer.php"); ?>

<?php
} else {
    header("Location:login.php");
} ?>