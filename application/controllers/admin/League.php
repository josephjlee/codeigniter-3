<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class League extends CI_Controller {

    public function __construct() {
        parent::__construct();    
		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		$this->load->model('league_model');
    }

    public function lists(){
    	/*get API league list*/
    	$url = $this->web_global->api_url . 'ws/league/list_active';
    	$api_league_list = $this->web_global->curl_get($url);

    	/*get from DB league list*/
    	$db_league_list = $this->league_model->get_league_list();

		$data = array(
					'title' => 'League',
					'api_league_list' => $api_league_list,
					'db_league_list' => $db_league_list
				);

		$this->web_templater->backend('admin/league/lists',$data);
    }

    /*get Latest league*/
    public function standing(){
        //$view_by = $this->input->get('view_by');
        $standing_league_list = $this->league_model->get_standing_league_list();

        $data = array(
                    'title' => 'Standing League',
                    'standing_league_list' => $standing_league_list
                );
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        $this->web_templater->backend('admin/league/standing',$data);

    }

    /**/
    public function results(){
        $data = array(
                    'title' => 'League Results'
                );
        $this->web_templater->backend('admin/league/results',$data);
    }

    /**/
    public function match(){
        $data = array(
                    'title' => 'League Match'
                );
        $this->web_templater->backend('admin/league/match',$data);
    }

    /**/
    public function statistics(){
        $data = array(
                    'title' => 'League Statistics'
                );
        $this->web_templater->backend('admin/league/statistics',$data);
    }

    /*get Active league list*/
    public function api_get_league_list(){
        $view_by = $this->input->get('view_by');
        $list = '';
        if ($view_by == 'list_active') {$list = 'list_active';}
        else if($view_by == 'list_inactive') {$list = 'list_inactive';}
        else {$list = 'list';}

        $url = $this->web_global->api_url . 'ws/league/'.$list;
        $api_league_list = $this->web_global->curl_get($url);
        echo json_encode($api_league_list);
    }

    /**/
    public function copyLeagueListbyId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {            
            $lId = $this->input->post('lId');
            /*check if id exist*/
            $cntr = $this->league_model->findIdExist($lId);
            if ($cntr[0]->lId <= 0) {
                /*get API league list*/
                $url = $this->web_global->api_url. 'ws/league/find/' .$lId;
                $api_data = $this->web_global->curl_get($url);
                $id = $this->league_model->insertCopyList($api_data);
            }else{die('exist');}
        }  
    }

    /**/
    public function removeLeagueListbyId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {            
            $lId = $this->input->post('lId');
            $id = $this->league_model->deleteCopyList($lId);
            if ($id) {echo true;}
        } 
    }

    /**/
    public function upload_league(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')){
            print_r($this->upload->display_errors());
        }else{

            $logo = $this->upload->data();
            $data = array(
                            'lId' => $this->input->post('lId'), 
                            'lname' => $this->input->post('lName'),
                            'lCountry' => $this->input->post('lCountry'),
                            'lCup' => $this->input->post('lCup'),
                            'active' => 1,
                            'logo' => $logo['file_name']
                        );
            $id = $this->league_model->uploadLeague($data);
            redirect('admin/league/lists','refresh');
        }
    }

}