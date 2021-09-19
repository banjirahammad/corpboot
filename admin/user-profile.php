<?php require_once('header.php') ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">User profile</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!-- ============================refesh icon start =====================================-->
                <div class="row">
                  <div class="col-12">
                    <div class="pull-right">
                      <a href="user-profile.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
                    </div>
                  </div>
                </div>
                <!-- ============================refesh icon end =====================================-->
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                        <!--PROFILE-->
                        <div class="UserPhotoView">
                            <div class="profile-photo">
                                <div class="imges">
                                  <?php if ($user['photo']==""){ ?>
                                    <img alt="User photo" class="img-thumbnail" src="../images/librarians/avatar.jpg">

                                  <?php } else {  ?>
                                    <img alt="User photo" class="img-thumbnail" src="../images/librarians/<?= $user['photo']; ?>">
                                <?php } ?>
                                </div>

                            </div>
                            <div class="text-right">
                              <a href="user-photo-change.php?remove=<?=base64_encode($user['id']);?>&photo=<?=$user['photo'];?>" class="btn btn-danger btn-sm">Remove Photo</a>
                              <button class="btn btn-info text-right" type="button"data-toggle="modal" data-target="#cngimg" name="button">Change Photo</button>
                            </div>


                            <div class="modal fade" id="cngimg" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Change Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="" action="user-photo-change.php" method="POST" enctype="multipart/form-data">
                                              <div class="form-group mt-md">
                                                  <input type="file"class="form-control" name="user_photo" value="">
                                                  <input type="<?php echo "hidden"; ?>"class="form-control" name="id" value="<?php echo $user['id']; ?>">
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" name="updatePhoto" class="btn btn-primary btn-sm"  >Update Photo</button>
                                              </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="user-header-info header-left-margin0">
                                <h2 class="user-name"><?php echo ucwords($user['fname']).' '.ucwords($user['lname']);?></h2>
                                <h5 class="user-position">Librarian</h5>

                            </div>
                        </div>
                        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                        <!--CONTACT INFO-->
                        <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                            <div class="panel-content">
                                <h4 class=""><b>Contact Information</b></h4>
                                <ul class="user-contact-info ph-sm">
                                    <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> <?php echo $user['email'] ?></li>
                                    <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> <?php echo $user['phone_number'] ?></li>
                                    <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> <?php echo $user['address'] ?></li>

                                </ul>
                            </div>
                        </div>
                        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                        <!--LIST-->

                    </div>
                    <div class="col-md-6 col-lg-8">
                        <?php
                          $change = "disabled";
                          if (isset($_POST['change'])) {
                            $change = " ";
                          }
                          if (isset($_POST['update'])) {
                            $id = $_POST['id'];
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $phone_number = $_POST['phone_number'];
                            $address = $_POST['address'];
                            $Query = "UPDATE `librarian` SET `fname`='$fname', `lname`='$lname',`phone_number`='$phone_number',`address`='$address' WHERE `id` = '$id' ";
                            $result = mysqli_query($dbcon,$Query);
                            if ($result) {
                                $success = " update your Information";
                            }

                          }

                         ?>
                         <!-- ============================Notice alert start =====================================-->
                         <?php
                           if (isset($success)) { ?>
                             <div class="alert alert-success fade in">
                                 <a href="#" class="close" data-dismiss="alert">×</a>
                                 <strong>Succcessfully!!</strong><?= $success; ?> (Refresh this page)
                             </div>

                          <?php } ?>
                         <!-- ============================Notice alert end =====================================-->
                        <div class="your-info">
                          <?php if ($change=="disabled") { ?>
                            <h3 class="h325 text-primary">Your Information</h3>
                          <?php } else { ?>
                            <h3 class="h325 text-primary">Update Your Information</h3>
                          <?php } ?>


                          <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group mt-md">
                                  <label class="label25" for="">First Name</label>
                                  <input type="text" class="form-control" <?= $change=="disabled"? $change : ''; ?> name="fname" value="<?php echo $user['fname']; ?>">
                                  <input type="<?= "hidden"; ?>" class="form-control"  name="id" value="<?php echo $user['id']; ?>">
                              </div>
                              <div class="form-group mt-md">
                                  <label class="label25" for="">Last Name</label>
                                  <input type="text" class="form-control" <?= $change=="disabled"? $change : ''; ?> name="lname" value="<?php echo $user['lname']; ?>">
                              </div>
                              <div class="form-group mt-md">
                                  <label class="label25" for="">Username</label>
                                  <input type="text" class="form-control"  <?php echo "disabled"; ?> value="<?php echo $user['username']; ?>">
                              </div>

                              <div class="form-group mt-md">
                                  <label class="label25" for="">Email</label>
                                  <input type="text" <?php echo "disabled"; ?>  class="form-control" value="<?php echo $user['email']; ?>">
                              </div>
                              <div class="form-group mt-md">
                                  <label class="label25"  for="">Phone Number</label>
                                  <input type="text" name="phone_number" <?= $change=="disabled"? $change : ''; ?> class="form-control" value="<?php echo $user['phone_number']; ?>">
                              </div>

                              <div class="form-group mt-md">
                                  <label class="label25" for="">Address</label>
                                  <textarea type="text" name="address" <?= $change=="disabled"? $change : ''; ?> class="form-control"><?php echo $user['address'];?></textarea>
                              </div>


                              <div class="form-group">
                                <?php if ($change=="disabled") { ?>
                                  <button type="submit" name="change" class="btn btn-primary"  >Change Your Information</button>
                                <?php } else { ?>
                                  <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('Are You Sure to Change Your info')" >Update Information</button>
                                <?php } ?>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->


<?php require_once('footer.php') ?>
