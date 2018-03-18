<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();    

		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		$this->load->model('user_model','',TRUE);
    }

    public function all_users(){
		$data = array(
					'title' => 'Users',
					'user_list' => $this->user_model->find_all()
				);
		$this->web_templater->backend('admin/user/all_users',$data);
    }

    public function add_user(){
		$data = array(
					'title' => 'Add a New User'
				);
		$this->web_templater->backend('admin/user/add_user',$data);
    }

    public function profile(){
		$data = array(
					'title' => 'Profile'
				);
		$this->web_templater->backend('admin/user/profile',$data);
    }

    
}
