<!-- Footer Start -->
<div class="container-fluid footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-2 justify-content-center align-items-center">
            <div class="col-lg-4 text-center pe-3">
                <div class="footer-item bg-light p-3 w-75" style="border-radius: 15px;">
                    <img src="img/logo.png" width="100" alt="">
                    <p class="text-primary text-center mb-0 image_text">
                        Laxmi Narayan Maratha Vivah Sanstha
                    </p>
                    <!-- <p class="text-primary text-center mb-0 image_text">
                        Laxmi Narayan <span style="color:#ff83cd">Maratha</span> <span class="text-success">Vivah Sanstha </span>
                    </p> -->
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6 col-6 text-start">
                        <div class="footer-item d-flex flex-column ps-3">
                            <a href="./about.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> About</a>
                            <a href="./login.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Member Login</a>
                            <a href="#" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Partner Search</a>
                            <a href="./contact.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6 text-start">
                        <div class="footer-item d-flex flex-column">
                            <a href="./term_and_condition.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Term & Conditions</a>
                            <a href="./privacy_policy.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Privacy Policy</a>
                            <a href="./success_story.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Success Stories</a>
                            <a href="./signup.php" class="btn-link"><i class="fa fa-angle-double-right text-warning"></i> Member Signup</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-start">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white">Contact Us</h4>
                    <a href="#" class="btn-link mb-2"><i class="fas fa-map-marker text-warning me-2"></i> Chh. Sambhajinagar, Maharashtra, India. 431001</a>
                    <a href="#" class="btn-link mb-2"><i class="fas fa-envelope text-warning me-2"></i> laxminarayanmarathavivah24@gmail.com</a>
                    <a href="tel:9881749829" class="btn-link mb-2"><i class="fas fa-phone text-warning me-2"></i> +91-9881749829</a>
                    <!-- <a href="tel:7972993586" class="btn-link mb-2"><i class="fas fa-phone text-warning me-2"></i> +91-7972993586</a> -->
                </div>
                <div class="btn-link d-flex mt-2">
                    <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-facebook-f"></i></a>
                    <!-- <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-twitter"></i></a> -->
                    <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-md-square btn-light btn-light-outline-0 me-0"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="mt-3 text-center text-white">Website visit count:</div>
                <div class="website-counter"></div>
            </div>
            <div class="col-lg-4 col-12 text-center">
                <small class="text-white fw-bold">Please inform us of the Transaction ID, Date, Amount, and your Bank Name & Branch via email, phone, or WhatsApp. Additionally, share a screenshot or photo of the payment by sending it to our email ID once the transfer is completed.</small>
                <img src="./img/QrCode.jpg" width="80%" alt="" srcset="">
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->




<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12 text-center text-md-center mb-md-0">
                <p class="text-light mb-0 fs-5 text-uppercase"><a href="#"><i class="fas fa-copyright text-light me-2 "></i>Laxmi Narayan Maratha Vivah Sanstha</a></p>
                <p class="text-light my-1">All rights reserved.</p>
                <p class="mb-0 fw-bold text-white">THIS IS NOT DATING WEBSITE</p>
            </div>
            <!-- <div class="col-md-6 text-center text-md-end text-white">
                Designed By <a class="border-bottom" href="https://ewebdigital.com">Vighnaharta E Web Digital</a>
            </div> -->
        </div>
    </div>
</div>
<!-- Copyright End -->



<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<a href="tel:+919881749829" class="btn btn-primary btn-primary-outline-0 headset_icon"><i class="fas fa-solid fa-headset"></i> <span>+91 9881749829</span></a>




<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>


<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="./layouts/main.js"></script>
<script>
    var counterContainer = document.querySelector(".website-counter");
    var resetButton = document.querySelector("#reset");
    var visitCount = localStorage.getItem("page_view");

    // Check if page_view entry is present
    if (visitCount) {
        visitCount = Number(visitCount) + 1;
    } else {
        visitCount = 0;
    }

    localStorage.setItem("page_view", visitCount);

    // Function to format number as five-digit string (e.g., 00001)
    function formatCount(count) {
        return count.toString().padStart(5, "0");
    }

    counterContainer.innerHTML = formatCount(visitCount);

    // Reset button event listener
    resetButton.addEventListener("click", () => {
        visitCount = 0;
        localStorage.setItem("page_view", visitCount);
        counterContainer.innerHTML = formatCount(visitCount);
    });
</script>

</body>

</html>