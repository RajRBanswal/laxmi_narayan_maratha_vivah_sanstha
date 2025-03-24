<?php
session_start();
include("./db_connection.php");
if (isset($_SESSION['userId'])) {
    require("./layouts/header.php");
    require("./layouts/sidebar.php");
    $user_id = $_SESSION['userId'];
    $q = mysqli_query($conn, "SELECT * FROM `user_regiter` WHERE  `id` = '$user_id'");
    $r = mysqli_fetch_array($q);

    if (isset($_POST['update'])) {
        $name = $_POST['full_name'];

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
        $caste = $_POST['caste'];

        $intercaste = $_POST['intercaste'];
        $education = $_POST['education'];
        $education_detail = $_POST['education_detail'];
        $profession = $_POST['profession'];
        $income = $_POST['income'];
        $working_city = $_POST['working_city'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
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
        $userimg = $_POST['profile_image1'];
        $apvi_image = $_POST['apvi_image1'];
        $expiry = date('Y-m-d', strtotime($date . ' + ' . $days . ' days'));
        if (!empty($_FILES["profile_image"]["name"])) {
            $sql_edit = "";
            if (!empty($_FILES["apvi_image"]["name"])) {
                $sql_edit = "UPDATE `user_regiter` SET `name`='$name',`email`='$email',`phone`='$mobile',`whatsapp_no`='$whatsapp',`country`='$country',`state`='$state',`city`='$city',`address`='$current_address',`perma_address`='$permanent_address',`marStat`='$marital_status',`lang`='$language',`diet`='$diet',`height`='$height',`religion`='$religion',`sub-com`='$caste',`community-checkbox`='$intercaste',`HighEdu`='$education',`edu_degree`='$education_detail',`prof`='$profession',`income`='$income',`yes/no`='$liveWithFamily',`bGrp`='$blood_group',`bDate`='$date_of_brith',`rashi`='$zodiac',`age`='$age',`gender`='$gender',`bTime`='$birth_time',`filename`='$img',`adhar_pan_voter_image`='$filename1',`term_and_cond`='$Accept' where `id`='$user_id'";
                move_uploaded_file($tempname1, $folder1);
            } else {
                $sql_edit = "UPDATE `user_regiter` SET `name`='$name',`email`='$email',`phone`='$mobile',`whatsapp_no`='$whatsapp',`country`='$country',`state`='$state',`city`='$city',`address`='$current_address',`perma_address`='$permanent_address',`marStat`='$marital_status',`lang`='$language',`diet`='$diet',`height`='$height',`religion`='$religion',`sub-com`='$caste',`community-checkbox`='$intercaste',`HighEdu`='$education',`edu_degree`='$education_detail',`prof`='$profession',`income`='$income',`yes/no`='$liveWithFamily',`bGrp`='$blood_group',`bDate`='$date_of_brith',`rashi`='$zodiac',`age`='$age',`gender`='$gender',`bTime`='$birth_time',`filename`='$img',`adhar_pan_voter_image`='$apvi_image',`term_and_cond`='$Accept' where `id`='$user_id'";
            }
            $update_q =  mysqli_query($conn, $sql_edit);

            if (move_uploaded_file($data, $image_name)) {
                echo '<script>alert("Profile Updated successfully");</script>';
                echo '<script>window.location.href = "user_dashboard.php";</script>';
            } else {
                echo '<script>alert("Profile Updated successfully");</script>';
                echo '<script> window.location.href = "user_dashboard.php";</script>';
            }
        } else {
            $sql_edit = "";
            if (!empty($_FILES["apvi_image"]["name"])) {
                $sql_edit = "UPDATE `user_regiter` SET `name`='$name',`email`='$email',`phone`='$mobile',`country`='$country',`state`='$state',`city`='$city',`address`='$current_address',`perma_address`='$permanent_address',`marStat`='$marital_status',`lang`='$language',`diet`='$diet',`height`='$height',`religion`='$religion',`sub-com`='$caste',`community-checkbox`='$intercaste',`HighEdu`='$education',`edu_degree`='$education_detail',`prof`='$profession',`income`='$income',`yes/no`='$liveWithFamily',`bGrp`='$blood_group',`bDate`='$date_of_brith',`rashi`='$zodiac',`age`='$age',`gender`='$gender',`bTime`='$birth_time',`filename`='$userimg',`adhar_pan_voter_image`='$filename1',`term_and_cond`='$Accept' where `id`='$user_id'";
                move_uploaded_file($tempname1, $folder1);
            } else {
                $sql_edit = "UPDATE `user_regiter` SET `name`='$name',`email`='$email',`phone`='$mobile',`country`='$country',`state`='$state',`city`='$city',`address`='$current_address',`perma_address`='$permanent_address',`marStat`='$marital_status',`lang`='$language',`diet`='$diet',`height`='$height',`religion`='$religion',`sub-com`='$caste',`community-checkbox`='$intercaste',`HighEdu`='$education',`edu_degree`='$education_detail',`prof`='$profession',`income`='$income',`yes/no`='$liveWithFamily',`bGrp`='$blood_group',`bDate`='$date_of_brith',`rashi`='$zodiac',`age`='$age',`gender`='$gender',`bTime`='$birth_time',`filename`='$userimg',`adhar_pan_voter_image`='$apvi_image',`term_and_cond`='$Accept' where `id`='$user_id'";
            }
            // $update_q =  mysqli_query($conn, $sql_edit);
            if ($update_q =  mysqli_query($conn, $sql_edit)) {
                echo '<script>alert("Profile updated successfully");</script>';
                echo '<script>window.location.href = "user_dashboard.php";</script>';
            } else {
                echo '<script>alert("Profile not Updated");</script>';
                echo '<script> window.location.href = "user_dashboard.php";</script>';
            }
            // header("location:userDashboard.php");
        }
    }

?>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="text-success">Welcome <?php echo $_SESSION['userName']; ?> </div>
            </div>
        </div>
    </div>


    <?php
    $result = mysqli_query($conn, "SELECT * FROM `user_regiter` where `id` =  '$user_id' ");
    while ($row = mysqli_fetch_assoc($result)) {
        $today = date("Y-m-d");
        $expiry = $row['plan_expiry_date'];
        if (isset($_GET['demo'])) {
            if ($expiry == $today) {
    ?>
                <script>
                    window.onload = function() {
                        $("#exampleModalCenter").modal();
                    }
                </script>
        <?php  }
        } ?>
        <div class="card">
            <div class="card-body ">
                <div class="row" style="line-height: 1.5;">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img class="img-fluid" style="width: 100%;border-radius: 10px;border: 1px solid #00aeaf;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Update Profile
                            </button>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <p class="mb-2"><b class="bold_title">Name :</b> <?php echo $row['name']; ?></p>
                        <p class="mb-2"><b class="bold_title">E-mail :</b> <?php echo $row['email']; ?></p>
                        <p class="mb-2"><b class="bold_title">Phone Number :</b> <?php echo $row['phone']; ?></p>
                        <?php if ($row['country'] == 'other') { ?>
                            <p class="mb-2"><b class="bold_title">Country :</b> <?php echo strtoupper($row['country']); ?></p>
                            <p class="mb-2"><b class="bold_title">State :</b> <?php echo strtoupper($row['state']); ?></p>
                            <p class="mb-2"><b class="bold_title">City :</b> <?php echo strtoupper($row['city']); ?></p>
                        <?php } else { ?>
                            <p class="mb-2"><b class="bold_title">Country :</b>
                                <?php
                                $countryId = intval($row['country']); // Sanitize input
                                $countyData = mysqli_query($conn, "SELECT * FROM countries WHERE `id` = $countryId");
                                if (mysqli_num_rows($countyData) > 0) {
                                    $rowidC = mysqli_fetch_assoc($countyData);
                                    echo strtoupper($rowidC['name']);
                                } else {
                                    echo "";
                                }
                                ?>
                            </p>
                            <p class="mb-2"><b class="bold_title">State :</b>
                                <?php
                                $stateId = intval($row['state']); // Sanitize input
                                $stateData = mysqli_query($conn, "SELECT * FROM states where `id` = $stateId");
                                if (mysqli_num_rows($stateData) > 0) {
                                    $rowidS = mysqli_fetch_array($stateData);
                                    echo strtoupper($rowidS['name']);
                                } else {
                                    echo "";
                                } ?>
                            </p>
                            <p class="mb-2"><b class="bold_title">City :</b>
                                <?php
                                $cityId = intval($row['city']); // Sanitize input
                                $cityData = mysqli_query($conn, "SELECT * FROM cities where `id` = $cityId");
                                if (mysqli_num_rows($cityData) > 0) {
                                    $rowidCt = mysqli_fetch_array($cityData);
                                    echo strtoupper($rowidCt['name']);
                                } else {
                                    echo "";
                                }
                                ?>
                            </p>
                        <?php  } ?>
                        <p class="mb-2"><b class="bold_title">Address :</b> <?php echo $row['address']; ?></p>
                        <p class="mb-2"><b class="bold_title">Marital Status :</b> <?php echo $row['marStat']; ?></p>
                        <p class="mb-2"><b class="bold_title">Mother Tongue :</b> <?php echo $row['lang']; ?></p>
                        <p class="mb-2"><b class="bold_title">Diet :</b> <?php echo $row['diet']; ?></p>
                        <p class="mb-2"><b class="bold_title">Height :</b> <?php echo $row['height']; ?></p>
                        <p class="mb-2"><b class="bold_title">Religion :</b> <?php echo $row['religion']; ?></p>
                        <p class="mb-2"><b class="bold_title">Gender :</b> <?php echo $row['gender']; ?></p>

                    </div>
                    <div class="col-md-4">
                        <p class="mb-2"><b class="bold_title">Sub-Community :</b> <?php echo $row['sub-com']; ?></p>
                        <p class="mb-2"><b class="bold_title">Highest Education :</b> <?php echo $row['HighEdu']; ?></p>
                        <p class="mb-2"><b class="bold_title">Profession :</b> <?php echo $row['prof']; ?></p>
                        <p class="mb-2"><b class="bold_title">Specialization :</b> <?php echo $row['specialization']; ?></p>
                        <p class="mb-2"><b class="bold_title">Birth Date :</b> <?php echo $row['bDate']; ?></p>
                        <p class="mb-2"><b class="bold_title">Age :</b> <?php echo $row['age']; ?></p>
                        <p class="mb-2"><b class="bold_title">Blood Group :</b> <?php echo $row['bGrp']; ?></p>
                        <p class="mb-2"><b class="bold_title">Birth Time :</b> <?php echo $row['bTime']; ?></p>
                        <p class="mb-2"><b class="bold_title">Birth Location :</b> <?php echo $row['bLocation']; ?></p>
                        <p class="mb-2"><b class="bold_title">Income :</b> <?php echo $row['income']; ?></p>
                        <p class="mb-2"><b class="bold_title">Live with family :</b> <?php echo $row['yes/no']; ?></p>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM `table_plan` WHERE `user_id`= '$user_id'");
                        if ($res) {
                        ?>
                            <p><b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-11 col-11">
                                <h5 class="modal-title">Update Profile</h5>
                            </div>
                            <div class="col-lg-1 col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <hr>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="">
                                <div class="registration" style="margin:10px;">
                                    <div class="row gx-3">
                                        <div class="col-sm-6" style="padding-top:10px;">
                                            <label>Full Name </label>
                                            <input value="<?php echo $row['name']; ?>" id="first_name" class="form-control" type="text" name="full_name">
                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Gender </label>
                                            <select name="gender" id="gender" class="form-control form-select" style="border: 1px solid #000;">
                                                <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Marital Status</label>
                                            <select name="marital_status" id="marital_status" class="form-control form-select" style="border: 1px solid #000;">
                                                <option value="<?php echo $row['marStat']; ?>"><?php echo $row['marStat']; ?></option>
                                                <option value="Unmarried">Unmarried</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed </option>
                                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                                <option value="Separated">Separated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_brith" id="date_of_brith" value="<?php echo $row['bDate']; ?>" onchange="getAge(this.value)">
                                            <input class="form-control" type="hidden" name="age" id="age" value="<?php echo $row['age']; ?>">
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Birth Time <span style="font-size:12px;">(In 24 Hour Format)</span></label>
                                            <input type="time" class="form-control" name="birth_time" id="birth_time" value="<?php echo $row['bTime']; ?>">
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Height</label>
                                            <select name="height" id="height" class="form-control form-select" style="border: 1px solid #000;">
                                                <option value="<?php echo $row['height']; ?>"><?php echo $row['height']; ?></option>
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
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Blood Group</label>
                                            <select name="blood_group" id="blood_group" class="form-control form-select" style="border: 1px solid #000;">
                                                <option value="<?php echo $row['bGrp']; ?>"><?php echo $row['bGrp']; ?></option>
                                                <option value="Don't Know">Don't Know</option>
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
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-3 col-6">
                                            <div style="padding-top:10px;">
                                                <label>Mother Tongue </label>
                                                <input id="language" class="form-control" type="text" name="language" value="<?php echo $row['lang']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-6">
                                            <div style="padding-top:10px;">
                                                <div class="form-group">
                                                    <label>Diet</label>
                                                    <select name="diet" class="form-control select" id="diet">
                                                        <option value="<?php echo $row['diet']; ?>"><?php echo $row['diet']; ?></option>
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
                                        <div class="col-sm-3 col-6" style="padding-top:15px;">
                                            <div class="form-group">
                                                <label>Do You Live With your Family </label>
                                                <div class="form-group">
                                                    <p>
                                                        <input type="radio" id="yes" name="live_family" value="yes" <?php echo ($row['yes/no'] == 'yes') ? 'checked' : '' ?>>Yes</input>
                                                        <input type="radio" id="no" name="live_family" value="no" <?php echo ($row['yes/no'] == 'no') ? 'checked' : '' ?>>No</input>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Zodiac</label>
                                            <select name="zodiac" id="zodiac" class="form-control form-select" style="border: 1px solid #000;">
                                                <option value="<?php echo  $row['rashi']; ?>"><?php echo  $row['rashi']; ?></option>
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
                                                <option value="Don't know">Don't know </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Upload Profile Photo</label>
                                            <div class="image_area">
                                                <label for="upload_image">
                                                    <input type="file" class="form-control" name="profile_image" class="image" id="upload_image" value="<?php echo  $row['filename']; ?>" />
                                                    <input type="hidden" class="form-control" name="profile_images" id="image_length">
                                                    <input type="hidden" class="form-control" id="profile_image" name="profile_image1" value="<?php if ($row['filename'] == "") {
                                                                                                                                                    echo "dummyUsers.png";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['filename'];
                                                                                                                                                } ?>">

                                                </label>
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
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <img src="./user_image/<?php echo  $row['filename']; ?>" id="uploaded_image" width="100%" height="100%" alt="Image Not Available">
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <label>Upload Aadhar/ Pan/ Voter/ Emp Cards</label>
                                            <input type="file" class="form-control" id="apvi_image" name="apvi_image" accept="image/*" value="<?php echo  $row['adhar_pan_voter_image']; ?>">
                                            <input type="hidden" class="form-control" id="apvi_image1" name="apvi_image1" value="<?php echo  $row['adhar_pan_voter_image']; ?>">
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:10px;">
                                            <img src="./user_image/<?php echo  $row['adhar_pan_voter_image']; ?>" width="100%" height="100%" alt="Image Not Available">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="religious_information" style="margin:10px;">
                                    <h5 class="heading">Religious Information</h5>
                                    <hr>
                                    <div class="row gx-3">
                                        <div class="col-sm-4 col-6" style="padding-top:10px;">
                                            <label>Religion </label>
                                            <select name="religion" id="religion" class="form-control form-select">
                                                <option value="<?php echo $row['religion']; ?>"><?php echo $row['religion']; ?></option>
                                                <option value="Hindu" data-id="1">Hindu</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-4 col-6" style="padding-top:10px;">
                                            <label>Caste </label>
                                            <select name="caste" id="caste" class="form-control form-select" onchange="getSubCaste(this.value);">
                                                <option value="<?php echo $row['sub-com']; ?>"><?php echo $row['sub-com']; ?></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 col-6" style="padding-top:10px;">
                                            <label>Intercaste Accepted</label>
                                            <select name="intercaste" id="intercaste" class="form-control form-select" data-select2-id="intercaste" tabindex="-1" aria-hidden="true">
                                                <option value="<?php echo  $row['community-checkbox']; ?>"><?php echo  $row['community-checkbox']; ?></option>
                                                <option value="No">Not Accepted</option>
                                                <option value="Yes">Accepted</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="education_information" style="margin:10px;">
                                    <h5 class="heading">Education Information</h5>
                                    <hr>
                                    <div class="row gx-3">
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Education</label>
                                            <select name="education" id="education" class="form-control form-select education">
                                                <option value="<?php echo $row['HighEdu']; ?>"><?php echo $row['HighEdu']; ?></option>
                                                <option value="Diploma" data-id="1">Diploma</option>
                                                <option value="Doctors" data-id="2">Doctors</option>
                                                <option value="Graduate" data-id="3">Graduate</option>
                                                <option value="Masters" data-id="4">Masters</option>
                                                <option value="Ph.D" data-id="5">Ph.D</option>
                                                <option value="Under Graduate" data-id="6">Under Graduate</option>
                                                <option value="Other" data-id="7">Other</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Education Degree</label>
                                            <select name="education_detail" id="education_detail" class="form-control form-select">
                                                <option value="<?php echo $row['edu_degree']; ?>" data-id="7"><?php $row['edu_degree']; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Profession</label>
                                            <select name="profession" id="profession" class="form-control form-select">
                                                <option value="<?php echo $row['prof']; ?>"><?php echo $row['prof']; ?></option>
                                                <?php
                                                $prof = mysqli_query($conn, "SELECT * FROM `profession`");
                                                while ($prof_row = mysqli_fetch_array($prof)) {
                                                    echo '<option value=' . $prof_row['prof'] . '>' . $prof_row['prof'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Income Annual/Monthly</label>
                                            <select name="income" id="income" class="form-control form-select" data-select2-id="income" tabindex="-1" aria-hidden="true">
                                                <option value="<?php echo $row['income']; ?>"><?php echo $row['income']; ?></option>
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
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="location_information" style="margin:10px;">
                                    <h5 class="heading">Location Information</h5>
                                    <hr>
                                    <div class="row gx-3">
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Working City</label>
                                            <input value="" type="text" class="form-control" name="working_city" id="working_city">

                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>Country</label>
                                            <select name="country" id="country" class="form-control form-select" onchange="getState(this.value);">
                                                <?php
                                                $countryId1 = intval($row['country']); // Sanitize input
                                                $getCountry = mysqli_query($conn, "SELECT * FROM countries where `id` = '$countryId1 '");
                                                while ($cntry = mysqli_fetch_array($getCountry)) {
                                                ?> <option value="<?php echo $cntry['id']; ?>"><?php echo $cntry['name']; ?></option>
                                                <?php  } ?>
                                                <option value="105">India</option>
                                                <option value="other">Other</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>State</label>
                                            <select name="state" id="state" class="form-control form-select" onchange="getCity(this.value);">
                                                <?php
                                                $stateId1 = intval($row['state']); // Sanitize input
                                                $resultid = mysqli_query($conn, "SELECT * FROM states where `id` = '$stateId1'");
                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                ?>
                                                    <option value="<?php echo $rowid['id']; ?>"><?php echo $rowid['name']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col-6" style="padding-top:10px;">
                                            <label>City</label>
                                            <select name="city" id="city" class="form-control form-select" onchange="getSubCity()">
                                                <?php
                                                $cityId1 = intval($row['city']); // Sanitize input
                                                $resultid1 = mysqli_query($conn, "SELECT * FROM cities where `id` = '$cityId1'");
                                                while ($rowid1 = mysqli_fetch_array($resultid1)) {
                                                ?>
                                                    <option value="<?php echo $rowid1['id']; ?>"><?php echo $rowid1['name']; ?></option>
                                                <?php  }  ?>
                                            </select>
                                            <!--<span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="29" style="width: 529px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-dist-container"><span class="select2-selection__rendered" id="select2-dist-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-6 col-12" style="padding-top:10px;">
                                            <label>Current Address</label>
                                            <textarea type="number" class="form-control" name="current_address" rows="1" id="current_address" value="<?php echo $row['address']; ?>" style="border: 0.25px solid #555;"><?php echo $row['address']; ?></textarea>
                                        </div>
                                        <div class="col-sm-6 col-12" style="padding-top:10px;">
                                            <label>Permanent Address :&nbsp;&nbsp;<input type="checkbox" id="sameascurrentaddress" name="sameascurrentaddress" onchange="addAddress()"> <span for="sameascurrentaddress"> Same as Current Address</span></label>
                                            <textarea type="number" class="form-control" name="permanent_address" rows="1" id="permanent_address" value="<?php echo $row['perma_address']; ?>" style="border: 0.25px solid #555;"><?php echo $row['perma_address']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="other_information" style="margin:10px;">
                                    <h5 class="heading">Contact Information</h5>
                                    <hr>
                                    <div class=" row gx-3">
                                        <div class="col-sm-3 col-6">
                                            <label>Email</label>
                                            <input value="<?php echo $row['email']; ?>" type="email" class="form-control" name="email" id="inputEmailAddress" oninvalid="this.setCustomValidity('Enter Email Address Here')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-sm-3 col-6">
                                            <label>Mobile </label>
                                            <input value="<?php echo $row['phone']; ?>" type="text" class="form-control" name="mobile" id="inputMobile" maxlength="10" oninvalid="this.setCustomValidity('Enter Mobile Number Here')" oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-sm-3 col-6">
                                            <label>Whatsapp Number </label>
                                            <input type="text" maxlength="10" class="form-control" name="whatsapp" id="whatsapp" value="<?php echo $row['whatsapp_no']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="checkbox d-flex">
                                                <input type="checkbox" id="terms" name="Accept" value="I Accept" <?php if ($row['term_and_cond'] == "I Accept") { ?> checked="checked" <?php } ?> style="width: 20px;">&nbsp;
                                                <label for="terms" style="color:red;">I Accept the terms and Conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="registration" style="margin:10px;">
                                    <div class="form-group">
                                        <div class="col-4">
                                            <input type="submit" value="Update" name="update" class="btn btn-styled btn btn-success btn-block">
                                            <input name="registermember" value="registermember" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    <?php } ?>


    <?php require("./layouts/footer.php"); ?>

    <script>
        $(document).ready(function() {
            $("#showMore").click(function() {
                if ($(this).text() == "Show Less") {
                    $(this).text("Show More");
                } else {
                    $(this).text("Show Less");
                };
            });
        });

        function getAge() {
            var dob = document.getElementById('date_of_brith').value;
            var start_date = new Date(dob);
            var date = new Date();
            var end_date = new Date(start_date);
            end_date.setFullYear(date.getFullYear() - start_date.getFullYear());
            $("#age").val(end_date.getFullYear());
        }
    </script>

<?php
} else {
    header("Location:login.php");
} ?>