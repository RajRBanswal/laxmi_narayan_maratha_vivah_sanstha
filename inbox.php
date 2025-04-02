<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $sesn_id = $_SESSION['userId'];
    if (isset($_POST['send_btn'])) {
        $usrid = $_POST['usr_id'];
        $send_id = $_POST['send_id'];
        $request_status = $_POST['request_status'];
        if ($request_status === "Accept") {
            $req = mysqli_query($conn, "SELECT * FROM `requests` WHERE `user_id` = '$send_id' AND `sent_id` = '$usrid'");
            $reqCount = mysqli_num_rows($req);
            if ($reqCount > 0) {
                $sql2 = mysqli_query($conn, "UPDATE `requests` SET `accept_status`='$request_status',`status`='1' WHERE `user_id` = '$send_id' AND `sent_id` = '$usrid'");
                if ($sql2) {
?>
                    <script>
                        alert("Request accepted Successfully");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Request not updated");
                </script>
                <?php
            }
        } else {
            $req = mysqli_query($conn, "SELECT * FROM `requests` WHERE `user_id` = '$send_id' AND `sent_id` = '$usrid'");
            $reqCount = mysqli_num_rows($req);
            if ($reqCount > 0) {
                $sql2 = mysqli_query($conn, "UPDATE `requests` SET `accept_status`='$request_status',`status`='0' WHERE `user_id` = '$send_id' AND `sent_id` = '$usrid'");
                if ($sql2) {
                ?>
                    <script>
                        alert("Request accepted Successfully");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Requiest not updated");
                </script>
    <?php
            }
        }
    }
    ?>

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Inbox</div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 inbox_data">
        <div class="card-body">
            <nav>
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item userTab" role="presentation">
                        <button class="nav-link coral-green active" id="pills-recieved-tab" data-bs-toggle="pill" data-bs-target="#pills-recieved" type="button" role="tab" aria-controls="pills-recieved" aria-selected="true">Recieved</button>
                    </li>
                    <li class="nav-item userTab " role="presentation">
                        <button class="nav-link coral-green" id="pills-accepted-tab" data-bs-toggle="pill" data-bs-target="#pills-accepted" type="button" role="tab" aria-controls="pills-accepted" aria-selected="false">Accepted</button>
                    </li>
                    <li class="nav-item userTab" role="presentation">
                        <button class="nav-link coral-green" id="pills-likes-tab" data-bs-toggle="pill" data-bs-target="#pills-likes" type="button" role="tab" aria-controls="pills-likes" aria-selected="false">Rejected</button>
                    </li>
                </ul>

                <div class="tab-content bg-light" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-recieved" role="tabpanel" aria-labelledby="pills-recieved-tab">
                        <div class="card-header">
                            <h6>People who have sent you requests!</h6>
                        </div>
                        <div class="card-body ">
                            <div class="row mb-4">
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `sent_id` = '$sesn_id'");
                                while ($ro = mysqli_fetch_array($requests)) {
                                    $rid = $ro['id'];
                                    $otherid = $ro['user_id'];
                                    if ($ro['status'] == NULL || $ro['status'] == "") {
                                        $currentDate = date("Y-m-d");
                                        $planType = "";
                                        $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`= '$otherid' AND `status` = 1");
                                        while ($res = mysqli_fetch_array($usr_reg)) {
                                            $expi = $res['plan_expiry_date'];
                                            $planType = $res['type_plan'];
                                        }
                                        if ($expi > $currentDate) {
                                            $usr_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id` ='$otherid' AND `status` = 1");
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
                                                                <button type="button" data-toggle="modal" data-target="#response<?php echo $row['id']; ?>" data-whatever="@send" class="btn btn-sm  btn-success mt-1" name="senReq" id="senReq"> <i class="fa-solid fa-check"></i> Express Interest</button>
                                                                <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm  btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
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
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <div class="row" style="line-height: 2;">
                                                                    <div class="col-md-4">
                                                                        <div class="text-center">
                                                                            <img class="img-fluid" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
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
                                                            <div class="modal-footer">
                                                                <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="response<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Request Status?</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="d-flex justify-content-evenly align-items-center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="request_status" value="Accept" id="flexRadioDefault1">
                                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                                Accept
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="request_status" value="Reject" id="flexRadioDefault2" checked>
                                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                                Reject
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
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
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- ------------- accepted requests tab--------------- -->
                    <div class="tab-pane fade show " id="pills-accepted" role="tabpanel" aria-labelledby="pills-accepted-tab">
                        <div class="card-header">
                            <h6>Your accepted Profiles!</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `sent_id` = '$sesn_id' AND `status` = 1");
                                while ($ro = mysqli_fetch_array($requests)) {
                                    // echo $ro['id'];
                                    $rid = $ro['id'];
                                    $otherid = $ro['user_id'];
                                    $planType = "";
                                    $currentDate  = date("Y-m-d");
                                    $user_reg = mysqli_query($conn, " SELECT * FROM `user_regiter` WHERE `id` = '$otherid'  AND `status`= 1 ");
                                    while ($res = mysqli_fetch_array($user_reg)) {
                                        $expi = $res['plan_expiry_date'];
                                        $planType = $res['type_plan'];
                                    }
                                    if ($expi > $currentDate) {
                                        $user_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`  = '$otherid' AND `status` = 1");
                                        while ($row = mysqli_fetch_array($user_reg)) {         // echo $ro['user_id'] . 'shortlisted';
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
                                                            <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm  btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
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
                                                        <div class="modal-body " style="padding: 2rem;">

                                                            <div class="row" style="line-height: 2;">
                                                                <div class="col-md-4">
                                                                    <div class="text-center">
                                                                        <img class="img-fluid" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
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
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                    <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                    <b>Caste :</b> <?php echo $row['sub-com']; ?><br>
                                                                    <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                    <b>Collage :</b> <?php echo $row['collage']; ?><br>
                                                                    <b>Profession :</b> <?php echo $row['prof']; ?><br>

                                                                    <b>Age :</b> <?php echo date("d-m-Y", strtotime($row['bDate'])); ?><br>
                                                                    <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                    <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                    <b>Relatives :</b> <?php echo $row['relatives_surname']; ?> <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                <?php    }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- -------------likes tab--------------- -->
                    <div class="tab-pane fade show " id="pills-likes" role="tabpanel" aria-labelledby="pills-likes-tab">
                        <div class="card-header">
                            <h6>Your Rejected Profiles</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <?php
                                $rid = 0;
                                $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE `sent_id` = '$sesn_id' AND `status`=0");
                                while ($ro = mysqli_fetch_array($requests)) {
                                    // echo $ro['id'];
                                    $rid = $ro['id'];
                                    $otherid = $ro['user_id'];
                                    $planType = "";

                                    $currentDate  = date("Y-m-d");
                                    $expi = "";
                                    $user_reg = mysqli_query($conn, " SELECT * FROM `user_regiter` WHERE `id` = '$otherid'  AND `status`= 1");
                                    while ($res = mysqli_fetch_array($user_reg)) {
                                        $expi = $res['plan_expiry_date'];
                                        $planType = $res['type_plan'];
                                    }
                                    if ($expi > $currentDate) {
                                        $user_reg = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `id`  = '$otherid' AND `status` = 1");
                                        while ($row = mysqli_fetch_array($user_reg)) {         // echo $ro['user_id'] . 'shortlisted';
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
                                                            <button type="button" data-toggle="modal" data-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" class="btn btn-sm  btn-primary mt-1" name="view_user"><i class="fas fa-eye"></i> View</button>
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
                                                        <div class="modal-body " style="padding: 2rem;">

                                                            <div class="row" style="line-height: 2;">
                                                                <div class="col-md-4">
                                                                    <div class="text-center">
                                                                        <img class="img-fluid" style="width: 16rem;border-radius: 11%;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
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
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button name="" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                <?php    }
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

<?php
} else {
    header("Location:login.php");
} ?>