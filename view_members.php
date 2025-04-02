<?php
include("./db_connection.php");
require("./navbar.php");
$getName = $_GET['name'];
?>
<style>
    .all_profile .profile {
        padding: 10px;
    }
</style>
<div class="bg-primary mb-3">
    <div class="container py-2 bg-primary">
        <h1 class="fs-2 text-white"><?php echo $getName; ?></h1>
    </div>
</div>
<div class="main-container bg_flor mt-3">
    <div class="container contixt py-5">
        <div class="row">
            <div class="col-md-12 col-lg-12 getStaticData px-4">
                <table class="table table-bordered" id="example">
                    <thead class="table-primary ">
                        <tr>
                            <th class="text-white">Reg. No. </th>
                            <th class="text-white">Reg. Dt</th>
                            <th class="text-white">Height</th>
                            <th class="text-white">Birth Dt</th>
                            <th class="text-white">Education</th>
                            <th class="text-white">Residence</th>
                            <th class="text-white">Occupation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($getName == "Unmarried Grooms") {
                            $userplan = "";
                            $sql = "SELECT * FROM  `user_regiter` where `marStat`='Unmarried' AND `gender`='Male'  AND `status`=1 AND `deleted_profile`=0";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                        ?>
                                    <tr>
                                        <td><a href="./profile_details.php?id=<?php echo $row['id']; ?>" target="_blank" class="fw-bold"><?php echo $row['member_id']; ?></a></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['height']; ?></td>
                                        <td><?php echo $row['bDate']; ?></td>
                                        <td><?php echo $row['HighEdu']; ?> (<?php echo $row['edu_degree']; ?>)</td>
                                        <td>
                                            <?php
                                            $sql1 = "SELECT * FROM cities WHERE `id` = " . $row['city'];
                                            $resultid = mysqli_query($conn, $sql1);
                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                echo $rowid['name'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['prof']; ?></td>

                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <div class="vendor-list-block  shadow card profile">
                                    <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                                </div>
                                <?php }
                        } elseif ($getName == "Unmarried Brides") {
                            $userplan = "";
                            $sql = "SELECT * FROM  `user_regiter` where `marStat`='Unmarried' AND `gender`='Female'   AND `status`=1 AND `deleted_profile`=0";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><a href="./profile_details.php?id=<?php echo $row['id']; ?>" target="_blank" class="fw-bold"><?php echo $row['member_id']; ?></a></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['height']; ?></td>
                                        <td><?php echo $row['bDate']; ?></td>
                                        <td><?php echo $row['HighEdu']; ?> (<?php echo $row['edu_degree']; ?>)</td>
                                        <td>
                                            <?php
                                            $sql1 = "SELECT * FROM cities WHERE `id` = " . $row['city'];
                                            $resultid = mysqli_query($conn, $sql1);
                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                echo $rowid['name'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['prof']; ?></td>

                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <div class="vendor-list-block  shadow card profile">
                                    <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                                </div>
                                <?php }
                        } elseif ($getName == "Divorcee Grooms") {
                            $userplan = "";
                            $sql = "SELECT * FROM  `user_regiter` where `marStat`='Divorced' AND `gender`='Male'   AND `status`=1 AND `deleted_profile`=0";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><a href="./profile_details.php?id=<?php echo $row['id']; ?>" target="_blank" class="fw-bold"><?php echo $row['member_id']; ?></a></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['height']; ?></td>
                                        <td><?php echo $row['bDate']; ?></td>
                                        <td><?php echo $row['HighEdu']; ?> (<?php echo $row['edu_degree']; ?>)</td>
                                        <td>
                                            <?php
                                            $sql1 = "SELECT * FROM cities WHERE `id` = " . $row['city'];
                                            $resultid = mysqli_query($conn, $sql1);
                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                echo $rowid['name'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['prof']; ?></td>

                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <div class="vendor-list-block  shadow card profile">
                                    <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                                </div>
                                <?php }
                        } elseif ($getName == "Divorcee Brides") {
                            $userplan = "";
                            $sql = "SELECT * FROM  `user_regiter` where `marStat`='Divorced' AND `gender`='Female'  AND `status`=1 AND `deleted_profile`=0";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><a href="./profile_details.php?id=<?php echo $row['id']; ?>" target="_blank" class="fw-bold"><?php echo $row['member_id']; ?></a></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td><?php echo $row['height']; ?></td>
                                        <td><?php echo $row['bDate']; ?></td>
                                        <td><?php echo $row['HighEdu']; ?> (<?php echo $row['edu_degree']; ?>)</td>
                                        <td>
                                            <?php
                                            $sql1 = "SELECT * FROM cities WHERE `id` = " . $row['city'];
                                            $resultid = mysqli_query($conn, $sql1);
                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                echo $rowid['name'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['prof']; ?></td>

                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">
                                        <h3 class="text-center mb-0 text-dark">Data not found!</h3>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-lg-4 col-12"></div>
        </div>

    </div>
</div>


<?php require("./footer.php"); ?>