<?php
require("./navbar.php");

?>
<link rel="stylesheet" href="./css/login.css">

<section class="login_main">
    <div class="container container_main">
        <div class="welcome">
            <div class="pinkbox">
                <!-- <div class="signup nodisplay">
                    <h1>Sign Up</h1>
                    <form class="more-padding" autocomplete="off" action="register.php" method="POST">
                        <input type="hidden" placeholder="Creater" name="creater" required>
                        <input type="text" placeholder="Name" name="name" required>
                        <input type="email" placeholder="Email" name="email" required>
                        <input type="tel" placeholder="Mobile" name="mobile" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button class="button submit" name="sign_up_button">Sign Up</button>
                    </form>
                </div> -->
                <div class="signin">
                    <h1>Sign In</h1>
                    <form class="more-padding" autocomplete="off" action="register.php" method="POST">
                        <input type="email" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button class="button submit" name="sign_in_button">Login</button>
                    </form>
                </div>
            </div>
            <div class="leftbox" id="leftbox">
                <h2 class="title">Laxmi Narayan<br> <span style="color:#ff83cd">Maratha</span><br><span class="text-success">Vivah Sanstha</span></h2>
                <p class="desc">Pick your perfect <span>bouquet</span></p>
                <img class="flower" src="https://preview.ibb.co/jvu2Un/0057c1c1bab51a0.jpg" alt="Flower">
                <p class="account">Don't have an account?</p>
                <a class="button btn btn-success" href="./signup.php" id="signup">Create Account</a>
            </div>
            <!-- <div class="rightbox" id="rightbox">
                <h2 class="title">Laxmi Narayan<br> <span style="color:#ff83cd">Maratha</span><br><span class="text-success">Vivah Sanstha</span></h2>
                <p class="desc">Pick your perfect <span>bouquet</span></p>
                <img class="flower" src="https://preview.ibb.co/jvu2Un/0057c1c1bab51a0.jpg" alt="Flower">
                <p class="account">Don't have an account?</p>
                <a class="button btn btn-success" href="./signup.php" id="signup">Create Account</a>
            </div> -->
        </div>
    </div>
</section>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // $('#signup').click(function() {
    //     $('.pinkbox').css('transform', 'translateX(100%)');
    //     $('.signin').addClass('nodisplay');
    //     $('.signup').removeClass('nodisplay');
    //     $('#leftbox').show();
    //     $('#rightbox').hide();
    // });



    // $('#signin').click(function() {
    //     $('.pinkbox').css('transform', 'translateX(0%)');
    //     $('.signup').addClass('nodisplay');
    //     $('.signin').removeClass('nodisplay');
    //     $('#leftbox').hide();
    //     $('#rightbox').show();
    // });
</script>

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