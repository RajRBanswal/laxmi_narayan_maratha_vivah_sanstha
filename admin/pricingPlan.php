<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['admin_id'])) {
  $adId = $_SESSION['admin_id'];
  // insert query
  if (isset($_POST['create_plan'])) {
    $label = $_POST['plan_label'];
    $plan_heading = $_POST['plan_heading'];
    $price = $_POST['price'];
    $months = $_POST['months'];
    $plan_disc = $_POST['plan_disc'];
    $rule1 = $_POST['rule1'];
    $rule2 = $_POST['rule2'];
    // $rule3 = $_POST['rule3'];
    // $rule4 = $_POST['rule4'];
    $visiblePro = $_POST['visiblePro'];
    $messages = $_POST['messages'];
    $Contact = $_POST['Contact'];
    $Validity = $_POST['Validity'];
    $Biodata = $_POST['Biodata'];
    $Chat = $_POST['Chat'];
    $gallery = $_POST['gallery'];
    $profile = $_POST['profile'];
    $WhatsApp = $_POST['WhatsApp'];
    $authentication = $_POST['authentication'];
    $matchmaking = $_POST['matchmaking'];
    $highlighted = $_POST['highlighted'];
    $featured_search = $_POST['featured_search'];
    $Verified_profile = $_POST['Verified_profile'];
    $Customer_support = $_POST['Customer_support'];
    $Dedicated_executive = $_POST['Dedicated_executive'];
    $sql = "INSERT INTO `create_plans`(`label`, `heading`, `price`, `months`, `discription`, `rule1`, `rule2`, `rule3`, `rule4`, `visiblePro`, `direct_message`, `download_biodata`, `chat_allowed`, `view_gallery_photo`, `view_unlimited_profile`, `whatsapp_support`, `document_authentication`, `personal_matchmaking`, `get_highlighted`, `get_featured_on_top_search`, `verified_profile_contact`, `customer_support`, `dedicated_executive`) VALUES ('$label','$plan_heading','$price','$months','$plan_disc','$rule1','$rule2','$Contact','$Validity','$visiblePro','$messages','$Biodata','$Chat','$gallery','$profile','$WhatsApp','$authentication','$matchmaking','$highlighted','$featured_search','$Verified_profile','$Customer_support','$Dedicated_executive')";

    if (mysqli_query($conn, $sql)) {
      header("location:pricingPlan.php");
?>
      <script>
        alert("from submitted successfully");
        window.location.href = pricingPlan.php;
      </script>
    <?php
    } else {
    ?>
      <script>
        alert('could not submit');
        window.location.href = pricingPlan.php;
      </script>
    <?php
    }
  }
  //  update query
  if (isset($_POST['update_plan'])) {
    $label = $_POST['plan_label'];
    $plan_heading = $_POST['plan_heading'];
    $price = $_POST['price'];
    $months = $_POST['months'];
    $plan_disc = $_POST['plan_disc'];
    $rule1 = $_POST['rule1'];
    $rule2 = $_POST['rule2'];
    // $rule3 = $_POST['rule3'];
    // $rule4 = $_POST['rule4'];
    $visiblePro = $_POST['visiblePro'];
    $messages = $_POST['messages'];
    $Contact = $_POST['Contact'];
    $Validity = $_POST['Validity'];
    $Biodata = $_POST['Biodata'];
    $Chat = $_POST['Chat'];
    $gallery = $_POST['gallery'];
    $profile = $_POST['profile'];
    $WhatsApp = $_POST['WhatsApp'];
    $authentication = $_POST['authentication'];
    $matchmaking = $_POST['matchmaking'];
    $highlighted = $_POST['highlighted'];
    $featured_search = $_POST['featured_search'];
    $Verified_profile = $_POST['Verified_profile'];
    $Customer_support = $_POST['Customer_support'];
    $Dedicated_executive = $_POST['Dedicated_executive'];

    $editID = $_POST['edit_id'];

    $sql_edit = "UPDATE `create_plans` SET `label`='$label', `heading`='$plan_heading',`price`='$price',`months`='$months',`discription`='$plan_disc',`rule1`='$rule1',`rule2`='$rule2',`rule3`='$Contact',`rule4`='$Validity',`visiblePro`='$visiblePro',`direct_message`='$messages',`download_biodata`='$Biodata',`chat_allowed`='$Chat',`view_gallery_photo`='$gallery',`view_unlimited_profile`='$profile',`whatsapp_support`='$WhatsApp',`document_authentication`='$authentication',`personal_matchmaking`='$matchmaking',`get_highlighted`='$highlighted',`get_featured_on_top_search`='$featured_search',`verified_profile_contact`='$Verified_profile',`customer_support`='$Customer_support',`dedicated_executive`='$Dedicated_executive' WHERE `id`='$editID' ";

    if (mysqli_query($conn, $sql_edit)) {
    ?>
      <script>
        alert("Updated Successfully");
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Could not update");
      </script>
    <?php
    }
  }
  //  delete query
  if (isset($_POST['delete_btn'])) {
    $dltID = $_POST['delete_id'];
    $sql_dlt = "DELETE FROM `create_plans` WHERE `id`='$dltID'";
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

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Profil card -->
    <div class="mb-4 px-3 py-1">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Pricing Plan</h6>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="mb-3" style="text-align:right;">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#planModal" data-bs-whatever="@create"><i class="fa-regular fa-plus"></i> Plan</button>

            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="table-success">
                <tr>
                  <th>Label</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Time Period</th>
                  <th>Discription</th>
                  <th>Feature 1</th>
                  <th>Feature 2</th>
                  <!--<th>Feature 3</th>-->
                  <!--<th>Feature 4</th>-->
                  <th>Visible Profiles</th>
                  <th class="">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_plan = "SELECT * FROM `create_plans` order by price ASC";
                $result = mysqli_query($conn, $sql_plan);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['label']; ?></td>
                    <td><?php echo $row['heading']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['months']; ?></td>
                    <td><?php echo $row['discription']; ?></td>
                    <td><?php echo $row['rule1']; ?></td>
                    <td><?php echo $row['rule2']; ?></td>
                    <!--<td><?php // echo $row['rule3']; 
                            ?></td>-->
                    <!--<td><?php // echo $row['rule4']; 
                            ?></td>-->
                    <td><?php echo $row['visiblePro']; ?></td>
                    <td class="d-flex"><button type="button" name="update_plan" class="btn btn-info mr-3" data-bs-toggle="modal" data-bs-target="#update_plan<?php echo $row['id']; ?>" data-bs-whatever="@update" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                      <button type="button" name="delete_plan" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_confirm<?php echo $row['id']; ?>" data-bs-whatever="@delet" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </td>
                  </tr>


                  <div class="modal fade" id="update_plan<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <form method="POST" action="">
                        <!-- Modal update -->
                        <div class="modal-content">
                          <div class="modal-header card-header ">
                            <h5 class="modal-title" id="exampleModalLabel">Update plan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body " style="padding: 2rem;">
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label for="plan_label" class="col-form-label">Plan label :</label>
                                <select name="plan_label" type="" class="form-control" id="plan_label" value="<?php echo $row['label']; ?>" required>
                                  <option value="<?php echo $row['label']; ?>"><?php echo $row['label']; ?></option>
                                  <option value="vip">vip</option>
                                  <option value="supreme">supreme</option>
                                  <option value="premium">premium</option>
                                  <option value="premium_membership">Premium Membership</option>
                                </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="plan_heading" class="col-form-label">Plan name :</label>
                                <input name="plan_heading" type="text" class="form-control" id="plan_heading" value="<?php echo $row['heading']; ?>" placeholder="<?php echo $row['heading']; ?>">
                              </div>

                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label for="plan_rate" class="col-form-label">Price :</label>
                                <input name="price" type="text" class="form-control" id="plan_rate" value="<?php echo $row['price']; ?>" placeholder="<?php echo $row['price']; ?>">
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="Plan_prd" class="col-form-label ">Months :</label>
                                <input name="months" type="text" class="form-control" id="Plan_prd" value="<?php echo $row['months']; ?>" placeholder="<?php echo $row['months']; ?>">
                              </div>

                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label for="rule1" class="col-form-label">Feature 1 :</label>
                                <input name="rule1" type="text" class="form-control" id="rule1" value="<?php echo $row['rule1']; ?>" placeholder="<?php echo $row['rule1']; ?>">
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="rule2" class="col-form-label">Feature 2 :</label>
                                <input name="rule2" type="text" class="form-control" id="rule2" value="<?php echo $row['rule2']; ?>" placeholder="<?php echo $row['rule2']; ?>">
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label for="discription" class="col-form-label">Discription:</label>
                                <input type="text" name="plan_disc" class="form-control" id="discription" value="<?php echo $row['discription']; ?>">
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="visiblePro" class="col-form-label">No of visible Profiles :</label>
                                <input name="visiblePro" type="number" class="form-control" id="visiblePro" value="<?php echo $row['visiblePro']; ?>" placeholder="<?php echo $row['visiblePro']; ?>">
                                <input name="edit_id" type="hidden" class="form-control" id="edit_id" value="<?php echo $row['id']; ?>">
                              </div>
                              <!--<div class="mb-3 col-md-6">-->
                              <!--  <label for="rule3" class="col-form-label">Feature 3 :</label>-->
                              <!--  <input name="rule3" type="text" class="form-control" id="rule3" value="<?php // echo $row['rule3']; 
                                                                                                            ?>" placeholder="<?php echo $row['rule3']; ?>">-->
                              <!--</div>-->

                            </div>
                            <!--<div class="row">-->
                            <!--<div class="mb-3 col-md-6">-->
                            <!--  <label for="rule4" class="col-form-label">Feature 4 :</label>-->
                            <!--  <input name="rule4" type="text" class="form-control" id="rule4" value="<?php // echo $row['rule4']; 
                                                                                                          ?>" placeholder="<?php echo $row['rule4']; ?>">-->
                            <!--  <input name="edit_id" type="hidden" class="form-control" id="edit_id" value="<?php // echo $row['id']; 
                                                                                                                ?>">-->
                            <!--</div>-->
                            <!--</div>-->
                            <div class="row">
                              <div class="mb-1 col-md-4">
                                <input type="checkbox" id="messages" name="messages" value="Yes" <?php if ($row['direct_message'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="messages"> Direct messages</label><br>
                                <input type="checkbox" id="Contact" name="Contact" value="Yes" <?php if ($row['rule3'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Contact"> View Contact</label><br>
                                <input type="checkbox" id="Validity" name="Validity" value="Yes" <?php if ($row['rule4'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Validity"> Validity</label><br>
                                <input type="checkbox" id="Biodata" name="Biodata" value="Yes" <?php if ($row['download_biodata'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Biodata">Download Biodata</label><br>
                                <input type="checkbox" id="Chat" name="Chat" value="Yes" <?php if ($row['chat_allowed'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Chat"> Chat allowed</label><br>
                              </div>
                              <div class="mb-1 col-md-4">
                                <input type="checkbox" id="gallery" name="gallery" value="Yes" <?php if ($row['view_gallery_photo'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="gallery"> View gallery photo</label><br>
                                <input type="checkbox" id="profile" name="profile" value="Yes" <?php if ($row['view_unlimited_profile'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="profile"> View unlimited profile</label><br>
                                <input type="checkbox" id="WhatsApp" name="WhatsApp" value="Yes" <?php if ($row['whatsapp_support'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="WhatsApp"> WhatsApp support</label><br>
                                <input type="checkbox" id="authentication" name="authentication" value="Yes" <?php if ($row['document_authentication'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="authentication"> Document authentication</label><br>
                                <input type="checkbox" id="matchmaking" name="matchmaking" value="Yes" <?php if ($row['personal_matchmaking'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="matchmaking"> Personal matchmaking</label><br>
                              </div>
                              <div class="mb-1 col-md-4">
                                <input type="checkbox" id="highlighted" name="highlighted" value="Yes" <?php if ($row['get_highlighted'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="highlighted"> Get highlighted</label><br>
                                <input type="checkbox" id="featured_search" name="featured_search" value="Yes" <?php if ($row['get_featured_on_top_search'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="featured_search"> Get featured on top search</label><br>
                                <input type="checkbox" id="Verified_profile" name="Verified_profile" value="Yes" <?php if ($row['verified_profile_contact'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Verified_profile"> Verified profile/contact</label><br>
                                <input type="checkbox" id="Customer_support" name="Customer_support" value="Yes" <?php if ($row['customer_support'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Customer_support"> Customer support</label><br>
                                <input type="checkbox" id="Dedicated_executive" name="Dedicated_executive" value="Yes" <?php if ($row['dedicated_executive'] == "Yes") { ?> checked="checked" <?php } ?>>
                                <label for="Dedicated_executive"> Dedicated executive</label><br>

                              </div>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button name="update_plan" type="submit" class="btn btn-info" id="updt_btn">Save</button>
                            <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!--end Modal update -->
                      </form>
                    </div>
                  </div>

                  <!-- Modal delet -->
                  <div class="modal fade" id="delete_confirm<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="example">Confirm To Delete?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                          <div class="modal-body">
                            Do You Really Want to Delete this Row?
                            <input name="delete_id" type="hidden" class="form-control" id="delete_id" value="<?php echo $row['id']; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button name="delete_btn" type="submit" class="btn btn-danger" id="dlt_btn">Confirm</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--end Modal delet -->
                <?php  } ?>
              </tbody>
            </table>
            <!-- <button class="btn btn-info  coral-green p-2 flex-fill bd-highlight">Active</button> -->
          </div>
        </div>

        <!-- Modal create -->
        <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form method="POST" action="">

              <div class="modal-content">
                <div class="modal-header card-header">
                  <h5 class="modal-title" id="exampleModalLabel">New plan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row" style="padding: 2rem;">
                  <div class="row">
                    <div class="mb-1 col-md-6">
                      <label for="plan_label" class="col-form-label">Plan label :</label>
                      <select name="plan_label" type="" class="form-control" id="plan_label" required>
                        <!-- <option value="gold">gold</option>
                              <option value="silver">silver</option>
                              <option value="platinum">platinum</option> -->
                        <option value="vip">vip</option>
                        <option value="supreme">supreme</option>
                        <option value="premium">premium</option>
                        <option value="premium_membership">Premium Membership</option>
                        <!-- <option value="other">other</option> -->
                      </select>
                    </div>
                    <div class="mb-1 col-md-6">
                      <label for="plan_heading" class="col-form-label">Plan name :</label>
                      <input name="plan_heading" type="text" class="form-control" id="plan_heading" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-1 col-md-6">
                      <label for="plan_rate" class="col-form-label">Price :</label>
                      <input name="price" type="text" class="form-control" id="plan_rate" required>
                    </div>
                    <div class="mb-1 col-md-6">
                      <label for="Plan_prd" class="col-form-label ">Months :</label>
                      <input name="months" type="text" class="form-control" id="Plan_prd" required>
                    </div>
                  </div>
                  <div class="row">

                    <!--<div class="mb-3 col-md-6">-->
                    <!--    <label for="visiblePro" class="col-form-label">NO. Of Visible Profiles :</label>-->
                    <!--    <input name="visiblePro" type="number" class="form-control" id="visiblePro">-->
                    <!--  </div>-->
                    <div class="mb-1 col-md-6">
                      <label for="rule1" class="col-form-label">Feature 1 :</label>
                      <input name="rule1" type="text" class="form-control" id="rule1" required>
                    </div>
                    <div class="mb-1 col-md-6">
                      <label for="rule2" class="col-form-label">Feature 2 :</label>
                      <input name="rule2" type="text" class="form-control" id="rule2" required>
                    </div>
                  </div>


                  <div class="row">


                    <div class="mb-1 col-md-6">
                      <label for="discription" class="col-form-label">Discription:</label>
                      <input type="text" name="plan_disc" class="form-control" id="discription">
                    </div>
                    <!--<div class="mb-1 col-md-6">-->
                    <!--  <label for="rule3" class="col-form-label">Feature 3 :</label>-->
                    <!--  <input name="rule3" type="text" class="form-control" id="rule3">-->
                    <!--</div>-->
                    <!--<div class="row">-->
                    <!--  <div class="mb-1 col-md-6">-->
                    <!--    <label for="rule4" class="col-form-label">Feature 4 :</label>-->
                    <!--    <input name="rule4" type="text" class="form-control" id="rule4">-->
                    <!--  </div>-->
                    <div class="mb-1 col-md-6">
                      <label for="visiblePro" class="col-form-label">NO. Of Visible Profiles :</label>
                      <input name="visiblePro" type="number" class="form-control" id="visiblePro" required>
                    </div>
                    <!--</div>-->
                  </div>
                  <div class="row">
                    <!--<label for="rule1" class="col-form-label">Feature 1 :</label>-->
                    <div class="mb-1 col-md-4">
                      <!--<label for="rule1" class="col-form-label">Feature 1 :</label>-->
                      <input type="checkbox" id="messages" name="messages" value="Yes">
                      <label for="messages"> Direct messages</label><br>

                      <input type="checkbox" id="Contact" name="Contact" value="Yes">
                      <label for="Contact"> View Contact</label><br>

                      <input type="checkbox" id="Validity" name="Validity" value="Yes">
                      <label for="Validity"> Validity</label><br>

                      <input type="checkbox" id="Biodata" name="Biodata" value="Yes">
                      <label for="Biodata">Download Biodata</label><br>

                      <input type="checkbox" id="Chat" name="Chat" value="Yes">
                      <label for="Chat"> Chat allowed</label><br>
                    </div>
                    <!--<label for="rule2" class="col-form-label">Feature 2 :</label>-->
                    <div class="mb-1 col-md-4">

                      <input type="checkbox" id="gallery" name="gallery" value="Yes">
                      <label for="gallery"> View gallery photo</label><br>

                      <input type="checkbox" id="profile" name="profile" value="Yes">
                      <label for="profile"> View unlimited profile</label><br>

                      <input type="checkbox" id="WhatsApp" name="WhatsApp" value="Yes">
                      <label for="WhatsApp"> WhatsApp support</label><br>

                      <input type="checkbox" id="authentication" name="authentication" value="Yes">
                      <label for="authentication"> Document authentication</label><br>

                      <input type="checkbox" id="matchmaking" name="matchmaking" value="Yes">
                      <label for="matchmaking"> Personal matchmaking</label><br>

                    </div>
                    <div class="mb-1 col-md-4">
                      <input type="checkbox" id="highlighted" name="highlighted" value="Yes">
                      <label for="highlighted"> Get highlighted</label><br>

                      <input type="checkbox" id="featured_search" name="featured_search" value="Yes">
                      <label for="featured_search"> Get featured on top search</label><br>

                      <input type="checkbox" id="Verified_profile" name="Verified_profile" value="Yes">
                      <label for="Verified_profile"> Verified profile/contact</label><br>

                      <input type="checkbox" id="Customer_support" name="Customer_support" value="Yes">
                      <label for="Customer_support"> Customer support</label><br>

                      <input type="checkbox" id="Dedicated_executive" name="Dedicated_executive" value="Yes">
                      <label for="Dedicated_executive"> Dedicated executive</label><br>

                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button name="create_plan" type="submit" class="btn btn-info">Save plan</button>
                  <button name="" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--end Modal create -->
      </div>
    </div>

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
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
          <a class="btn btn-info" href="login_pane.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'panelFooter.php';
  ?>

<?php

} else {
  header("location:index.php");
}
?>