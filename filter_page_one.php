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

if ($gendr != "" && $age_min != "" && $age_max != "" && $cntr != "" && $stt != "" && $ct != "" && $mS != "" && $hE != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `marStat`='$mS' AND `HighEdu`='$hE' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} else if ($gendr != "" && $age_min != "" && $age_max != "" && $cntr != "" && $stt != "" && $ct != "" && $mS != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `marStat`='$mS' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" && $cntr != "" && $stt != "" && $ct != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `city`='$ct' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" && $cntr != "" && $stt != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `state`='$stt' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "" && $cntr != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `country`='$cntr' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "" && $age_min != "" && $age_max != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `age` BETWEEN '$age_min' AND $age_max AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }
} elseif ($gendr != "" && $hE != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `HighEdu` ='$hE' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }
} elseif ($gendr != "" && $cntr != "" && $stt == "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE  `gender` = '$gendr' AND `country` ='$cntr' AND `state` = '' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    <?php
    }
} elseif ($gendr != "" && $cntr != "" && $stt != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE  `gender` = '$gendr' AND `country` ='$cntr' AND `state` ='$stt' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} elseif ($gendr != "") {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
} else {
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `gender` = '$gendr' OR `religion` = '$rel' OR `sub-com` = '$cst' OR `country` = '$cntr' OR `state` = '$stt' OR `marStat` = '$mS' OR `HighEdu` = '$hE' AND `status` = '1' AND `deleted_profile`=0");
    while ($row = mysqli_fetch_assoc($q)) {
    ?>
        <div class="vendor-list-block  shadow card profile">
            <div class="row ">
                <!-- match list block -->
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
                <div class="card-footer  bottom_btn1">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <a type="button" onclick="send_activation_request();"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                </th>
                                <th>
                                    <!--<a type="button" onclick="send_activation_request();"name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                </th>
                                <th>
                                    <a type="button" onclick="send_activation_request();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                </th>
                                <th>
                                    <?php
                                    if ($row['type_plan'] == "Free") {
                                        echo '<a type="button" onclick="send_activation_request();"name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                    } else {
                                    ?>
                                        <a type="button" onclick="send_activation_request();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                    <?php } ?>

                                </th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

<?php
    }
}

?>