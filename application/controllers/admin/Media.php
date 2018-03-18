<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();    

		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		//$this->load->model('media_model','',TRUE);
    }

    public function library(){
		$data = array(
					'title' => 'Media Library',
					//'user_list' => $this->media_model->find_all()
				);
		$this->web_templater->backend('admin/media/library',$data);
    }

    public function add_media(){
		$data = array(
					'title' => 'Add a New Media',
					//'user_list' => $this->media_model->find_all()
				);
		$this->web_templater->backend('admin/media/add_media',$data);
    }
}