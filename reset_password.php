<?php
include("./db_connection.php");
require("./navbar.php");

$mail = $_GET['email'];
if (isset($_POST['password_reset'])) {
    $otp = $_POST['otp'];
    $psswd = md5($_POST['psswd']);
    $cnfPsswd = $_POST['cnfPsswd'];
    $sql = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `forget_pass_otp`='$otp'");
    while ($row = mysqli_fetch_array($sql)) {
        $otpZero = 0;
        $user_id = $row['id'];
        if ($row['email'] == $mail && $row['forget_pass_otp'] == $otp) {
            $updt = mysqli_query($conn, "UPDATE `user_regiter` SET `password`='$psswd',`forget_pass_otp`='$otpZero' WHERE `id`='$user_id'");
            if ($updt) {
?>
                <script>
                    alert("You can now login with your new password");
                    window.location.href = 'login-page';
                </script>
            <?php } else {
            ?>
                <script>
                    alert("There was a Problem, Please try again");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("There was a Problem, Please try again");
            </script>
<?php
        }
    }
}
?>

<div class="main-container">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card p-4   shadow">
                    <div class="login-logo" style="text-align: center;">
                        <img src="./img/logo.png" width="100" alt="...">
                        <p class="text-primary fw-bold mb-0">
                            लक्ष्मी नारायण मराठा विवाह संस्था
                        </p>
                    </div>
                    <div class="mt30">
                        <h1 class="text-center mt30">Reset Password</h1>
                        <form action="" method="POST">
                            <div class="form-group mt-2">
                                <label class="control-label" for="email">OTP</label>
                                <input id="email" name="otp" type="number" placeholder="OTP" class="form-control input-md" required>
                            </div>
                            <div class="form-group mt-2" id="psswdhide">
                                <label class="control-label" for="email">Password</label>
                                <input id="psswd" name="psswd" type="" class="form-control input-md" required>
                            </div>
                            <div class="form-group mt-2" id="cnfpsswdhide">
                                <label class="control-label" for="email">Confirm Password</label>
                                <input id="cnfPsswd" name="cnfPsswd" type="" class="form-control input-md">
                            </div>

                            <div class="form-group mt-4">
                                <button id="password_reset" name="password_reset" type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require("./footer.php"); ?>