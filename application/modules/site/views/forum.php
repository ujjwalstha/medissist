
<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">FO<span>RUM</span></h3>
		</div>
	</div>
</div>


<div class="forum-top" >
	<div class="container-fluid" >


		<div class="col-md-12">
			<div class="col-md-3"></div>

			<div class="col-md-6">
				<?php if ($this->session->flashdata('forum_question_success')): ?>
					<div class="alert alert-success" style="text-align: center; font-size: 14px;">
						<i class="fa fa-check-circle"></i>
						<?php echo $this->session->flashdata('forum_question_success') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('forum_question_fail')): ?>
					<div class="alert alert-danger" style="text-align: center; font-size: 14px">
						<i class="fa fa-times-circle"></i>
						<?php echo $this->session->flashdata('forum_question_fail') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('forum_answer_fail')): ?>
					<div class="alert alert-danger" style="text-align: center; font-size: 14px">
						<i class="fa fa-times-circle"></i>
						<?php echo $this->session->flashdata('forum_answer_fail') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('answerdelete_success')): ?>
					<div class="alert alert-success" style="text-align: center; font-size: 14px;">
						<i class="fa fa-check-circle"></i>
						<?php echo $this->session->flashdata('answerdelete_success') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('answerdelete_fail')): ?>
					<div class="alert alert-danger" style="text-align: center; font-size: 14px">
						<i class="fa fa-times-circle"></i>
						<?php echo $this->session->flashdata('answerdelete_fail') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('questiondelete_success')): ?>
					<div class="alert alert-success" style="text-align: center; font-size: 14px;">
						<i class="fa fa-check-circle"></i>
						<?php echo $this->session->flashdata('questiondelete_success') ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('questiondelete_fail')): ?>
					<div class="alert alert-danger" style="text-align: center; font-size: 14px">
						<i class="fa fa-times-circle"></i>
						<?php echo $this->session->flashdata('questiondelete_fail') ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-md-3"></div>
		</div>
		

		<div class="sub-hd two" style="margin-bottom: 40px">
			<h3 class="tittle two">SHARE YOUR <span class="two">THOUGHTS</span></h3>
		</div>


		

			<div class="panel-group" style=" margin-bottom: 50px;" >
				<div class="panel panel-info" id="forum-top">
					<?php foreach($forumques as $question): ?>	
					<div class="panel-body" style="line-height: 25px;">
						<div class="col-md-12">

							<?php if($this->session->userdata('userid') == $question->USER_ID): ?>

								<?php 
								$attributes = array('id' => 'delete-ques-form', 'method' => 'post', 'name' => 'delete-ques-form');
								echo form_open('deleteforumquestion', $attributes) 
								?>

								<input type="hidden" name="question_id" id="question_id" value="<?php echo $question->ID ?>">
								<button type="submit" class="btn btn-default btn-xs remove-answer-btn pull-right" id="remove-answer-btn" data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure to delete your post?')"> <span class="fa fa-times"></span></button>

								<?php echo form_close(); ?>

							<?php endif; ?>

							<div class="col-md-1" style="margin-left: -25px">
								<img src="<?php echo ($question->GENDER == "male") ? base_url().'assets/images/male.png' : base_url().'assets/images/female.png' ?>" style="height: 55px; width: 55px">
							</div>

							<div class="col-md-11">
								<text class="text-muted" style="font-weight: bold"><?php echo $question->FIRSTNAME.' '.$question->LASTNAME; ?></text><br>
								<label style="font-size: 14px; font-style: italic;"><?php echo $question->QUESTION; ?></label>
							</div>

						</div>
						<hr style="margin-bottom: 70px;">
						<hr>

						
						<?php  

						$questionid = $question->QUESTION_ID;

						$query = "SELECT tbl_user_detail.*, tbl_forum_answers.* 
						FROM tbl_user_detail
						JOIN tbl_forum_answers
						ON tbl_forum_answers.USER_ID = tbl_user_detail.ID
						WHERE tbl_forum_answers.QUESTION_ID = $questionid
						ORDER BY tbl_forum_answers.CREATED ASC";

						$result = $this->db->query($query)->result();

							// print_r($result);


							// if ($result->num_rows() > 0) {
							// 	return $result->result();

							// } else {
							// 	return false;
							// }

						if($result):
							foreach($result as $res):

								?>


								<div class="panel panel-info" style="margin-bottom: 15px;">
									<div class="panel-body" style="line-height: 25px; ">


										<div class="container-fluid">
											<?php if($this->session->userdata('userid') == $res->USER_ID): ?>

												<?php 
												$attributes = array('id' => 'delete-ans-form', 'method' => 'post', 'name' => 'delete-ans-form');
												echo form_open('deleteforumanswer', $attributes) 
												?>

												<input type="hidden" name="answer_id" id="answer_id" value="<?php echo $res->ID ?>">
												<button type="submit" class="btn btn-default btn-xs remove-answer-btn pull-right" id="remove-answer-btn" data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure to delete your comment?')"><span class="fa fa-times"></span></button>

												<?php echo form_close(); ?>

											<?php endif; ?>

											<div class="col-md-1" style="margin-left: -25px">
												<img src="<?php echo ($res->GENDER == "male") ? base_url().'assets/images/male.png' : base_url().'assets/images/female.png' ?>" style="height: 55px; width: 55px">
											</div>

											<div class="col-md-11">

												<text class="text-muted" style="font-weight: bold"><?php echo $res->FIRSTNAME.' '.$res->LASTNAME; ?></text> <br>
												<label style="font-size: 14px; font-style: italic;"><?php echo $res->ANSWER; ?></label>
											</div>

										</div>
									</div>
								</div>


								<?php 
							endforeach; 
						endif;
						?>

						<!-- <div class="col-md-12"> -->
							<?php 
							$attributes = array('id' => 'forum-ans-form', 'method' => 'post', 'name' => 'forum-ans-form');
							echo form_open('addforumanswer', $attributes) 
							?>

							<div class="col-md-11">
								<div class="form-group">
									<label></label>
									<input type="text" class="form-control" id="answer" name="answer" placeholder="Write your comment here..." required>
									<input type="hidden" value="<?php echo $question->QUESTION_ID ?>" name="question_id" id="question_id">

								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label></label>
									<button type="submit" class="btn btn-info" name="addans-btn" id="addans-btn" >Comment</button>
								</div>
							</div>

							<?php echo form_close(); ?>

							<!-- </div> -->

						</div>

						<hr class="hr-line-forum" style="height: 5px; background-color: #bce8f1">

						<?php endforeach; ?>
					</div>
				</div>

			




		</div>

		
		<div class="container-fluid" style="background-color: #5bc0de; margin-top: 100px; padding: 50px; margin-bottom: -97px">
			<div class="row">
				<div class="ask-ques" style=" height: 225px; ">
					<div class="col-md-12" style="text-align: center; margin-top: 20px">
						<text style="color: white; font-size: 30px">Do you have any questions to ask or anything to share?</text>
					</div>

					<div class="col-md-12" style=" margin-top: 20px">

						<?php 
						$attributes = array('id' => 'forum-ques-form', 'method' => 'post', 'name' => 'forum-ques-form');
						echo form_open('addforumquestion', $attributes) 
						?>

						<div class="form-group">
							<!-- <label for="comment">Comment:</label> -->
							<textarea class="form-control" rows="5" id="question" placeholder="Please write your questions or comments here ..." name="question"></textarea>
						</div>

						<div class="form-group">
							<label></label>
							<button type="submit" class="btn btn-primary" name="addques-btn" id="addques-btn">Share</button>
						</div>

						<?php echo form_close(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
