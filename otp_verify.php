<?php
session_start();
require("./db_connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];

    if (isset($_SESSION['otp']) && $enteredOtp == $_SESSION['otp']) {
        $result = $conn->query("UPDATE `user_regiter` SET `OTP`='' WHERE `email`='$_SESSION[email]'");
        unset($_SESSION['otp']); // Clear OTP after successful verification
?>
        <script>
            alert("OTP verified successfully!");
            window.location.href = "login.php";
        </script>
<?php
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card p-4 text-center">
                    <form method="POST" action="">
                        <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
                        <button type="submit" class="btn btn-primary mt-4">Verify OTP</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>