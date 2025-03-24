<?php

session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
    $adId = $_SESSION['admin_id'];
    // highest education
    if (isset($_POST['save_HiEdu'])) {
        $resu = "";
        $high_edu = $_POST['field_name1'];
        $c = count($high_edu);
        for ($i = 0; $i < $c; $i++) {
            $resu = mysqli_query($conn, "INSERT INTO `highEdu`(`HighEdu`) VALUES ('$high_edu[$i]')");
        }
        if ($resu) {
?>
            <script>
                alert("Education added successfully.");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Education could not be added.");
            </script>
        <?php
        }
    }
    // profession
    if (isset($_POST['save_Prof'])) {
        $Prof = $_POST['field_name2'];
        $c = count($Prof);
        for ($i = 0; $i < $c; $i++) {
            $sql2 = mysqli_query($conn, "INSERT INTO  `profession`(`prof`)  VALUES ('$Prof[$i]')");
        }
        if ($sql2) {
        ?>
            <script>
                alert("Profession added successfully.");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Profession could not be added.");
            </script>
        <?php
        }
    }
    // specializaiton
    if (isset($_POST['save_spec'])) {
        $Spec = $_POST['field_name3'];
        $c = count($Spec);
        for ($i = 0; $i < $c; $i++) {
            $sql3 = mysqli_query($conn, "INSERT INTO `specialization`(`specialization`) VALUES ('$Spec[$i]')");
        }
        if ($sql3) {
        ?>
            <script>
                alert("Specialization added successfully.");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Specialization could not be added.");
            </script>
        <?php
        }
    }

    //  delete query
    if (isset($_POST['delete_btn'])) {
        $dltID = $_POST['delete_id'];
        $sql_dlt = "DELETE FROM `user_regiter` WHERE `id`='$dltID'";
        $remove = mysqli_query($conn, $sql_dlt);

        if (mysqli_query($conn, $sql_dlt)) {
        ?>
            <script>
                alert("Deleted Successfully");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Could not Delete");
            </script>
    <?php
        }
    }
    require("./top_header.php");
    require("./sidebar.php");
    require("./navbar.php");
    ?>

    <div class="mb-4 px-3 py-1 ">
        <!-- Profil card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Career </h6>
            </div>
            <div id="admin" class="card-body">

                <nav>
                    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                        <li class="nav-item userTab" role="presentation">
                            <button class="nav-link coral-green active" id="pills-HighEdu-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-HighEdu" type="button"
                                role="tab" aria-controls="pills-HighEdu" aria-selected="true">Highest
                                Education</button>
                        </li>
                        <li class="nav-item userTab " role="presentation">
                            <button class="nav-link coral-green" id="pills-Profession-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-Profession" type="button"
                                role="tab" aria-controls="pills-Profession"
                                aria-selected="false">Profession</button>
                        </li>
                        <li class="nav-item userTab" role="presentation">
                            <button class="nav-link coral-green" id="pills-Specialization-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-Specialization" type="button"
                                role="tab" aria-controls="pills-Specialization"
                                aria-selected="false">Specialization</button>
                        </li>
                    </ul>
                    <div class="tab-content bg-light" id="pills-tabContent">
                        <!-- -------------Highest Education tab--------------- -->
                        <div class="tab-pane fade show active" id="pills-HighEdu" role="tabpanel"
                            aria-labelledby="pills-HighEdu-tab">
                            <div>
                                <?php
                                $sql = "SELECT * FROM `highEdu` ";
                                ?>
                                <div class="row ">
                                    <!-- Profil card -->
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable"
                                                    width="100%" cellspacing="0">

                                                    <thead class="table-success">
                                                        <div class="mb-3" style="text-align:right;">
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#planModalone"
                                                                data-bs-whatever="@create1"><i
                                                                    class="fa-regular fa-plus"></i>
                                                                Add</button>
                                                        </div>

                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Education</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql_plan = "SELECT * FROM `highEdu`";
                                                        $result = mysqli_query($conn, $sql_plan);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['id']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['HighEdu']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" name="delete_user"
                                                                        class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#delet_user_modal<?php echo $row['id']; ?>"
                                                                        data-bs-whatever="@delet"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- ---------view users ----------- -->

                                                            <!------------ Modal delete ------------------>
                                                            <div class="modal fade"
                                                                id="delet_user_modal<?php echo $row['id']; ?>"
                                                                tabindex="-1"
                                                                aria-labelledby="dltUserModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="example">Confirm To Delete ?</h5>
                                                                            <button type="button"
                                                                                class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="" method="post">
                                                                            <div class="modal-body">
                                                                                Do You Really Want to Delete this field?
                                                                                <input name="delete_id"
                                                                                    type="hidden"
                                                                                    class="form-control"
                                                                                    id="delete_id"
                                                                                    value="<?php echo $row['id']; ?>">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                <button name="delete_HighEdu"
                                                                                    type="submit"
                                                                                    class="btn btn-danger"
                                                                                    id="delete_HighEdu">Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end Modal delete -->
                                                        <?php  } ?>
                                                    </tbody>
                                                </table>
                                                <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Profession</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal create -->
                            <div class="modal fade" id="planModalone" tabindex="-1"
                                aria-labelledby="createModalLabelone" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header card-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New Education
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row" style="padding: 2rem;">
                                                <div class="row justify-content-center">
                                                    <!--<div class="mb-3 col-md-6">-->
                                                    <!--  <label for="couple_name" class="col-form-label">Couple name :</label>-->
                                                    <!--  <input name="couple_name" type="text" class="form-control" id="couple_name">-->
                                                    <!--</div>-->
                                                    <div class="mb-3 ">
                                                        <label for="highEdu" class="col-form-label">Highest
                                                            Education :</label>
                                                        <!--<input name="highEdu" type="text" class="form-control"-->
                                                        <!--    id="highEdu">-->
                                                        <div class="field_wrapper1">
                                                            <div>
                                                                <input type="text" name="field_name1[]"
                                                                    class="form-control"
                                                                    value="" />
                                                                <a href="javascript:void(0);"
                                                                    class="add_button1" title="Add field"><i class="fas fa-plus-square"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="save_HiEdu" type="submit"
                                                    class="btn btn-primary">Save Education</button>
                                                <button name="" type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--end Modal create -->

                        </div>

                        <!-- -------------end of Highest Education tab--------------- -->
                        <!-- -------------Profession tab--------------- -->
                        <div class="tab-pane fade" id="pills-Profession" role="tabpanel"
                            aria-labelledby="pills-Profession-tab">
                            <div>
                                <?php
                                $sql = "SELECT * FROM `profession` ";
                                ?>
                                <div class="row ">
                                    <!-- Profil card -->
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable"
                                                    width="100%" cellspacing="0">
                                                    <div class="mb-3" style="text-align:right;">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#planModaltwo"><i
                                                                class="fa-regular fa-plus"></i>
                                                            Add</button>
                                                    </div>
                                                    <thead class="table-success">

                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Profession</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql_plan2 = "SELECT * FROM `profession` ";
                                                        $result2 = mysqli_query($conn, $sql_plan2);
                                                        while ($row = mysqli_fetch_assoc($result2)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['id']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['prof']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" name="delete_user"
                                                                        class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#delet_actuser_modal<?php echo $row['id']; ?>"
                                                                        data-bs-whatever="@delet"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- ---------view users ----------- -->
                                                            <!------------ Modal delete ------------------>
                                                            <div class="modal fade"
                                                                id="delet_actuser_modal<?php echo $row['id']; ?>"
                                                                tabindex="-1"
                                                                aria-labelledby="dltUserModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="example">Confirm To Delete
                                                                                ?</h5>
                                                                            <button type="button"
                                                                                class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="" method="post">
                                                                            <div class="modal-body">
                                                                                Do You Really Want to Delete
                                                                                this field?
                                                                                <input name="delete_id"
                                                                                    type="hidden"
                                                                                    class="form-control"
                                                                                    id="delete_id"
                                                                                    value="<?php echo $row['id']; ?>">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                <button name="delete_btn"
                                                                                    type="submit"
                                                                                    class="btn btn-danger"
                                                                                    id="dlt_btn">Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end Modal delete -->
                                                            <!-- Modal create -->

                                                            <!--end Modal create -->

                                                        <?php  } ?>
                                                    </tbody>
                                                </table>
                                                <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Profession</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="planModaltwo" tabindex="-1"
                                aria-labelledby="createModalLabeltwo" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <form method="POST" action=""
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div
                                                class="modal-header card-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">New
                                                    Profession</h5>
                                                <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row"
                                                style="padding: 2rem;">
                                                <div
                                                    class="row justify-content-center">
                                                    <!--<div class="mb-3 col-md-6">-->
                                                    <!--  <label for="couple_name" class="col-form-label">Couple name :</label>-->
                                                    <!--  <input name="couple_name" type="text" class="form-control" id="couple_name">-->
                                                    <!--</div>-->
                                                    <div class="mb-3 ">
                                                        <label for="prof"
                                                            class="col-form-label">Profession :</label>
                                                        <!--<input name="highEdu"-->
                                                        <!--    type="text"-->
                                                        <!--    class="form-control"-->
                                                        <!--    id="highEdu">-->
                                                        <div
                                                            class="field_wrapper2">
                                                            <div>
                                                                <input
                                                                    type="text"
                                                                    name="field_name2[]"
                                                                    class="form-control"
                                                                    value="" />
                                                                <a href="javascript:void(0);"
                                                                    class="add_button2"
                                                                    title="Add field"><i class="fas fa-plus-square"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="save_Prof"
                                                    type="submit"
                                                    class="btn btn-primary">Save
                                                    Profession</button>
                                                <button name="" type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- -------------end of Profession tab--------------- -->
                        <!-- -------------Specialization tab--------------- -->
                        <div class="tab-pane fade" id="pills-Specialization" role="tabpanel"
                            aria-labelledby="pills-Specialization-tab">
                            <div>
                                <?php
                                $sql = "SELECT * FROM `specialization` ";
                                ?>
                                <div class="row ">
                                    <!-- Profil card -->
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable"
                                                    width="100%" cellspacing="0">
                                                    <div class="mb-3" style="text-align:right;">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#planModalthr"
                                                            data-bs-whatever="@create3"><i
                                                                class="fa-regular fa-plus"></i>
                                                            Add</button>
                                                    </div>
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>E-Mail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql_plan3 = "SELECT * FROM `specialization` ";
                                                        $result3 = mysqli_query($conn, $sql_plan3);
                                                        while ($row = mysqli_fetch_assoc($result3)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $row['id']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['specialization']; ?>
                                                                </td>
                                                                <td>
                                                                    <button type="button" name="delete_user"
                                                                        class="btn btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#delet_dActuser_modal<?php echo $row['id']; ?>"
                                                                        data-bs-whatever="@delet"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- ---------view users ----------- -->
                                                            <!------------ Modal delete ------------------>
                                                            <div class="modal fade"
                                                                id="delet_dActuser_modal<?php echo $row['id']; ?>"
                                                                tabindex="-1"
                                                                aria-labelledby="dltUserModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="example">Confirm To Delete
                                                                                ?</h5>
                                                                            <button type="button"
                                                                                class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="" method="post">
                                                                            <div class="modal-body">
                                                                                Do You Really Want to Delete
                                                                                this field?
                                                                                <input name="delete_id"
                                                                                    type="hidden"
                                                                                    class="form-control"
                                                                                    id="delete_id"
                                                                                    value="<?php echo $row['id']; ?>">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                <button name="delete_btn"
                                                                                    type="submit"
                                                                                    class="btn btn-danger"
                                                                                    id="dlt_btn">Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end Modal delete -->


                                                        <?php  } ?>
                                                    </tbody>
                                                </table>
                                                <!-- <button class="btn btn-primary  coral-green p-2 flex-fill bd-highlight">Profession</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal create -->
                            <div class="modal fade" id="planModalthr" tabindex="-1"
                                aria-labelledby="createModalLabelthr"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <form method="POST" action=""
                                        enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div
                                                class="modal-header card-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">New
                                                    Specialization</h5>
                                                <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row"
                                                style="padding: 2rem;">
                                                <div
                                                    class="row justify-content-center">
                                                    <!--<div class="mb-3 col-md-6">-->
                                                    <!--  <label for="couple_name" class="col-form-label">Couple name :</label>-->
                                                    <!--  <input name="couple_name" type="text" class="form-control" id="couple_name">-->
                                                    <!--</div>-->
                                                    <div class="mb-3 ">
                                                        <label for="spec"
                                                            class="col-form-label">Specialization :</label>
                                                        <!--<input name="highEdu"-->
                                                        <!--    type="text"-->
                                                        <!--    class="form-control"-->
                                                        <!--    id="highEdu">-->
                                                        <div
                                                            class="field_wrapper3">
                                                            <div>
                                                                <input
                                                                    type="text"
                                                                    name="field_name3[]"
                                                                    class="form-control"
                                                                    value="" />
                                                                <a href="javascript:void(0);"
                                                                    class="add_button3"
                                                                    title="Add field"><i class="fas fa-plus-square"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="save_spec"
                                                    type="submit"
                                                    class="btn btn-primary">Save
                                                    specialization</button>
                                                <button name="" type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--end Modal create -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login_pane.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
    <?php
    include 'panelFooter.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField1 = 10; //Input fields increment limitation
            var addButton1 = $('.add_button1'); //Add button selector
            var wrapper1 = $('.field_wrapper1'); //Input field wrapper
            var fieldHTML1 = '<div><input type="text" name="field_name1[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button1"><i class="fas fa-trash"></i></a></div>'; //New input field html 
            var xa = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton1).click(function() {
                //Check maximum number of input fields
                if (xa < maxField1) {
                    xa++; //Increment field counter
                    $(wrapper1).append(fieldHTML1); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper1).on('click', '.remove_button1', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                xa--; //Decrement field counter
            });
        });

        $(document).ready(function() {
            var maxField2 = 10; //Input fields increment limitation
            var addButton2 = $('.add_button2'); //Add button selector
            var wrapper2 = $('.field_wrapper2'); //Input field wrapper
            var fieldHTML2 = '<div><input type="text" name="field_name2[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button2"><i class="fas fa-trash"></i></a></div>'; //New input field html 
            var xb = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton2).click(function() {
                //Check maximum number of input fields
                if (xb < maxField2) {
                    xb++; //Increment field counter
                    $(wrapper2).append(fieldHTML2); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper2).on('click', '.remove_button2', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                xb--; //Decrement field counter
            });
        });

        $(document).ready(function() {
            var maxField3 = 10; //Input fields increment limitation
            var addButton3 = $('.add_button3'); //Add button selector
            var wrapper3 = $('.field_wrapper3'); //Input field wrapper
            var fieldHTML3 = '<div><input type="text" name="field_name3[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button3"><i class="fas fa-trash"></i></a></div>'; //New input field html 
            var xc = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton3).click(function() {
                //Check maximum number of input fields
                if (xc < maxField3) {
                    xc++; //Increment field counter
                    $(wrapper3).append(fieldHTML3); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper3).on('click', '.remove_button3', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                xc--; //Decrement field counter
            });
        });
    </script>

<?php


} else {
    header("location:index.php");
}
?>