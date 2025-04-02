<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $sesn_id = $_SESSION['userId'];

    if (isset($_POST['delete_btn'])) {
        $del = $_POST['delete_id'];
        $sql = mysqli_query($conn, "DELETE FROM `requests` WHERE `user_id` =  '$sesn_id' AND `sent_id` = '$del' ");
        // mysqli_query($conn, "UPDATE `requests` SET `user_id`='$usrid',`sent_id`='$send_id' WHERE ");
        if ($sql) {
?>
            <script>
                alert("Request Deleted Successfully");
            </script>
    <?php
        }
    }
    ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Outbox</div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 inbox_data">
        <div class="card-body">
            <nav>
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item userTab" role="presentation">
                        <button class="nav-link coral-green active" id="pills-recieved-tab" data-bs-toggle="pill" data-bs-target="#pills-recieved" type="button" role="tab" aria-controls="pills-recieved" aria-selected="true">Sent</button>
                    </li>
                    <li class="nav-item userTab " role="presentation">
                        <button class="nav-link coral-green" id="pills-accepted-tab" data-bs-toggle="pill" data-bs-target="#pills-accepted" type="button" role="tab" aria-controls="pills-accepted" aria-selected="false">Accepted</button>
                    </li>
                    <li class="nav-item userTab" role="presentation">
                        <button class="nav-link coral-green" id="pills-deleted-tab" data-bs-toggle="pill" data-bs-target="#pills-deleted" type="button" role="tab" aria-controls="pills-deleted" aria-selected="false">Rejected</button>
                    </li>
                </ul>
                <div class="tab-content bg-light" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-recieved" role="tabpanel" aria-labelledby="pills-recieved-tab">
                        <div class="card-header">
                            <h6>You Sent these Requests!</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `user_id` = '$sesn_id' ");
                                // echo mysqli_num_rows($requests);
                                while ($ro = mysqli_fetch_array($requests)) {
                                    $rid = $ro['id'];
                                    $otherid = $ro['sent_id'];
                                    if ($ro['status'] == null || $ro['status'] == "") {
                                        $liked = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `liked_p_id` = '$otherid' AND `user_id` = '$sesn_id'  ");
                                        $count = mysqli_num_rows($liked);
                                        // echo $count;
                                        while ($r = mysqli_fetch_array($liked)) {
                                            $stat = $r['status'];
                                            if ($stat == 1 && $count > 0) {
                                                $currentDate = date("Y-m-d");
                                                $planType = "";
                                                $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`= '$otherid' AND `status` = 1 ");
                                                while ($res = mysqli_fetch_array($usr_reg)) {
                                                    $expi = $res['plan_expiry_date'];
                                                    $planType = $res['type_plan'];
                                                }
                                                if ($expi > $currentDate) {
                                                    $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1 ");
                                                    while ($row = mysqli_fetch_array($usr_reg)) {
                                                        // echo $ro['user_id'] . 'shortlisted';
                                ?>
                                                        <div class="col-md-6  col-lg-6 ">
                                                            <div class="row vendor-list-block mb30 shadow profile align-items-center">
                                                                <!-- match list block -->
                                                                <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                    <div class="<?php echo $row['label']; ?>"></div>
                                                                    <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                                </div>
                                                                <div class="col-md-6 col-xs-6 col-sm-6">
                                                                    <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                    <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                    <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                    <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                    <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                    <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                    <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                    <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                    <div class=" bottom_btn">
                                                                        <button type="button" data-toggle="modal" data-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" class="btn btn-sm btn-danger mt-1" name="delReq" id="delReq"> <i class="fas fa-trash-alt"></i>Delete</button>
                                                                        <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                    </div>
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
                                                                    <div class="modal-body ">
                                                                        <div class="row" style="line-height: 2;">
                                                                            <div class="col-md-4">
                                                                                <div class="text-center">
                                                                                    <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
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
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                            <button name="delete_btn" type="submit" class="btn btn-danger" id="delete_btn">Confirm</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                if ($stat != 1 || $count == 0) {
                                                    $currentDate = date("Y-m-d");
                                                    $planType = "";
                                                    $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`= '$otherid' AND `status` = 1 ");
                                                    while ($res = mysqli_fetch_array($usr_reg)) {
                                                        $expi = $res['plan_expiry_date'];
                                                        $planType = $res['type_plan'];
                                                    }
                                                    if ($expi > $currentDate) {
                                                        // echo $ro['user_id'] ;
                                                        $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1 ");
                                                        while ($row = mysqli_fetch_array($usr_reg)) {
                                                        ?>
                                                            <div class="col-md-6  col-lg-6 ">
                                                                <div class="row vendor-list-block mb30 shadow profile align-items-center">
                                                                    <!-- match list block -->
                                                                    <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                        <div class="<?php echo $row['label']; ?>"></div>
                                                                        <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                                        <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                        <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                        <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                        <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                        <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                        <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                        <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                        <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                        <div class=" bottom_btn">
                                                                            <button type="button" data-toggle="modal" data-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" class="btn btn-sm btn-danger mt-1" name="delReq" id="delReq"> <i class="fas fa-trash-alt"></i> Delete</button>
                                                                            <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                        </div>
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
                                                                        <div class="modal-body ">
                                                                            <div class="row" style="line-height: 2;">
                                                                                <div class="col-md-4">
                                                                                    <div class="text-center">
                                                                                        <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
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
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                    <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                                    <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                    <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                                <button name="delete_btn" type="submit" class="btn btn-danger" id="delete_btn">Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                // echo $row['id'].'<br>';
                                // echo $ro['sent_id'];                                                                                                            
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- ------------- accepted requests tab--------------- -->
                    <div class="tab-pane fade show " id="pills-accepted" role="tabpanel" aria-labelledby="pills-accepted-tab">
                        <div class="card-header">
                            <h6>People who Accepted your Requests!</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `user_id` = '$sesn_id' AND `status` = 1");
                                while ($ro = mysqli_fetch_array($requests)) {
                                    // echo $ro['id'];
                                    $rid = $ro['id'];
                                    $otherid = $ro['sent_id'];
                                    $planType = "";
                                    $liked = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `liked_p_id` = '$otherid' AND `user_id` = '$sesn_id' ");
                                    $count = mysqli_num_rows($liked);
                                    // echo $count;
                                    while ($r = mysqli_fetch_array($liked)) {
                                        $stat = $r['status'];
                                        if ($stat == 1 && $count > 0) {
                                            $currentDate  = date("Y-m-d");
                                            $user_reg = mysqli_query($conn, " SELECT * FROM `user_regiter` WHERE `id` = '$otherid' AND `status`= 1 ");
                                            while ($res = mysqli_fetch_array($user_reg)) {
                                                $expi = $res['plan_expiry_date'];
                                                $planType = $res['type_plan'];
                                            }
                                            if ($expi > $currentDate) {
                                                $user_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`  = '$otherid' AND `status` = 1");
                                                while ($row = mysqli_fetch_array($user_reg)) {
                                                    // echo $ro['user_id'] . 'shortlisted';
                                ?>
                                                    <div class="col-md-6  col-lg-6 ">

                                                        <div class="row vendor-list-block mb30 shadow profile align-items-center">
                                                            <!-- match list block -->
                                                            <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                <div class="<?php echo $row['label']; ?>"></div>
                                                                <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                            </div>
                                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                                <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                <div class=" bottom_btn">
                                                                    <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                </div>
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
                                                                <div class="modal-body ">
                                                                    <div class="row" style="line-height: 2;">
                                                                        <div class="col-md-4">
                                                                            <div class="text-center">
                                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
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
                                                                            <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>

                                                                            <b>Age :</b> <?php echo date("d-m-Y", strtotime($row['bDate'])); ?><br>
                                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                            <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                            <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                            <b>Relatives :</b> <?php echo $row['relatives_surname']; ?> <br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            if ($stat != 1 || $count == 0) {
                                                $currentDate = date("Y-m-d");
                                                $planType = "";
                                                $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`= '$otherid' AND `status` = 1 ");
                                                while ($res = mysqli_fetch_array($usr_reg)) {
                                                    $expi = $res['plan_expiry_date'];
                                                    $planType = $res['type_plan'];
                                                }
                                                if ($expi > $currentDate) {
                                                    // echo $ro['user_id'] ;
                                                    $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1 ");
                                                    while ($row = mysqli_fetch_array($usr_reg)) {
                                                    ?>
                                                        <div class="col-md-6  col-lg-6 ">
                                                            <div class="col-md-12  col-lg-12 col-xs-12 mt-4 ">
                                                                <div class="row vendor-list-block mb30 shadow profile">
                                                                    <!-- match list block -->
                                                                    <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                        <div class="<?php echo $row['label']; ?>"></div>
                                                                        <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                                        <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                        <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                        <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                        <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                        <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                        <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                        <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                        <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                        <div class=" bottom_btn">
                                                                            <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="modal-body ">
                                                                        <div class="row" style="line-height: 2;">
                                                                            <div class="col-md-4">
                                                                                <div class="text-center">
                                                                                    <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
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
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                // echo $row['id'].'<br>';
                                // echo $ro['sent_id'];                                                                                                            
                                ?>
                                <!-- ================================================================================================================= -->

                            </div>
                        </div>
                    </div>

                    <!-- -------------deleted requests tab--------------- -->
                    <div class="tab-pane fade show " id="pills-deleted" role="tabpanel" aria-labelledby="pills-deleted-tab">
                        <div class="card-header">
                            <h6>Who rejected your requests!</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <!-- ================================================================================================================= -->
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `user_id` = '$sesn_id' AND `status` = 0");
                                while ($ro = mysqli_fetch_array($requests)) {
                                    $rid = $ro['id'];
                                    $otherid = $ro['sent_id'];
                                    $planType = "";
                                    $liked = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `liked_p_id` = '$otherid' AND `user_id` = '$sesn_id' ");
                                    $count = mysqli_num_rows($liked);
                                    while ($r = mysqli_fetch_array($liked)) {
                                        $stat = $r['status'];
                                        if ($stat == 1 && $count > 0) {
                                            $currentDate  = date("Y-m-d");
                                            $user_reg = mysqli_query($conn, " SELECT * FROM `user_regiter` WHERE `id` = '$otherid' AND `status`= 1 ");
                                            while ($res = mysqli_fetch_array($user_reg)) {
                                                $expi = $res['plan_expiry_date'];
                                                $planType = $res['type_plan'];
                                            }
                                            if ($expi > $currentDate) {
                                                $user_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`  = '$otherid' AND `status` = 1");
                                                while ($row = mysqli_fetch_array($user_reg)) {
                                                    // echo $ro['user_id'] . 'shortlisted';
                                ?>
                                                    <div class="col-md-6  col-lg-6 ">

                                                        <div class="row vendor-list-block mb30 shadow profile align-items-center">
                                                            <!-- match list block -->
                                                            <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                <div class="<?php echo $row['label']; ?>"></div>
                                                                <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                            </div>
                                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                                <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                <div class=" bottom_btn">
                                                                    <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                </div>
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
                                                                <div class="modal-body ">
                                                                    <div class="row" style="line-height: 2;">
                                                                        <div class="col-md-4">
                                                                            <div class="text-center">
                                                                                <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
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
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                            <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                            <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                            <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                            <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                            <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            if ($stat != 1 || $count == 0) {
                                                $currentDate = date("Y-m-d");
                                                $planType = "";
                                                $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`= '$otherid' AND `status` = 1 ");
                                                while ($res = mysqli_fetch_array($usr_reg)) {
                                                    $expi = $res['plan_expiry_date'];
                                                    $planType = $res['type_plan'];
                                                }
                                                if ($expi > $currentDate) {
                                                    $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1 ");
                                                    while ($row = mysqli_fetch_array($usr_reg)) {
                                                    ?>
                                                        <div class="col-md-6  col-lg-6 ">
                                                            <div class="col-md-12  col-lg-12 col-xs-12 mt-4 ">
                                                                <div class="row vendor-list-block mb30 shadow profile">
                                                                    <!-- match list block -->
                                                                    <div class="col-md-6 col-xs-6 col-sm-6 ">
                                                                        <div class="<?php echo $row['label']; ?>"></div>
                                                                        <img src="user_image/<?php echo $row['filename']; ?>" alt="wedding venue" class="match-img py-0">
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                                        <p class="text-pink mb-0 fw-bold">ID :- <?php echo $row['member_id']; ?></p>
                                                                        <p class="text-dark mb-0">DOB :- <?php echo $row['bDate']; ?></p>
                                                                        <p class="text-dark mb-0">Caste :- <?php echo $row['sub-com']; ?></p>
                                                                        <p class="text-dark mb-0">Height :- <?php echo $row['height']; ?>
                                                                        <p class="text-dark mb-0">Education :- <?php echo $row['HighEdu']; ?>
                                                                        <p class="text-dark mb-0">Occupation :- <?php echo $row['prof']; ?>
                                                                        <p class="text-dark mb-0">Income :- <?php echo $row['income']; ?>
                                                                        <p class="text-dark mb-0">Work City :- <?php echo $row['working_city']; ?>
                                                                        <div class=" bottom_btn">
                                                                            <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="modal-body ">
                                                                        <div class="row" style="line-height: 2;">
                                                                            <div class="col-md-4">
                                                                                <div class="text-center">
                                                                                    <img class="img-fluid px-3 px-sm-4 mt-5 mb-4" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
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
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </div>

    <?php require("./layouts/footer.php"); ?>

    <script>
        function OutGetRejectedData() {
            // alert('jdhgsjk');
            $.ajax({
                url: 'getRejectedData.php',
                type: "POST",
                data: {
                    InOutData: "OutGetRejectedData",
                },
                cashe: false,
                success: function(result) {
                    $('.rejectedprofile').html(result);
                }
            });
        };

        function like(id) {
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
                        document.location.reload();
                    } else if (data['status'] == 201) {
                        alert("Removed from Shortlist");
                        document.location.reload();
                    } else if (data['status'] == 202) {
                        alert("updated from Shortlist");
                        document.location.reload();
                    } else {
                        alert("There is a problem ");
                        document.location.reload();
                    }
                }
            });
        }
    </script>
<?php
} else {
    header("Location:login.php");
} ?>