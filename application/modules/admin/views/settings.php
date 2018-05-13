<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo "Admin"; ?>
      <small><?php echo $breadcrumb; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url().'admin/adminpanel'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><?php echo $breadcrumb; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <section class="col-md-12 ">

        <div class="box box-warning">

          <div class="box-header with-border">
            <h3 class="box-title">Changes your profile setting</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">


            <div class="col-md-12">

              <div class="col-md-6">
                <?php 
                $attributes = array('id' => 'editprofile-form', 'method' => 'post', 'name' => 'editprofile-form');
                echo form_open('admin/editProfile', $attributes);
                ?>

                <?php if ($this->session->flashdata('profileupdate_success')): ?>
                  <div class="alert alert-success" style="font-size: 14px; text-align: center;">
                    <i class="fa fa-check-circle"></i>
                    <?php echo $this->session->flashdata('profileupdate_success') ?>
                  </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('profileupdate_fail')): ?>
                  <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                    <i class="fa fa-times-circle"></i>
                    <?php echo $this->session->flashdata('profileupdate_fail') ?>
                  </div>
                <?php endif; ?>

                <input type="hidden" name="id" value="<?= $admin_details->ID ?>">
                <div class="control-group">
                  <div class="form-group  ">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $admin_details->NAME ?>">
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group  ">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" readonly value="<?php echo $admin_details->SLUG ?>">
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group  ">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $admin_details->USERNAME ?>"> 
                  </div>
                </div>

                <?php if($this->session->userdata('admintype') == 2): ?>
                  <div class="control-group">
                    <div class="form-group  ">
                      <label>Specialist Type</label>
                      <select class="form-control" name="specialisttype" id="specialisttype" style="width: 100%;">

                        <?php
                        foreach ($getspecialisttype as $type):
                          ?>
                          <option class="specialisttype-option" value="<?php echo $type->SPECIALIST_TYPE ?>" <?php if($type->SPECIALIST_TYPE == $admin_details->SPECIALIST_TYPE) echo "selected='selected'"?> ><?php echo ucwords($type->SPECIALIST_TYPE); ?></option>
                        <?php endforeach; ?>  

                      </select>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="form-group  ">
                      <label>Qualification</label>
                      <textarea name="qualification"  id="qualification" class="form-control"><?php echo $admin_details->QUALIFICATION ?></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="form-group  ">
                      <label>Past Affilication</label>
                      <textarea name="pastaffiliation"  id="pastaffiliation" class="form-control"><?php echo $admin_details->PAST_AFFILIATION ?></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="form-group  ">
                      <label>Overall Membership</label>
                      <textarea name="membership"  id="membership" class="form-control"><?php echo $admin_details->OVERALL_MEMBERSHIP ?></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="form-group  ">
                      <label>A message for patient</label>
                      <textarea name="patientmsg"  id="patientmsg" class="form-control" style="height: 90px"><?php echo $admin_details->PATIENT_MSG ?></textarea>
                    </div>
                  </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary btn-flat" id="editprofile-btn" name="editprofile-btn">Edit profile</button>

                <?php echo form_close(); ?>

                <br>


              </div>

              <div class="col-md-2">
              </div>

              <div class="col-md-4">

               <?php if ($this->session->flashdata('imageupdate_success')): ?>
                <div class="alert alert-success" style="font-size: 14px; text-align: center;">
                  <i class="fa fa-check-circle"></i>
                  <?php echo $this->session->flashdata('imageupdate_success') ?>
                </div>
              <?php endif; ?>

              <?php if ($this->session->flashdata('imageupdate_fail')): ?>
                <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                  <i class="fa fa-times-circle"></i>
                  <?php echo $this->session->flashdata('imageupdate_fail') ?>
                </div>
              <?php endif; ?>

              <img src="<?php echo base_url().'uploads/images/specialists/'.$admin_details->IMAGE ?>" class="img-responsive thumbnail" style="width: 100%; min-height: 240px; max-height: 200px" alt="Image Not Found.">

              <?php 
              $attributes = array('id' => 'editprofileimg-form', 'method' => 'post', 'name' => 'editprofileimg-form');
              echo form_open_multipart('admin/changeprofileimage', $attributes);
              ?>

              <input type="hidden" name="id" value="<?= $admin_details->ID ?>">
              <input type="file" name="image" id="image" class="btn btn-default btn-sm form-control">
              <input type="submit" class="btn btn-primary btn-sm form-control" name="changeimg-btn" id="changeimg-btn" value="Save Image" style="margin-top: 2px">

              <?php echo form_close(); ?>

              <br> 




            </div>


          </div>



          <div class="col-md-6" style="margin-top: 5px">

            <?php if ($this->session->flashdata('passUpdate_success')): ?>
              <div class="alert alert-success" style="font-size: 14px; text-align: center;">
                <i class="fa fa-check-circle"></i>
                <?php echo $this->session->flashdata('passUpdate_success') ?>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('passUpdate_fail')): ?>
              <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('passUpdate_fail') ?>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('passMatch_fail')): ?>
              <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('passMatch_fail') ?>
              </div>
            <?php endif; ?>


            <h4 style="margin-bottom: 20px"><i class="fa fa-lock"></i> Changes your system's password</h4>

            <?php 
            $attributes = array('id' => 'changePass', 'method' => 'post', 'name' => 'changePass');
            echo form_open('admin/changepassword', $attributes);
            ?>


            <div class="control-group">
              <div class="form-group  ">
                <label>Old Password</label>
                <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="oldpassword">
              </div>
            </div>

            <div class="control-group">
              <div class="form-group  ">
                <label>New Password</label>
                <input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword">
              </div>
            </div>

            <div class="control-group">
              <div class="form-group  ">
                <label>Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword"> 
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-flat" id="editPassBtn" name="editPassBtn">Update password</button>

            <br>

            <?php echo form_close(); ?>

          </div>


          



        </div>

      </div>

    </section>
  </div>
  <!-- Main row ends -->

</section>
<!-- Main content ends -->
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery/dist/jquery.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/ckeditor/ckeditor.js' ?>"> </script>

<script>
  
 CKEDITOR.replace( 'qualification' );
 

 CKEDITOR.replace( 'pastaffiliation' );
 CKEDITOR.add

 CKEDITOR.replace( 'membership' );
 CKEDITOR.add     
</script>



