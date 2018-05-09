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

			self::$viewData['title'] = 'Medissist | Conact';
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
				"ANSWER"		=> $answer
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
	                            CREATED TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
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

			self::$viewData['title'] = 'Medissist | Medicines';
			// self::$viewData['getspecialist'] = $this->site_model->getspecialist();
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
}
