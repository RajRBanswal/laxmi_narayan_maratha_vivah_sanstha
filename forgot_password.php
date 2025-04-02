<?php
include("./db_connection.php");
require("./navbar.php");

if (isset($_POST['sendOTP'])) {
    $email = $_POST['email'];
    $sql = mysqli_query($conn, "SELECT * FROM  `user_regiter` WHERE `email` = '$email'");
    if (mysqli_num_rows($sql) > 0) {
        while ($ro = mysqli_fetch_array($sql)) {
            $otp = rand(1000, 9999);
            $to = $email;
            $subject = "Verfication Code";
            $message = "Dear " . $ro['name'] . "\r\n";
            $message = $otp . ' is your one time password (OTP) to log in to Wonderful Jodi. Please enter OTP to proceed.\r\n';
            $headers = $email;

            if (mail($to, $subject, $message, $headers)) {
                $id = $ro['id'];
                $sql = mysqli_query($conn, "UPDATE `user_regiter` SET `forget_pass_otp`='$otp' WHERE `id` = '$id'");
?>
                <script>
                    alert("You can now reset password");
                    window.location.href = 'reset_password.php?email=<?php echo $email; ?>';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("OTP not send.");
                </script>
        <?php
            }
        }
    } else {
        ?>
        <script>
            alert("Please enter valid Email.");
        </script>
<?php
    }
}

?>

<div class="main-container ">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 m-auto mt-5">
                <!-- ------------------- -->
                <div class="card p-4  shadow">
                    <div class="">
                        <div class="login-logo" style="text-align: center;">
                            <img src="./img/logo.png" width="100" alt="...">
                            <p class="text-primary fw-bold mb-0">
                                लक्ष्मी नारायण मराठा विवाह संस्था
                            </p>
                        </div>
                        <div class="mt30">
                            <h3 class="text-center mt30">Forgot Password</h3>
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter registered email id" required>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" name="sendOTP" class="btn btn-default" style="background-color: #ff004e; color: white;">Send OTP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require("./footer.php"); ?>