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
<div class="main-container bg_flor all_profile mt-3">
    <div class="container contixt">
        <div class="row">
            <div class="col-md-8 col-lg-8 getStaticData px-4">
                <?php

                if ($getName == "Unmarried Grooms") {
                    $userplan = "";
                    $sql = "SELECT * FROM  `user_regiter` where `marStat`='Unmarried' AND `gender`='Male' AND `type_plan`='Free' AND `status`=1 AND `deleted_profile`=0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>
                            <div class="vendor-list-block  shadow card profile">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                    </div>
                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                        <table class="" id="table" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th>Member ID</th>
                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                echo "Free Member";
                                                                                                                            } else {
                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <th>Height</th>
                                                    <td><?php echo $row['height']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo $row['religion']; ?></td>
                                                    <th>Caste</th>
                                                    <td><?php echo $row['sub-com']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Marital Status</th>
                                                    <td><?php echo $row['marStat']; ?></td>
                                                    <th>Education</th>
                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Degree</th>
                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                    <th>Profession</th>
                                                    <td><?php echo $row['prof']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>
                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                        $resultid = mysqli_query($conn, $sql1);
                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                            echo $rowid['name'];
                                                        } ?> </td>
                                                    <th>InterCast</th>
                                                    <td><?php echo $row['yes/no']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="vendor-list-block  shadow card profile">
                            <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                        </div>
                        <?php }
                } elseif ($getName == "Unmarried Brides") {
                    $userplan = "";
                    $sql = "SELECT * FROM  `user_regiter` where `marStat`='Unmarried' AND `gender`='Female'  AND `type_plan`='Free' AND `status`=1 AND `deleted_profile`=0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="vendor-list-block  shadow card profile">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                    </div>
                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                        <table class="" id="table" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th>Member ID</th>
                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                echo "Free Member";
                                                                                                                            } else {
                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <th>Height</th>
                                                    <td><?php echo $row['height']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo $row['religion']; ?></td>
                                                    <th>Caste</th>
                                                    <td><?php echo $row['sub-com']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Marital Status</th>
                                                    <td><?php echo $row['marStat']; ?></td>
                                                    <th>Education</th>
                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Degree</th>
                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                    <th>Profession</th>
                                                    <td><?php echo $row['prof']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>
                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                        $resultid = mysqli_query($conn, $sql1);
                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                            echo $rowid['name'];
                                                        } ?> </td>
                                                    <th>InterCast</th>
                                                    <td><?php echo $row['yes/no']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="vendor-list-block  shadow card profile">
                            <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                        </div>
                        <?php }
                } elseif ($getName == "Divorcee Grooms") {
                    $userplan = "";
                    $sql = "SELECT * FROM  `user_regiter` where `marStat`='Divorced' AND `gender`='Male'  AND `type_plan`='Free' AND `status`=1 AND `deleted_profile`=0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="vendor-list-block  shadow card profile">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                    </div>
                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                        <table class="" id="table" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th>Member ID</th>
                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                echo "Free Member";
                                                                                                                            } else {
                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <th>Height</th>
                                                    <td><?php echo $row['height']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo $row['religion']; ?></td>
                                                    <th>Caste</th>
                                                    <td><?php echo $row['sub-com']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Marital Status</th>
                                                    <td><?php echo $row['marStat']; ?></td>
                                                    <th>Education</th>
                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Degree</th>
                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                    <th>Profession</th>
                                                    <td><?php echo $row['prof']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>
                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                        $resultid = mysqli_query($conn, $sql1);
                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                            echo $rowid['name'];
                                                        } ?> </td>
                                                    <th>InterCast</th>
                                                    <td><?php echo $row['yes/no']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="vendor-list-block  shadow card profile">
                            <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                        </div>
                        <?php }
                } elseif ($getName == "Divorcee Brides") {
                    $userplan = "";
                    $sql = "SELECT * FROM  `user_regiter` where `marStat`='Divorced' AND `gender`='Female' AND `type_plan`='Free' AND `status`=1 AND `deleted_profile`=0";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="vendor-list-block  shadow card profile">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                    </div>
                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                        <table class="" id="table" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th>Member ID</th>
                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                echo "Free Member";
                                                                                                                            } else {
                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <th>Height</th>
                                                    <td><?php echo $row['height']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo $row['religion']; ?></td>
                                                    <th>Caste</th>
                                                    <td><?php echo $row['sub-com']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Marital Status</th>
                                                    <td><?php echo $row['marStat']; ?></td>
                                                    <th>Education</th>
                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Degree</th>
                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                    <th>Profession</th>
                                                    <td><?php echo $row['prof']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>
                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                        $resultid = mysqli_query($conn, $sql1);
                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                            echo $rowid['name'];
                                                        } ?> </td>
                                                    <th>InterCast</th>
                                                    <td><?php echo $row['yes/no']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="vendor-list-block  shadow card profile">
                            <h3 class="text-center mb-0 text-dark">Data not found!</h3>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="col-md-4 col-lg-4 col-12"></div>
        </div>

    </div>
</div>


<?php require("./footer.php"); ?>