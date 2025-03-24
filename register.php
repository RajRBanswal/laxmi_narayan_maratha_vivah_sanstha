<?php
session_start();
require("./db_connection.php");
if (isset($_POST['sign_up_button'])) {
    $name  = $_POST['name'];
    $creater = $_POST['creater'];
    $email  = $_POST['email'];
    $mobile  = $_POST['mobile'];
    $password  = md5($_POST['password']);

    $query = $conn->query("SELECT * FROM `user_regiter` WHERE `email`='$email'");
    if (mysqli_num_rows($query) > 0) { ?>
        <script>
            alert("Email already exists! Please try other email address");
        </script>
        <?php
    } else {
        // Get last inserted code and extract the sequence
        $sql = "SELECT MAX(SUBSTRING(member_id, 3)) as last_id FROM user_regiter WHERE member_id LIKE 'LN%'";
        $result = $conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            $lastId = $row['last_id'] ? intval($row['last_id']) + 1 : 1;
        } else {
            $lastId = 1;
        }

        // Generate unique code with padding (6 digits)
        $uniqueCode = 'LN' . str_pad($lastId, 6, '0', STR_PAD_LEFT);

        $otp = mt_rand(100000, 999999);
        // Email subject and body
        // $subject = "Your OTP Code";
        // $message = "Your OTP code is: $otp\n\nThis code is valid for 10 minutes.";
        // $headers = "From: your-email@example.com";

        // Send email using mail()
        // if (mail($email, $subject, $message, $headers)) {
        $result = mysqli_query($conn, "INSERT INTO `user_regiter`(`member_id`, `profile_for`, `profile_creater_name`, `creater_mobile`, `name`, `email`, `phone`, `password`, `OTP`) VALUES ('$uniqueCode','$creater','$name','$mobile','$name','$email','$mobile','$password','$otp')");
        if ($result) {
            // Store OTP in session for verification
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

        ?>
            <script>
                alert("OTP sent successfully to <?php echo $email; ?>");
                window.location.href = "otp_verify.php";
            </script>
        <?php
        } else {
            echo "Something went wrong";
        }
    }
}

if (isset($_POST['sign_in_button'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `email`='$username' AND `password`='$password'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userId'] = $row['id'];
        $_SESSION['userName'] = $row['name'];
        $_SESSION['memberId'] = $row['member_id'];
        $_SESSION['email'] = $row['email'];
        ?>
        <script>
            alert("User logged in successfully");
            window.location.href = "user_dashboard.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Invalid username or password");
            window.location.href = "login.php";
        </script>
<?php
    }
}
