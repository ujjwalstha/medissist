<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
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

		$this->load->model('admin_model'); 
		$this->load->model('site/site_model'); 

		self::$viewData['admin_details'] = $this->admin_model->getAdminDetails();
		self::$viewData['getusers'] = $this->admin_model->getusers();
		self::$viewData['getspecialisttype'] = $this->admin_model->getSpecialistType();

		// print_r(self::$viewData['admin_details']);

	}

	
	public function index()
	{
		$this->load->view('admin/welcome');
	}

	public function login()
	{
		if($this->session->userdata('adminid') == ''):

			if (isset($_POST['loginbtn'])) {

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$admintype = $this->input->post('admintype');

		        // echo $admintype;exit;
				if ($admintype == 0) {
					$message = 'Please select the admin type.';
					$this->session->set_flashdata('login_fail', $message);
					redirect('admin/login');

				} else {

					$checkDashboardLogin = $this->admin_model->checkDashboardLogin($username, $password, $admintype);

					if ($checkDashboardLogin) {

						$status = $checkDashboardLogin->STATUS;

						if ($status == 1) {

							$session_data = array(
				                'adminname' => $username, //setting name in session
				                'adminid' 	=> $checkDashboardLogin->ID,
				                'admintype'	=> $admintype
				            );

							$this->session->set_userdata($session_data);
							redirect('admin/adminpanel');
				            // print_r($session_data)."<br>";
				            // echo "loged in";

						} else {
							$message = 'Your account has been deactivated. Please contact admin for furthur detail.';
							$this->session->set_flashdata('loginspecialist_fail', $message);
							redirect('admin/login');

						}

					} else {
						$this->session->set_flashdata('login_fail', 'Username or password incorrect.');
						redirect('admin/login');
				            // echo "u and p wrong";
					}
				}

			} else {
				$this->load->view('admin/dashboardlogin');
			}

		else:   
			redirect('admin/adminpanel');    
		endif;
	}


	
	public function adminpanel()
	{
		if($this->session->userdata('adminid') != ''):
			// echo $this->session->userdata('adminid');exit;
			self::$viewData['full_title'] = "Admin | Dashboard";
			self::$viewData['breadcrumb'] = "Dashboard"; 
			self::$viewData['breadcrumb_small'] = "Admin Panel"; 

			self::$viewData['userCount'] = $this->admin_model->userCount();
			self::$viewData['specialistCount'] = $this->admin_model->specialistCount();
			self::$viewData['forumQuestionCount'] = $this->admin_model->forumQuestionCount();
			self::$viewData['forumAnswerCount'] = $this->admin_model->forumAnswerCount();
			self::$viewData['specialistTypeCount'] = $this->admin_model->specialistTypeCount();
			self::$viewData['healthProblemCount'] = $this->admin_model->healthProblemCount(); 
			self::$viewData['medicinalProductCount'] = $this->admin_model->medicinalProductCount();  
			self::$viewData['getrecentspecialist'] = $this->admin_model->getrecentspecialist();
			self::$viewData['getRecentHealthProblems'] = $this->admin_model->getRecentHealthProblems();
			self::$viewData['getRecentMedicinalProduct'] = $this->admin_model->getRecentMedicinalProduct();

			self::$viewData['page'] = "admin/adminpanel";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function settings()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Settings";
			self::$viewData['breadcrumb'] = "Settings"; 
			self::$viewData['page'] = "admin/settings";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function changepassword()
	{
		if($this->session->userdata('adminid') != ''):

			$oldpassword = $this->input->post('oldpassword');
			$checkOldPassword = $this->admin_model->checkOldPassword($oldpassword);

			if ($checkOldPassword == true ) {

				$newpassword = $this->input->post('newpassword');
				$data = array(
					'PASSWORD' 		=> sha1($newpassword),
					'UPDATED_DATE'	=> date('Y-m-d H:i:s'),
				);

				$updatePassword = $this->admin_model->updatePassword($data);

				if ($updatePassword) {
					$message = 'Password updated successfully.';
					$this->session->set_flashdata('passUpdate_success', $message);
					redirect('admin/settings');

				} else {
					$message = 'Password update failed.';
					$this->session->set_flashdata('passUpdate_fail', $message);
					redirect('admin/settings');
				}

			} else {
				$message = 'Old password did not match.';
				$this->session->set_flashdata('passMatch_fail', $message);
				redirect('admin/settings');
			} 

		else:   
			redirect('admin/login');    
		endif;
	}


	public function logout()
	{
		if($this->session->userdata('adminid') != ''):

			$unset = array('adminname', 'adminid');
			$this->session->unset_userdata($unset);
			$this->session->set_flashdata('logout_success', 'You have been logged out.');
			redirect('admin/login');
			$this->session->sess_destroy();

		else:   
			redirect('admin/login');    
		endif;
	}


	public function managespecialist()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Manage Specialist";
			self::$viewData['breadcrumb'] = "Manage Specialist"; 

			self::$viewData['getspecialist'] = $this->admin_model->getspecialist();
			self::$viewData['page'] = "admin/managespecialist";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function addspecialist()
	{
		if($this->session->userdata('adminid') != ''):

			$config['upload_path']		= './uploads/images/specialists/';
			$config['allowed_types']    = 'jpg|jpeg|png|gif|';  /**  All file type selected **/
			$config['min_size']         = 50;
			$config['max_size']         = 10000;
			$config['min_width']        = 50;
			$config['max_width']        = 100000;
			$config['min_height']       = 50;
			$config['max_height']       = 100000;

			$this->upload->initialize($config);

	            # "image" is the field name

			if ($this->upload->do_upload('image')) {  

				$upload_data 		=	$this->upload->data();
				$imagename 			=	$upload_data['file_name'];

				$name 				=	$this->input->post('name');
				$slug 				=	$this->input->post('slug');
				$email 				= 	$this->input->post('email');
				$password 			= 	$this->input->post('password');
				$specialisttype 	=	$this->input->post('specialisttype');
				$qualification 		= 	$this->input->post('qualification');
				$pastaffiliation 	= 	$this->input->post('pastaffiliation');
				$membership 		= 	$this->input->post('membership');


				$data = array(
					'NAME'					=>	$name,
					'SLUG'					=>	$slug,
					'USERNAME'				=>	$email,
					'PASSWORD'				=>	sha1($password),
					'ADMIN_TYPE'			=>	2,
					'SPECIALIST_TYPE'		=>	$specialisttype,
					'QUALIFICATION'			=>	$qualification,
					'PAST_AFFILIATION'		=>	$pastaffiliation,
					'OVERALL_MEMBERSHIP'	=>	$membership,
					'IMAGE'					=>	$imagename,
				);

				$addspecialist = $this->admin_model->addspecialist($data);

				if ($addspecialist) {
					$message = 'Specialist added successfully.';
					$this->session->set_flashdata('addspecialist_success', $message);
					redirect('admin/managespecialist');

				} else {
					$message = 'Failed to add specialist.';
					$this->session->set_flashdata('addspecialist_fail', $message);
					redirect('admin/managespecialist');
				}

			} else {

				$error = array('error' => $this->upload->display_errors());
				print_r($error);

			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function editspecialist()
	{
		// echo "here";exit;
		if($this->session->userdata('adminid') != ''):

			if (isset($_POST['editspecialist-btn'])) {

				$id = $this->input->post('id');

				$name 				= $this->input->post('name');
				$slug 				= $this->input->post('slug');
				$email 				= $this->input->post('email');
				$specialisttype 	= $this->input->post('specialisttype');
				$qualification 		= $this->input->post('qualification');
				$pastaffiliation 	= $this->input->post('pastaffiliation');
				$membership 		= $this->input->post('membership');
				// echo $specialisttype;exit;

				$data = array(
					'NAME'					=>	$name,
					'SLUG'					=>	$slug,
					'USERNAME'				=>	$email,
					'SPECIALIST_TYPE'		=>	$specialisttype,
					'QUALIFICATION'			=>	$qualification,
					'PAST_AFFILIATION'		=>	$pastaffiliation,
					'OVERALL_MEMBERSHIP'	=>	$membership,
					'UPDATED_DATE'			=> date('Y-m-d H:i:s'),
				);

				$updateSpecialist = $this->admin_model->updateSpecialist($data, $id);

				if ($updateSpecialist) {
					$message = 'Specialist detail has been updated.';
					$this->session->set_flashdata('editspecialist_success', $message);
					redirect('admin/editspecialist/'.$id);

				} else {
					$message = 'Failed to update specialist detail.';
					$this->session->set_flashdata('editspecialist_fail', $message);
					redirect('admin/editspecialist/'.$id);    		
				}

			} else {

				$typeid = $this->uri->segment(3);

				self::$viewData['full_title'] = "Admin | Manage Specialist";
				self::$viewData['breadcrumb'] = "Manage Specialist"; 

				self::$viewData['specialistbyid'] = $this->admin_model->getSpecialistById($typeid);
				self::$viewData['page'] = "admin/editspecialist";
				$this->load->view(TEMPADMIN, self::$viewData);

			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function changespecialistimage()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');

			$config['upload_path']		= './uploads/images/specialists/';
			$config['allowed_types']    = 'jpg|jpeg|png|gif|';  /**  All file type selected **/
			$config['min_size']         = 50;
			$config['max_size']         = 10000;
			$config['min_width']        = 50;
			$config['max_width']        = 100000;
			$config['min_height']       = 50;
			$config['max_height']       = 100000;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {  

				$upload_data 	=	$this->upload->data();
				$imagename 		=	$upload_data['file_name'];

				$data = array(
					'IMAGE'	=>	$imagename,
					'UPDATED_DATE'	=> date('Y-m-d H:i:s'),
				);

				$updateProfileImg = $this->admin_model->updateProfileImg($id, $data);

				if ($updateProfileImg) {
					$message = 'Specialist image has been updated.';
					$this->session->set_flashdata('imageupdate_success', $message);
					redirect('admin/editspecialist/'.$id);

				} else {
					$message = 'Failed to update specialist image.';
					$this->session->set_flashdata('imageupdate_fail', $message);
					redirect('admin/editspecialist/'.$id);
				}  	

			} else {

				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}

		else:   
			redirect('admin/login');    
		endif;  
	}


	public function changespecialistpassword()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');
			$oldpassword = $this->input->post('oldpassword');
			$checkSpecialistOldPassword = $this->admin_model->checkSpecialistOldPassword($oldpassword, $id);

			if ($checkSpecialistOldPassword == true ) {

				$newpassword = $this->input->post('newpassword');
				$data = array(
					'PASSWORD' 		=> sha1($newpassword),
					'UPDATED_DATE'	=> date('Y-m-d H:i:s'),
				);

				$updateSpecialistPassword = $this->admin_model->updateSpecialistPassword($data, $id);

				if ($updateSpecialistPassword) {
					$message = 'Password updated successfully.';
					$this->session->set_flashdata('passUpdate_success', $message);
					redirect('admin/editspecialist/'.$id);

				} else {
					$message = 'Password update failed.';
					$this->session->set_flashdata('passUpdate_fail', $message);
					redirect('admin/editspecialist/'.$id);
				}

			} else {
				$message = 'Old password did not match.';
				$this->session->set_flashdata('passMatch_fail', $message);
				redirect('admin/editspecialist/'.$id);
			} 

		else:   
			redirect('admin/login');    
		endif;
	}


	public function specialiststatus()
	{
		if($this->session->userdata('adminid') != '') {

			$id = $this->input->post('userid');

	        $activate = $this->input->post('activate'); //to activate user
	        if (isset($activate)) {
	        	$this->admin_model->specialistActivate($id);
	        	$message = 'Specialist has been activated.';
	        	$this->session->set_flashdata('useractivate_success', $message);
	        	redirect('admin/managespecialist');
	        }

	        $deactivate = $this->input->post('deactivate'); //to deactivate user
	        if (isset($deactivate)) {
	        	$this->admin_model->specialistDeactivate($id);
	        	$message = 'Specialist has been deactivated.';
	        	$this->session->set_flashdata('userdeactivate_success', $message);
	        	redirect('admin/managespecialist');
	        }

	    } else {
	    	redirect('admin/login');    
	    }
	}


	public function onlinestatus()
	{
		if($this->session->userdata('adminid') != '') {

			$id = $this->input->post('adminid');
			$uri = $this->input->post('uri');

			if ($uri == 'privatemessage') {
				$uri_id = $this->input->post('uri_id');
			}

	        $online = $this->input->post('online'); //to activate user
	        if (isset($online)) {
	        	$this->admin_model->goOnline($id);
	        	// $message = 'Specialist has been activated.';
	        	// $this->session->set_flashdata('useractivate_success', $message);
	        	if ($uri == 'privatemessage') {
	        		redirect('admin/'.$uri.'/'.$uri_id);
	        	} else {
	        		redirect('admin/'.$uri);
	        	}
	        }

	        $offline = $this->input->post('offline'); //to deactivate user
	        if (isset($offline)) {
	        	$this->admin_model->goOffline($id);
	        	// $message = 'Specialist has been deactivated.';
	        	// $this->session->set_flashdata('userdeactivate_success', $message);
	        	if ($uri == 'privatemessage') {
	        		redirect('admin/'.$uri.'/'.$uri_id);
	        	} else {
	        		redirect('admin/'.$uri);
	        	}
	        }

	    } else {
	    	redirect('admin/login');    
	    }
	}


	public function managespecialisttype()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Manage Specialist Type";
			self::$viewData['breadcrumb'] = "Manage Specialist Type"; 

			self::$viewData['getspecialisttype'] = $this->admin_model->getSpecialistType();
			self::$viewData['page'] = "admin/managespecialisttype";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function addspecialisttype()
	{
		if($this->session->userdata('adminid') != ''):

			$specialisttype = $this->input->post('specialisttype');

			$data = array(
				'SPECIALIST_TYPE' => $specialisttype
			);

			$insertSpecialistType = $this->admin_model->insertSpecialistType($data);

			if ($insertSpecialistType) {
				$message = 'A specialist type has been added.';
				$this->session->set_flashdata('addspecialisttype_success', $message);
				redirect('admin/managespecialisttype');

			} else {
				$message = 'Failed to add specialist type.';
				$this->session->set_flashdata('addspecialisttype_fail', $message);
				redirect('admin/managespecialisttype');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function editspecialisttype()
	{
		// echo "here";exit;
		if($this->session->userdata('adminid') != ''):

			if (isset($_POST['editspecialisttype-btn'])) {

				$typeid = $this->input->post('typeid');

				$specialisttype = $this->input->post('specialisttype');
				// echo $specialisttype;exit;

				$data = array(
					'SPECIALIST_TYPE'	=>	$specialisttype
				);

				$updateSpecialistType = $this->admin_model->updateSpecialistType($data, $typeid);

				if ($updateSpecialistType) {
					$message = 'A specialist type has been updated.';
					$this->session->set_flashdata('typeupdate_success', $message);
					redirect('admin/editspecialisttype/'.$typeid);

				} else {
					$message = 'Failed to update specialist type.';
					$this->session->set_flashdata('typeupdate_fail', $message);
					redirect('admin/editspecialisttype/'.$typeid);    		
				}

			} else {

				$typeid = $this->uri->segment(3);

				self::$viewData['full_title'] = "Admin | Manage Specialist Type";
				self::$viewData['breadcrumb'] = "Manage Specialist Type"; 

				self::$viewData['specialisttype'] = $this->admin_model->getSpecialistTypeById($typeid);
				self::$viewData['page'] = "admin/editspecialisttype";
				$this->load->view(TEMPADMIN, self::$viewData);

			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function deletespecialisttype()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('typeid');
			$specialistTypeDel = $this->admin_model->specialistTypeDel($id);

			if ($specialistTypeDel) {
				$message = 'An event type has been removed.';
				$this->session->set_flashdata('typedelete_success', $message);
				redirect('admin/managespecialisttype');

			} else {
				$message = 'Failed to remove event type.';
				$this->session->set_flashdata('typedelete_fail', $message);
				redirect('admin/managespecialisttype');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function deletespecialist()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('userid');
			$specialistDelete = $this->admin_model->specialistDelete($id);

			if ($specialistDelete) {
				$message = 'A specialist has been removed.';
				$this->session->set_flashdata('specialistdelete_success', $message);
				redirect('admin/managespecialist');

			} else {
				$message = 'Failed to remove specialist.';
				$this->session->set_flashdata('specialistdelete_fail', $message);
				redirect('admin/managespecialist');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function manageuser()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Manage User";
			self::$viewData['breadcrumb'] = "Manage User"; 

			self::$viewData['getusers'] = $this->admin_model->getusers();
			self::$viewData['page'] = "admin/manageusers";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function userstatus()
	{ 
		if($this->session->userdata('adminid') != '') {

			$id = $this->input->post('userid');

	        $activate = $this->input->post('activate'); //to activate user
	        if (isset($activate)) {
	        	$this->admin_model->userActivate($id);
	        	$message = 'User has been activated.';
	        	$this->session->set_flashdata('useractivate_success', $message);
	        	redirect('admin/manageuser');
	        }

	        $deactivate = $this->input->post('deactivate'); //to deactivate user
	        if (isset($deactivate)) {
	        	$this->admin_model->userDeactivate($id);
	        	$message = 'User has been deactivated.';
	        	$this->session->set_flashdata('userdeactivate_success', $message);
	        	redirect('admin/manageuser');
	        }

	    } else {
	    	redirect('admin/login');    
	    }
	}


	public function deleteuser()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('userid');
			$userDelete = $this->admin_model->userDelete($id);

			if ($userDelete) {
				$message = 'A user has been removed.';
				$this->session->set_flashdata('userdelete_success', $message);
				redirect('admin/manageuser');

			} else {
				$message = 'Failed to remove user.';
				$this->session->set_flashdata('userdelete_fail', $message);
				redirect('admin/manageuser');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function changeprofileimage()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');

			$config['upload_path']		= './uploads/images/specialists/';
			$config['allowed_types']    = 'jpg|jpeg|png|gif|';  /**  All file type selected **/
			$config['min_size']         = 50;
			$config['max_size']         = 10000;
			$config['min_width']        = 50;
			$config['max_width']        = 100000;
			$config['min_height']       = 50;
			$config['max_height']       = 100000;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {  

				$upload_data 	=	$this->upload->data();
				$imagename 		=	$upload_data['file_name'];

				$data = array(
					'IMAGE'	=>	$imagename,
				);

				$updateProfileImg = $this->admin_model->updateProfileImg($id, $data);

				if ($updateProfileImg) {
					$message = 'An event image has been updated.';
					$this->session->set_flashdata('imageupdate_success', $message);
					redirect('admin/settings');

				} else {
					$message = 'Failed to update event image.';
					$this->session->set_flashdata('imageupdate_fail', $message);
					redirect('admin/settings');
				}  	

			} else {

				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}

		else:   
			redirect('admin/login');    
		endif;  
	}



	public function editProfile()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');

			$data = array(
				'NAME' 					=>	$this->input->post('name'),
				'SLUG' 					=>	$this->input->post('slug'),
				'USERNAME' 				=>	$this->input->post('username'),
				'SPECIALIST_TYPE'		=>	$this->input->post('specialisttype'),
				'QUALIFICATION'			=>	$this->input->post('qualification'),
				'PAST_AFFILIATION'		=>	$this->input->post('pastaffiliation'),
				'OVERALL_MEMBERSHIP'	=>	$this->input->post('membership'),
				'PATIENT_MSG'			=>  $this->input->post('patientmsg'),
				'UPDATED_DATE'			=>  date('Y-m-d H:i:s'),

			);

			$updateProfile = $this->admin_model->updateProfile($id, $data);

			if ($updateProfile) {
				$message = 'Profile has been updated.';
				$this->session->set_flashdata('profileupdate_success', $message);
				redirect('admin/settings');

			} else {
				$message = 'Failed to update profile.';
				$this->session->set_flashdata('profileupdate_fail', $message);
				redirect('admin/settings');
			} 

		else:   
			redirect('admin/login');    
		endif; 	
	}



	public function managequestions()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Manage Questions";
			self::$viewData['breadcrumb'] = "Manage Questions"; 

			self::$viewData['getForumQuestions'] = $this->admin_model->getForumQuestions();
			self::$viewData['page'] = "admin/manageforumquestions";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function manageanswers()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Manage Answers";
			self::$viewData['breadcrumb'] = "Manage Answers"; 

			self::$viewData['getForumAnswers'] = $this->admin_model->getForumAnswers();
			self::$viewData['page'] = "admin/manageforumanswers";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}

	public function deleteforumanswer()
	{
		if($this->session->userdata('adminid') != ''):

			$answerid = $this->input->post('answerid');
			$forumAnsDelete = $this->admin_model->forumAnsDelete($answerid);

			if ($forumAnsDelete) {
				$message = 'An answer has been removed.';
				$this->session->set_flashdata('answerdelete_success', $message);
				redirect('admin/manageanswers');

			} else {
				$message = 'Failed to remove answer.';
				$this->session->set_flashdata('answerdelete_fail', $message);
				redirect('admin/manageanswers');
			}

		else:   
			redirect('admin/login');    
		endif;
	}



	public function deleteforumquestion()
	{
		if($this->session->userdata('adminid') != ''):

			$questionid = $this->input->post('questionid');

			$checkQuestionJoin = $this->admin_model->checkQuestionJoin($questionid);

			if ($checkQuestionJoin) {
				$forumQuesDeleteJoin = $this->admin_model->forumQuesDeleteJoin($questionid);

				if ($forumQuesDeleteJoin) {
					$message = 'Your post has been removed.';
					$this->session->set_flashdata('questiondelete_success', $message);
					redirect('admin/managequestions');

				} else {
					$message = 'Failed to remove your post.';
					$this->session->set_flashdata('questiondelete_fail', $message);
					redirect('admin/managequestions');
				}

			} else {
				$forumQuestionDelete = $this->admin_model->forumQuestionDelete($questionid);

				if ($forumQuestionDelete) {
					$message = 'Your post has been removed.';
					$this->session->set_flashdata('questiondelete_success', $message);
					redirect('admin/managequestions');

				} else {
					$message = 'Failed to remove your post.';
					$this->session->set_flashdata('questiondelete_fail', $message);
					redirect('admin/managequestions');
				}
			}
			

		else:   
			redirect('admin/login');    
		endif;
	}


	public function privatemessage()
	{
		if($this->session->userdata('adminid') != ''):

			$userid = $this->uri->segment(3);
			$specialistid = $this->session->userdata('adminid');

			$table = "tbl_pvt_msg_".$userid."_".$specialistid;

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

		self::$viewData['full_title'] = "Admin | Private Message";
		self::$viewData['breadcrumb'] = "Private Message"; 

			// self::$viewData['getForumAnswers'] = $this->admin_model->getForumAnswers();
		self::$viewData['getPrivateMessage'] = $this->admin_model->getPrivateMessage($userid);

		if (self::$viewData['getPrivateMessage']) {
			self::$viewData['updateSeenStatus'] = $this->admin_model->updateSeenStatus($table, $userid);
		}

		self::$viewData['getUserById'] = $this->admin_model->getUserById($userid);
		self::$viewData['page'] = "admin/privatemessage";
		$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function sendprivatemsg()
	{
		if($this->session->userdata('adminid') != ''):

			$receiverid = $this->input->post('receiverid');
			$senderid 	= $this->input->post('senderid');
			$message 	= $this->input->post('privatemsg');

			$insertPrivateMsg = $this->admin_model->insertPrivateMsg($receiverid, $senderid, $message);

			if ($insertPrivateMsg) {
				redirect('admin/privatemessage/'.$receiverid);
			} else {
				$message = 'Message sending failed.';
				$this->session->set_flashdata('msg_send_fail', $message);
				redirect('admin/privatemessage/'.$receiverid);
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function healthproblems()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Health Problems";
			self::$viewData['breadcrumb'] = "Health Problems"; 

			self::$viewData['getHealthProblems'] = $this->admin_model->getHealthProblems();
			self::$viewData['page'] = "admin/healthproblems";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function addhealthproblems()
	{
		if($this->session->userdata('adminid') != ''):

			$name 			= $this->input->post('name');
			$slug 			= $this->input->post('slug');
			$description 	= $this->input->post('description');

			$data = array(
				'NAME'			=> $name,
				'SLUG'		  	=> $slug,
				'DESCRIPTION'	=> $description
			);

			$insertHealthProblems = $this->admin_model->insertHealthProblems($data);

			if ($insertHealthProblems) {
				$message = 'A health problem has been added.';
				$this->session->set_flashdata('addhealthproblem_success', $message);
				redirect('admin/healthproblems');

			} else {
				$message = 'Failed to add health problem.';
				$this->session->set_flashdata('addhealthproblem_fail', $message);
				redirect('admin/healthproblems');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function healthproblemstatus()
	{
		if($this->session->userdata('adminid') != '') {

			$id = $this->input->post('userid');

	        $activate = $this->input->post('activate'); //to activate user
	        if (isset($activate)) {
	        	$this->admin_model->healthproblemActivate($id);
	        	$message = 'Health problem status has been activated.';
	        	$this->session->set_flashdata('healthproblem_activate_success', $message);
	        	redirect('admin/healthproblems');
	        }

	        $deactivate = $this->input->post('deactivate'); //to deactivate user
	        if (isset($deactivate)) {
	        	$this->admin_model->healthproblemDeactivate($id);
	        	$message = 'Health problem status has been deactivated.';
	        	$this->session->set_flashdata('healthproblem_deactivate_success', $message);
	        	redirect('admin/healthproblems');
	        }

	    } else {
	    	redirect('admin/login');    
	    }
	}


	public function deletehealthproblem()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');
			$healthProblemDel = $this->admin_model->healthProblemDel($id);

			if ($healthProblemDel) {
				$message = 'A health problem has been deleted.';
				$this->session->set_flashdata('healthproblem_delete_success', $message);
				redirect('admin/healthproblems');

			} else {
				$message = 'Failed to delete health problem.';
				$this->session->set_flashdata('healthproblem_delete_fail', $message);
				redirect('admin/healthproblems');
			}

		else:   
			redirect('admin/login');    
		endif;
	}



	public function edithealthproblem()
	{
		// echo "here";exit;
		if($this->session->userdata('adminid') != ''):

			if (isset($_POST['edithealthproblem-btn'])) {

				$id = $this->input->post('id');
				// echo $id;exit;

				$name 			= $this->input->post('name');
				$slug 			= $this->input->post('slug');
				$description 	= $this->input->post('description');

				$data = array(
					'NAME'			=> $name,
					'SLUG'		  	=> $slug,
					'DESCRIPTION'	=> $description,
					'UPDATED_ON'	=> date('Y-m-d H:i:s')
				);

				$updateHealthProblem = $this->admin_model->updateHealthProblem($data, $id);

				if ($updateHealthProblem) {
					$message = 'A health problem has been updated.';
					$this->session->set_flashdata('healthproblem_update_success', $message);
					redirect('admin/edithealthproblem/'.$id);

				} else {
					$message = 'Failed to update health problem.';
					$this->session->set_flashdata('healthproblem_update_fail', $message);
					redirect('admin/edithealthproblem/'.$id);    		
				}

			} else {

				$id = $this->uri->segment(3);

				self::$viewData['full_title'] = "Admin | Update Health Problem";
				self::$viewData['breadcrumb'] = "Update Health Problem"; 

				self::$viewData['gethealthproblem'] = $this->admin_model->getHealthProblemById($id);
				self::$viewData['page'] = "admin/edithealthproblem";
				$this->load->view(TEMPADMIN, self::$viewData);

			}

		else:   
			redirect('admin/login');    
		endif;
	}



	public function medicinalproduct()
	{
		if($this->session->userdata('adminid') != ''):

			self::$viewData['full_title'] = "Admin | Medicinal Product";
			self::$viewData['breadcrumb'] = "Medicinal Product"; 

			self::$viewData['getmedicinalproduct'] = $this->admin_model->getMedicinalProduct();
			self::$viewData['page'] = "admin/medicinalproduct";
			$this->load->view(TEMPADMIN, self::$viewData);

		else:   
			redirect('admin/login');    
		endif;
	}


	public function addmedicinalproduct()
	{
		if($this->session->userdata('adminid') != ''):

			$name 			= $this->input->post('name');
			$slug 			= $this->input->post('slug');
			$description 	= $this->input->post('description');

			$data = array(
				'NAME'			=> $name,
				'SLUG'		  	=> $slug,
				'DESCRIPTION'	=> $description
			);

			$insertMedicinalProduct = $this->admin_model->insertMedicinalProduct($data);

			if ($insertMedicinalProduct) {
				$message = 'A medicinal product has been added.';
				$this->session->set_flashdata('medicinalproduct_success', $message);
				redirect('admin/medicinalproduct');

			} else {
				$message = 'Failed to add medicinal product.';
				$this->session->set_flashdata('medicinalproduct_fail', $message);
				redirect('admin/medicinalproduct');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function medicinalproductstatus()
	{
		if($this->session->userdata('adminid') != '') {

			$id = $this->input->post('id');

	        $activate = $this->input->post('activate'); //to activate user
	        if (isset($activate)) {
	        	$this->admin_model->medicinalproductActivate($id);
	        	$message = 'A medicinal product status has been activated.';
	        	$this->session->set_flashdata('medicinalproduct_success', $message);
	        	redirect('admin/medicinalproduct');
	        }

	        $deactivate = $this->input->post('deactivate'); //to deactivate user
	        if (isset($deactivate)) {
	        	$this->admin_model->medicinalproductDeactivate($id);
	        	$message = 'A medicinal product status has been deactivated.';
	        	$this->session->set_flashdata('medicinalproduct_fail', $message);
	        	redirect('admin/medicinalproduct');
	        }

	    } else {
	    	redirect('admin/login');    
	    }
	}


	public function deletemedicinalproduct()
	{
		if($this->session->userdata('adminid') != ''):

			$id = $this->input->post('id');
			$medicinalproductDel = $this->admin_model->medicinalproductDel($id);

			if ($medicinalproductDel) {
				$message = 'A medicinal product has been deleted.';
				$this->session->set_flashdata('medicinalproduct_success', $message);
				redirect('admin/medicinalproduct');

			} else {
				$message = 'Failed to delete medicinal product.';
				$this->session->set_flashdata('medicinalproduct_fail', $message);
				redirect('admin/medicinalproduct');
			}

		else:   
			redirect('admin/login');    
		endif;
	}


	public function editmedicinalproduct()
	{
		// echo "here";exit;
		if($this->session->userdata('adminid') != ''):

			if (isset($_POST['editmedicinalproduct-btn'])) {

				$id = $this->input->post('id');
				// echo $id;exit;

				$name 			= $this->input->post('name');
				$slug 			= $this->input->post('slug');
				$description 	= $this->input->post('description');

				$data = array(
					'NAME'			=> $name,
					'SLUG'		  	=> $slug,
					'DESCRIPTION'	=> $description,
					'UPDATED_ON'	=> date('Y-m-d H:i:s')
				);

				$updateMedicinalProduct = $this->admin_model->updateMedicinalProduct($data, $id);

				if ($updateMedicinalProduct) {
					$message = 'A medicinal product has been updated.';
					$this->session->set_flashdata('medicinalproduct_success', $message);
					redirect('admin/editmedicinalproduct/'.$id);

				} else {
					$message = 'Failed to update medicinal product.';
					$this->session->set_flashdata('medicinalproduct_fail', $message);
					redirect('admin/editmedicinalproduct/'.$id);    		
				}

			} else {

				$id = $this->uri->segment(3);

				self::$viewData['full_title'] = "Admin | Update Medicinal Product";
				self::$viewData['breadcrumb'] = "Update Medicinal Product"; 

				self::$viewData['getmedicinalproduct'] = $this->admin_model->getMedicinalProductById($id);
				self::$viewData['page'] = "admin/editmedicinalproduct";
				$this->load->view(TEMPADMIN, self::$viewData);

			}

		else:   
			redirect('admin/login');    
		endif;
	}







}
