<?php
session_start();
include 'dbconn.php';
if (isset($_POST['verify_btn'])) {
    $user_id = $_POST['verify_id'];
    $planId = $_POST['plan_id'];
    $planDuration = $_POST['planDuration'];
    $planType = $_POST['plan_heading'];
    $label = $_POST['label'];
    $visible = 100;
    $price = $_POST['plan_price'];
    $date = date('Y-m-d');
    $month = $planDuration;
    $days = $month * 30;
    $expiry = date('Y-m-d', strtotime($date . ' + ' . $days . ' days'));
    $sql = mysqli_query($conn, "UPDATE `user_regiter` SET `payment_status`='1',`plan_duration`='$planDuration',`type_plan`='$planType',`label`='$label',`plan_price`='$price',`type_plan_id`='$planId',`plan_purchase_date`= CURDATE(), `plan_expiry_date`='$expiry', `visible_prof` = '$visible',`status`=1 WHERE `id` = '$user_id' ");
    if ($sql) {
        $sql2 = mysqli_query($conn, "INSERT INTO `table_plan`( `user_id`,`label`, `payment_status`, `plan_duration`, `type_plan`, `plan_price`, `type_plan_id`, `plan_purchase_date`, `plan_expiry_date`) VALUES ('$user_id','$label','1','$planDuration','$planType','$price','$planId',CURDATE(),'$expiry')");
        echo json_encode(array('status' => 201));
    } else {
        echo json_encode(array('status' => 422));
    }
}
