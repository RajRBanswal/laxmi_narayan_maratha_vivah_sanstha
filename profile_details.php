<?php
include("./db_connection.php");
require("./navbar.php");
$userId = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM  `user_regiter` where `id`='$userId'");
$row = mysqli_fetch_array($result)
?>
<div class="bg-primary mb-3">
    <div class="container py-2 bg-primary">
        <h1 class="fs-2 text-white text-center">Profile</h1>
    </div>
</div>

<div class="main-container mt-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="card border border-dark p-1">
                    <img src="user_image/<?php echo $row['filename']; ?>" width="100%" alt="wedding venue" class="border border-dark">
                    <div class="card-footer text-center" style="background-color:#fff !important">
                        <p class="mb-1 fw-bold text-primary"> <?php echo $row['member_id'] . " (" . $row['sub-com'] . ")"; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card border-dark">
                    <div class="card-header bg-pink">
                        <h5 class="mb-0 text-white">PROFILE DETAILS</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><b>DATE OF BIRTH :</b> <?php echo $row['bDate']; ?></p>
                                <p class="mb-1"><b>HEIGHT :</b> <?php echo $row['height']; ?></p>
                                <p class="mb-1"><b>EDUCATION :</b> <?php echo $row['HighEdu']; ?></p>
                                <p class="mb-1"><b>BLOOD GROUP :</b> <?php echo $row['bGrp']; ?></p>
                                <p class="mb-1"><b>COMPLEXION :</b> GORA</p>
                                <p class="mb-1"><b>BIRTH PLACE :</b> MUMBAI 09:37 AM</p>
                                <p class="mb-1"><b>DIET :</b> <?php echo $row['diet']; ?></p>

                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><b>SEX :</b> <?php echo $row['gender']; ?></p>
                                <p class="mb-1"><b>CASTE :</b> <?php echo $row['caste']; ?></p>
                                <p class="mb-1"><b>OCCUPATION :</b> <?php echo $row['prof']; ?></p>
                                <p class="mb-1"><b>SPECTACLE/LENS :</b> No/No</p>
                                <p class="mb-1"><b>GOTRA & DEVAK :</b> <?php echo $row['gotra_devak']; ?></p>
                                <p class="mb-1"><b>MANGAL :</b> <?php echo $row['mangal']; ?></p>
                                <p class="mb-1"><b>HORO DETAILS :</b> <?php echo $row['rashi']; ?></p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-dark mt-3">
                    <div class="card-header bg-pink">
                        <h5 class="mb-0 text-white">EXPECTATION</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-2"><b class="bold_title">Age Difference :</b> <?php echo $row['expe_age_diff']; ?></p>
                                <p class="mb-2"><b class="bold_title">Expected Height :</b> <?php echo $row['expe_height']; ?></p>
                                <p class="mb-2"><b class="bold_title">Expected Education :</b> <?php echo $row['expe_education']; ?></p>
                                <p class="mb-2"><b class="bold_title">Expected Occupation :</b> <?php echo $row['expe_occupation']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><b class="bold_title">Divorcee :</b> <?php echo $row['expe_divorcee']; ?></p>
                                <p class="mb-2"><b class="bold_title">Preffered Cities :</b> <?php echo $row['expe_preffered_city']; ?></p>
                                <p class="mb-2"><b class="bold_title">Expected Caste :</b> <?php echo $row['expe_caste']; ?></p>
                                <p class="mb-2"><b class="bold_title">Mangal :</b> <?php echo $row['expe_mangal']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 text-center">
                    <input type="button" class="btn btn-danger" name="CloseMe" value="Close" onclick="closeMe()" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function closeMe() {
        var win = window.open("", "_self");
        win.close();
    }
</script>

<?php require("./footer.php"); ?>