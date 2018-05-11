<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();

        ini_set("date.timezone", "Asia/Katmandu");

        $helper = array('url', 'form', 'email', 'security');
        $this->load->helper($helper); 

        $library = array('form_validation', 'session', 'upload');
        $this->load->library($library);
	}


	public function userRegister($data)
    {
        return $this->db->insert('tbl_user_detail', $data);
    }


    public function userLogin($email, $password)
    {
    	$where = array('EMAIL' => $email, 'PASSWORD' => sha1($password));

        $result = $this->db->get_where('tbl_user_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function checkuser($email)
    {
        $where = array('EMAIL' => $email);
        $result = $this->db->get_where('tbl_user_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function getUserDetail()
    {
        $id = $this->session->userdata('userid');

        $where = array('ID' => $id);
        $result = $this->db->get_where('tbl_user_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();
        } else {
            return false;
        }
    }


    public function addForumQuestion($data)
    {
        return $this->db->insert('tbl_forum_questions', $data);
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


    public function addForumAnswer($data)
    {
        return $this->db->insert('tbl_forum_answers', $data);
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


    public function getspecialist()
    {
        $where = array('ADMIN_TYPE' => 2, 'STATUS' => 1);
        $result = $this->db->get_where('tbl_admin_detail', $where);

        if ($result->num_rows() > 0) {
            return $result->result();

        } else {
            return false;
        }
    }

    public function getSpecialistById($specialistid)
    {
        $where = array('ID' => $specialistid, 'ADMIN_TYPE' => 2);
        $result = $this->db->get_where('tbl_admin_detail', $where);

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function insertPrivateMsg($receiverid, $senderid, $message)
    {
        $table = "tbl_pvt_msg_".$senderid."_".$receiverid;
        // return $table;

        $where = array('ID' => $senderid);
        $result = $this->db->get_where('tbl_user_detail', $where)->row();

        $fullname = $result->FIRSTNAME.' '.$result->LASTNAME;

        $data = array(
            'NAME'      => $fullname,
            'USER_TYPE' => "user",
            'MESSAGE'   => $message
        );

        return $this->db->insert($table, $data);
    }


    public function getPrivateMessage($receiverid)
    {
        $senderid = $this->session->userdata('userid');

        $table = "tbl_pvt_msg_".$senderid."_".$receiverid;

        $this->db->order_by('CREATED', 'ASC');
        $result = $this->db->get($table);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }

    }

    public function checktableexists($receiverid)
    {
        $senderid = $this->session->userdata('userid');
        $table = "tbl_pvt_msg_".$senderid."_".$receiverid;
        // return $table;

        $checktable = "SELECT * 
                        FROM information_schema.tables
                        WHERE table_schema = 'medissist' 
                        AND table_name = '$table'
                        LIMIT 1";

        $result = $this->db->query($checktable);

        if ($result->num_rows() < 1) {
            return false;
        } else {
            return true;
        }
    }


    public function getSearchSpecialist($search)
    {
        $sql = "SELECT * FROM `tbl_admin_detail` WHERE `ADMIN_TYPE` LIKE '%2%' AND `NAME` LIKE '%$search%' AND `STATUS` LIKE '%1%'"; 

        $result = $this->db->query($sql);
        // return $rows = $result->num_rows();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function getSortspecialist($specialisttype)
    {
        if ($specialisttype == "all") {
            $sql = "SELECT * FROM `tbl_admin_detail` WHERE `ADMIN_TYPE` LIKE '%2%' AND `STATUS` LIKE '%1%'";

        } elseif ($specialisttype != "all") {
            $sql = "SELECT * FROM `tbl_admin_detail` WHERE `STATUS` LIKE '%1%' AND `ADMIN_TYPE` LIKE '%2%' AND `SPECIALIST_TYPE` LIKE '%$specialisttype%'";
        }

        $result = $this->db->query($sql);
        // return $rows = $result->num_rows();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function getHealthProblems()
    {
        $where = array('STATUS' => 1);
        $this->db->order_by('NAME', 'ASC');
        return $this->db->get_where('tbl_health_problems', $where)->result();
    }


    public function getHealthProblemById($id)
    {
        $where = array('ID' => $id);
        return $this->db->get_where('tbl_health_problems', $where)->row();
    }


    public function getMedicinalProduct()
    {
        $where = array('STATUS' => 1);
        $this->db->order_by('NAME', 'ASC');
        return $this->db->get_where('tbl_medicinal_product', $where)->result();
    }

    public function getMedicinalProductById($id)
    {
        $where = array('ID' => $id);
        return $this->db->get_where('tbl_medicinal_product', $where)->row();
    }




}