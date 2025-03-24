<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $u_id = $_SESSION['userId'];

    $ur = "";
    $ua = "";
    $ug = "";
    $type_plan = "";
    $visible_prof = "";
    $sql = "SELECT * FROM `user_regiter` where `id`='$u_id' AND `deleted_profile`=0";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $ua = $row['age'];
        $ur = $row['religion'];
        $ug = $row['gender'];
        $type_plan = $row['type_plan'];
        // echo $ug;
        $visible_prof = $row['visible_prof'];
    }
    if (isset($_POST['send_btn'])) {
        // $usrid = $_POST['usr_id'];
        $send_id = $_POST['send_id'];

        $req = mysqli_query($conn, "SELECT * FROM `requests` where `user_id` = '$u_id' AND `sent_id` = '$send_id'");
        $reqCount = mysqli_num_rows($req);
        if ($reqCount < 1) {

            $sql2 = mysqli_query($conn, "INSERT INTO `requests`(`user_id`, `sent_id`) VALUES ('$u_id','$send_id')");
            if ($sql2) {
?>
                <script>
                    alert("request sent successfuly");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("You already sent request to this person!");
            </script>
        <?php
        }
    }
    if (isset($_POST['delete_btn'])) {
        $del = $_POST['delete_id'];
        $sql = mysqli_query($conn, "DELETE FROM `requests` WHERE `user_id` =  '$u_id' AND `sent_id` = '$del' ");
        if ($sql) {
            // print_r($del);
        ?>
            <script>
                alert("request deleted successfuly");
            </script>
    <?php
        }
    }
    ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">My Matches</div>
            </div>
        </div>
    </div>

    <div class="user_profile card px-3">
        <div class="row">
            <?php

            $currentDate = date("Y-m-d");
            $check = mysqli_query($conn, "SELECT * FROM `user_regiter` where `id`='$u_id' AND `deleted_profile`=0");
            $r = mysqli_fetch_array($check);
            if ($r['community-checkbox'] != "") {
                $sql2 = "";
                $status = "";
                $currentDate = date("Y-m-d");
                if ($ug == 'Female') {
                    if ($type_plan == "Free") {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Male' AND `age`>='$ua' AND `status` != 0 AND `type_plan`='Free' AND `deleted_profile`=0";
            ?>
                        <style>
                            .bottom_btn1 a {
                                pointer-events: none !important;
                                cursor: default !important;
                            }
                        </style>

                        <?php
                    } else {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Male' AND `age`>='$ua' AND `status` != 0 AND `deleted_profile`=0 ORDER BY id LIMIT $visible_prof";
                    }
                    $result1 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_array($result1)) {
                        $expiry = $row['plan_expiry_date'];
                        // if ($expiry >= $currentDate) {
                        $status = "";
                        $abcdf = mysqli_query($conn, "SELECT * FROM `shortlist` where `user_id`= '$u_id' AND  `liked_p_id` = '$row[id]'");
                        while ($num1 = mysqli_fetch_assoc($abcdf)) {
                            $status = $num1['status'];
                        }
                        $count = mysqli_num_rows($abcdf);
                        if ($status == 1 && $count != 0 || $status != "" && $count != 0) {
                            // while ($num = mysqli_fetch_assoc($abcdf)) {
                        ?>
                            <!--<div class="row mb-4">-->
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else if ($status == 0 || $count <= 0 || $status == "") {
                            if ($status == "" && $u_id == $row['id']) {
                                continue;
                            } // while ($num = mysqli_fetch_assoc($abcdf)){
                        ?>

                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                <?php }
                        // }
                    }
                } ?>

                <?php
                if ($ug == 'Male') {
                    if ($type_plan == "Free") {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Female' AND `age`<='$ua' AND `status` != 0 AND `type_plan`='Free' AND `deleted_profile`=0";
                ?>
                        <style>
                            .bottom_btn1 a {
                                pointer-events: none !important;
                                cursor: default !important;
                            }
                        </style>

                        <?php
                    } else {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Female' AND `age`<='$ua' AND `status` != 0 AND `deleted_profile`=0 ORDER BY id LIMIT $visible_prof";
                    }

                    // $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Female' AND `age`<='$ua'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_array($result2)) {
                        $expiry = $row['plan_expiry_date'];
                        // if ($expiry >= $currentDate) {
                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$u_id' AND `liked_p_id` = '$row[id]' AND `status` != 0");
                        $countusr = mysqli_num_rows($clr);
                        while ($num1 = mysqli_fetch_array($clr)) {
                            $status = $num1['status'];
                        }
                        $count = mysqli_num_rows($clr);
                        if ($status == 1 && $count != 0 || $status != "" && $count != 0) {
                        ?>

                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--</div>-->
                        <?php } else if ($status == 0 || $count <= 0 || $status == "") {
                            if ($status == "" && $user_id == $row['id']) {
                                continue;
                            } ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php }
                        // }
                    }
                }
            } else {
                $status = "";
                $currentDate = date("Y-m-d");
                $sql1 = "";
                $sql2 = "";
                if ($ug == 'Female') {
                    if ($type_plan == "Free") {
                        $sql1 = "SELECT * FROM `user_regiter` WHERE `gender`='Male' AND `age`>='$ua' AND `religion`='$ur' AND `status` != 0 AND `type_plan`='Free' AND `deleted_profile`=0";
                        ?>
                        <style>
                            .bottom_btn1 a {
                                pointer-events: none !important;
                                cursor: default !important;
                            }
                        </style>

                        <?php
                    } else {
                        $sql1 = "SELECT * FROM `user_regiter` WHERE `gender`='Male' AND `age`>='$ua' AND `religion`='$ur' AND `status` != 0 AND `deleted_profile`=0 ORDER BY id LIMIT $visible_prof";
                    }

                    // $sql1 = "SELECT * FROM `user_regiter` WHERE `gender`='Male' AND `age`>='$ua' AND `religion`='$ur'";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($row = mysqli_fetch_array($result1)) {
                        $expiry = $row['plan_expiry_date'];
                        // if ($expiry >= $currentDate) {
                        $clr = "SELECT * FROM `shortlist` where `user_id`= '$u_id' AND  `liked_p_id` = '$row[id]' AND `status` != 0 ";
                        $abcdf = mysqli_query($conn, $clr);
                        while ($num1 = mysqli_fetch_assoc($abcdf)) {
                            $status = $num1['status'];
                        }
                        $count = mysqli_num_rows($abcdf);
                        if ($status == 1 && $count != 0 || $status != "" && $count != 0) {
                            // while ($num = mysqli_fetch_assoc($abcdf)) {
                        ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        <?php // }
                        } else if ($status == 0 || $count <= 0 || $status == "") {
                            if ($status == "" && $user_id == $row['id']) {
                                continue;
                            } // while ($num = mysqli_fetch_assoc($abcdf)){
                        ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                <?php //}
                        }
                        // }
                    }
                } ?>
                <!--</div>-->

                <!--<div class="row  mb-4">-->
                <?php
                if ($ug == 'Male') {
                    if ($type_plan == "Free") {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Female' AND `age`<='$ua' AND `religion`='$ur' AND `status` != 0 AND `type_plan`='Free' AND `deleted_profile`=0";
                ?>
                        <style>
                            .bottom_btn1 a {
                                pointer-events: none !important;
                                cursor: default !important;
                            }
                        </style>

                        <?php
                    } else {
                        $sql2 = "SELECT * FROM `user_regiter` WHERE `gender`='Female' AND `age`<='$ua' AND `religion`='$ur' AND `status` != 0 AND `deleted_profile`=0 ORDER BY id LIMIT $visible_prof";
                    }

                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_array($result2)) {
                        $expiry = $row['plan_expiry_date'];
                        // if ($expiry >= $currentDate) {
                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$u_id' AND `liked_p_id` = '$row[id]' AND `status` != 0 ");
                        while ($num1 = mysqli_fetch_array($clr)) {
                            $status = $num1['status'];
                        }
                        $count = mysqli_num_rows($clr);
                        if ($status == 1 && $count != 0 || $status != "" && $count != 0) {
                        ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>

                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                        <?php } else if ($status == 0 || $count <= 0 || $status == "") {
                            if ($status == "" && $user_id == $row['id']) {
                                continue;
                            } ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
                                    <!-- match list block -->
                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                        <!-- <div class="<?php // echo $row['label'];
                                                            ?>"></div> -->
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto" <?php if ($type_plan == "Free") { ?> onclick="alertMSG();" <?php } ?>>
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like '></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($type_plan == "Free") {
                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                        } else {
                                                        ?>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                    </th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.match list block -->
                            <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body " style="padding: 2rem;">
                                            <div class="row card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary text-center">Profile</h6>
                                                </div>
                                                <div class="card-body col-lmd-12">
                                                    <div class="row" style="line-height: 2;">
                                                        <div class="col-md-4">
                                                            <div class="text-center">
                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
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
                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                            <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                            <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                            <?php
                                                            $res11 = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                            if ($res11) {
                                                            ?>
                                                                <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To Delete?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to Delete this Request?
                                                <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request to <?php echo $row['name']; ?> ?
                                                <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
            <?php }
                        // }
                    }
                }
            }
            ?>
        </div>

        <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="requestModalLabel">Purchase Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-center">Please Purchase the Plan for Viewing more Profiles</p>
                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="button" class="btn btn-primary btn-default" data-bs-dismiss="modal">Ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require("./layouts/footer.php"); ?>

    <script>
        function like(id) {
            // alert(id);
            $.ajax({
                url: 'save_to_shortlist.php',
                type: "POST",
                data: {
                    user_id: id,
                },
                cache: false,
                success: function(result) {
                    var data = JSON.parse(result);
                    console.log(data['status']);
                    if (data['status'] == 200) {
                        alert("Added to Shortlist");
                        window.location.reload();
                    } else if (data['status'] == 201) {
                        alert("Removed from Shortlist");
                        window.location.reload();
                    } else if (data['status'] == 202) {
                        alert("updated from Shortlist");
                        window.location.reload();
                    } else {
                        alert("There is a problem ");
                        window.location.reload();
                    }
                }
            });
        }
    </script>
    <script>
        function alertMSG() {

            $('#requestModal').modal('show');
        }
    </script>
<?php
} else {
    header("Location:login.php");
} ?>