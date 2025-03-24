<?php

require("./db_connection.php");

$gendr = $_POST['fltr_gender'];
$age_min = $_POST['fltr_age_min'];
$age_max = $_POST['fltr_age_max'];
$cntr = $_POST['filt_country'];
$stt = $_POST['filt_state'];
$ct = $_POST['filt_city'];
$mS = $_POST['filt_mar_stat'];
$hE = $_POST['filt_high_edu'];

if ($gendr != "" && $age_min != "" && $age_max != "" &&  $cntr != "" && $stt != "" && $ct != "" && $mS != "" && $hE != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `marStat`='$mS' AND `HighEdu`='$hE' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} else if ($gendr != "" && $age_min != "" && $age_max != "" &&  $cntr != "" && $stt != "" && $ct != "" && $mS != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `marStat`='$mS' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" &&  $cntr != "" && $stt != "" && $ct != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND  `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" &&  $cntr != "" && $stt != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" &&  $cntr != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} else if ($gendr != "" && $age_min != "" && $age_max != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != ""  && $hE != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `HighEdu` ='$hE'  AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != ""  && $cntr != "" && $stt == "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE  `gender` = '$gendr' AND `country` ='$cntr' AND `state` = '' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != ""  && $cntr != "" && $stt != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE  `gender` = '$gendr' AND `country` ='$cntr' AND `state` ='$stt' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>

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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
    <?php
    }
} else {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' OR `religion` = '$rel' OR `sub-com` = '$cst' OR `country` = '$cntr' OR `state` = '$stt' OR `marStat` = '$mS' OR `HighEdu` = '$hE' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="col-md-12  col-lg-12 col-xs-12 mt-4 mb-3 profile">
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
                                <th style="font-size:16px;" colspan="4" class="bold text-uppercase">
                                    <?php $myvalue = $row['name'];;
                                    $arr = explode(' ', trim($myvalue));
                                    if ($arr[0] == "Demo" || $arr[0] == "demo") {
                                        echo $arr[1];
                                    } else {
                                        echo $arr[0];
                                    } ?>
                                    <label class="" style="color: #14a94a;font-size: 12px;font-weight: 800;text-transform: capitalize;">
                                        <?php if ($row['verified'] == 1) {
                                            echo "Verified <img src='./images/verified2.png' width='20'/>";
                                        } else {
                                            echo "<span style='color: #f3041b;'>Not Verified</span>";
                                        } ?>
                                    </label>
                                </th>

                            </tr>
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="like(<?php echo $row['id']; ?>)" href=""> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fa-solid fa-comment-dots"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
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
        <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to Delete this Request?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-warning" id="dlt_btn">Confirm</button>
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
                            <h5 class="modal-title" id="example">Confirm To send?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Do You Really Want to send this Request
                            <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                            <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button name="send_btn" type="submit" class="btn btn-warning" id="send_btn">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                        <button type="button" class="close cross" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label style="color:red">Upgrade Your a Membership Plan.</label>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                        <a href="pricing-plan.php" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <!--Modal User Profile View -->
                <div class="modal-content">
                    <div class="modal-header card-header " style="margin: auto;">
                        <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                    </div>
                    <div class="modal-body " style="padding: 2rem;">
                        <!--Begin Page Content -->
                        <div class="container-fluid">
                            <!--Page Heading -->
                            <div class="row card shadow mb-4">
                                <!--Profil card -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    </div>
                                    <div class="card-body col-md-12">
                                        <div class="row" style="line-height: 1.5;">
                                            <div class="col-md-12">
                                                <div class="text-center" style="padding:1rem ;">
                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none" class="profile_list">
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
                                                    <?php }
                                                    $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                    $resultid = mysqli_query($conn, $sql1);
                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                        echo $row['city'];
                                                    ?>
                                                        <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                    <?php } ?>
                                                    <b>Address :</b> <?php echo $row['address']; ?><br>
                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                    <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                    <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                    <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                <?php
                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                if ($res) {
                                                ?>
                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!--end Modal User Profile View -->
            </div>
        </div>
<?php
    }
}

?>

<style>
    .card-footer {
        padding: 5px 15px;
        background: #F89922;
        margin-top: 5px;
    }
</style>