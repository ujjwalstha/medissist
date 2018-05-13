<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MX_Controller {
	/*
	 *	variable to hold data for view
	 */
	private static $viewData = array();

	function __construct() {
		parent::__construct();

		ini_set("date.timezone", "Asia/Katmandu");

		// ini_set("SMTP","ssl://smtp.gmail.com");
		// ini_set("smtp_port","465");


		$helper = array('url', 'form', 'security', 'captcha');
		$this->load->helper($helper);

		$library = array('form_validation', 'session', 'upload', 'image_lib', 'email');
		$this->load->library($library);

		$this->load->model('site_model'); 
		$this->load->model('admin/admin_model'); 

		self::$viewData['user_detail'] = $this->site_model->getUserDetail();
		self::$viewData['getspecialisttype'] = $this->admin_model->getSpecialistType();
		self::$viewData['getspecialist'] = $this->admin_model->getspecialist();

	}

	
	public function index()
	{
		if($this->session->userdata('userid') == ''):

			// echo $this->session->userdata('userid'); exit;
			self::$viewData['title'] = 'Welcome to Medissist';
			$this->load->view('site/defaulthome', self::$viewData);

		else:   
		    redirect('home');    
		endif;
	}


	public function signup()
	{
		if($this->session->userdata('userid') == ''):

			$firstname 	= $this->input->post('firstname');
			$lastname 	= $this->input->post('lastname');
			$email 		= $this->input->post('email');

			$checkuser = $this->site_model->checkuser($email);

			if ($checkuser) {
				$message = 'User already exists. Please try with different email.';
				$this->session->set_flashdata('register_fail', $message);
				redirect(base_url());

			} else {

				$data = array(
					"FIRSTNAME" 	=> $firstname,
					"LASTNAME"		=> $lastname,
					"SLUG"			=> strtolower($firstname).'-'.strtolower($lastname),
					"EMAIL"			=> $email,
					"PASSWORD"		=> sha1($this->input->post('password')),
					"GENDER"		=> $this->input->post('gender'),
					"CREATED_ON"	=> date('Y-m-d H:i:s'),
				);

				$userRegister = $this->site_model->userRegister($data);

				if ($userRegister) {
					$message = 'User registered successfully';
					$this->session->set_flashdata('register_success', $message);
					redirect(base_url());

				} else {
					$message = 'Failed to register user';
					$this->session->set_flashdata('register_fail', $message);
					redirect(base_url());
				}
			}  

		else:   
		    redirect('home');    
		endif;
	}

	public function login()
	{
		if($this->session->userdata('userid') == ''):

			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$userLogin = $this->site_model->userLogin($email, $password);

			if ($userLogin) {

				$status = $userLogin->STATUS;

				if ($status == 1) {
					$session_data = array(
							'email' 	=> $email,
		                    'welcome' 	=> "Welcome ".ucwords($userLogin->FIRSTNAME), //setting name in session
		                    'userid' 	=> $userLogin->ID,
		                    'slug'		=> $userLogin->SLUG
		                );

					$this->session->set_userdata($session_data);   //UNCOMMENT THIS LATER
					redirect(base_url().'home');     // REDIRECT TO MAIN HOME PAGE OF THE MAIN SITE
					// print_r($session_data);

				} else {
					$this->session->set_flashdata('status_error', 'Your account has been deactivated. Please contact admin for furthur detail.');
					redirect(base_url());
				}               

			} else {
				$this->session->set_flashdata('login_error', 'Username or password incorrect.');
				redirect(base_url());
			}

		else:   
		    redirect('home');    
		endif;
	}


	public function home()
	{
		if($this->session->userdata('userid') != ''):

			// echo $this->session->userdata('userid'); exit;
			self::$viewData['getspecialistsaying'] = $this->site_model->getspecialistsaying();
			self::$viewData['title'] = 'Medissist | Home';
			self::$viewData['page'] = 'site/home';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
	}


	public function contact()
	{
		if($this->session->userdata('userid') != ''):

			self::$viewData['title'] = 'Medissist | Contact';
			self::$viewData['page'] = 'site/contact';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
	}


	public function forum()
	{
		if($this->session->userdata('userid') != ''):

			self::$viewData['title'] = 'Medissist | Forum';
			self::$viewData['forumques'] = $this->site_model->getForumQuestions();
			self::$viewData['page'] = 'site/forum';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
	}


	public function healthspecialist()
	{
		if($this->session->userdata('userid') != ''):

			self::$viewData['title'] = 'Medissist | Health Specialist';
			self::$viewData['getspecialist'] = $this->site_model->getspecialist();
			self::$viewData['page'] = 'site/healthspecialist';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
	}


	public function logout()
    {
    	if($this->session->userdata('userid') != ''):

	    	$unset = array('email', 'welcome', 'userid');
	        $this->session->unset_userdata($unset);
	        // $this->session->set_flashdata('logout_success', 'You have been logged out.');
	        redirect(base_url());
	        $this->session->sess_destroy();

        else:   
            redirect(base_url());    
        endif;
    }


    public function addforumquestion()
    {
    	// echo $this->session->userdata('userid');exit;
    	if($this->session->userdata('userid') != ''):

    		$userid = $this->session->userdata('userid');

			$data = array(
				"USER_ID" 	=> $userid,
				"QUESTION"	=> $this->input->post('question'),
				"CREATED"	=> date('Y-m-d H:i:s'),
			);

			$userRegister = $this->site_model->addForumQuestion($data);

			if ($userRegister) {
				$message = 'Post shared successfully';
				$this->session->set_flashdata('forum_question_success', $message);
				redirect('forum');

			} else {
				$message = 'Failed to share post';
				$this->session->set_flashdata('forum_question_fail', $message);
				redirect('forum');
			}  

		else:   
		    redirect(base_url());    
		endif;
    }


    public function addforumanswer()
    {
    	// echo $this->session->userdata('userid');exit;
    	if($this->session->userdata('userid') != ''):

    		$userid = $this->session->userdata('userid');
    		$quesid	= $this->input->post('question_id');
    		$answer = $this->input->post('answer');

			$data = array(
				"QUESTION_ID"	=> $quesid,
				"USER_ID" 		=> $userid,
				"ANSWER"		=> $answer,
				"CREATED"		=> date('Y-m-d H:i:s'),
			);

			$userRegister = $this->site_model->addForumAnswer($data);

			if ($userRegister) {
				// $message = 'Post shared successfully';
				// $this->session->set_flashdata('forum_question_success', $message);
				redirect('forum');

			} else {
				$message = 'Failed to post your answer.';
				$this->session->set_flashdata('forum_answer_fail', $message);
				redirect('forum');
			}  

		else:   
		    redirect(base_url());    
		endif;
    }


    public function deleteforumanswer()
    {
    	if($this->session->userdata('userid') != ''):

	    	$answerid = $this->input->post('answer_id');

			$forumAnsDelete = $this->site_model->forumAnsDelete($answerid);

			if ($forumAnsDelete) {
				$message = 'Your comment has been removed.';
			    $this->session->set_flashdata('answerdelete_success', $message);
			    redirect('forum');

			} else {
				$message = 'Failed to remove your comment.';
			    $this->session->set_flashdata('answerdelete_fail', $message);
			    redirect('forum');
			}

		else:   
		    redirect(base_url());    
		endif;

    }


    public function deleteforumquestion()
    {
    	if($this->session->userdata('userid') != ''):

	    	$questionid = $this->input->post('question_id');

			$checkQuestionJoin = $this->site_model->checkQuestionJoin($questionid);

			if ($checkQuestionJoin) {
				$forumQuesDeleteJoin = $this->site_model->forumQuesDeleteJoin($questionid);

				if ($forumQuesDeleteJoin) {
					$message = 'Your post has been removed.';
				    $this->session->set_flashdata('questiondelete_success', $message);
				    redirect('forum');

				} else {
					$message = 'Failed to remove your post.';
				    $this->session->set_flashdata('questiondelete_fail', $message);
				    redirect('forum');
				}

			} else {
				$forumQuestionDelete = $this->site_model->forumQuestionDelete($questionid);

				if ($forumQuestionDelete) {
					$message = 'Your post has been removed.';
				    $this->session->set_flashdata('questiondelete_success', $message);
				    redirect('forum');

				} else {
					$message = 'Failed to remove your post.';
				    $this->session->set_flashdata('questiondelete_fail', $message);
				    redirect('forum');
				}
			}
			

		else:   
		    redirect(base_url());    
		endif;
    }


    public function privatemessage()
    {
    	if($this->session->userdata('userid') != ''):
    		$specialistid = $this->uri->segment(2);
    		$senderid = $this->session->userdata('userid');

    		$table = "tbl_pvt_msg_".$senderid."_".$specialistid;

    		$checktable = "SELECT * 
                        FROM information_schema.tables
                        WHERE table_schema = 'medissist' 
                        AND table_name = '$table'
                        LIMIT 1";

	        $check = $this->db->query($checktable);

	        if ($check->num_rows() == 0) {
	            
	            $createtable = "CREATE TABLE ".$table." (
	                            ID INT(6) AUTO_INCREMENT PRIMARY KEY,
	                            NAME VARCHAR(100) NOT NULL,
	                            USER_TYPE VARCHAR(30) NOT NULL,
	                            MESSAGE TEXT NOT NULL,
	                            SEEN_STATUS INT(2) DEFAULT 0, 
	                            CREATED DATETIME NOT NULL
	                            )";

	            $this->db->query($createtable);
	        } 

			self::$viewData['title'] = 'Medissist | Private Message';
			self::$viewData['checktableexists'] = $this->site_model->checktableexists($specialistid);

			self::$viewData['getPrivateMessage'] = $this->site_model->getPrivateMessage($specialistid);
			self::$viewData['getSpecialistById'] = $this->site_model->getSpecialistById($specialistid);
			self::$viewData['page'] = 'site/privatemessage';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
    }



    public function sendprivatemsg()
    {
    	if($this->session->userdata('userid') != ''):

    		$receiverid = $this->input->post('receiverid');
	    	$senderid 	= $this->input->post('senderid');
	    	$message 	= $this->input->post('privatemsg');

	    	$insertPrivateMsg = $this->site_model->insertPrivateMsg($receiverid, $senderid, $message);

	    	if ($insertPrivateMsg) {
	    		redirect('privatemessage/'.$receiverid);
	    	} else {
	    		$message = 'Message sending failed.';
				$this->session->set_flashdata('msg_send_fail', $message);
	    		redirect('privatemessage/'.$receiverid);
	    	}

    	else:   
		    redirect(base_url());    
		endif;
    }


    public function medicines()
    {
    	if($this->session->userdata('userid') != ''):

			self::$viewData['title'] = 'Medissist | Health Care and Medicines';
			self::$viewData['gethealthproblems'] = $this->site_model->getHealthProblems();
			self::$viewData['getmedicinalproduct'] = $this->site_model->getMedicinalProduct();
			self::$viewData['page'] = 'site/medicines';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
    }


    public function searchspecialist()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$search = $this->input->post('search');
    			// echo $search;exit;
    			$data['getspecialist'] = $getspecialist = $this->site_model->getSearchSpecialist($search);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/healthspecialistcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }


    public function sortspecialist()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$specialisttype = $this->input->post('specialisttype');
    			// echo $specialisttype; exit;
    			$data['getspecialist'] = $getspecialist = $this->site_model->getSortspecialist($specialisttype);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/healthspecialistcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }


    public function healthproblemdata()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$id 	= $this->input->post('id');
    			$title 	= $this->input->post('title');
    			// echo $specialisttype; exit;

    			$data['title'] 				= $title;
    			$data['gethealthproblem'] 	= $gethealthproblem = $this->site_model->getHealthProblemById($id);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/healthproblemcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }


    public function medicinalproductdata()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$id 	= $this->input->post('id');
    			$title 	= $this->input->post('title');
    			// echo $specialisttype; exit;

    			$data['title'] 					= $title;
    			$data['getmedicinalproduct'] 	= $getMedicinalProductById = $this->site_model->getMedicinalProductById($id);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/medicinalproductcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }


    public function specialistprofile()
    {
    	if($this->session->userdata('userid') != ''):

    		$id = $this->uri->segment(3);
    		// echo $id;exit;

			self::$viewData['title'] = 'Medissist | Health Specialist Profile';
			self::$viewData['specialist'] = $this->site_model->getSpecialistById($id);
		
			self::$viewData['page'] = 'site/specialistprofile';
			$this->load->view(TEMPPATH, self::$viewData);

		else:   
            redirect(base_url());    
        endif;
    }


 


    public function profile()
	{
		// echo "here";exit;
		if($this->session->userdata('userid') != ''):

			if (isset($_POST['editprofile-btn'])) {

				$id = $this->session->userdata('userid');

				$firstname 	= $this->input->post('firstname');
				$lastname 	= $this->input->post('lastname');
				$email 		= $this->input->post('email');
				$gender 	= $this->input->post('gender');
				$bloodgroup = $this->input->post('bloodgroup');
				$contact 	= $this->input->post('contact');
				
				// echo $specialisttype;exit;

				$data = array(
					'FIRSTNAME'		=>	$firstname,
					'LASTNAME'		=>	$lastname,
					"SLUG"			=>  strtolower($firstname).'-'.strtolower($lastname),
					'EMAIL'			=>	$email,
					'GENDER'		=>	$gender,
					'BLOOD_GROUP'	=>	$bloodgroup,
					'CONTACTNO'		=>	$contact,
					'UPDATED_ON'	=>  date('Y-m-d H:i:s'),
				);

				$updateprofile = $this->site_model->updateprofile($data, $id);

				if ($updateprofile) {
					$message = 'Profile has been updated.';
					$this->session->set_flashdata('editprofile_success', $message);
					redirect('site/profile');

				} else {
					$message = 'Failed to update Profile.';
					$this->session->set_flashdata('editprofile_fail', $message);
					redirect('site/profile');    		
				}

			} else {

				self::$viewData['title'] = 'Medissist | Profile';
				self::$viewData['userdetail'] = $this->site_model->getUserDetail();
			
				self::$viewData['page'] = 'site/profile';
				$this->load->view(TEMPPATH, self::$viewData);

			}

		else:   
            redirect(base_url());    
        endif;
	}


	public function changepassword()
	{
		if($this->session->userdata('userid') != ''):

			$oldpassword = $this->input->post('oldpassword');
			$checkOldPassword = $this->site_model->checkOldPassword($oldpassword);

			if ($checkOldPassword == true ) {

				$newpassword = $this->input->post('newpassword');
				$data = array(
					'PASSWORD' 		=> sha1($newpassword),
					'UPDATED_ON'	=> date('Y-m-d H:i:s'),
				);

				$updatePassword = $this->site_model->updatePassword($data);

				if ($updatePassword) {
					$message = 'Password updated successfully.';
					$this->session->set_flashdata('passUpdate_success', $message);
					redirect('site/profile');  

				} else {
					$message = 'Password update failed.';
					$this->session->set_flashdata('passUpdate_fail', $message);
					redirect('site/profile');  
				}

			} else {
				$message = 'Old password did not match.';
				$this->session->set_flashdata('passUpdate_fail', $message);
				redirect('site/profile');  
			} 

		else:   
            redirect(base_url());    
        endif;
	}


	public function send($to, $from, $subject, $message, $attachment=null)
	{
			$config = Array(
				        'protocol' 	=> 'smtp',
				        'smtp_host' => 'ssl://smtp.gmail.com',
				        'smtp_port' =>	465,
				        'smtp_user' => 'info.medissist@gmail.com',
				        'smtp_pass' => 'Jordan@23',
				        'mailtype'  => 'html', 
				        'charset'   => 'iso-8859-1'
				    );
		   
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");

			// $msg = $message."<br><br><br>

			//     Name: ".$name."<br>"."Id: ".$from;
			
			

			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);
			if ($attachment) {
				$this->email->attach($attachment);
			}
		 	$this->email->send();
	}


	public function sendfeedback()
	{
		if($this->session->userdata('userid') != ''):

			$getUserDetail = $this->site_model->getUserDetail();

			$sub 		= $this->input->post('subject');
			$subject 	= 'User Feedback: '.ucfirst($sub);
			$message 	= $this->input->post('message');
			$to 		= 'info.medissist@gmail.com';
			$from 		= $getUserDetail->EMAIL;
			$name       = $getUserDetail->FIRSTNAME.' '.$getUserDetail->LASTNAME;
	
			$msg = $message."<br><br><br>

		    Name: ".$name."<br>"."Email: ".$from;

		    $sendmail = $this->send($to, $from, $subject, $msg, null);

			$message = 'Thank you for your feedback!';
	        $this->session->set_flashdata('feedback_success', $message);
	        redirect('site/contact');

		else:   
            redirect(base_url());    
        endif;
	}


	public function forgotpassword()
	{
		if($this->session->userdata('userid') == ''):

			$email = $this->input->post('email');
			$checkemail = $this->site_model->checkemail($email);

			if ($checkemail) {
				
				#for generating random string of 10 characters
    	 		$init = 0; #to define position from $string
    	 		$length = 6; #to define the length of string to be generated
    	 		$timestamp = strtotime('Y-m-d H:i:s');
    	 		$string = "abcdefghijklmnopqrstuvwxyz0123456789".md5($timestamp);  
				$randomletter = substr(str_shuffle(md5($string)), $init, $length);
	    	 	$newpassgen = strtoupper($randomletter); #all alphabets are generated in upper case 

	    	 	$updateforgotpassword = $this->site_model->updateforgotpassword($email, $newpassgen);

	    	 	if ($updateforgotpassword) {
	    	 		
	    	 		$name 		= $checkemail->FIRSTNAME;
	    	 		$subject 	= "Medissist: Account Password Recovery"; 
	    	 		$to 		= $checkemail->EMAIL;
	    	 		$from 		= 'info.medissist@gmail.com';

	    	 		$msg = "Dear ".ucwords($name).",<br><br>

						Your password has been successfully reset. Your new password is <b>".$newpassgen."</b>. Please reset your password after you log in.<br><br>

						Thank you, <br>
						Medissist Team.<br><br><br><br>

					   <b><i>This is an auto generated mail, please do not reply to this mail.</i></b>";


	    	 		$sendmail = $this->send($to, $from, $subject, $msg, null);

					$message = 'A password recovery mail has been sent to you. Please check your mail.';
			        $this->session->set_flashdata('forgotpassword_success', $message);
			        redirect('site/index');


	    	 	} else {
	    	 		$message = 'Sorry! Something went wrong. Please try again.';
			        $this->session->set_flashdata('forgotpassword_fail', $message);
			        redirect('site/index');
	    	 	}

			} else {
				$message = 'Sorry! Email does not exist.';
		        $this->session->set_flashdata('forgotpassword_fail', $message);
		        redirect('site/index');
			}

		else:   
            redirect('home');     
        endif;
	}



}
