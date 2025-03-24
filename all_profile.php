<?php
include("./db_connection.php");
require("./navbar.php");
?>

<div class="main-container bg_flor all_profile mt-5">
    <div class="container contixt">
        <!-- Button trigger modal -->
        <div class="row">


            <div class="col-md-4 col-lg-4 col-12">
                <button class="btn btn-danger btn-sm pull-right mb-4 m-auto" type="button" data-bs-toggle="modal" data-bs-target="#mobFiltrModal" data-whatever="@mobFiltrModal" name="mobFiltrBtn" id="mobFiltrBtn">Filter</button>

                <div class="modal fade" id="mobFiltrModal" tabindex="-1" aria-labelledby="mobFiltrLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example">Filter Profiles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding: 30px;">
                                <div class="form-group col-md-12 ">
                                    <select class="form-control  fltr" name="fltr_gender" id="fltr_gender">
                                        <?php if (isset($_POST['female_prof'])) {
                                            echo "<option value='Female' selected>Female</option>";
                                            echo "<option value='Male'>Male</option>";
                                        } elseif (isset($_POST['male_prof'])) {
                                            echo "<option value='Male' selected>Male</option>";
                                            echo "<option value='Female'>Female</option>";
                                        } ?>
                                        <?php if (isset($_POST['gender'])) {
                                            if ($_POST['gender'] == 'Female') {
                                                echo "<option value='Female' selected>Female</option>";
                                                echo "<option value='Male'>Male</option>";
                                            } else {
                                                echo "<option value='Male' selected>Male</option>";
                                                echo "<option value='Female'>Female</option>";
                                            }
                                        } else {
                                            echo "<option value='Female'>Female</option>";
                                            echo "<option value='Male'>Male</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6 col-6 mt-2">
                                            <select class="form-control  fltr" name="fltrAge_min" id="fltrAge_min1">
                                                <?php
                                                if (isset($_POST['age_min'])) {
                                                    echo '<option value=' . $_POST['age_min'] . '>' . $_POST['age_min'] . '</option>';
                                                } else {
                                                    echo '<option value="">Age From</option>';
                                                }
                                                ?>
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
                                        <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6 col-6 mt-2">
                                            <select class="form-control  fltr" name="fltrAge_max" id="fltrAge_max1">
                                                <?php if (isset($_POST['age_max'])) {
                                                    echo '<option value=' . $_POST['age_max'] . '>' . $_POST['age_max'] . '</option>';
                                                } else {
                                                    echo '<option value="">Age To</option>';
                                                }
                                                ?>
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
                                    </div>
                                </div>
                                <div class="form-group  col-md-12  mt-2">
                                    <select name="fltrCntry" class="form-control  fltr" onchange="getState(this.value);" id="fltrCntry">
                                        <option value="">Select Country</option>
                                        <option value="105">India</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-12 mt-2">
                                    <select name="fltrState" class="form-control  fltr" onchange="getCity(this.value)" id="fltrState">
                                        <option value="">Select State</option>

                                    </select>
                                </div>
                                <div class="form-group  col-md-12 mt-2">
                                    <select name="fltrCity" class="form-control  fltr" id="fltrCity">
                                        <option value="">Select City</option>

                                    </select>
                                </div>
                                <div class="form-group  col-md-12 mt-2">
                                    <select name="fltrMS" class="form-control  fltr" id="fltrMS">
                                        <option value="">Select Marital Status</option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed </option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mt-2">
                                    <select name="HEduSearch" class="form-control select fltr" id="HEduSearch">
                                        <option value="">Select Highest Education</option>
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
                                <div class="form-group col-md-12 mt-2 text-center">
                                    <?php if (isset($_SESSION['userEmail'])) { ?>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="modalfilter()" id="filterSubmit" name="filterSubmit" data-bs-dismiss="modal">Search</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="modalfilters()" id="filterSubmit" name="filterSubmit" data-bs-dismiss="modal">Search</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flowers-wrap p-4">
                    <div class="form-group col-md-12 ">
                        <select class="form-control  fltr" name="fltr_gender1" id="fltr_gender1">
                            <?php if (isset($_POST['female_prof'])) {
                                echo "<option value='Female' selected>Female</option>";
                                echo "<option value='Male'>Male</option>";
                            } elseif (isset($_POST['male_prof'])) {
                                echo "<option value='Male' selected>Male</option>";
                                echo "<option value='Female'>Female</option>";
                            } ?>
                            <?php if (isset($_POST['gender'])) {
                                if ($_POST['gender'] == 'Female') {
                                    echo "<option value='Female' selected>Female</option>";
                                    echo "<option value='Male'>Male</option>";
                                } else {
                                    echo "<option value='Male' selected>Male</option>";
                                    echo "<option value='Female'>Female</option>";
                                }
                            }
                            if (!isset($_POST['female_prof']) && !isset($_POST['gender']) && !isset($_POST['male_prof'])) {
                                echo "<option value='Female'>Female</option>";
                                echo "<option value='Male'>Male</option>";
                            } ?>

                        </select>
                    </div>
                    <div class="form-group col-md-12 ">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-2">
                                <select class="form-control  fltr" name="fltrAge_min" id="fltrAge_min">
                                    <?php
                                    if (isset($_POST['age_min'])) {
                                        echo '<option value=' . $_POST['age_min'] . '>' . $_POST['age_min'] . '</option>';
                                    } else {
                                        echo '<option value="">Age From</option>';
                                    }
                                    ?>
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
                            <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6 mt-2">
                                <select class="form-control  fltr" name="fltrAge_max" id="fltrAge_max">
                                    <?php if (isset($_POST['age_max'])) {
                                        echo '<option value=' . $_POST['age_max'] . '>' . $_POST['age_max'] . '</option>';
                                    } else {
                                        echo '<option value="">Age To</option>';
                                    }
                                    ?>
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
                        </div>
                    </div>
                    <div class="form-group  col-md-12  mt-2">
                        <select name="fltrCntry1" class="form-control  fltr" onchange="getState(this.value);" id="fltrCntry1">
                            <option value="">Select Country</option>
                            <option value="105">India</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-12 mt-2">
                        <select name="fltrState1" class="form-control  fltr" onchange="getCity(this.value)" id="fltrState1">
                            <option value="">Select State</option>

                        </select>
                    </div>
                    <div class="form-group  col-md-12 mt-2">
                        <select name="fltrCity1" class="form-control  fltr" id="fltrCity1">
                            <option value="">Select City</option>

                        </select>
                    </div>
                    <div class="form-group  col-md-12 mt-2">
                        <select name="fltrMS1" class="form-control  fltr" id="fltrMS1">
                            <option value="">Select Marital Status</option>
                            <option value="Unmarried">Unmarried</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed </option>
                            <option value="Awaiting Divorce">Awaiting Divorce</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <select name="HEduSearch1" class="form-control select fltr" id="HEduSearch1">
                            <option value="">Select Highest Education</option>
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
                    <div class="form-group col-md-12 mt-2 text-center">
                        <?php if (isset($_SESSION['userEmail'])) { ?>
                            <button type="button" class="btn btn-primary btn-sm" onclick="filter()">Search</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary btn-sm" onclick="filters()">Search</button>
                        <?php } ?>
                    </div>
                </div>
            </div>


            <div class="col-md-8 col-lg-8 getStaticData px-4">
                <div class="row">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        $ur = "";
                        $ua = "";
                        $ug = "";
                        $row['type_plan'] = "";

                        $sql = "SELECT * FROM `user_regiter` where `id` = " . $_SESSION['userId'] . " AND `deleted_profile`=0";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ua = $row['age'];
                            $ur = $row['religion'];
                            $ug = $row['gender'];
                            $row['type_plan'] = $row['type_plan'];
                            $status = $row['status'];
                        }
                        if (isset($_POST['send_btn'])) {
                            $send_id = $_POST['send_id'];
                            $req = mysqli_query($conn, "SELECT * FROM `requests` where `user_id` = '$_SESSION[userId]' AND `sent_id` = '$send_id'");
                            $reqCount = mysqli_num_rows($req);
                            if ($reqCount < 1) {

                                $sql2 = mysqli_query($conn, "INSERT INTO `requests`(`user_id`, `sent_id`) VALUES ('$_SESSION[userId]','$send_id')");
                                if ($sql2) {
                            ?>
                                    <script>
                                        alert("request sent successfuly");
                                    </script>
                                <?php
                                }
                            } else {
                                ?>
                                <script>
                                    alert("You already sent request to this person!");
                                </script>
                            <?php
                            }
                        }
                        if (isset($_POST['delete_btn'])) {
                            $del = $_POST['delete_id'];
                            $sql = mysqli_query($conn, "DELETE FROM `requests` WHERE `user_id` =  '$_SESSION[userId]' AND `sent_id` = '$del' ");
                            if ($sql) {
                            ?>
                                <script>
                                    alert("request deleted successfuly");
                                </script>
                                <?php
                            }
                        }
                        if ($status == 1) {
                            if (isset($_POST['filter_search_btn'])) {
                                $gender = $_POST['gender'];
                                $user_ids = $_SESSION['userId'];
                                $age_min = $_POST['age_min'];
                                $age_max = $_POST['age_max'];
                                $currentDate = date("Y-m-d");
                                // echo $gender;
                                $status = "";
                                if ($gender != "" && $age_min != "" && $age_max != "") {
                                    $userplan = "";
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND `age` BETWEEN '$age_min' and '$age_max'  AND `id` != '$user_ids' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                        $userplan = $row['type_plan'];
                                        while ($num1 = mysqli_fetch_array($clr)) {
                                            $status = $num1['status'];
                                        }
                                        $count = mysqli_num_rows($clr);
                                        if ($row['type_plan'] != "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                        ?>
                                                <!--<div class=" ">-->
                                                    <div class="row vendor-list-block  shadow card profile profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="btn btn-sm btn-light btn-warning " onclick="like(<?php echo $row['id']; ?>)" class='btn btn-sm btn-outline'> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>

                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        } else if ($row['type_plan'] == "Free" && $userplan == "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <!--class="btn btn-sm btn-light btn-warning"-->
                                                                            <a class="disabled btn" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>

                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->

                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>

                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>

                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                    }
                                } elseif ($gender != "" && $age_min != "" && $age_max == "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND `age` BETWEEN '$age_min' and '$age_min'  AND `id` != '$user_ids' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userplan = $row['type_plan'];
                                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                        while ($num1 = mysqli_fetch_array($clr)) {
                                            $status = $num1['status'];
                                        }
                                        $count = mysqli_num_rows($clr);
                                        if ($row['type_plan'] != "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                   
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-daner" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        } else if ($row['type_plan'] == "Free" && $userplan == "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                   
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-daner" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                    }
                                } elseif ($gender != "" && $age_min == "" && $age_max != "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND `age` BETWEEN '$age_max' and '$age_max'  AND `id` != '$user_ids' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userplan = $row['type_plan'];
                                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                        while ($num1 = mysqli_fetch_array($clr)) {
                                            $status = $num1['status'];
                                        }
                                        $count = mysqli_num_rows($clr);
                                        if ($row['type_plan'] != "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                   
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                    
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        } else if ($row['type_plan'] == "Free" && $userplan == "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                    }
                                } elseif ($gender != "" && $age_min == "" && $age_max == "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender'  AND `id` != '$user_ids' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userplan = $row['type_plan'];
                                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                        while ($num1 = mysqli_fetch_array($clr)) {
                                            $status = $num1['status'];
                                        }
                                        $count = mysqli_num_rows($clr);
                                        if ($row['type_plan'] != "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        } else if ($row['type_plan'] == "Free" && $userplan == "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                    }
                                } elseif ($gender == "" && $age_min != "" && $age_max != "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `age` BETWEEN '$age_min' and '$age_max' AND `id` != '$user_ids' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userplan = $row['type_plan'];
                                        $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                        while ($num1 = mysqli_fetch_array($clr)) {
                                            $status = $num1['status'];
                                        }
                                        $count = mysqli_num_rows($clr);
                                        if ($row['type_plan'] != "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer  bottom_btn1">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        } else if ($row['type_plan'] == "Free" && $userplan == "Free") {
                                            if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                                <!--<div class=" ">-->
                                                <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                    <div class="row vendor-list-block  shadow card profile">
                                                        <!-- match list block -->
                                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                            <!-- <div class="<?php // echo $row['label'];
                                                                                ?>"></div> -->
                                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                            <table class="" id="table" style="width:100%">
                                                                <tbody>
                                                                  
                                                                    <tr>
                                                                        <th>Member ID</th>
                                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                    echo "Free Member";
                                                                                                                                                } else {
                                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Age</th>
                                                                        <td><?php echo $row['age']; ?></td>
                                                                        <th>Height</th>
                                                                        <td><?php echo $row['height']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Religion</th>
                                                                        <td><?php echo $row['religion']; ?></td>
                                                                        <th>Caste</th>
                                                                        <td><?php echo $row['sub-com']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Marital Status</th>
                                                                        <td><?php echo $row['marStat']; ?></td>
                                                                        <th>Education</th>
                                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Degree</th>
                                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                                        <th>Profession</th>
                                                                        <td><?php echo $row['prof']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>City</th>
                                                                        <td>
                                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                            $resultid = mysqli_query($conn, $sql1);
                                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                echo $rowid['name'];
                                                                            } ?> </td>
                                                                        <th>InterCast</th>
                                                                        <td><?php echo $row['yes/no']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                            <table style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                        </th>
                                                                        <th>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                        </th>
                                                                        <th>
                                                                            <?php
                                                                            if ($row['type_plan'] == "Free") {
                                                                                echo '<a class="disabled type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                            } else {
                                                                            ?>
                                                                                <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>

                                            <?php }
                                        }
                                    }
                                }
                            }
                            if (isset($_POST['female_prof'])) {
                                $currentDate = date("Y-m-d");
                                $status = "";
                                $plan_type = "";

                                $sqlfml = "SELECT * FROM  `user_regiter` WHERE `gender`='Female'  AND `id` != '$_SESSION[userId]' AND `status` != 0 AND `deleted_profile`=0";
                                $result1 = mysqli_query($conn, $sqlfml);
                                while ($row = mysqli_fetch_array($result1)) {
                                    $plan_type = $row['type_plan'];
                                    $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                    while ($num1 = mysqli_fetch_array($clr)) {
                                        $status = $num1['status'];
                                    }
                                    if ($row['type_plan'] != "Free") {
                                        $count = mysqli_num_rows($clr);
                                        if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                            ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->

                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer  bottom_btn1">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>
                                                                    <!--<th>-->

                                                                    <!--</th>-->
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->


                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer  bottom_btn1">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php }  ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request?
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php }
                                    } else if ($row['type_plan'] == "Free" && $plan_type == "Free") {
                                        $count = mysqli_num_rows($clr);
                                        if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                        ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->

                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>
                                                                    <!--<th>-->

                                                                    <!--</th>-->
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->


                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php }  ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request?
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php }
                                    }
                                }
                            }
                            if (isset($_POST['male_prof'])) {

                                $currentDate = date("Y-m-d");
                                $status = "";
                                $plan_type = "";
                                $sqlml = "SELECT * FROM  `user_regiter` where `gender` = 'Male'  AND `id` != '$_SESSION[userId]' AND `deleted_profile`=0";
                                $result2 = mysqli_query($conn, $sqlml);
                                while ($row = mysqli_fetch_array($result2)) {
                                    $plan_type = $row['type_plan'];
                                    $clr = mysqli_query($conn, "SELECT * FROM `shortlist` WHERE `user_id` = '$_SESSION[userId]' AND `liked_p_id` = '$row[id]' ");
                                    while ($num1 = mysqli_fetch_array($clr)) {
                                        $status = $num1['status'];
                                    }
                                    if ($row['type_plan'] != "Free") {
                                        $count = mysqli_num_rows($clr);
                                        if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                        ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12 col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer  bottom_btn1">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <!--<th>-->
                                                                    <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer  bottom_btn1">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-success">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php }
                                    } else if ($row['type_plan'] == "Free" && $plan_type == "Free") {
                                        $count = mysqli_num_rows($clr);
                                        if ($status != 0 && $_SESSION['userId'] != $row['id'] && $status != "" && $count != 0) {
                                        ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12 col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a onclick="like(<?php echo $row['id']; ?>)" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->

                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php } elseif ($status == 0 && $_SESSION['userId'] != $row['id'] || $count <= 0 || $status == "") { ?>
                                            <!--<div class=" ">-->
                                            <!-- <div class="col-md-12  col-lg-12 col-xs-12 profile"> -->
                                                <div class="row vendor-list-block  shadow card profile">
                                                    <!-- match list block -->
                                                    <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                        <!-- <div class="<?php // echo $row['label'];
                                                                            ?>"></div> -->
                                                        <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                    </div>
                                                    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                        <table class="" id="table" style="width:100%">
                                                            <tbody>
                                                             
                                                                <tr>
                                                                    <th>Member ID</th>
                                                                    <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                        <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                                echo "Free Member";
                                                                                                                                            } else {
                                                                                                                                                echo $row['label'] . ' Member';
                                                                                                                                            } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Age</th>
                                                                    <td><?php echo $row['age']; ?></td>
                                                                    <th>Height</th>
                                                                    <td><?php echo $row['height']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Religion</th>
                                                                    <td><?php echo $row['religion']; ?></td>
                                                                    <th>Caste</th>
                                                                    <td><?php echo $row['sub-com']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Marital Status</th>
                                                                    <td><?php echo $row['marStat']; ?></td>
                                                                    <th>Education</th>
                                                                    <td><?php echo $row['HighEdu']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Degree</th>
                                                                    <td><?php echo $row['edu_degree']; ?></td>
                                                                    <th>Profession</th>
                                                                    <td><?php echo $row['prof']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>
                                                                        <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                        $resultid = mysqli_query($conn, $sql1);
                                                                        while ($rowid = mysqli_fetch_array($resultid)) {
                                                                            echo $rowid['name'];
                                                                        } ?> </td>
                                                                    <th>InterCast</th>
                                                                    <td><?php echo $row['yes/no']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer freePlanPurchase bottom_btn1" onClick="(function(){alert('please purchase the plan for viewing more Profiles');return false; })();return false;">
                                                        <table style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a class="disabled btn" href="" onclick="like(<?php echo $row['id']; ?>)"> Interest <i class='fa fa-heart like'></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#send_confirm<?php echo $row['id']; ?>" data-whatever="@send" href="" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <!--<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-whatever="@delet" href="" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                    </th>
                                                                    <th>
                                                                        <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#chat_user<?php echo $row['id']; ?>" data-whatever="@chat" href="" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                    </th>
                                                                    <th>
                                                                        <?php
                                                                        if ($row['type_plan'] == "Free") {
                                                                            echo '<a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#purchase" data-whatever="@prchs" href="" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                        } else {
                                                                        ?>
                                                                            <a class="disabled" type="button" data-bs-toggle="modal" data-bs-target="#view_fml_user<?php echo $row['id']; ?>" data-whatever="@view" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to Delete this Request?
                                                                    <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="delete_btn" type="submit" class="btn btn-success" id="dlt_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="send_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="example">Confirm To send?</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do You Really Want to send this Request
                                                                    <input name="send_id" type="hidden" class="form-control" id="send_id" value="<?php echo $row['id']; ?>">
                                                                    <input name="usr_id" type="hidden" class="form-control" id="usr_id" value="<?php echo $sesn_id; ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                    <button name="send_btn" type="submit" class="btn btn-success" id="send_btn">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalplan">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Unlock by membership plan</h4>
                                                                <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label style="color:red">Upgrade Your a Membership Plan.</label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Close</a>
                                                                <a href="pricing-plan" name="ok" id="ok-btn" type="button" class="btn btn-success">Ok</a>
                                                                <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="view_fml_user<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <!-- Modal User Profile View -->
                                                        <div class="modal-content">
                                                            <div class="modal-header " style="margin: auto;">
                                                                <h4 class="modal-title text-center " style="color: #FF0066 ;" id="exampleModalLabel">User Profile</h4>
                                                            </div>
                                                            <div class="modal-body " style="padding: 2rem;">
                                                                <!-- Begin Page Content -->
                                                                <!-- <div class="container-fluid"> -->
                                                                <!-- Page Heading -->
                                                                <div class="row mb-4">
                                                                    <!-- Profil card -->
                                                                    <!-- <div class="card shadow mb-4"> -->
                                                                    <div class="">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row" style="line-height: 1.5;">
                                                                            <div class="col-md-12">
                                                                                <div class="text-center" style="padding:1rem ;">
                                                                                    <img class="img-fluid px-3 px-sm-4" style="height: 16rem;border-radius: 11%; border: 3px solid #FF0066;padding: 0 !important;" src="user_image/<?php echo $row['filename']; ?>" alt="Upload Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <!-- <ul style="list-style-type: none" class="profile_list"> -->
                                                                                <!--<b>Name :</b> <?php echo $row['name']; ?><br>-->
                                                                                <b>E-mail :</b> <?php echo $row['email']; ?><br>
                                                                                <b>Phone Number :</b> <?php echo $row['phone']; ?><br>
                                                                                <?php
                                                                                $sql1 = "SELECT * FROM `countries` where `id` = " . $row['country'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">Country :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php
                                                                                }
                                                                                $sql1 = "SELECT * FROM `states` where `id` = " . $row['state'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                ?>
                                                                                    <b class="bold_title">State :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php }
                                                                                $sql1 = "SELECT * FROM `cities` where `id` = " . $row['city'];
                                                                                $resultid = mysqli_query($conn, $sql1);
                                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                                    // echo $row['city'];
                                                                                ?>
                                                                                    <b class="bold_title">City :</b> <?php echo strtoupper($rowid['name']); ?><br>
                                                                                <?php } ?>
                                                                                <b>Address :</b> <?php echo $row['address']; ?><br>
                                                                                <b>Highest Education :</b> <?php echo $row['HighEdu']; ?><br>
                                                                                <b>Gender :</b> <?php echo $row['gender']; ?><br>
                                                                                <b>Marital Status :</b> <?php echo $row['marStat']; ?><br>
                                                                                <b>Mother Tongue :</b> <?php echo $row['lang']; ?><br>
                                                                                <b>Diet :</b> <?php echo $row['diet']; ?><br>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <b>Height :</b> <?php echo $row['height']; ?><br>
                                                                                <b>Religion :</b> <?php echo $row['religion']; ?><br>
                                                                                <b>Sub-Community :</b> <?php echo $row['sub-com']; ?><br>
                                                                                <b>Profession :</b> <?php echo $row['prof']; ?><br>
                                                                                <b>Specialization :</b> <?php echo $row['specialization']; ?><br>
                                                                                <b>Age :</b> <?php echo $row['bDate']; ?><br>
                                                                                <b>Blood Group :</b> <?php echo $row['bGrp']; ?><br>
                                                                                <b>Birth Time :</b> <?php echo $row['bTime']; ?><br>
                                                                                <b>Income :</b> <?php echo $row['income']; ?> <br>
                                                                                <?php
                                                                                $res = mysqli_query($conn, "SELECT * FROM `table_plan` ");
                                                                                if ($res) {
                                                                                ?>
                                                                                    <b class="bold_title">Membership Plan :</b> <?php echo $row['type_plan']; ?>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- </ul> -->
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <!-- <button name="update_plan" type="submit" class="btn btn-primary" id="updt_btn">Save</button> -->
                                                                    <button name="" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end Modal User Profile View -->
                                                    </div>
                                                </div>
                                            <!-- </div> -->

                                        <?php }
                                    }
                                }
                            }
                        } else {
                            if (isset($_POST['filter_search_btn'])) {
                                $gender = $_POST['gender'];
                                $age_min = $_POST['age_min'];
                                $age_max = $_POST['age_max'];
                                // $religion = $_POST['religion'];
                                $currentDate = date("Y-m-d");
                                $status = "";

                                if ($gender != "" && $age_min != "" && $age_max != "") {
                                    $sql = "SELECT * FROM  `user_regiter` WHERE `gender`='$gender'  AND `age` BETWEEN '$age_min' and '$age_max'  AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="vendor-list-block  shadow card profile withoutlogin">
                                            <div class="row">
                                                <!-- match list block -->
                                                <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    <!-- <div class="<?php // echo $row['label'];
                                                                        ?>"></div> -->
                                                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                </div>
                                                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                    <table class="" id="table" style="width:100%">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                    <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                            echo "Free Member";
                                                                                                                                        } else {
                                                                                                                                            echo $row['label'] . ' Member';
                                                                                                                                        } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td><?php echo $row['age']; ?></td>
                                                                <th>Height</th>
                                                                <td><?php echo $row['height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td><?php echo $row['religion']; ?></td>
                                                                <th>Caste</th>
                                                                <td><?php echo $row['sub-com']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Marital Status</th>
                                                                <td><?php echo $row['marStat']; ?></td>
                                                                <th>Education</th>
                                                                <td><?php echo $row['HighEdu']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Degree</th>
                                                                <td><?php echo $row['edu_degree']; ?></td>
                                                                <th>Profession</th>
                                                                <td><?php echo $row['prof']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>
                                                                    <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                    $resultid = mysqli_query($conn, $sql1);
                                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                                        echo $rowid['name'];
                                                                    } ?> </td>
                                                                <th>InterCast</th>
                                                                <td><?php echo $row['yes/no']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer  bottom_btn1">
                                                    <table style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                </th>
                                                                <th>
                                                                    <!--<a type="button" onclick="afterLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                </th>
                                                                <th>
                                                                    <?php
                                                                    if ($row['type_plan'] == "Free") {
                                                                        echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                    } else {
                                                                    ?>
                                                                        <a type="button" onclick="afterLogin();" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                    <?php } ?>
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ----------login first -->
                                        <form action="" method="POST">
                                            <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                            <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please Login or Register first to Add this profile .
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                            <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                            <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                } elseif ($gender != "" && $age_min != "" && $age_max == "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND  `age` BETWEEN '$age_min' and '$age_min'  AND `status` != 0 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <div class="vendor-list-block  shadow card profile withoutlogin">
                                            <div class="row vendor-list-block  shadow card profile">
                                                <!-- match list block -->
                                                <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    <!-- <div class="<?php // echo $row['label'];
                                                                        ?>"></div> -->
                                                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                </div>
                                                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                    <table class="" id="table" style="width:100%">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                    <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                            echo "Free Member";
                                                                                                                                        } else {
                                                                                                                                            echo $row['label'] . ' Member';
                                                                                                                                        } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td><?php echo $row['age']; ?></td>
                                                                <th>Height</th>
                                                                <td><?php echo $row['height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td><?php echo $row['religion']; ?></td>
                                                                <th>Caste</th>
                                                                <td><?php echo $row['sub-com']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Marital Status</th>
                                                                <td><?php echo $row['marStat']; ?></td>
                                                                <th>Education</th>
                                                                <td><?php echo $row['HighEdu']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Degree</th>
                                                                <td><?php echo $row['edu_degree']; ?></td>
                                                                <th>Profession</th>
                                                                <td><?php echo $row['prof']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>
                                                                    <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                    $resultid = mysqli_query($conn, $sql1);
                                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                                        echo $rowid['name'];
                                                                    } ?> </td>
                                                                <th>InterCast</th>
                                                                <td><?php echo $row['yes/no']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer  bottom_btn1">
                                                    <table style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                </th>
                                                                <th>
                                                                    <!--<a type="button" onclick="afterLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                </th>
                                                                <th>
                                                                    <?php
                                                                    if ($row['type_plan'] == "Free") {
                                                                        echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                    } else {
                                                                    ?>
                                                                        <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                    <?php } ?>
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                            <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please Login or Register first to Add this profile .
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                            <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                            <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>
                                                    <<div class="<?php echo $row['label']; ?>">
                                                </div>/div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                } elseif ($gender != "" && $age_min == "" && $age_max != "") {
                                    $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND  `age` BETWEEN '$age_max' and '$age_min' AND  `status` != 0 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <div class="vendor-list-block shadow card profile withoutlogin">
                                            <div class="row ">
                                                <!-- match list block -->
                                                <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    <!-- <div class="<?php // echo $row['label'];
                                                                        ?>"></div> -->
                                                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                </div>
                                                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                    <table class="" id="table" style="width:100%">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                    <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                            echo "Free Member";
                                                                                                                                        } else {
                                                                                                                                            echo $row['label'] . ' Member';
                                                                                                                                        } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td><?php echo $row['age']; ?></td>
                                                                <th>Height</th>
                                                                <td><?php echo $row['height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td><?php echo $row['religion']; ?></td>
                                                                <th>Caste</th>
                                                                <td><?php echo $row['sub-com']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Marital Status</th>
                                                                <td><?php echo $row['marStat']; ?></td>
                                                                <th>Education</th>
                                                                <td><?php echo $row['HighEdu']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Degree</th>
                                                                <td><?php echo $row['edu_degree']; ?></td>
                                                                <th>Profession</th>
                                                                <td><?php echo $row['prof']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>
                                                                    <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                    $resultid = mysqli_query($conn, $sql1);
                                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                                        echo $rowid['name'];
                                                                    } ?> </td>
                                                                <th>InterCast</th>
                                                                <td><?php echo $row['yes/no']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer  bottom_btn1">
                                                    <table style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                </th>
                                                                <th>
                                                                    <!--<a type="button" onclick="afterLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                </th>
                                                                <th>
                                                                    <?php
                                                                    if ($row['type_plan'] == "Free") {
                                                                        echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                    } else {
                                                                    ?>
                                                                        <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                    <?php } ?>
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> <!-- ----------login first -->
                                        <form action="" method="POST">
                                            <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                            <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please Login or Register first to Add this profile .
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                            <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                            <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                } elseif ($gender != "" && $age_min == "" && $age_max == "") {
                                    $sql = "SELECT * FROM  `user_regiter` WHERE `gender`='$gender'  AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="vendor-list-block  shadow card profile withoutlogin">
                                            <div class="row ">
                                                <!-- match list block -->
                                                <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    <!-- <div class="<?php // echo $row['label'];
                                                                        ?>"></div> -->
                                                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                </div>
                                                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                    <table class="" id="table" style="width:100%">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                    <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                            echo "Free Member";
                                                                                                                                        } else {
                                                                                                                                            echo $row['label'] . ' Member';
                                                                                                                                        } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td><?php echo $row['age']; ?></td>
                                                                <th>Height</th>
                                                                <td><?php echo $row['height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td><?php echo $row['religion']; ?></td>
                                                                <th>Caste</th>
                                                                <td><?php echo $row['sub-com']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Marital Status</th>
                                                                <td><?php echo $row['marStat']; ?></td>
                                                                <th>Education</th>
                                                                <td><?php echo $row['HighEdu']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Degree</th>
                                                                <td><?php echo $row['edu_degree']; ?></td>
                                                                <th>Profession</th>
                                                                <td><?php echo $row['prof']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>
                                                                    <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                    $resultid = mysqli_query($conn, $sql1);
                                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                                        echo $rowid['name'];
                                                                    } ?> </td>
                                                                <th>InterCast</th>
                                                                <td><?php echo $row['yes/no']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer  bottom_btn1">
                                                    <table style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                </th>
                                                                <th>
                                                                    <!--<a type="button" onclick="afterLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                </th>
                                                                <th>
                                                                    <?php
                                                                    if ($row['type_plan'] == "Free") {
                                                                        echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                    } else {
                                                                    ?>
                                                                        <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                    <?php } ?>
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ----------login first -->
                                        <form action="" method="POST">
                                            <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                            <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please Login or Register first to Add this profile .
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                            <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                            <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                } elseif ($gender == "" && $age_min != "" && $age_max != "") {
                                    $sql = "SELECT * FROM  `user_regiter` WHERE `age` BETWEEN '$age_max' and '$age_min' AND `status`=1 AND `deleted_profile`=0";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="vendor-list-block  shadow card profile withoutlogin">
                                            <div class="row">
                                                <!-- match list block -->
                                                <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                    <!-- <div class="<?php // echo $row['label'];
                                                                        ?>"></div> -->
                                                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                                </div>
                                                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                    <table class="" id="table" style="width:100%">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                    <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                            echo "Free Member";
                                                                                                                                        } else {
                                                                                                                                            echo $row['label'] . ' Member';
                                                                                                                                        } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td><?php echo $row['age']; ?></td>
                                                                <th>Height</th>
                                                                <td><?php echo $row['height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td><?php echo $row['religion']; ?></td>
                                                                <th>Caste</th>
                                                                <td><?php echo $row['sub-com']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Marital Status</th>
                                                                <td><?php echo $row['marStat']; ?></td>
                                                                <th>Education</th>
                                                                <td><?php echo $row['HighEdu']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Degree</th>
                                                                <td><?php echo $row['edu_degree']; ?></td>
                                                                <th>Profession</th>
                                                                <td><?php echo $row['prof']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>
                                                                    <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                    $resultid = mysqli_query($conn, $sql1);
                                                                    while ($rowid = mysqli_fetch_array($resultid)) {
                                                                        echo $rowid['name'];
                                                                    } ?> </td>
                                                                <th>InterCast</th>
                                                                <td><?php echo $row['yes/no']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer  bottom_btn1">
                                                    <table style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                                </th>
                                                                <th>
                                                                    <!--<a type="button" onclick="afterLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                                </th>
                                                                <th>
                                                                    <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                                </th>
                                                                <th>
                                                                    <?php
                                                                    if ($row['type_plan'] == "Free") {
                                                                        echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                    } else {
                                                                    ?>
                                                                        <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                    <?php } ?>
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                            <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please Login or Register first to Add this profile .
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                            <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                            <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                }
                            }
                            if (isset($_POST['female_prof'])) {
                                $currentDate = date("Y-m-d");
                                $sqlfml = "SELECT * FROM  `user_regiter` where `gender` = 'Female' AND `deleted_profile`=0";
                                $result1 = mysqli_query($conn, $sqlfml);
                                while ($row = mysqli_fetch_array($result1)) {
                                    ?>

                                    <div class="vendor-list-block  shadow card profile withoutlogin">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="afterLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--  login first -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            }
                            if (isset($_POST['male_prof'])) {
                                $currentDate = date("Y-m-d");
                                $sqlml = "SELECT * FROM  `user_regiter` where `gender` = 'Male'  AND `status` != 0 AND `deleted_profile`=0";
                                $result2 = mysqli_query($conn, $sqlml);
                                while ($row = mysqli_fetch_array($result2)) {
                                ?>
                                    <div class="vendor-list-block shadow card profile withoutlogin">
                                        <div class="row">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="afterLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="afterLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="afterLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="afterLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            <?php }
                            }
                            ?>

                        <?php
                        }
                    } else { // if not logged in
                        ?>
                        <script>
                            window.onload = function() {
                                $("#exampleModalCenter").modal();
                            }
                        </script>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Uh Oh!</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Looks like you want to go through the profiles But your not logged in.
                                        You have to log in or register first to watch all the profiles.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        <a href="login-page"><button type="button" class="btn btn-danger">Login/Register</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['filter_search_btn'])) {
                            $gender = $_POST['gender'];
                            $age_min = $_POST['age_min'];
                            $age_max = $_POST['age_max'];
                            // $religion = $_POST['religion'];
                            $currentDate = date("Y-m-d");
                            $status = "";

                            if ($gender != "" && $age_min != "" && $age_max != "") {
                                $sql = "SELECT * FROM  `user_regiter` WHERE `gender`='$gender' AND `age` BETWEEN '$age_min' and '$age_max'  AND `status`=1 AND `deleted_profile`=0";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="vendor-list-block shadow card profile withoutlogin">
                                        <div class="row ">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="withoutLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="withoutLogin();" href="" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            } elseif ($gender != "" && $age_min != "" && $age_max == "") {
                                $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND `age` BETWEEN '$age_min' and '$age_min'  AND `status` != 0 AND `deleted_profile`=0";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <div class="vendor-list-block  shadow card profile  withoutlogin">
                                        <div class="row">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="withoutLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                                <<div class="<?php echo $row['label']; ?>">
                                            </div>/div>
                                        </div>
                                    </form>
                                <?php
                                }
                            } elseif ($gender != "" && $age_min == "" && $age_max != "") {
                                $sql = "SELECT * FROM  `user_regiter` where `gender`='$gender' AND `age` BETWEEN '$age_max' and '$age_max'  AND  `status` != 0 AND `deleted_profile`=0";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <div class="vendor-list-block  shadow card profile withoutlogin">
                                        <div class="row">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="withoutLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- ----------login first -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            } elseif ($gender != "" && $age_min == "" && $age_max == "") {
                                $sql = "SELECT * FROM  `user_regiter` WHERE `gender`='$gender'  AND `status`=1 AND `deleted_profile`=0";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="vendor-list-block  shadow card profile  withoutlogin">
                                        <div class="row">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="withoutLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ----------login first -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            } elseif ($gender == "" && $age_min != "" && $age_max != "") {
                                $sql = "SELECT * FROM  `user_regiter` WHERE  `age` BETWEEN '$age_min' and '$age_max'  AND `status`=1 AND `deleted_profile`=0";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="vendor-list-block  shadow card profile  withoutlogin">
                                        <div class="row">
                                            <!-- match list block -->
                                            <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                                <!-- <div class="<?php // echo $row['label'];
                                                                    ?>"></div> -->
                                                <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                            </div>
                                            <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                                <table class="" id="table" style="width:100%">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th>Member ID</th>
                                                            <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                                <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                        echo "Free Member";
                                                                                                                                    } else {
                                                                                                                                        echo $row['label'] . ' Member';
                                                                                                                                    } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Age</th>
                                                            <td><?php echo $row['age']; ?></td>
                                                            <th>Height</th>
                                                            <td><?php echo $row['height']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td><?php echo $row['religion']; ?></td>
                                                            <th>Caste</th>
                                                            <td><?php echo $row['sub-com']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td><?php echo $row['marStat']; ?></td>
                                                            <th>Education</th>
                                                            <td><?php echo $row['HighEdu']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Degree</th>
                                                            <td><?php echo $row['edu_degree']; ?></td>
                                                            <th>Profession</th>
                                                            <td><?php echo $row['prof']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City</th>
                                                            <td>
                                                                <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                                $resultid = mysqli_query($conn, $sql1);
                                                                while ($rowid = mysqli_fetch_array($resultid)) {
                                                                    echo $rowid['name'];
                                                                } ?> </td>
                                                            <th>InterCast</th>
                                                            <td><?php echo $row['yes/no']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer  bottom_btn1">
                                                <table style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                            </th>
                                                            <th>
                                                                <!--<a type="button" onclick="withoutLogin();"  name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                            </th>
                                                            <th>
                                                                <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                            </th>
                                                            <th>
                                                                <?php
                                                                if ($row['type_plan'] == "Free") {
                                                                    echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                                } else {
                                                                ?>
                                                                    <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                                <?php } ?>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ----------login first -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                        <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please Login or Register first to Add this profile .
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                        <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                        <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            }
                        }
                        if (isset($_POST['female_prof'])) {
                            $currentDate = date("Y-m-d");
                            $sqlfml = "SELECT * FROM  `user_regiter` where `gender` = 'Female' AND `deleted_profile`=0";
                            $result1 = mysqli_query($conn, $sqlfml);
                            while ($row = mysqli_fetch_array($result1)) {
                                ?>

                                <div class="vendor-list-block shadow card profile withoutlogin">
                                    <div class="row ">
                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                            <!-- <div class="<?php // echo $row['label'];
                                                                ?>"></div> -->
                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                        </div>
                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                            <table class="" id="table" style="width:100%">
                                                <tbody>
                                                  
                                                    <tr>
                                                        <th>Member ID</th>
                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                    echo "Free Member";
                                                                                                                                } else {
                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td><?php echo $row['age']; ?></td>
                                                        <th>Height</th>
                                                        <td><?php echo $row['height']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Religion</th>
                                                        <td><?php echo $row['religion']; ?></td>
                                                        <th>Caste</th>
                                                        <td><?php echo $row['sub-com']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marital Status</th>
                                                        <td><?php echo $row['marStat']; ?></td>
                                                        <th>Education</th>
                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Degree</th>
                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                        <th>Profession</th>
                                                        <td><?php echo $row['prof']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>
                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                            $resultid = mysqli_query($conn, $sql1);
                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                echo $rowid['name'];
                                                            } ?> </td>
                                                        <th>InterCast</th>
                                                        <td><?php echo $row['yes/no']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer  bottom_btn1">
                                            <table style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                        </th>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                        </th>
                                                        <th>
                                                            <!--<a type="button" onclick="withoutLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                        </th>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                        </th>
                                                        <th>
                                                            <?php
                                                            if ($row['type_plan'] == "Free") {
                                                                echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                            } else {
                                                            ?>
                                                                <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                            <?php } ?>
                                                        </th>

                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                                 <!-- login first -->
                                <form action="" method="POST">
                                    <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                    <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    Please Login or Register first to Add this profile .
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                    <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                    <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                        }
                        if (isset($_POST['male_prof'])) {
                            $currentDate = date("Y-m-d");
                            $sqlml = "SELECT * FROM  `user_regiter` where `gender` = 'Male'  AND `status` != 0 AND `deleted_profile`=0";
                            $result2 = mysqli_query($conn, $sqlml);
                            while ($row = mysqli_fetch_array($result2)) {
                            ?>
                                <div class="vendor-list-block shadow card profile withoutlogin">
                                    <div class="row">
                                        <!-- match list block -->
                                        <div class="col-md-4 col-xs-4 text-center col-sm-4 col-lg-4">
                                            <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="match-img py-0">
                                        </div>
                                        <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="overflow:auto">
                                            <table class="" id="table" style="width:100%">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <th>Member ID</th>
                                                        <th colspan="3" class="text-sm"><b class="text-left"><?php echo $row['member_id']; ?></b>
                                                            <span class="text-right text-warning text-capitalize float-end "> <?php if ($row['type_plan'] == 'Free') {
                                                                                                                                    echo "Free Member";
                                                                                                                                } else {
                                                                                                                                    echo $row['label'] . ' Member';
                                                                                                                                } ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td><?php echo $row['age']; ?></td>
                                                        <th>Height</th>
                                                        <td><?php echo $row['height']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Religion</th>
                                                        <td><?php echo $row['religion']; ?></td>
                                                        <th>Caste</th>
                                                        <td><?php echo $row['sub-com']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Marital Status</th>
                                                        <td><?php echo $row['marStat']; ?></td>
                                                        <th>Education</th>
                                                        <td><?php echo $row['HighEdu']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Degree</th>
                                                        <td><?php echo $row['edu_degree']; ?></td>
                                                        <th>Profession</th>
                                                        <td><?php echo $row['prof']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>
                                                            <?php $sql1 = "SELECT * FROM cities where `id` = " . $row['city'];
                                                            $resultid = mysqli_query($conn, $sql1);
                                                            while ($rowid = mysqli_fetch_array($resultid)) {
                                                                echo $rowid['name'];
                                                            } ?> </td>
                                                        <th>InterCast</th>
                                                        <td><?php echo $row['yes/no']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer  bottom_btn1">
                                            <table style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" > Interest <i class='fa fa-heart like' style='color:red'></i></a>
                                                        </th>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" name="senReq" id="senReq"> Send Request <i class="fas fa-solid fa-paper-plane text-info"></i></a>
                                                        </th>
                                                        <th>
                                                            <!--<a type="button" onclick="withoutLogin();" name="delReq" id="delReq"> Delete Request <i class="fas fa-trash-alt"></i></a>-->
                                                        </th>
                                                        <th>
                                                            <a type="button" onclick="withoutLogin();" name="chat_user"> Chat Now <i class="fas fa-solid fa-comment-dots text-success"></i></a>
                                                        </th>
                                                        <th>
                                                            <?php
                                                            if ($row['type_plan'] == "Free") {
                                                                echo '<a type="button" onclick="withoutLogin();" name="prchase"> Purchase <i class="fas fa-eye"></i></a>';
                                                            } else {
                                                            ?>
                                                                <a type="button" onclick="withoutLogin();" name="view_user"> View <i class="fas fa-eye"></i></a>
                                                            <?php } ?>
                                                        </th>

                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- ----------login first -->
                                <form action="" method="POST">
                                    <div class="modal fade" id="loginFirst<?php $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Add this profile to your shortlist</h4>
                                                    <button type="button" class="close cross" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    Please Login or Register first to Add this profile .
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                    <a href="login-page" name="ok" id="ok-btn" type="button" class="btn btn-primary">Ok</a>
                                                    <input name="loginmodal" type="hidden" id="loginmodal" value="<?php echo $row['id']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    <?php }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-12 getDynamicData px-4"></div>
            <div class="col-md-8 col-lg-8 col-12 getDynamicDatass px-4">

            </div>
        </div>

    </div>
</div>
</div>

<div class="modal fade" id="errorMessage" tabindex="-1" aria-labelledby="errorMessageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="errorMessageLabel">Please Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">Please Log In to View Full Profile of This Member</p>
            </div>
            <div class="modal-footer text-center m-auto">
                <a href="./signup.php" type="button" class="btn btn-secondary btn-default">Register</a>
                <a href="./login.php" type="button" class="btn btn-primary btn-default">Log In</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="requestModalLabel">Activate Your Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">Request to admin for activate your account</p>
            </div>
            <div class="modal-footer text-center m-auto">
                <button type="button" class="btn btn-secondary btn-default" data-bs-dismiss="modal">Ok</a>
            </div>
        </div>
    </div>
</div>
<script>
    function withoutLogin() {
        $('#errorMessage').modal('show');
    };

    function afterLogin() {
        $('#requestModal').modal('show');
    };
</script>
<script>
    function send_activation_request() {
        <?php if (!isset($_SESSION['userEmail'])) { ?>
            $('#errorMessage').modal('show');
        <?php } else { ?>
            $('#requestModal').modal('show');
        <?php } ?>
    }
</script>
<script>
    $("#fltrCntry1").change(function() {
        var id = $(this).find(':selected').data('cntr_id');
        $.ajax({
            url: 'state.php',
            type: "POST",
            data: {
                country_id: id,
                country_filter: 'country_filter'
            },
            cache: false,
            success: function(result) {
                console.log(result);
                $('#fltrState1').html(result);
            }
        });
    });

    $("#fltrState1").change(function() {
        var sid = $(this).find(':selected').data('state_id');

        $.ajax({
            url: 'state.php',
            type: "POST",
            data: {
                state_id: sid,
                state_filter: 'state_filter'
            },
            cache: false,
            success: function(result2) {
                console.log(result2);
                $('#fltrCity1').html(result2);
            }
        });
    });
</script>
<script>
    function fltrReligion() {
        var id = $("#fltrReligion1 option:selected").attr('data-id');
        $('#fltrCaste1').empty();
        $.ajax({
            url: "get_data_from_database.php",
            method: "post",
            data: {
                caste_id: id,
                caste_data: "Caste_data"
            },
            success: function(data) {
                $('#fltrCaste1').html(data);
                console.log(data);
            }
        });
    }

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
                $('#fltrState1').html(result);
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
                $('#fltrCity1').html(result2);
            }
        });
    }
</script>
<script>
    function like(id) {
        $.ajax({
            url: 'save_to_shortlist.php',
            type: "POST",
            data: {
                user_id: id,
            },
            cache: false,
            success: function(result) {
                var data = JSON.parse(result);
                console.log(data['status']);
                if (data['status'] == 200) {
                    alert("Added to Shortlist");
                    window.location.reload();
                } else if (data['status'] == 201) {
                    alert("Removed from Shortlist");
                    window.location.reload();
                } else if (data['status'] == 202) {
                    alert("updated from Shortlist");
                    window.location.reload();
                } else {
                    alert("There is a problem ");
                    window.location.reload();
                }
            }
        });
    }

    function modalfilter() {
        var user_id = $('#user_Id_with_session').val();
        var fltr_gender = $('#fltr_gender').val();
        var age_min = $('#fltrAge_min1').val();
        var age_max = $('#fltrAge_max1').val();
        var filt_country = $('#fltrCntry').val();
        var filt_state = $('#fltrState').val();
        var filt_city = $('#fltrCity').val();
        var filt_mar_stat = $('#fltrMS').val();
        var filt_high_edu = $('#HEduSearch').val();
        // var filt_spec = $('#Specialization').val();
        if (user_id == 0) {
            $.ajax({
                url: 'filter_page_one.php',
                type: "POST",
                data: {
                    fltr_gender: fltr_gender,
                    fltr_age_min: age_min,
                    fltr_age_max: age_max,
                    filt_country: filt_country,
                    filt_state: filt_state,
                    filt_city: filt_city,
                    filt_mar_stat: filt_mar_stat,
                    filt_high_edu: filt_high_edu,
                },
                cache: false,
                success: function(result) {
                    $('.getStaticData').hide();
                    $('.getDynamicDatass').show();
                    $('.getDynamicDatass').html(result);
                }

            });
        } else {
            $.ajax({
                url: 'filterPage.php',
                type: "POST",
                data: {
                    fltr_gender: fltr_gender,
                    fltr_age_min: age_min,
                    fltr_age_max: age_max,
                    filt_country: filt_country,
                    filt_state: filt_state,
                    filt_city: filt_city,
                    filt_mar_stat: filt_mar_stat,
                    filt_high_edu: filt_high_edu,
                },
                cache: false,
                success: function(result) {
                    $('.getStaticData').hide();
                    $('.getDynamicData').show();
                    $('.getDynamicData').html(result);
                    console.log(result);
                }

            });
        }

    }

    function modalfilters() {
        var fltr_gender = $('#fltr_gender').val();
        var age_min = $('#fltrAge_min1').val();
        var age_max = $('#fltrAge_max1').val();
        var filt_country = $('#fltrCntry').val();
        var filt_state = $('#fltrState').val();
        var filt_city = $('#fltrCity').val();
        var filt_mar_stat = $('#fltrMS').val();
        var filt_high_edu = $('#HEduSearch').val();
        // var filt_spec = $('#Specialization').val();

        $.ajax({
            url: 'filter_page_one.php',
            type: "POST",
            data: {
                fltr_gender: fltr_gender,
                fltr_age_min: age_min,
                fltr_age_max: age_max,
                filt_country: filt_country,
                filt_state: filt_state,
                filt_city: filt_city,
                filt_mar_stat: filt_mar_stat,
                filt_high_edu: filt_high_edu,
            },
            cache: false,
            success: function(result) {
                $('.getStaticData').hide();
                $('.getDynamicData').hide();
                $('.getDynamicDatass').show();

                // var data = JSON.parse(result);
                $('.getDynamicDatass').html(result);
                // console.log(result);
            }

        });

    }

    function filter() {
        $('.getStaticData').empty();
        $('.getDynamicData').empty();

        var user_id = $('#user_Id_with_session').val();

        var age_min = $('#fltrAge_min').val();
        var age_max = $('#fltrAge_max').val();
        var fltr_gender = $('#fltr_gender1').val();
        var filt_country = $('#fltrCntry1').val();
        var filt_state = $('#fltrState1').val();
        var filt_city = $('#fltrCity1').val();

        var filt_mar_stat = $('#fltrMS1').val();
        var filt_high_edu = $('#HEduSearch1').val();
        // var filt_spec = $('#Specialization1').val();
        if (user_id == 0) {
            $.ajax({
                url: 'filter_page_one.php',
                type: "POST",
                data: {
                    fltr_gender: fltr_gender,
                    fltr_age_min: age_min,
                    fltr_age_max: age_max,
                    filt_country: filt_country,
                    filt_state: filt_state,
                    filt_city: filt_city,
                    filt_mar_stat: filt_mar_stat,
                    filt_high_edu: filt_high_edu,
                    // filt_spec: filt_spec,
                },
                cache: false,
                success: function(result) {
                    $('.getStaticData').hide();
                    $('.getDynamicDatass').show();
                    $('.getDynamicDatass').html(result);
                }

            });
        } else {
            $.ajax({
                url: 'filterPage.php',
                type: "POST",
                data: {
                    fltr_gender: fltr_gender,
                    fltr_age_min: age_min,
                    fltr_age_max: age_max,
                    filt_country: filt_country,
                    filt_state: filt_state,
                    filt_city: filt_city,
                    filt_mar_stat: filt_mar_stat,
                    filt_high_edu: filt_high_edu,
                    // filt_spec: filt_spec,
                },
                cache: false,
                success: function(result) {
                    $('.getStaticData').hide();
                    $('.getDynamicData').show();
                    $('.getDynamicData').html(result);
                    console.log(result);
                }

            });
        }
    }


    function filters() {
        $('.getStaticData').empty();
        $('.getDynamicData').empty();
        $('.getDynamicDatass').empty();


        var age_min = $('#fltrAge_min').val();
        var age_max = $('#fltrAge_max').val();
        var fltr_gender = $('#fltr_gender1').val();
        var filt_country = $('#fltrCntry1').val();
        var filt_state = $('#fltrState1').val();
        var filt_city = $('#fltrCity1').val();

        var filt_mar_stat = $('#fltrMS1').val();
        var filt_high_edu = $('#HEduSearch1').val();
        // var filt_spec = $('#Specialization1').val();

        $.ajax({
            url: 'filter_page_one.php',
            type: "POST",
            data: {
                fltr_gender: fltr_gender,
                fltr_age_min: age_min,
                fltr_age_max: age_max,
                filt_country: filt_country,
                filt_state: filt_state,
                filt_city: filt_city,
                filt_mar_stat: filt_mar_stat,
                filt_high_edu: filt_high_edu,
                // filt_spec: filt_spec,
            },
            cache: false,
            success: function(result) {
                $('.getStaticData').hide();
                $('.getDynamicData').hide();
                $('.getDynamicDatass').show();
                $('.getDynamicDatass').html(result);

                console.log(result);
            }

        });
    }
</script>




<?php require("./footer.php"); ?>