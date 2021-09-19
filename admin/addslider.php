<?php require_once('inc/header.php') ?>

                <!-- ============================content HEADER start============================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="dashbord.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Slider</a></li>
                        </ul>
                    </div>
                </div>
                <!-- ============================content HEADER end============================= -->

                <!-- ============================refesh icon start =====================================-->
                <!-- <div class="row">
                  <div class="col-12">
                    <div class="pull-left">
                      <h4 class="section-subtitle"><b>Add New Slider</b></h4>
                    </div>
                    <div class="pull-right">
                      <a href="addslider.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
                    </div>
                  </div>
                </div> -->
                <!-- ============================refesh icon end =====================================-->

                <!-- ============================Add slider start =====================================-->
                <div class="row animated">
                  <div class="col-sm-12 col-lg-12">
                    <div class="row">
                      <!--BOX Style 1-->
                      <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <!-- <h4 class="section-subtitle"><b>Add New Slider</b></h4> -->
                        <div class="panel">
                            <div class="panel-header bg-info">
                              <h4 class="section-subtitle"><b>Add New Slider</b></h4>
                            </div>
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="inline-validation" class="form-horizontal form-stripe">
                                            <div class="form-group">
                                                <label for="title" class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="sub_title" class="col-sm-3 control-label">Sub Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="sub_title" name="sub_title" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="details" class="col-sm-3 control-label">Details</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="details" name="details" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span for="start_date" class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="start_date" class="form-control start_date" id="start_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date" class="col-sm-3 control-label ">End Date</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span  for="end_date" class="input-group-addon x-primary"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="end_date" class="form-control end_date" id="end_date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="slider_btn" class="col-sm-3 control-label">Slider Button</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="slider_btn" name="slider_btn" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="slider_btn_url" class="col-sm-3 control-label">Button Url</label>
                                                <div class="col-sm-9">
                                                    <input type="url" class="form-control" id="slider_btn_url" name="slider_btn_url" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="status" class="col-sm-3 control-label">Status</label>
                                                <div class="col-sm-9">
                                                  <label class="radio-inline">
                                                    <input type="radio" name="status" id="status" value="1" checked> Active
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="status" id="status" value="2"> Inactive
                                                  </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="slider_img" class="col-sm-3 control-label">Slider Image</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="" id="slider_img" name="slider_img" onchange="imgView(this);" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="img/avatar.jpg" alt="img/avatar.jpg" class="img-thumbnail img-view">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-9 col-sm-3 text-right">
                                                    <button type="submit" class="btn btn-primary btn-lg text-dark">Add Slider</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                  </div>
                </div>
                <!-- ============================Add slider end =====================================-->


<?php require_once('inc/footer.php') ?>
