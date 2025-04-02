<?php
session_start();
require("./db_connection.php");
$selectQuery = "SELECT * FROM `user_regiter` WHERE `active` IS NULL AND `OTP` != 0 AND `created_at` < DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$selectData = mysqli_query($conn, $selectQuery);
while ($selectRow = mysqli_fetch_array($selectData)) {
    $deleteData = mysqli_query($conn, "DELETE FROM `user_regiter` WHERE `id`=$selectRow[id]");
    if ($deleteData) {
        echo "deleted";
    }
}
