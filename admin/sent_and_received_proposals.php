<?php

session_start();
include 'dbconn.php';

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
                <h5 class="m-0 font-weight-bold text-primary">Sent & Received Proposals</h5>
            </div>
            <div id="admin" class="card-body">
                <div class="overflow-auto mb-4 g-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>S Image</th>
                                <th class="fw-bold text-primary">Sender ID</th>
                                <th>Sender Name</th>
                                <th>Sender Mobile</th>
                                <th>R Image</th>
                                <th class="fw-bold text-primary">Receiver ID</th>
                                <th>Receiver Name</th>
                                <th>Receiver Mobile</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $requests = mysqli_query($conn, "SELECT * FROM `requests`");
                            $No = 1;
                            while ($ro = mysqli_fetch_array($requests)) {
                                $otherid = $ro['user_id'];
                                $sent_id = $ro['sent_id'];
                                $user_data = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1");
                                $user_row = mysqli_fetch_array($user_data);

                                $sent_data = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$sent_id' AND `status` = 1");
                                $sent_row = mysqli_fetch_array($sent_data);
                            ?>
                                <tr>
                                    <td><?php echo $No++; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($ro['created_at'])); ?></td>
                                    <td><img src="../user_image/<?php echo $user_row['filename']; ?>" alt="Sender Image" width="50"></td>
                                    <td class="fw-bold text-primary"><?php echo $user_row['member_id']; ?></td>
                                    <td><?php echo $user_row['name']; ?></td>
                                    <td><?php echo $user_row['phone']; ?></td>
                                    <td><img src="../user_image/<?php echo $sent_row['filename']; ?>" alt="Receiver Image" width="50"></td>
                                    <td class="fw-bold text-primary"><?php echo $sent_row['member_id']; ?></td>
                                    <td><?php echo $sent_row['name']; ?></td>
                                    <td><?php echo $sent_row['phone']; ?></td>
                                    <td>
                                        <?php if($ro['accept_status'] === "Accept"){
                                            echo "<b class='text-success'>".$ro['accept_status']."</b>"; 
                                         }else{
                                            echo "<b class='text-danger'>".$ro['accept_status']."</b>"; 
                                         } ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>

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