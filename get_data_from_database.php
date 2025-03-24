<?php
require("./db_connection.php");
if (isset($_POST['caste_data'])) {
    $caste_id = $_POST['caste_id'];

    $result = mysqli_query($conn, "SELECT * FROM `caste` WHERE `religion_id` = '$caste_id'");
    while ($row = mysqli_fetch_array($result)) {
        // $name = str_replace(' ', '_', $row['caste']);
        echo '<option value=' . $row['caste'] . '>' . $row['caste'] . '</option>';
    }
}


if (isset($_POST['sub_caste_data'])) {
    $sub_caste_id = $_POST['sub_caste_id'];

    $result = mysqli_query($conn, "SELECT * FROM `sub_caste` WHERE `caste_id` = '$sub_caste_id'");
    while ($row = mysqli_fetch_array($result)) {
        echo '<option value=' . $row['id'] . '>' . $row['sub_caste'] . '</option>';
    }
}

if (isset($_POST['education_data'])) {
    $education_id = $_POST['education_id'];

    $result = mysqli_query($conn, "SELECT * FROM `education_degree` WHERE `edu_id` = '$education_id'");
    while ($row = mysqli_fetch_array($result)) {
        echo '<option value=' . $row['degree'] . '>' . $row['degree'] . '</option>';
    }
}
