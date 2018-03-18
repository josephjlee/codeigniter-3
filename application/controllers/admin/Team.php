<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function __construct() {
        parent::__construct();    
		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		$this->load->model('team_model','',TRUE);
    }

    public function index(){
    	/*get API team list*/
    	$url = $this->web_global->api_url . 'ws/team/league/3037';
    	$api_team_list = $this->web_global->curl_get($url);

    	/*get from DB team list*/
    	$db_team_list = $this->team_model->get_team_list();

		$data = array(
					'title' => 'Team',
					'api_team_list' => $api_team_list,
					'db_team_list' => $db_team_list
				);

		$this->web_templater->backend('admin/team/index',$data);
    }

    /**/
    public function copyTeamListbyId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {            
            $mHomeId = $this->input->post('mHomeId');
            /*get API league list*/
            $url = $this->web_global->api_url. 'ws/team/find/' .$mHomeId;
            $api_data = $this->web_global->curl_get($url);
            $id = $this->team_model->insertCopyList($api_data);
            if ($id) {echo true;}
        }  
    }

    /**/
    public function removeTeamListbyId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {            
            $mHomeId = $this->input->post('mHomeId');
            $id = $this->team_model->deleteCopyList($mHomeId);
            if ($id) {echo true;}
        } 
    }

}