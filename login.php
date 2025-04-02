<?php
require("./navbar.php");

?>
<link rel="stylesheet" href="./css/login.css">

<section class="login_main">
    <div class="container container_main">
        <div class="welcome">
            <div class="pinkbox">
                <div class="signin">
                    <h1>Sign In</h1>
                    <form class="more-padding" autocomplete="off" action="register.php" method="POST">
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <a href="./forgot_password.php">Forgot Password</a>
                        <button class="button submit" name="sign_in_button">Login</button>
                    </form>
                </div>
            </div>
            <div class="leftbox" id="leftbox">
                <h2 class="title">Laxmi Narayan<br>Maratha<br>Vivah Sanstha</h2>
                <p class="desc">Pick your perfect <span>bouquet</span></p>
                <img class="flower" src="https://preview.ibb.co/jvu2Un/0057c1c1bab51a0.jpg" alt="Flower">
                <p class="account">Don't have an account?</p>
                <a class="button btn btn-success" href="./signup.php" id="signup">Create Account</a>
            </div>
        </div>
    </div>
</section>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function validateForm() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const errorMessage = document.getElementById('errorMessage');

        if (password !== confirmPassword) {
            errorMessage.style.display = 'block';
            return false; // Prevent form submission
        } else {
            errorMessage.style.display = 'none';
            return true; // Allow form submission
        }
    }
</script>


<?php
require("./footer.php");
?>