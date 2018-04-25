<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo "Admin"; ?>
			<small><?php echo $breadcrumb; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'admin/dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">

							<div class="col-md-4"></div>

							<div class="col-md-4">

								<?php if ($this->session->flashdata('answerdelete_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('answerdelete_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('answerdelete_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('answerdelete_fail') ?>
									</div>
								<?php endif; ?>

							</div>

							<div class="col-md-4"></div>

						</div>


						<div class="col-md-12" style="overflow-x: scroll; margin-top: 20px">

							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>S.N</th>
										<th nowrap>Question</th>
										<th>Answer</th>
										<th nowrap>Answer By</th> 
										<th>Action</th>
									</tr>
								</thead>


								<tbody>

									<?php
									$i = 1; 
									if(is_array($getForumAnswers)):
										foreach($getForumAnswers as $answers): 
											?>

											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $answers->QUESTION; ?></td>
												<td><?php echo $answers->ANSWER; ?></td>	
												<td nowrap><?php echo $answers->FIRSTNAME.' '.$answers->LASTNAME; ?></td>
												<td>

													<?php 
													$attributes = array('method' => 'post');
													echo form_open('admin/deleteforumanswer', $attributes);
													?>  
													<input type="hidden" name="answerid" value="<?= $answers->ANSWER_ID ?>">
													<button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Are you sure to delete this answer?')"><span class="fa fa-trash-o"></span>
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





