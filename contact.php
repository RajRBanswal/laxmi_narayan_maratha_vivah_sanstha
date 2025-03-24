<?php
require("./navbar.php");
?>

<section class="contact-page-sec">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marked"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>address</h2>
                            <span>Chh. Sambhajinagar, Maharashtra,</span>
                            <span>INDIA. 431001</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>E-mail</h2>
                            <span>info@laxminarayanmvs.com</span>
                            <span>laxminarayanmvs@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-info-text">
                            <h2>Phone</h2>
                            <span>+91-9876543210</span>
                            <span>+91-9999999999</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-page-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120073.07855538887!2d75.22279877615672!3d19.87023876036481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdb9815a369bc63%3A0x712d538b29a2a73e!2sChhatrapati%20Sambhaji%20Nagar%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sus!4v1742539323668!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-page-form" method="post">
                    <h2>Get in Touch</h2>
                    <form action="contact-mail.php" method="post">
                        <div class="row gx-3">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Your Name" name="name" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="email" placeholder="E-mail" name="email" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Phone Number" name="phone" required />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-input-field">
                                    <input type="text" placeholder="Subject" name="subject" />
                                </div>
                            </div>
                            <div class="col-md-12 message-input">
                                <div class="single-input-field">
                                    <textarea placeholder="Write Your Message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="single-input-fieldsbtn col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require("./footer.php");
?>