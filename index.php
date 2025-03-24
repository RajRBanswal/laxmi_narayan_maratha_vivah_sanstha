<?php
require("./db_connection.php");
require("./navbar.php");
?>
<!-- Carousel Start -->
<div class="container-fluid carousel-header px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="img/carousel-1.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3 mx-auto">
                        <div class="card">
                            <form method="POST" action="./all_profile.php">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <select class="form-select form-control" name="gender">
                                            <option selected value="">I'm Looking For</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm" name="age_min" id="age_min">
                                            <option value="">Age From</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm " name="age_max" id="age_max">
                                            <option value="">End range</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button id="filter_search_btn" type="submit" name="filter_search_btn" class="btn btn-primary">
                                            Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-2.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3 mx-auto">
                        <div class="card">
                            <form method="POST" action="./all_profile.php">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <select class="form-select form-control" name="gender">
                                            <option selected value="">I'm Looking For</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm" name="age_min" id="age_min">
                                            <option value="">Age From</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm " name="age_max" id="age_max">
                                            <option value="">End range</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button id="filter_search_btn" type="submit" name="filter_search_btn" class="btn btn-primary">
                                            Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-3.png" class="img-fluid bg-secondary" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3 mx-auto">
                        <div class="card">
                            <form method="POST" action="./all_profile.php">
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <select class="form-select form-control" name="gender">
                                            <option selected value="">I'm Looking For</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm" name="age_min" id="age_min">
                                            <option value="">Age From</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control mob-hm " name="age_max" id="age_max">
                                            <option value="">End range</option>
                                            <option value="19">19</option>
                                            <option value='20'>20</option>
                                            <option value="21">21</option>
                                            <option value='22'>22</option>
                                            <option value='23'>23</option>
                                            <option value='24'>24</option>
                                            <option value='25'>25</option>
                                            <option value='26'>26</option>
                                            <option value='27'>27</option>
                                            <option value='28'>28</option>
                                            <option value='29'>29</option>
                                            <option value='30'>30</option>
                                            <option value='31'>31</option>
                                            <option value='32'>32</option>
                                            <option value='33'>33</option>
                                            <option value='34'>34</option>
                                            <option value='35'>35</option>
                                            <option value='36'>36</option>
                                            <option value='37'>37</option>
                                            <option value='38'>38</option>
                                            <option value='39'>39</option>
                                            <option value='40'>40</option>
                                            <option value='41'>41</option>
                                            <option value='42'>42</option>
                                            <option value='43'>43</option>
                                            <option value='44'>44</option>
                                            <option value='45'>45</option>
                                            <option value='46'>46</option>
                                            <option value='47'>47</option>
                                            <option value='48'>48</option>
                                            <option value='49'>49</option>
                                            <option value='50'>50</option>
                                            <option value='51'>51</option>
                                            <option value='52'>52</option>
                                            <option value='53'>53</option>
                                            <option value='54'>54</option>
                                            <option value='55'>55</option>
                                            <option value='56'>56</option>
                                            <option value='57'>57</option>
                                            <option value='58'>58</option>
                                            <option value='59'>59</option>
                                            <option value='60'>60</option>
                                            <option value='61'>61</option>
                                            <option value='62'>62</option>
                                            <option value='63'>63</option>
                                            <option value='64'>64</option>
                                            <option value='65'>65</option>
                                            <option value='above'>above</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button id="filter_search_btn" type="submit" name="filter_search_btn" class="btn btn-primary">
                                            Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="image_propra">
        <img src="./img/chhatrapati-shivaji-maharaj.png" width="100" class="shivaji_maharaj_img1" alt="" srcset="">

    </div>
</div>
<!-- Carousel End -->


<!-- Hello! Start -->
<!-- <div class="container-fluid position-relative py-5" id="weddingAbout">
    <div class="position-absolute" style="top: -35px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -10px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container position-relative py-5">
        <div class="mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800;">
            <h1 class="text-primary display-1">Vision & Mission!</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="text-end my-auto pe-4">
                                <h3 class="text-primary mb-3">Our Vision</h3>
                                <p class="text-dark mb-0" style="line-height: 30px;">To be the most trusted and preferred matrimonial service for the Maratha community, fostering meaningful and lifelong relationships.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="./img/attendance-bg.png" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="my-auto ps-4">
                                <h3 class="text-primary mb-3">Our Mission</h3>
                                <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> To provide a reliable and transparent matchmaking platform for Maratha brides and grooms.</p>
                                <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> To uphold the cultural values and traditions of the Maratha community while embracing modern matchmaking practices.</p>
                                <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> To ensure a smooth, secure, and efficient process in finding a suitable life partner.</p>
                                <p class="text-dark mb-0"><i class="fa fa-angle-right text-success"></i> To build a strong network of Maratha families and help them connect with the right alliances.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Hello! End -->

<!-- Hello! Start -->
<div class="container-fluid position-relative py-5" id="weddingAbout">
    <div class="position-absolute" style="top: -35px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -10px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container position-relative py-5">
        <div class="mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800;">
            <h1 class="text-primary display-6">लक्ष्मी नारायण मराठा विवाह संस्था</h1>
            <p class="text-primary fs-4">आपले सहर्ष स्वागत आहे</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="about_us">
                            <img src="img/logo.png" class="img-fluid w-100" alt="">
                            <p class="text-primary text-center fw-bold mb-0 image_text">
                                Laxmi Narayan <span style="color:#ff83cd">Maratha</span> <span class="text-success">Vivah Sanstha </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                        <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> आपल्या विवाह संस्थेत फक्त मराठा समाजातील मुला-मुलींची नावे नोंद केली जातात. त्यामध्ये प्रथम वधू व वर तसेच घटस्फोटीत, विधवा व विधुर स्थळांची नोंदणी केली जाते.</p>
                        <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> शिक्षित, उच्चशिक्षित, व नोकरदार, शेतकरी, उद्योजक सर्वांसाठी भरपूर मराठा स्थळे उपलब्ध.</p>
                        <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> आपला अनुभव जोडीदार निवडा आपल्या आवडीनुसार तसेच लग्न जुळवण्यासाठी शक्य तेवढे प्रयत्न केले जातात.</p>
                        <p class="text-dark fw-bold mb-1 text-end">( सविस्तर माहितीसाठी कृपया <a href="tel:9881749829">+91-9881749829</a> या नंबरवर संपर्क करावा.)</p>
                        <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> आपल्या विवाह संस्थेविषयी अधिक माहिती नियम व अटी तसेच नोंदणीविषयी संपूर्ण माहिती पाहण्यासाठी <q>Rules, T & C</q> या पर्यायाची पर्यायाचा वापर करा जेणेकरून तुम्हाला संपूर्ण माहिती मिळेल</p>
                        <p class="text-dark mb-1"><i class="fa fa-angle-right text-success"></i> आमच्या संस्थेच्या माध्यमातून आपणास अपेक्षित व अनुरूप स्थळ मिळावे आणि आपल्या घरातील मंगल कार्य आमच्या माध्यमातून घडावे ही ईश्वरचरणी प्रार्थना!</p>
                        <p class="text-primary fw-bold fs-6 text-center mb-0 ">धन्यवाद!!</p>
                        <p class="text-primary fw-bold mb-1 text-end">प्रो. प्रा. ऋषिकेश राजकुमार <br> गुंजाळ (BE, DME, B.I.)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hello! End -->


<!-- About Start -->
<div class="container-fluid about_us position-relative overflow-hidden bg-pink py-5">
    <img src="img/bg-flower.png" class="img-fluid position-absolute top-0" style="right: -15px; transform: rotate(270deg); opacity: 1;" alt="">
    <img src="img/bg-flower.png" class="img-fluid position-absolute" style="bottom: 10px; left: -15px; transform: rotate(90deg); opacity: 1;" alt="">
    <div class="container py-5 position-relative">
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="border-success p-3 bg-white" style="border-style: double;">
                    <img src="./img/lagn.jpg" width="100%" alt="">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-4">Our Process</h1>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    1) Fill up Registration Form
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">"Enter all mandatory details in the registration form."</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    2) Make a Payment of Membership
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">"Make the payment using the provided QR code image."</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    3) Approved From By Backend Team
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">"After the payment is successfully completed, your account will be activated by the backend team."</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    4) Biodata Profile Live on Website
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">"Your profile appears on the website."</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0">
                            <a href="./signup.php" class="btn btn-info btn-info-outline-0 py-2 px-4">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Story Start -->
<div class="container-fluid story position-relative py-5" id="weddingStory">
    <div class="position-absolute" style="top: -35px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -15px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container position-relative py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="text-uppercase text-primary fw-bold mb-4">Story</h5>
            <h1 class="display-4">Our Love Story</h1>
        </div>
        <div class="story-timeline">
            <div class="row wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-6 text-end border-0 border-top border-end border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="img/story-1.jpg" class="img-fluid w-100 img-border" alt="">
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h4 class="mb-2 text-dark">First Meet</h4>
                        <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                        <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h4 class="text-dark mb-2">First Date</h4>
                        <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                        <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="img/story-2.jpg" class="img-fluid w-100 img-border" alt="">
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-md-6 text-end border-end border-top border-secondary p-4 ps-0">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="img/story-3.jpg" class="img-fluid w-100 img-border" alt="">
                    </div>
                </div>
                <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h4 class="text-dark mb-2">Proposal</h4>
                        <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                        <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-md-row wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-md-6 text-end border border-start-0 border-secondary p-4 ps-0">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                        <h4 class="text-dark mb-2">Enagagement</h4>
                        <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">01 Jan 2050</p>
                        <p class="m-0 fs-5">Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                    </div>
                </div>
                <div class="col-md-6 border border-end-0 border-secondary p-4">
                    <div class="d-inline-flex align-items-center h-100">
                        <img src="img/story-4.jpg" class="img-fluid w-100 img-border" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Story End -->


<!--- Wedding Date -->
<!-- <div class="container-fluid wedding-date-bg position-relative py-5">
    <div class="position-absolute" style="top: -100px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container py-5 wow zoomIn" data-wow-delay="0.1s">
        <div class="wedding-date text-center bg-light p-5" style="border-style: double !important; border: 15px solid rgba(253, 93, 93, 0.5);">
            <div class="wedding-date-content">
                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                    <h4 class="text-dark text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">June 28, 2024</h4>
                </div>
                <h1 class="display-4">We Are Getting Married</h1>
                <p class="text-dark fs-5">Niloy Hotel New York , 123 West 23th Street, NY</p>
                <div class="d-flex align-items-center justify-content-center mb-5">
                    <div class="text-dark fs-2 me-4">
                        <div>00</div>
                        <span>Days</span>
                    </div>
                    <div class="text-dark fs-2 me-4">
                        <div>00</div>
                        <span>Hours</span>
                    </div>
                    <div class="text-dark fs-2 me-4">
                        <div>00</div>
                        <span>Mins</span>
                    </div>
                    <div class="text-dark fs-2 me-0">
                        <div>00</div>
                        <span>Secs</span>
                    </div>
                </div>
                <a class="btn btn-primary btn-primary-outline-0 py-3 px-5" href="#">Book Your Attendance</a>
            </div>
            <div class="position-absolute" style="top: 15%; right: -30px; transform: rotate(320deg); opacity: 0.5; z-index: 1;">
                <img src="img/attendance-bg.png" class="img-fluid" alt="">
            </div>
            <div class="position-absolute" style="top: 15%; left: -10px; transform: rotate(-320deg); opacity: 0.5; z-index: 1;">
                <img src="img/attendance-bg.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- Wedding Date -->


<!-- Wedding Timeline start -->
<div class="container-fluid wedding-timeline bg-secondary position-relative overflow-hidden py-5" id="weddingTimeline">
    <div class="position-absolute" style="top: 50%; left: -100px; transform: translateY(-50%); opacity: 0.5;">
        <img src="img/wedding-bg.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: 50%; right: -160px; transform: translateY(-50%); opacity: 0.5; rotate: 335deg;">
        <img src="img/wedding-bg.png" class="img-fluid" alt="">
    </div>
    <div class="container py-5 position-relative">
        <div class="text-center mb-5">
            <h1 class="display-4 text-white">Biodata</h1>
        </div>

        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide latest_biodata_carousel" data-bs-ride="carousel">
                <div class="carousel-inner g-3" role="listbox">
                    <?php
                    $getUser = mysqli_query($conn, "SELECT * FROM `user_regiter`");
                    $first = true; // Flag to track the first row
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($getUser)) { ?>
                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <?php
                                        if ($row['filename'] == "" || $row['filename'] == NULL) {
                                            echo "<img src='img/dummy_user.jpg' class='img-fluid'>";
                                        } else {
                                        ?>
                                            <img src="user_image/<?php echo $row['filename']; ?>" class="img-fluid">
                                        <?php } ?>
                                        <div class="member_id"><?php echo $row['member_id']; ?></div> <!-- Display user ID -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $first = false; // After first iteration, make it false 
                        ?>
                    <?php } ?>
                    <!-- <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="./img/bridesmaid-team-2.png" class="img-fluid">
                                    <div class="member_id">Slide 2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="./img/bridesmaid-team-2.png" class="img-fluid">
                                    <div class="member_id">Slide 3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="./img/bridesmaid-team-2.png" class="img-fluid">
                                    <div class="member_id">Slide 4</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="./img/bridesmaid-team-2.png" class="img-fluid">
                                    <div class="member_id">Slide 5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-img">
                                    <img src="./img/bridesmaid-team-2.png" class="img-fluid">
                                    <div class="member_id">Slide 6</div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Wedding Timeline End -->

<div class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-5">What Our Customers Say</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-card p-4 p-md-5">
                                <i class="fas fa-solid fa-quote-left quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                <div class="text-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Avatar" class="avatar mb-3">
                                    <h5 class="mb-1">Emma Thompson</h5>
                                    <p class="text-muted mb-0">Marketing Manager</p>
                                </div>
                                <p class="lead text-center mb-0">"This product has completely transformed our workflow.
                                    It's intuitive, powerful, and a joy to use every day. I can't imagine running our
                                    business without it now."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card p-4 p-md-5">
                                <i class="fas fa-solid fa-quote-left quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                <div class="text-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/men/47.jpg" alt="Avatar" class="avatar mb-3">
                                    <h5 class="mb-1">Michael Chen</h5>
                                    <p class="text-muted mb-0">Software Engineer</p>
                                </div>
                                <p class="lead text-center mb-0">"The level of customer support is outstanding. Whenever
                                    I've had a question or issue, the team has been quick to respond and always goes
                                    above and beyond to help."</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card p-4 p-md-5">
                                <i class="fas fa-solid fa-quote-left quote-icon position-absolute top-0 start-0 mt-3 ms-3"></i>
                                <div class="text-center mb-4">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Avatar" class="avatar mb-3">
                                    <h5 class="mb-1">Sophia Rodriguez</h5>
                                    <p class="text-muted mb-0">Small Business Owner</p>
                                </div>
                                <p class="lead text-center mb-0">"As a small business owner, I was hesitant to invest in
                                    new software, but this has paid for itself many times over. It's been a game-changer
                                    for my company's efficiency."</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Gallery Start -->
<div class="container-fluid gallery position-relative py-5" id="weddingGallery">
    <div class="position-absolute" style="top: -95px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container position-relative py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-2 text-dark">Success Stories</h1>
            <!-- <p class="fs-5 text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting</p> -->
        </div>
        <div class="row g-4">
            <?php
            $sql_plan = "SELECT * FROM `success_story` ORDER BY RAND() LIMIT 8";
            $result = mysqli_query($conn, $sql_plan);
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row['wedding_date'];
                $formattedDate = date("d-F-Y", strtotime($date));
            ?>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gallery-item">
                        <div class="gallery-img">
                            <img class="img-fluid w-100" src="./admin/couple_img/<?php echo $row['filename']; ?>" alt="">
                            <div class="hover-style"></div>
                            <div class="search-icon">
                                <a href="./admin/couple_img/<?php echo $row['filename']; ?>" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                            </div>
                        </div>
                        <div class="gallery-overlay bg-light border-secondary border-top-0 p-3 text-center" style="border-style: double;">
                            <h5><?php echo $row['name']; ?></h5>
                            <p class="text-dark mb-0"><?php echo $formattedDate; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-12 text-center wow fadeIn" data-wow-delay="0.2s">
                <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 me-2" href="./success_story.php">View All <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Gallery end -->


<!--- Bridesmaids & Groomsmen start -->
<div class="container-fluid team position-relative py-5">
    <div class="position-absolute" style="bottom: -80px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="bottom: -90px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -100px; right: 0;">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="position-absolute" style="top: -80px; left: 0; transform: rotate(150deg);">
        <img src="img/tamp-bg-1.png" class="img-fluid" alt="">
    </div>
    <div class="container py-5">
        <div class="mb-5 text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-2 text-dark">Bridesmaids & Groomsmen</h1>
            <p class="fs-5 text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting Ipsum is simply dummy text of the printing and typesetting Ipsum is simply dummy text of the printing and typesetting</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/bridesmaid-1.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">Amelia Alex</h5>
                            <h5 class="text-white fs-5 mb-0">Bridesmaid</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/bridesmaid-team-2.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">Amelia Alex</h5>
                            <h5 class="text-white fs-5 mb-0">Bridesmaid</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/bridesmaid-3.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">Amelia Alex</h5>
                            <h5 class="text-white fs-5 mb-0">Bridesmaid</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/bridesmaid-4.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">Amelia Alex</h5>
                            <h5 class="text-white fs-5 mb-0">Bridesmaid</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/Groomsmen-1.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">David John</h5>
                            <h5 class="text-white fs-5 mb-0">Groomsmen</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/Groomsmen-2.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">David John</h5>
                            <h5 class="text-white fs-5 mb-0">Groomsmen</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/Groomsmen-3.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">David John</h5>
                            <h5 class="text-white fs-5 mb-0">Groomsmen</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="team-item">
                    <div class="team-img">
                        <div class="team-img-main">
                            <img src="img/Groomsmen-4.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -30px; left: -100px; transform: rotate(50deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-img-bg position-absolute" style="bottom: -40px; right: -120px; transform: rotate(-30deg); z-index: 1;">
                            <img src="img/team-1-bg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="team-content">
                        <div class="d-flex flex-column p-4">
                            <h5 class="text-white display-6 mb-1">David John</h5>
                            <h5 class="text-white fs-5 mb-0">Groomsmen</h5>
                        </div>
                    </div>
                    <div class="team-social d-flex flex-column">
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-light btn-light-outline-0 mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-light btn-light-outline-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bridesmaids & Groomsmen End -->



<?php
require("./footer.php");
?>
<style>
    @media (max-width: 767px) {
        .latest_biodata_carousel .carousel-inner .carousel-item>div {
            display: none;
        }

        .latest_biodata_carousel .carousel-inner .carousel-item>div:first-child {
            display: block;
        }
    }

    .latest_biodata_carousel .carousel-inner .carousel-item .card {
        border: 0 !important;
        background-color: transparent !important;
        padding: 10px;
    }

    .latest_biodata_carousel .carousel-inner .carousel-item .card .card-img {
        border: 2px double #ff83cd !important;
        background-color: #e3e3e3 !important;
    }

    .latest_biodata_carousel .carousel-inner .carousel-item .card .card-img .member_id {
        padding: 5px 10px;
        text-align: center;
        font-weight: bold;
    }


    .latest_biodata_carousel .carousel-inner .carousel-item.active,
    .latest_biodata_carousel .carousel-inner .carousel-item-next,
    .latest_biodata_carousel .carousel-inner .carousel-item-prev {
        display: flex;
    }

    /* medium and up screens */
    @media (min-width: 768px) {

        .latest_biodata_carousel .carousel-inner .carousel-item-end.active,
        .latest_biodata_carousel .carousel-inner .carousel-item-next {
            transform: translateX(25%);
        }

        .latest_biodata_carousel .carousel-inner .carousel-item-start.active,
        .latest_biodata_carousel .carousel-inner .carousel-item-prev {
            transform: translateX(-25%);
        }
    }

    .latest_biodata_carousel .carousel-inner .carousel-item-end,
    .latest_biodata_carousel .carousel-inner .carousel-item-start {
        transform: translateX(0);
    }
</style>

<script>
    let items = document.querySelectorAll('.latest_biodata_carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 5
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })
</script>