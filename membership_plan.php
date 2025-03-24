<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $user_id = $_SESSION['userId'];
    if (isset($_POST['purchase'])) {
        $planId = $_POST['plan_id'];
        $planDuration = $_POST['months'];
        $planType = $_POST['plan_heading'];
        $label = $_POST['label'];
        $visible = $_POST['visible'];
        $price = $_POST['plan_price'];
        $date = date('Y-m-d');
        $month = $planDuration;
        $days = $month * 30;
        $expiry = date('Y-m-d', strtotime($date . ' + ' . $days . ' days'));
        $sql = mysqli_query($conn, "UPDATE `user_regiter` SET `payment_status`='1',`plan_duration`='$planDuration',`type_plan`='$planType',`label`='$label',`plan_price`='$price',`type_plan_id`='$planId',`plan_purchase_date`= CURDATE(), `plan_expiry_date`='$expiry', `visible_prof` = '$visible' WHERE `id` = '$user_id' ");
        if ($sql) {
            $sql2 = mysqli_query($conn, "INSERT INTO `table_plan`( `user_id`,`label`, `payment_status`, `plan_duration`, `type_plan`, `plan_price`, `type_plan_id`, `plan_purchase_date`, `plan_expiry_date`) VALUES ('$user_id','$label','1','$planDuration','$planType','$price','$planId',CURDATE(),'$expiry')");
        }
    }
?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Membership Plan</div>
            </div>
        </div>
    </div>

    <div class="card surface p-3 membership_plan ">
        <!-- Page Heading -->
        <div class="row ">

            <?php
            $selected_plan = "";
            $sql_plan = "SELECT * FROM `create_plans` WHERE `label`!='premium_membership' ORDER BY price ASC";
            $result = mysqli_query($conn, $sql_plan);
            $trial = mysqli_query($conn, "SELECT * FROM `user_regiter` where `id` = '$_SESSION[userId]'");
            while ($rowid = mysqli_fetch_array($trial)) {
                $selected_plan = $rowid['type_plan_id'];
            }
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['id'] == $selected_plan) {
            ?>
                    <div class="col-lg-4 col-sm-12 pricing-box pricing-box-regualr ">
                        <div class="shadow well-box">
                            <div class="card-header pt-3 text-center">
                                <h3 class="price-title"><?php echo $row['heading']; ?></h3>
                            </div>
                            <div class="card-body text-center">
                                <h2 class="price-plan"><span class="dollor-sign">₹</span><?php echo $row['price']; ?></h2><span class="permonth"><small><?php echo $row['months']; ?> /months</small></span>
                                <p><?php echo $row['discription']; ?></p>
                                <a data-toggle="modal" data-target="#deactivate<?php echo $row['id']; ?>" class="plan_slct_btn btn btn-danger btn-sm">Active</a>
                            </div>
                            <table class="table table-bordered mt-3" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td class="w-70"><?php echo $row['rule1']; ?></td>
                                        <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="w-70"><?php echo $row['rule2']; ?></td>
                                        <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                    </tr>
                                    <?php if ($row['visiblePro'] < 75) { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } elseif ($row['visiblePro'] < 100) { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <input name="plan_id" type="hidden" id="plan_id" value="<?php echo $row['id']; ?>">
                        </div>
                    </div>
                <?php
                } else { ?>
                    <div class="col-lg-4  col-sm-12 pricing-box pricing-box-regualr ">
                        <div class="shadow well-box">
                            <div class="card-header pt-3  text-center">
                                <h3 class="price-title"><?php echo $row['heading']; ?></h3>
                            </div>
                            <div class="card-body text-center">
                                <h2 class="price-plan"><span class="dollor-sign">₹</span><?php echo $row['price']; ?></h2><span class="permonth"><small><?php echo $row['months']; ?> /months</small></span>
                                <p><?php echo $row['discription']; ?></p>
                                <a data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" class="plan_slct_btn btn btn-warning btn-sm">Select Plan</a>
                            </div>
                            <table class="table table-bordered mt-3 " style="width:100%">
                                <tbody>
                                    <tr>
                                        <td class="w-70"><?php echo $row['rule1']; ?></td>
                                        <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="w-70"><?php echo $row['rule2']; ?></td>
                                        <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                    </tr>
                                    <?php if ($row['visiblePro'] < 75) { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } elseif ($row['visiblePro'] < 100) { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-times" style="color:red; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td class="w-70">Download Biodata</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Chat allowed</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Gallery Photo</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">WhatsApp Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule3']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70"><?php echo $row['rule4']; ?></td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Document Authentication</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Personal Matchmaking</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">View Unlimited Full Profile</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Highlighted</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Get Featured on Top Search</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Verified Profile/Contact</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Customer Support</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                        <tr>
                                            <td class="w-70">Dedicated Executive</td>
                                            <td class="text-center w-30"><i class="fa fa-solid fa-check" style="color:green; font-size: x-large;"></i></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <input name="plan_id" type="hidden" id="plan_id" value="<?php echo $row['id']; ?>">
                        </div>
                        <form action="" method="POST">
                            <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Buy Product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <input name="plan_heading" type="hidden" id="plan_heading" value="<?php echo $row['heading']; ?>">
                                        <input name="months" type="hidden" id="Plan_prd" value="<?php echo $row['months']; ?>">
                                        <input name="plan_price" type="hidden" id="plan_price" value="<?php echo $row['price']; ?>">
                                        <input name="visible" type="hidden" id="visible" value="<?php echo $row['visiblePro']; ?>">
                                        <!-- <form action="" method="POST"> -->
                                        <div class="modal-body">
                                            Do you want to confirm the purchase?
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" id="lbl" name="label" value="<?php echo $row['label']; ?>">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button href="#" name="purchase" id="purchase-btn" type="submit" class="btn btn-primary">Confirm</button>
                                            <input name="plan_id" type="hidden" id="plan_id" value="<?php echo $row['id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                <?php  }  ?>
            <?php  } ?>
        </div>
    </div>

    <?php require("./layouts/footer.php"); ?>

<?php
} else {
    header("Location:login.php");
} ?>