<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();    

		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		//$this->load->model('media_model','',TRUE);
    }

    public function all_pages(){
		$data = array(
					'title' => 'Pages',
					//'user_list' => $this->media_model->find_all()
				);
		$this->web_templater->backend('admin/page/all_pages',$data);
    }

    public function add_page(){
		$data = array(
					'title' => 'Add a New Page',
					//'user_list' => $this->media_model->find_all()
				);
		$this->web_templater->backend('admin/page/add_page',$data);
    }
}