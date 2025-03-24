<?php
session_start();
require("./db_connection.php");
require("./navbar.php");


if (isset($_POST['registermember'])) {
    $sqlNumber = "SELECT MAX(SUBSTRING(member_id, 3)) as last_id FROM user_regiter WHERE member_id LIKE 'LN%'";
    $resultNumber = $conn->query($sqlNumber);

    if ($resultNumber && $row = $resultNumber->fetch_assoc()) {
        $lastId = $row['last_id'] ? intval($row['last_id']) + 1 : 1;
    } else {
        $lastId = 1;
    }

    // Generate unique code with padding (6 digits)
    $user_srno = 'LN' . str_pad($lastId, 6, '0', STR_PAD_LEFT);
    $profile_for = $_POST['profile_for'];
    $profile_creater_name = $_POST['profile_creater_name'];
    $creater_mobile_no = $_POST['creater_mobile_no'];

    $first_name = $_POST['first_name'];
    $father_name = $_POST['father_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_brith = $_POST['date_of_brith'];
    $birth_time = $_POST['birth_time'];
    $language = $_POST['language'];
    $diet = $_POST['diet'];
    $liveWithFamily = $_POST['live_family'];
    $marital_status = $_POST['marital_status'];
    $height = $_POST['height'];
    $blood_group = $_POST['blood_group'];
    $zodiac = $_POST['zodiac'];
    $religion = $_POST['religion'];
    $caste = "";
    if ($_POST['caste2'] != "" || $_POST['caste2'] != null) {
        $caste = $_POST['caste2'];
    } elseif ($religion == "Other") {
        $caste = $_POST['caste1'];
    } else {
        $caste = $_POST['caste'];
    }

    // $sub_cast = $_POST['sub_cast'];
    $intercaste = $_POST['intercaste'];
    $education = $_POST['education'];
    $education_detail = "";
    if ($_POST['education_detail2'] != "" || $_POST['education_detail2'] != null) {
        $education_detail = $_POST['education_detail2'];
    } elseif ($education == "Other") {
        $education_detail = $_POST['education_detail1'];
    } else {
        $education_detail = $_POST['education_detail'];
    }
    $profession = $_POST['profession'];
    $income = $_POST['income'];
    $working_city = $_POST['working_city'];
    $country = $_POST['country'];
    $state = "";
    $city = "";
    if ($_POST['state'] == "" || $_POST['state'] == null) {
        $state = $_POST['state1'];
        $city = $_POST['city1'];
    } else {
        $state = $_POST['state'];
        $city = $_POST['city'];
    }
    $current_address = $_POST['current_address'];
    $permanent_address = $_POST['permanent_address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $whatsapp = $_POST['whatsapp'];
    $inputPassword = md5($_POST['inputPassword']);
    $Accept = $_POST['Accept'];
    $fullname = $first_name . " " . $father_name . " " . $last_name;
    $age = $_POST['age'];
    $filename = $_FILES["profile_image"]["name"];
    $tempname = $_FILES["profile_image"]["tmp_name"];
    $folder = "user_image/" . $filename;

    $data = $_POST['profile_images'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $img = time() . '.png';
    $image_name = 'user_image/' . $img;

    file_put_contents($image_name, $data);

    $filename1 = $_FILES["apvi_image"]["name"];
    $tempname1 = $_FILES["apvi_image"]["tmp_name"];
    $folder1 = "user_image/" . $filename1;
    $date = date('Y-m-d');
    $days =  30;
    $userimg = "dummyUsers.png";
    $expiry = date('Y-m-d', strtotime($date . ' + ' . $days . ' days'));

    $findCount = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE `email`='$email' OR `phone`='$mobile'");
    $cccc = mysqli_num_rows($findCount);
    if ($cccc <= 0) {

        $otp = rand(100000, 999999);
        $to = $email;
        $subject = "Verfication Code";
        $message = "Dear " . $fullname . "\r\n";
        $message = $otp . ' is your one time password (OTP) to log in to Laxmi Narayan Maratha Vivah Sanstha. Please enter OTP to proceed.\r\n';
        $headers = $email;
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        // if (mail($to, $subject, $message, $headers)) {
        if ($img == "" || $img == null) {


            move_uploaded_file($tempname1, $folder1);
            //   move_uploaded_file($data, $image_name);
            $sql1 = "INSERT INTO `user_regiter`(`profile_for`,`profile_creater_name`,`creater_mobile`,`member_id`,`name`, `email`, `phone`, `whatsapp_no`, `password`, `country`, `state`, `city`, `address`, `perma_address`, `marStat`, `rashi`, `lang`, `diet`, `height`, `religion`, `sub-com`, `community-checkbox`, `HighEdu`, `edu_degree`, `prof`, `working_city`, `income`, `yes/no`, `bGrp`, `bDate`, `age`, `gender`, `bTime`, `bLocation`, `term_and_cond`, `filename`, `adhar_pan_voter_image`, `OTP`,`status`) VALUES ('$profile_for','$profile_creater_name','$creater_mobile_no','$user_srno','$fullname','$email','$mobile','$whatsapp','$inputPassword','$country','$state','$city','$current_address','$permanent_address','$marital_status','$zodiac','$language','$diet','$height','$religion','$caste','$intercaste','$education','$education_detail','$profession','$working_city','$income','$liveWithFamily','$blood_group','$date_of_brith','$age','$gender','$birth_time','$current_address','$Accept','$userimg','$filename1','$otp',1)";
            if (mysqli_query($conn, $sql1)) {
                $lastId = mysqli_insert_id($conn);
                if (move_uploaded_file($data, $image_name)) {
                    echo '<script>alert("Your OTP has been sent to your registered email address. Please check your inbox or spam folder if you do not see it");</script>';
                    echo '<script>  window.location.href = "otp_verify.php?id=' . $lastId . '";</script>';
                } else {
                    echo '<script>alert("Data not saved");</script>';
                    echo '<script> window.location.href = "otp_verify.php?id=' . $lastId . '";</script>';
                }
            }
        } else {
            move_uploaded_file($tempname1, $folder1);
            // move_uploaded_file($data, $image_name);
            $sql1 = "INSERT INTO `user_regiter`(`profile_for`,`profile_creater_name`,`creater_mobile`,`member_id`,`name`, `email`, `phone`, `whatsapp_no`, `password`, `country`, `state`, `city`, `address`, `perma_address`, `marStat`, `rashi`, `lang`, `diet`, `height`, `religion`, `sub-com`, `community-checkbox`, `HighEdu`, `edu_degree`, `prof`,  `income`, `yes/no`, `bGrp`, `bDate`, `age`, `gender`, `bTime`, `bLocation`, `term_and_cond`, `filename`, `adhar_pan_voter_image`, `OTP`, `status`) VALUES ('$profile_for','$profile_creater_name','$creater_mobile_no','$user_srno','$fullname','$email','$mobile','$whatsapp','$inputPassword','$country','$state','$city','$current_address','$permanent_address','$marital_status','$zodiac','$language','$diet','$height','$religion','$caste','$intercaste','$education','$education_detail','$profession','$income','$liveWithFamily','$blood_group','$date_of_brith','$age','$gender','$birth_time','$current_address','$Accept','$img','$filename1','$otp',1)";
            //               var_dump($sql1);
            // die();
            if (mysqli_query($conn, $sql1)) {
                $lastId = mysqli_insert_id($conn);
                if (move_uploaded_file($tempname, $folder)) {
                    echo '<script>alert("Your OTP has been sent to your registered email address. Please check your inbox or spam folder if you do not see it");</script>';
                    echo '<script>  window.location.href = "otp_verify.php?id=' . $lastId . '";</script>';
                } else {
                    echo '<script>alert("Data not saved");</script>';
                    echo '<script> window.location.href = "otp_verify.php?id=' . $lastId . '";</script>';
                }
            }
        }
        // } else { 
?>
        <script>
            // alert('Mail not sent');
            // window.location.href = 'signup.php';
        </script>

    <?php

        // }
    } else { ?>
        <script>
            alert('Email id or Mobile no already exist! use another Email or Mobile no');
        </script>
<?php }
}

?>


<div id="container" class="container mt-5">
    <div class="progress px-1" style="height: 3px;">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="step-container d-flex justify-content-between">
        <div class="step-circle">1</div>
        <div class="step-circle">2</div>
        <div class="step-circle">3</div>
        <div class="step-circle">4</div>
        <div class="step-circle">5</div>
        <div class="step-circle">6</div>
        <!-- onclick="displayStep(1)"
onclick="displayStep(2)"
onclick="displayStep(3)"
onclick="displayStep(4)"
onclick="displayStep(5)"
onclick="displayStep(6)" -->
    </div>

    <form id="multi-step-form">
        <div class="step step-1">
            <!-- Step 1 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard  my-3">
                <h5 class="heading">Important Information</h5>
                <hr>
                <div class="row">
                    <div class="form-group col-lg-4 col-12">
                        <label>Matrimony Profile for <span style="color:red">&nbsp;*</span></label>
                        <select name="profile_for" id="profile_for" class="form-control form-select" autofocus="" required>
                            <option value="">Select Profile</option>
                            <option value="Myself">Self</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Son">Son</option>
                            <option value="Sister">Sister</option>
                            <option value="Brother">Brother</option>
                            <option value="Relative">Relative</option>
                            <option value="Friend">Friend</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label>Name <span style="color:red">&nbsp;*</span></label>
                        <input name="profile_creater_name" id="profile_creater_name" type="text" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label>Mobile Number <span style="color:red">&nbsp;*</span></label>
                        <input type="text" name="creater_mobile_no" id="creater_mobile_no" class="form-control" onchange="visibleButton()" placeholder="Mobile" required>
                    </div>

                </div>
            </div>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>

        <div class="step step-2">
            <!-- Step 2 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard my-3">
                <div class="registration" style="margin:10px;">
                    <h5 class="heading">Basic Information</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4" style="padding-top:10px;">
                            First Name <span style="color:red">&nbsp;*</span>
                            <input value="" id="first_name" class="form-control" type="text" name="first_name" placeholder="First Name" required="">
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Middle Name <span style="color:red">&nbsp;*</span>
                            <input value="" id="father_name" class="form-control" type="text" name="father_name" placeholder="Middle Name" required="">
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Last Name <span style="color:red">&nbsp;*</span>
                            <input value="" id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name" required="">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4" style="padding-top:10px;">
                            Gender <span style="color:red">&nbsp;*</span>
                            <select name="gender" id="gender" class="form-control form-select" required="">
                                <option value="">Choose one</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Date of Birth
                            <input type="date" class="form-control" name="date_of_brith" id="date_of_brith" value="" required="" onchange="getAge(this.value)">
                            <input class="form-control" type="hidden" name="age" id="age">
                        </div>
                        <div class="col-md-4" style="padding-top:10px;">
                            Birth Time <span style="font-size:12px;">(In 24 Hour Format)</span>
                            <input type="time" class="form-control" name="birth_time" id="birth_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4" style="padding-top:10px;">
                            Marital Status
                            <select name="marital_status" id="marital_status" class="form-control form-select">
                                <option value="">Select Marital Status</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed </option>
                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-md-4" style="padding-top:10px;">
                            Height
                            <select name="height" id="height" class="form-control form-select">
                                <option value="" data-select2-id="6">Choose one</option>
                                <option value="4.0">4 feet 0 inch</option>
                                <option value="4.1">4 feet 1 inch</option>
                                <option value="4.2">4 feet 2 inch</option>
                                <option value="4.3">4 feet 3 inch</option>
                                <option value="4.4">4 feet 4 inch</option>
                                <option value="4.5">4 feet 5 inch</option>
                                <option value="4.6">4 feet 6 inch</option>
                                <option value="4.7">4 feet 7 inch</option>
                                <option value="4.8">4 feet 8 inch</option>
                                <option value="4.9">4 feet 9 inch</option>
                                <option value="4.10">4 feet 10 inch</option>
                                <option value="4.11">4 feet 11 inch</option>
                                <option value="5.0">5 feet 0 inch</option>
                                <option value="5.1">5 feet 1 inch</option>
                                <option value="5.2">5 feet 2 inch</option>
                                <option value="5.3">5 feet 3 inch</option>
                                <option value="5.4">5 feet 4 inch</option>
                                <option value="5.5">5 feet 5 inch</option>
                                <option value="5.6">5 feet 6 inch</option>
                                <option value="5.7">5 feet 7 inch</option>
                                <option value="5.8">5 feet 8 inch</option>
                                <option value="5.9">5 feet 9 inch</option>
                                <option value="5.10">5 feet 10 inch</option>
                                <option value="5.11">5 feet 11 inch</option>
                                <option value="6.0">6 feet 0 inch</option>
                                <option value="6.1">6 feet 1 inch</option>
                                <option value="6.2">6 feet 2 inch</option>
                                <option value="6.3">6 feet 3 inch</option>
                                <option value="6.4">6 feet 4 inch</option>
                                <option value="6.5">6 feet 5 inch</option>
                                <option value="6.6">6 feet 6 inch</option>
                                <option value="6.7">6 feet 7 inch</option>
                                <option value="6.8">6 feet 8 inch</option>
                                <option value="6.9">6 feet 9 inch</option>
                                <option value="6.10">6 feet 10 inch</option>
                                <option value="6.11">6 feet 11 inch</option>
                                <option value="7.0">7 feet 0 inch</option>
                                <option value="7.1">7 feet 1 inch</option>
                                <option value="7.2">7 feet 2 inch</option>
                                <option value="7.3">7 feet 3 inch</option>
                                <option value="7.4">7 feet 4 inch</option>
                                <option value="7.5">7 feet 5 inch</option>
                                <option value="7.6">7 feet 6 inch</option>
                                <option value="7.7">7 feet 7 inch</option>
                                <option value="7.8">7 feet 8 inch</option>
                                <option value="7.9">7 feet 9 inch</option>
                                <option value="7.10">7 feet 10 inch</option>
                                <option value="7.11">7 feet 11 inch</option>
                                <option value="8.0">8 feet 0 inch</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="padding-top:10px;">
                            Blood Group
                            <select name="blood_group" id="blood_group" class="form-control form-select">
                                <option value="" data-select2-id="8">Choose one</option>
                                <option value="Don`t Know">Don't Know</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div style="padding-top:10px;">
                                Mother Tongue <span style="color:red">&nbsp;*</span>
                                <input id="language" class="form-control" type="text" name="language" required="" placeholder="Mother Tongue">
                            </div>

                        </div>



                        <div class="col-sm-4">
                            <div style="padding-top:10px;">
                                <div class="form-group">
                                    <label>Diet</label>
                                    <select name="diet" class="form-control select form-select" id="diet">
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Neg">Non-Neg</option>
                                        <option value="Occasionally Non-Veg">Occasionally Non-Veg</option>
                                        <option value="Eggetarian">Eggetarian</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Vegan">Vegan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4" style="padding-top:15px;">
                            <div class="form-group">
                                <label>Do You Live With your Family </label>
                                <div class="form-group">
                                    <p>
                                        <input type="radio" id="yes" name="live_family" value="Yes" checked> Yes</input> &nbsp;
                                        <input type="radio" id="no" name="live_family" value="No"> No</input>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4" style="padding-top:10px;">
                            Zodiac
                            <select name="zodiac" id="zodiac" class="form-control form-select">
                                <option value="">Select</option>
                                <option value="Aries">Aries</option>
                                <option value="Taurus">Taurus</option>
                                <option value="Gemini">Gemini</option>
                                <option value="Cancer">Cancer</option>
                                <option value="Leo">Leo</option>
                                <option value="Virgo">Virgo</option>
                                <option value="Libra">Libra</option>
                                <option value="Scorpio">Scorpio</option>
                                <option value="Sagittarius">Sagittarius</option>
                                <option value="Capricorn">Capricorn</option>
                                <option value="Aquarius">Aquarius</option>
                                <option value="Pisces">Pisces</option>
                                <option value="Don`t know">Don't know </option>
                            </select>
                        </div>
                        <!--<div class="col-md-4" style="padding-top:10px;">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Date</label>-->
                        <!--        <input id="reg.date" name="" class="form-control" type="date"/>-->

                        <!--    </div>-->

                        <!--</div>-->
                        <div class="col-md-4" style="padding-top:10px;">
                            <small style="color:red;">Upload Aadhar/ Pan/ Voter/ Emp Cards<span>*</span></small>
                            <input type="file" class="form-control" id="apvi_image" name="apvi_image" accept="image/*" required>
                        </div>
                        <div class="col-md-4" style="padding-top:10px;">
                            Upload Profile Photo
                            <!--<input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">-->
                            <div class="image_area">
                                <!--<form method="post">-->
                                <label for="upload_image">
                                    <input type="file" class="form-control" name="profile_image" class="image" id="upload_image" />
                                    <textarea type="hidden" class="form-control" name="profile_images" id="image_length" style="display:none;"></textarea>
                                    <img src="./user_image/dummyUsers.png" id="uploaded_image" class="img-responsive img-circle mt-2" width="200" height="200" style="display:none" />
                                </label>
                                <!--</form>-->
                            </div>
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="CropModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="CropModalLabel">Crop Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="img-container">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img src="" id="sample_image" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .image_area {
                                position: relative;
                            }

                            img {
                                display: block;
                                max-width: 100%;
                            }

                            .preview {
                                overflow: hidden;
                                width: 160px;
                                height: 160px;
                                margin: 10px;
                                border: 1px solid red;
                            }

                            .modal-lg {
                                max-width: 1000px !important;
                            }

                            .overlay {
                                position: absolute;
                                bottom: 10px;
                                left: 0;
                                right: 0;
                                background-color: rgba(255, 255, 255, 0.5);
                                overflow: hidden;
                                height: 0;
                                transition: .5s ease;
                                width: 100%;
                            }

                            .image_area:hover .overlay {
                                height: 50%;
                                cursor: pointer;
                            }

                            .text {
                                color: #333;
                                font-size: 20px;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                -webkit-transform: translate(-50%, -50%);
                                -ms-transform: translate(-50%, -50%);
                                transform: translate(-50%, -50%);
                                text-align: center;
                            }
                        </style>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>

        <div class="step step-3">
            <!-- Step 3 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard my-3">
                <div class="religious_information" style="margin:10px;">
                    <h5 class="heading">Religious Information</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4" style="padding-top:10px;">
                            Religion <span style="color:red">&nbsp;*</span>

                            <select name="religion" id="religion" class="form-control form-select" onchange="setCasteOther(this.value)" required="">
                                <option value="" data-id="">Select Religion</option>
                                <option value="Hindu" data-id="1">Hindu</option>
                                <!-- <option value="Buddhist" data-id="2">Buddhist</option>
                                <option value="Christian" data-id="3">Christian</option>
                                <option value="Jain" data-id="4">Jain</option>
                                <option value="Muslim" data-id="5">Muslim</option>
                                <option value="Parsi" data-id="6">Parsi</option>
                                <option value="Sikh" data-id="7">Sikh</option>
                                <option value="Other" data-id="8">Other</option> -->
                            </select>
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Caste <span style="color:red">&nbsp;*</span>
                            <input type="text" name="caste1" id="caste1" class="form-control" placeholder="Enter Caste" style="display:none">

                            <select name="caste" id="caste" class="form-control form-select" onchange="OtherCaste(this.value);getSubCaste(this.value);">
                            </select>
                        </div>
                        <div class="col-sm-4 OtherCaste" style="padding-top:10px;display:none;">
                            Caste <span style="color:red">&nbsp;*</span>
                            <input type="text" name="caste2" id="caste2" class="form-control" placeholder="Enter Caste">
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Intercaste Accepted
                            <select name="intercaste" id="intercaste" class="form-control form-select" data-select2-id="intercaste" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                <option value="No">Not Accepted</option>
                                <option value="Yes">Accepted</option>
                            </select>
                        </div>
                        <script>
                            function OtherCaste(vlas) {
                                if (vlas == "Other") {
                                    $(".OtherCaste").show();
                                } else {
                                    $(".OtherCaste").hide();
                                }
                            }

                            function setCasteOther(cas) {
                                if (cas == "Other") {
                                    $('#caste1').show();
                                    $('#caste').hide();
                                    $(".OtherCaste").hide();
                                    $("#caste2").val("");
                                } else {
                                    $(".OtherCaste").hide();
                                    $("#caste2").val("");
                                    $('#caste').show();
                                    $('#caste1').hide();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
        <div class="step step-4">
            <!-- Step 3 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard my-3">
                <div class="education_information" style="margin:10px;">
                    <h5 class="heading">Education Information</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6" style="padding-top:10px;">
                            Education
                            <select name="education" id="education" class="form-control form-select education" onchange="setOtherEducation(this.value)">
                                <option value="" data-id="">Select</option>
                                <option value="Diploma" data-id="1">Diploma</option>
                                <option value="Doctors" data-id="2">Doctors</option>
                                <option value="Graduate" data-id="3">Graduate</option>
                                <option value="Masters" data-id="4">Masters</option>
                                <option value="Ph.D" data-id="5">Ph.D</option>
                                <option value="Under Graduate" data-id="6">Under Graduate</option>
                                <option value="Other" data-id="7">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Education Degree
                            <input type="text" name="education_detail1" id="education_detail1" class="form-control" placeholder="Enter Education Degree" style="display:none" />
                            <select name="education_detail" id="education_detail" class="form-control form-select" onchange="OtherDegree(this.value)">
                            </select>
                        </div>
                        <div class="col-sm-2 OtherDegreeData" style="padding-top:10px;display:none;">
                            Enter Degree
                            <input type="text" name="education_detail2" id="education_detail2" class="form-control" placeholder="Enter Degree" />
                        </div>
                    </div>
                    <script>
                        function OtherDegree(vals) {
                            if (vals == "Other") {
                                $('.OtherDegreeData').show();
                            } else {
                                $('.OtherDegreeData').hide();
                            }
                        }

                        function setOtherEducation(edu) {
                            if (edu == "Other") {
                                $('#education_detail1').show();
                                $('#education_detail').hide();
                                $('.OtherDegreeData').hide();
                                $('#education_detail2').val("");
                            } else {
                                $('#education_detail').show();
                                $('#education_detail1').hide();
                                $('#education_detail2').val("");
                                $('.OtherDegreeData').hide();
                            }
                        }
                    </script>
                    <div class="form-group row">
                        <div class="col-sm-4" style="padding-top:10px;">
                            Profession
                            <select name="profession" id="profession" class="form-control form-select">
                                <option value="">Select Profession</option>
                                <?php
                                $prof = mysqli_query($conn, "SELECT * FROM `profession`");
                                while ($prof_row = mysqli_fetch_array($prof)) {
                                    echo '<option value=' . $prof_row['prof'] . '>' . $prof_row['prof'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Income Annual/Monthly
                            <select name="income" id="income" class="form-control form-select" data-select2-id="income" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="25">Select</option>
                                <option value="No Income">No Income</option>

                                <option value="0 To 1 Lac P.A">0 To 1 Lac P.A</option>
                                <option value="1 TO 2 Lac P.A">1 TO 2 Lac P.A</option>
                                <option value="2 To 3 Lac P.A">2 To 3 Lac P.A</option>
                                <option value="3 To 4 Lac P.A">3 To 4 Lac P.A</option>
                                <option value="4 To 5 Lac P.A">4 To 5 Lac P.A</option>
                                <option value="5 To 6 Lac P.A">5 To 6 Lac P.A</option>
                                <option value="6 To 7 Lac P.A">6 To 7 Lac P.A</option>
                                <option value="7 To 8 Lac P.A">7 To 8 Lac P.A</option>
                                <option value="8 To 9 Lac P.A">8 To 9 Lac P.A</option>
                                <option value="9 To 10 Lac P.A">9 To 10 Lac P.A</option>
                                <option value="10 To 11 Lac P.A">10 To 11 Lac P.A</option>
                                <option value="11 To 12 Lac P.A">11 To 12 Lac P.A</option>
                                <option value="12 To 13 Lac P.A">12 To 13 Lac P.A</option>
                                <option value="13 To 14 Lac P.A">13 To 14 Lac P.A</option>
                                <option value="14 To 15 Lac P.A">14 To 15 Lac P.A</option>
                                <option value="15 To 16 Lac P.A">15 To 16 Lac P.A</option>
                                <option value="16 To 17 Lac P.A">16 To 17 Lac P.A</option>
                                <option value="17 To 18 Lac P.A">17 To 18 Lac P.A</option>
                                <option value="18 To 19 Lac P.A">18 To 19 Lac P.A</option>
                                <option value="19 To 20 Lac P.A">19 To 20 Lac P.A</option>
                                <option value="20 To 21 Lac P.A">20 To 21 Lac P.A</option>
                                <option value="25 To 26 Lac P.A">25 To 26 Lac P.A</option>
                                <option value="29 To 30 Lac P.A">29 To 30 Lac P.A</option>
                                <option value="34 To 35 Lac P.A">34 To 35 Lac P.A</option>
                                <option value="35 To 36 Lac P.A">35 To 36 Lac P.A</option>
                                <option value="40 To 41 Lac P.A">40 To 41 Lac P.A</option>
                                <option value="45 To 46 Lac P.A">45 To 46 Lac P.A</option>
                                <option value="50 To 55 Lac P.A">50 To 55 Lac P.A</option>

                                <option value="65 To 70 Lac P.A">65 To 70 Lac P.A</option>
                                <option value="55 To 60 Lac P.A">55 To 60 Lac P.A</option>
                                <option value="21 To 22 Lac P.A">21 To 22 Lac P.A</option>
                                <option value="22 To 23 Lac P.A">22 To 23 Lac P.A</option>
                                <option value="23 To 24 Lac P.A">23 To 24 Lac P.A</option>
                                <option value="24 To 25 Lac P.A">24 To 25 Lac P.A</option>
                                <option value="26 To 27 Lac P.A">26 To 27 Lac P.A</option>
                                <option value="27 To 28 Lac P.A">27 To 28 Lac P.A</option>
                                <option value="28 To 29 Lac P.A">28 To 29 Lac P.A</option>
                                <option value="30 To 31 Lac P.A">30 To 31 Lac P.A</option>
                                <option value="31 To 32 Lac P.A">31 To 32 Lac P.A</option>
                                <option value="32 To 33 Lac P.A">32 To 33 Lac P.A</option>
                                <option value="33 To 34 Lac P.A">33 To 34 Lac P.A</option>
                                <option value="36 To 37 Lac P.A">36 To 37 Lac P.A</option>
                                <option value="37 To 38 Lac P.A">37 To 38 Lac P.A</option>
                                <option value="38 To 39 Lac P.A">38 To 39 Lac P.A</option>
                                <option value="39 To 40 Lac P.A">39 To 40 Lac P.A</option>
                                <option value="41 To 42 Lac P.A">41 To 42 Lac P.A</option>
                                <option value="42 To 43 Lac P.A">42 To 43 Lac P.A</option>
                                <option value="43 To 44 Lac P.A">43 To 44 Lac P.A</option>
                                <option value="44 To 45 Lac P.A">44 To 45 Lac P.A</option>
                                <option value="46 To 47 Lac P.A">46 To 47 Lac P.A</option>
                                <option value="47 To 48 Lac P.A">47 To 48 Lac P.A</option>
                                <option value="48 To 49 Lac P.A">48 To 49 Lac P.A</option>
                                <option value="49 To 50 Lac P.A">49 To 50 Lac P.A</option>
                                <option value="60 To 65 Lac P.A">60 To 65 Lac P.A</option>
                                <option value="70 To 75 Lac P.A">70 To 75 Lac P.A</option>
                                <option value="75 To 80 Lac P.A">75 To 80 Lac P.A</option>
                                <option value="80 To 85 Lac P.A">80 To 85 Lac P.A</option>
                                <option value="85 To 90 Lac P.A">85 To 90 Lac P.A</option>
                                <option value="90 To 95 Lac P.A">90 To 95 Lac P.A</option>
                                <option value="95 To 1 Cr P.A">95 To 1 Cr P.A</option>
                                <option value="Above 1 Cr">Above 1 Cr</option>
                                <option value="Not Mention">Not Mention</option>
                            </select>
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Working City
                            <input value="" type="text" class="form-control" name="working_city" id="working_city">

                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
        <div class="step step-5">
            <!-- Step 3 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard my-3">
                <div class="location_information" style="margin:10px;">
                    <h5 class="heading">Location Information</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4" style="padding-top:10px;">
                            Country<span style="color:red">&nbsp;*</span>
                            <select name="country" id="country" required="" class="form-control form-select" onchange="getState(this.value);setOtherStateCity(this.value)">
                                <option value="">Select Country</option>
                                <option value="105">India</option>
                                <option value="other">Other</option>
                            </select>

                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            State<span style="color:red">&nbsp;*</span>
                            <input name="state1" id="state1" class="form-control" placeholder="State" style="display:none" />
                            <select name="state" id="state" class="form-control form-select" onchange="getCity(this.value);">
                            </select>
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            City<span style="color:red">&nbsp;*</span>
                            <input name="city1" id="city1" class="form-control " placeholder="City" style="display:none" />
                            <select name="city" id="city" class="form-control form-select" onchange="getSubCity()">
                            </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="29" style="width: 529px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-dist-container"><span class="select2-selection__rendered" id="select2-dist-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                    <script>
                        function setOtherStateCity(StateCity) {
                            if (StateCity == "other") {
                                $('#state1').show();
                                $('#city1').show();
                                $('#state1').attr("required", "true");
                                $('#city1').attr("required", "true");

                                $('#state').hide();
                                $('#city').hide();
                                $('#state').removeAttr("required");
                                $('#city').removeAttr("required");
                            } else {
                                $('#state').show();
                                $('#city').show();
                                $('#state').attr("required", "true");
                                $('#city').attr("required", "true");

                                $('#state1').hide();
                                $('#city1').hide();
                                $('#state1').removeAttr("required");
                                $('#city1').removeAttr("required");
                            }
                        }
                    </script>
                    <div class="form-group row">
                        <div class="col-sm-6" style="padding-top:10px;">
                            Current Address
                            <textarea type="number" class="form-control" name="current_address" rows="1" id="current_address"></textarea>
                        </div>
                        <div class="col-sm-6" style="padding-top:10px;">
                            Permanent Address :&nbsp;&nbsp;<input type="checkbox" id="sameascurrentaddress" name="sameascurrentaddress" onchange="addAddress()"> <label for="sameascurrentaddress"> Same as Current Address</label>
                            <textarea type="number" class="form-control" name="permanent_address" rows="1" id="permanent_address"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
        <div class="step step-6">
            <!-- Step 3 form fields here -->
            <div class="px-lg-5 px-3 py-5 DataCard my-3">
                <div class="other_information" style="margin:10px;">
                    <h5 class="heading">Contact Information</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4" style="padding-top:10px;">
                            Email<span style="color:red">&nbsp;*</span>
                            <input value="" type="email" class="form-control" name="email" id="inputEmailAddress" required="" oninvalid="this.setCustomValidity('Enter Email Address Here')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Mobile <span style="color:red">&nbsp;*</span>
                            <input value="" type="text" class="form-control" name="mobile" id="inputMobile" required="" maxlength="10" oninvalid="this.setCustomValidity('Enter Mobile Number Here')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-sm-4" style="padding-top:10px;">
                            Whatsapp Number <span style="color:red">&nbsp;*</span>

                            <input value="" type="text" maxlength="10" class="form-control" name="whatsapp" id="whatsapp">
                        </div>
                    </div>
                    <div class="form-group row">


                        <div class="col-sm-4" style="padding-top:10px;">
                            Password <span style="color:red">&nbsp;*</span>
                            <input type="password" name="inputPassword" id="pass_log_id" class="form-control input-md" oninvalid="this.setCustomValidity('Enter Password Here')" oninput="this.setCustomValidity('')" />
                            <span toggle="#password-field" id="eye_icons" class="fa fa-fw fa-eye-slash field_icon toggle-password"></span>
                        </div>
                        <div class="col-sm-4 pt-5">
                            <div class="checkbox">
                                <input type="checkbox" id="terms" name="Accept" value="I Accept" required="">
                                <label for="terms" style="color:red;">I Accept the terms and Conditions</label>
                            </div>
                        </div>
                    </div>
                    <input name="registermember" value="registermember" type="hidden">

                </div>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <!-- <button type="button" class="btn btn-primary next-step">Next</button> -->
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>
</div>



<?php
require("./footer.php");
?>
<link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>

<script>
    function getAge() {
        var dob = document.getElementById('date_of_brith').value;
        var start_date = new Date(dob);
        var date = new Date();
        var end_date = new Date(start_date);
        end_date.setFullYear(date.getFullYear() - start_date.getFullYear());
        $("#age").val(end_date.getFullYear());
    }

    function clearFileContent() {
        document.getElementById('upload_image').value = null;
        document.getElementById('image_length').value = null;
        document.getElementById('uploaded_image').src = null;
        document.getElementById('uploaded_image').style.display = "none";
    }
    $(document).ready(function() {
        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                let reader = new FileReader(); // ✅ Declare 'reader' with 'let'
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2, // Ensures the image is fully visible in the cropper
                preview: '.preview',
                autoCropArea: 1, // Makes sure the crop area takes the full image
                movable: true,
                zoomable: true,
                scalable: true
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            let canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                let url = URL.createObjectURL(blob);
                let reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $('#image_length').val(base64data);
                    $modal.modal('hide');
                    // $('#uploaded_image').show();
                    $('#uploaded_image').attr('src', base64data);
                };
            });
        });

    });

    var currentStep = 1;
    var updateProgressBar;

    function displayStep(stepNumber) {
        if (stepNumber >= 1 && stepNumber <= 6) {
            $(".step-" + currentStep).hide();
            $(".step-" + stepNumber).show();
            currentStep = stepNumber;
            updateProgressBar();
        }
    }

    $(document).ready(function() {
        $('#multi-step-form').find('.step').slice(1).hide();

        $(".next-step").click(function() {
            if (currentStep < 6) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                currentStep++;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                    updateProgressBar();
                }, 500);
            }
        });

        $(".prev-step").click(function() {
            if (currentStep > 1) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                currentStep--;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                    updateProgressBar();
                }, 500);
            }
        });

        updateProgressBar = function() {
            var progressPercentage = ((currentStep - 1) / 5) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        }
    });
</script>
<script>
    $('#religion').on("change", function() {
        var id = $("#religion option:selected").attr('data-id');
        $('#caste').empty();
        $.ajax({
            url: "get_data_from_database.php",
            method: "post",
            data: {
                caste_id: id,
                caste_data: "Caste_data"
            },
            success: function(data) {
                $('#caste').html(data);
                // console.log(data);
            }
        });
    });



    $("body").on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye ");
        var input = $("#pass_log_id");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }

    });
</script>
<script>
    function getSubCaste(id) {
        $.ajax({
            url: "get_data_from_database.php",
            method: "post",
            data: {
                sub_caste_id: id,
                sub_caste_data: "Sub_caste_data"
            },
            success: function(data) {
                $('#sub_cast').html(data);
                console.log(data);
            }
        });
    }
</script>

<script>
    $('#education').on("change", function() {
        var id = $("#education option:selected").attr('data-id');
        $.ajax({
            url: "get_data_from_database.php",
            method: "post",
            data: {
                education_id: id,
                education_data: "education_data"
            },
            success: function(data) {
                $('#education_detail').html(data);
                console.log(data);
            }
        });
    });

    function addAddress() {
        var x = $("#sameascurrentaddress").is(":checked");
        if (x == true) {
            var c_add = $("#current_address").val();
            var p_add = $("#permanent_address").val(c_add);
        } else if (x == false) {
            var p_add = $("#permanent_address").val("");
        }
    }
</script>
<script>
    function getState(id) {
        // alert(id);
        $.ajax({
            url: 'state.php',
            type: "POST",
            data: {
                country_id: id,
                country_value: 'country'
            },
            cache: false,
            success: function(result) {
                console.log(result);
                $('#state').html(result);
            }
        });
    }

    function getCity(sid) {

        $.ajax({
            url: 'state.php',
            type: "POST",
            data: {
                state_id: sid,
                state_value: 'state'
            },
            cache: false,
            success: function(result2) {
                console.log(result2);
                $('#city').html(result2);
            }
        });
    }
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#staticBackdrop').modal('show');
    });


    function visibleButton() {

        let profile_for = $('#profile_for').val();
        let profile_creater_name = $('#profile_creater_name').val();
        let creater_mobile_no = $('#creater_mobile_no').val();
        if (creater_mobile_no != "" && profile_creater_name != "" && profile_for != "") {
            if (profile_for == "Myself") {
                $('#first_name').val(profile_creater_name);
                $('#inputMobile').val(creater_mobile_no);
                $('.modal').modal('hide');
            } else {
                $('.modal').modal('hide');
            }
        } else {
            if (profile_for == "") {
                $('#profile_for').focus();
            } else if (profile_creater_name == "") {
                $('#profile_creater_name').focus();
            } else if (creater_mobile_no == "") {
                $('#creater_mobile_no').focus();
            }
        }
    }
</script>