<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();

        ini_set("date.timezone", "Asia/Katmandu");

        $helper = array('url', 'form', 'email', 'security');
        $this->load->helper($helper); 

        $library = array('form_validation', 'session', 'upload');
        $this->load->library($library);
	}


	public function checkDashboardLogin($username, $password, $admintype)
    {
    	$where = array('USERNAME' => $username, 'PASSWORD' => sha1($password), 'ADMIN_TYPE' => $admintype);
        $result = $this->db->get_where('tbl_admin_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }

    public function checkOldPassword($oldpassword)
    {
        $id = $this->session->userdata('adminid');
        $where = array('PASSWORD' => sha1($oldpassword), 'ID' => $id);
        $this->db->where($where);
        $result = $this->db->get('tbl_admin_detail');

        if ($result->num_rows() == 1) {
            return true;

        } else {
            return false;
        }
    }


    public function updatePassword($data)
    {
        $id = $this->session->userdata('adminid');
        $where  = array('ID' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_admin_detail', $data);
    }


    public function userCount()
    {
        return $this->db->count_all_results('tbl_user_detail');
    }

    public function specialistCount()
    {
        $where = array('ADMIN_TYPE' => 2);
        $this->db->where($where);
        return $this->db->count_all_results('tbl_admin_detail');
    }

    public function forumQuestionCount()
    {
        return $this->db->count_all_results('tbl_forum_questions');
    }

    public function forumAnswerCount()
    {
        return $this->db->count_all_results('tbl_forum_answers');
    }

    public function specialistTypeCount()
    {
        return $this->db->count_all_results('tbl_specialist_type');
    }


    public function addspecialist($data)
    {
        return $this->db->insert('tbl_admin_detail', $data);
    }


    public function getspecialist()
    {
        $where = array('ADMIN_TYPE' => 2);
        $result = $this->db->get_where('tbl_admin_detail', $where);

        if ($result->num_rows() > 0) {
            return $result->result();

        } else {
            return false;
        }
    }


    public function specialistActivate($id)
    {
        $this->db->set('STATUS', '1');
        $this->db->where('ID', $id);
        $this->db->update('tbl_admin_detail');
    }


    public function specialistDeactivate($id)
    {
        $where = array('ID' => $id, 'ADMIN_TYPE' => 2);
        $this->db->set('STATUS', '0');
        $this->db->where($where);
        $this->db->update('tbl_admin_detail');
    }

     public function goOnline($id)
    {
        $this->db->set('ONLINE_STATUS', '1');
        $this->db->where('ID', $id);
        $this->db->update('tbl_admin_detail');
    }


    public function goOffline($id)
    {
        $where = array('ID' => $id);
        $this->db->set('ONLINE_STATUS', '0');
        $this->db->where($where);
        $this->db->update('tbl_admin_detail');
    }


    public function specialistDelete($id)
    {
        $where = array('ID' => $id, 'ADMIN_TYPE' => 2);
        $this->db->where($where);
        return $this->db->delete('tbl_admin_detail');
    }

    public function getAdminDetails()
    {
        $id = $this->session->userdata('adminid');

        $where = array('ID' => $id);
        return $this->db->get_where('tbl_admin_detail', $where)->row(); 
    }


    public function getusers()
    {
        $result = $this->db->get('tbl_user_detail');

        if ($result->num_rows() > 0) {
            return $result->result();

        } else {
            return false;
        }
    }


    public function userActivate($id)
    {
        $this->db->set('STATUS', '1');
        $this->db->where('ID', $id);
        $this->db->update('tbl_user_detail');
    }


    public function userDeactivate($id)
    {
        $where = array('ID' => $id);
        $this->db->set('STATUS', '0');
        $this->db->where($where);
        $this->db->update('tbl_user_detail');
    }


    public function userDelete($id)
    {
        $where = array('ID' => $id);
        $this->db->where($where);
        return $this->db->delete('tbl_user_detail');
    }


     public function updateProfileImg($id, $data)
    {
        $where = array('ID' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_admin_detail', $data);
    }


    public function updateProfile($id, $data)
    {
        $where = array('ID' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_admin_detail', $data);
    }


    public function getForumQuestions()
    {
        $query = "SELECT tbl_user_detail.*, tbl_forum_questions.*, tbl_forum_questions.ID AS QUESTION_ID 
                    FROM tbl_user_detail
                    JOIN tbl_forum_questions
                    ON tbl_user_detail.ID = tbl_forum_questions.USER_ID
                    ORDER BY tbl_forum_questions.CREATED DESC";

        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function getForumAnswers()
    {
        $query = "SELECT tbl_user_detail.*, tbl_forum_answers.*, tbl_forum_answers.ID as ANSWER_ID, tbl_forum_questions.*
                FROM tbl_forum_answers
                JOIN tbl_user_detail
                ON tbl_forum_answers.USER_ID = tbl_user_detail.ID
                JOIN tbl_forum_questions
                ON tbl_forum_answers.QUESTION_ID = tbl_forum_questions.ID
                ORDER BY tbl_forum_answers.CREATED ASC";

        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function forumAnsDelete($answerid)
    {
        $this->db->where('ID', $answerid);
        return $this->db->delete('tbl_forum_answers');
    }


    public function checkQuestionJoin($questionid)
    {
        $query = "SELECT tbl_forum_questions.*, tbl_forum_answers.*
                    FROM tbl_forum_questions
                    INNER JOIN tbl_forum_answers
                    ON tbl_forum_questions.ID = tbl_forum_answers.QUESTION_ID
                    WHERE tbl_forum_questions.ID = $questionid";

        $result = $this->db->query($query);    

        if ($result->num_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function forumQuesDeleteJoin($questionid)
    {
        $query = "DELETE tbl_forum_questions.*, tbl_forum_answers.*
                    FROM tbl_forum_questions
                    INNER JOIN tbl_forum_answers
                    ON tbl_forum_questions.ID = tbl_forum_answers.QUESTION_ID
                    WHERE tbl_forum_questions.ID = $questionid";

        return $this->db->query($query);
    }


    public function forumQuestionDelete($questionid)
    {
        $this->db->where('ID', $questionid);
        return $this->db->delete('tbl_forum_questions');
    }


    public function getPrivateMessage($userid)
    {
        $adminid = $this->session->userdata('adminid');

        $table = "tbl_pvt_msg_".$userid."_".$adminid;

        $this->db->order_by('CREATED', 'ASC');
        $result = $this->db->get($table);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }

    }


    public function updateSeenStatus($table, $userid)
    {
        $data = array(
            'SEEN_STATUS' => 1
        );

        $where = array('USER_TYPE' => 'user');
        $this->db->where($where);
        return $this->db->update($table, $data);
    }


    public function getUserById($userid)
    {
        $where = array('ID' => $userid);
        $result = $this->db->get_where('tbl_user_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function insertPrivateMsg($receiverid, $senderid, $message)
    {
        $table = "tbl_pvt_msg_".$receiverid."_".$senderid;
        // return $table;

        $where = array('ID' => $senderid);
        $result = $this->db->get_where('tbl_admin_detail', $where)->row();

        $fullname = $result->NAME;

        $data = array(
            'NAME'      => $fullname,
            'USER_TYPE' => "admin",
            'MESSAGE'   => $message
        );

        return $this->db->insert($table, $data);
    }


    public function checkSeenStatus($userid)
    {

        $specialistid = $this->session->userdata('adminid');
        $table = "tbl_pvt_msg_".$userid."_".$specialistid;

        $where = array('USER_TYPE' => 'user', 'SEEN_STATUS' => 0);
        $this->db->order_by('CREATED', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get_where($table, $where);

        if($result->num_rows() > 0) { 
         
            echo '<span class="pull-right-container">
                <i class="fa fa-envelope pull-right text-red message-received"></i>
            </span>';
        }
                             
    }


    public function insertSpecialistType($data)
    {
        return $this->db->insert('tbl_specialist_type', $data);
    }


    public function getSpecialistType()
    {
        return $this->db->get('tbl_specialist_type')->result();
    }

    public function getSpecialistTypeById($typeid)
    {
        $where = array('TYPEID' => $typeid);
        return $this->db->get_where('tbl_specialist_type', $where)->row();
    }


    public function specialistTypeDel($id)
    {
        $this->db->where('TYPEID', $id);
        return $this->db->delete('tbl_specialist_type');
    }

    public function updateSpecialistType($data, $typeid)
    {
        // echo $typeid;exit;
        $where = array('TYPEID' => $typeid);
        $this->db->where($where);
        return $this->db->update('tbl_specialist_type', $data);
    }


    public function insertHealthProblems($data)
    {
        return $this->db->insert('tbl_health_problems', $data);
    }

     public function getHealthProblems()
    {
        return $this->db->get('tbl_health_problems')->result();
    }

    public function healthproblemActivate($id)
    {
        $this->db->set('STATUS', '1');
        $this->db->where('ID', $id);
        $this->db->update('tbl_health_problems');
    }


    public function healthproblemDeactivate($id)
    {
        $where = array('ID' => $id);
        $this->db->set('STATUS', '0');
        $this->db->where($where);
        $this->db->update('tbl_health_problems');
    }

    public function healthProblemDel($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('tbl_health_problems');
    }

    public function getHealthProblemById($id)
    {
        $where = array('ID' => $id);
        return $this->db->get_where('tbl_health_problems', $where)->row();
    }


    public function updateHealthProblem($data, $id)
    {
        $where = array('ID' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_health_problems', $data);
    }

}