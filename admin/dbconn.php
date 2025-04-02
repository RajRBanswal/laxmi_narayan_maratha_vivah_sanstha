<?php
$conn = mysqli_connect("localhost", "root", "", "laxmi_narayan_mvsdb");
// $conn = mysqli_connect("localhost", "tenderbu_lnmvs_user", "!Db%rvqjZqf%", "tenderbu_lnmvs_db");
// $conn = mysqli_connect("localhost", "laxminarayanm_lnmvs_user", "?4+F^)4HQ=o8", "laxminarayanm_lnmvs_db");

if (!$conn) {
    echo "DB connected";
}
