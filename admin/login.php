<?php
session_start();
include 'dbconn.php';
if (isset($_POST['admin_Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_ad = "SELECT * FROM `admin` WHERE  `email`='$username' AND`password`='$password' OR `mobile`='$username'  AND `password`='$password'";
    $result = mysqli_query($conn, $sql_ad);

    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            header("location:adminDashboard.php");
        }
    } else {
?>
        <script>
            alert('Admin Not Register');
            // window.location.href = "admin_register.php";
        </script>
    <?php
    }
    ?>
<?php
} else {
    echo "One of you input is incorrect";
    header("location:index.php");
}
?>