<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();    

		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
    }

    public function index(){
		$data = array(
					'title' => 'Dashboard'
				);
		$this->web_templater->backend('admin/dashboard/index',$data);
    }

    
}
