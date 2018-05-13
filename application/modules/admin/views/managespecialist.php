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

        <div class="box box-danger">

          <div class="box-header with-border">
            <h3 class="box-title">Manage your specialists</h3>

            <button class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Specialist</button>

            <!-- Modal -->

            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #5cb85c; color: white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add Specialist</h4>
                  </div>
                  <div class="modal-body">


                    <?php 
                    $attributes = array('id' => 'addspecialist', 'method' => 'post', 'name' => 'addspecialist');
                    echo form_open_multipart('admin/addspecialist', $attributes);
                    ?>

                    <div class="control-group">
                      <div class="form-group ">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" id="name">
                      </div>
                    </div>


                    <div class="control-group">
                      <div class="form-group ">
                        <label>Slug</label>
                        <input type="text" class="form-control"  name="slug" id="slug" readonly>
                      </div>
                    </div>


                    <div class="control-group">
                      <div class="form-group ">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                      </div>
                    </div>


                    <div class="control-group">
                      <div class="form-group ">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                      </div>
                    </div>


                    <div class="control-group">
                      <div class="form-group">
                        <label>Specialist Type</label>
                        <select class="form-control" name="specialisttype" id="specialisttype" required>
                          <option text-muted selected disabled >Select Specialist Type</option>
                          <?php
                          foreach ($getspecialisttype as $type):
                            ?>
                            <option value="<?php echo $type->SPECIALIST_TYPE ?>"><?php echo ucwords($type->SPECIALIST_TYPE); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>


                    <div class="control-group">
                      <div class="form-group  ">
                        <label>Qualification</label>
                        <textarea name="qualification"  id="qualification" class="form-control"></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="form-group  ">
                        <label>Past Affilication</label>
                        <textarea name="pastaffiliation"  id="pastaffiliation" class="form-control"></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="form-group  ">
                        <label>Overall Membership</label>
                        <textarea name="membership"  id="membership" class="form-control"></textarea>
                      </div>
                    </div>



                    <div class="control-group">
                      <div class="form-group ">
                        <label>Image</label>
                        <input type="file" class="form-control" placeholder="Image" name="image" id="image">                                           </div>
                      </div>

                      <br>

                      <div class="form-group">
                        <button type="submit" class="btn btn-success" name="addspecialist-btn" id="addspecialist-btn"><i class="fa fa-plus-circle"></i> Add</button>
                      </div>
                      <?php echo form_close(); ?>

                    </div>
                  </div>

                </div>
              </div>

              <!-- MODAL ENDS HERE -->
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class="col-md-12">

                <div class="col-md-4"></div>

                <div class="col-md-4">
                  <?php if ($this->session->flashdata('addspecialist_success')): ?>
                    <div class="alert alert-success" style="font-size: 14px; text-align: center;">
                      <i class="fa fa-check-circle"></i>
                      <?php echo $this->session->flashdata('addspecialist_success') ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('addspecialist_fail')): ?>
                    <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                      <i class="fa fa-times-circle"></i>
                      <?php echo $this->session->flashdata('addspecialist_fail') ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('useractivate_success')): ?>
                    <div class="alert alert-success" style="text-align: center;font-size: 12px">
                      <i class="fa fa-check-circle"></i>
                      <?= $this->session->flashdata('useractivate_success'); ?>
                    </div>
                  <?php endif; ?>
                  
                  <?php if ($this->session->flashdata('userdeactivate_success')): ?>
                    <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                      <i class="fa fa-check-circle"></i>
                      <?= $this->session->flashdata('userdeactivate_success'); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('specialistdelete_success')): ?>
                    <div class="alert alert-success" style="font-size: 14px; text-align: center;">
                      <i class="fa fa-check-circle"></i>
                      <?php echo $this->session->flashdata('specialistdelete_success') ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('specialistdelete_fail')): ?>
                    <div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
                      <i class="fa fa-times-circle"></i>
                      <?php echo $this->session->flashdata('specialistdelete_fail') ?>
                    </div>
                  <?php endif; ?>

                  
                </div>

                <div class="col-md-4"></div>

              </div>


              <div class="col-md-12" style="overflow-x: scroll; margin-top: 20px">

                <table id="myTable" class="table">
                  <thead>
                    <tr>
                      <th nowrap>S.N</th>
                      <th nowrap>Name</th>
                      <th nowrap>Username</th>
                      <th nowrap>Specialist Type</th>
                      <th nowrap>Qualification</th>
                      <th nowrap>Past Affiliation</th>
                      <th nowrap>Membership</th>
                      <th nowrap>Image</th>
                      <th nowrap>Online Status</th>
                      <th nowrap>Status</th>  
                      <th nowrap>Edit</th>
                      <th nowrap>Delete</th>
                    </tr>
                  </thead>


                  <tbody>

                    <?php
                    $i = 1; 
                    if(is_array($getspecialist)):
                      foreach($getspecialist as $specialist): 
                        ?>

                        <tr>
                          <td nowrap><?php echo $i++; ?></td>
                          <td nowrap><?php echo $specialist->NAME; ?></td>
                          <td nowrap><?php echo $specialist->USERNAME; ?></td>
                          <td nowrap><?php echo $specialist->SPECIALIST_TYPE; ?></td>
                          <td><?php echo $specialist->QUALIFICATION ? $specialist->QUALIFICATION : '-'; ?></td>
                          <td><?php echo $specialist->PAST_AFFILIATION ? $specialist->PAST_AFFILIATION : '-' ?></td>
                          <td><?php echo $specialist->PAST_AFFILIATION ? $specialist->OVERALL_MEMBERSHIP : '-' ?></td>
                          <td><img src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" style="height: 70px; width: 70px"></td>
                          <td><?php echo ($specialist->ONLINE_STATUS == 1) ? '<i class="fa fa-circle text-success"></i> Online' : '<i class="fa fa-circle text-danger"></i> Offline'; ?></td>

                          <td>

                            <?php 
                            $attributes = array('method' => 'post');
                            echo form_open('admin/specialiststatus', $attributes);

                            ?>  

                            <input type="hidden" name="userid" value="<?= $specialist->ID ?>">

                            <?php if ($specialist->STATUS == 0): ?>
                              <button type="submit" class="btn btn-success btn-xs" name="activate"> Activate</button>
                              <?php else: ?>
                                <button type="submit" class="btn btn-danger btn-xs" name="deactivate"> Deactivate</button>
                              <?php endif;  ?>

                              <?php echo form_close(); ?>
                            </td>

                            <td>
                              <a href="<?php echo base_url().'admin/editspecialist/'.$specialist->ID ?>"><button type="submit" class="btn btn-warning btn-xs" id="editBtn" name="editBtn"><span class="fa fa-edit"></span>
                              </button></a>
                            </td>

                            <td>

                              <?php 
                              $attributes = array('method' => 'post');
                              echo form_open('admin/deletespecialist', $attributes);
                              ?>  
                              <input type="hidden" name="userid" value="<?= $specialist->ID ?>">
                              <button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Confirm delete?')"><span class="fa fa-trash-o"></span>
                              </button>
                              <?php echo form_close(); ?>
                            </td>
                          </tr>

                        <?php endforeach; ?>
                      <?php endif; ?>

                    </tbody>


                  </table>

                  <br> 

                </div>  

              </div>

            </div>

          </section>
        </div>
        <!-- Main row ends -->

      </section>
      <!-- Main content ends -->
    </div>





