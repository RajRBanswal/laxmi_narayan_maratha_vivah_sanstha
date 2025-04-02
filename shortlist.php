<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $u_id = $_SESSION['userId'];
    $sesn_id = $_SESSION['userId'];

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
    }
    if (isset($_POST['send_btn'])) {
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

    ?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Shortlist</div>
            </div>
        </div>
    </div>
    <div class="user_profile card px-3">
        <div class="row surface">
            <?php
            if ($type_plan !== "Free") {
                $res = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$sesn_id' AND `status` = 1");

                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rowe = mysqli_fetch_array($res)) {
                        $sql = mysqli_query($conn, "SELECT * FROM `user_regiter` where `id`= '$rowe[liked_p_id]' AND `deleted_profile`=0");
                        while ($row = mysqli_fetch_array($sql)) {
            ?>
                            <div class="col-md-10  col-lg-10 col-xs-12 mt-4 mb-3 profile">
                                <div class="row vendor-list-block  shadow card">
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
                                    <div class="card-footer  bottom_btn1" style="overflow:auto">
                                        <table style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <a href="" onclick="like(<?php echo $row['id']; ?>)" class='btn'> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                    </th>
                                                    <th>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fa-solid fa-paper-plane"></i></a>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="send_confirm<?php echo $rows['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm To send?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Really Want to send this Request?
                                                <input name="send_id" type="text" class="form-control" id="send_id" value="<?php echo $rows['id']; ?>">
                                                <input name="usr_id" type="text" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button name="send_btn" type="submit" class="btn btn-danger" id="send_btn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                    }
                } else { ?>
                    <p class="mt10 p-5">You have not shortlisted anyone yet.</p>
            <?php
                }
            } ?>
        </div>

        <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="requestModalLabel">Activate Your Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-center">Request to admin for activate your account</p>
                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="button" class="btn btn-primary btn-default" data-bs-dismiss="modal">Ok</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function afterLogin() {
                $('#requestModal').modal('show');
            };
        </script>
    </div>


    <?php require("./layouts/footer.php"); ?>

    <script>
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
<?php
} else {
    header("Location:login.php");
} ?>