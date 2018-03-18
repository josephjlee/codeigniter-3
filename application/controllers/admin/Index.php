<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();   
   		$this->load->model('user_model','',TRUE);
    }

    public function index(){    
		$data = array(
					'title' => 'Login'
				);
		$this->web_templater->backend('admin/index',$data);
    }

    public function login(){
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_login');

		if($this->form_validation->run() == FALSE) {
     		//Field validation failed.  User redirected to login page
			redirect('admin?login=false', 'refresh');
		}
		else {
     		//Go to dashboard
			redirect('admin/dashboard', 'refresh');
		}
    }

	public function check_login($password) {
   		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

   		//query the database
		$result = $this->user_model->check_database($username, $password);

		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username
					);
				$this->session->set_userdata('user', $sess_array);
			}
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_login', 'Invalid username or password');
			return false;
		}
	}

    public function logout(){
	   	$this->session->unset_userdata('user');
	   	session_destroy();
		redirect('admin', 'refresh');
	   	exit();
    }
}
