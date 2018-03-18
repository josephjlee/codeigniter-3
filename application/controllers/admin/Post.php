<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();    

		 if(!$this->session->userdata('user')){
			redirect('admin', 'refresh');
			exit();
		 }
   		$this->load->model('post_model','',TRUE);
    }

    public function all_posts(){
		$data = array(
					'title' => 'Posts',
					'user_list' => $this->post_model->find_all()
				);
		$this->web_templater->backend('admin/post/all_posts',$data);
    }

    public function view_post(){
    	//var_dump($_GET);
   	 	$result = $this->post_model->viewPostById($this->input->get('id'));
   	 	echo json_encode($result);
    }

    public function add_post(){
   	 	if($_SERVER['REQUEST_METHOD'] == 'POST') {
   	 		$this->post_model->insert_post($_POST);
   	 		//var_dump($_POST);
   	 		die('success');
   	 	}

		$data = array(
					'title' => 'Add a New Post'
				);
		$this->web_templater->backend('admin/post/add_post',$data);
    }

    public function edit_post(){
   	 	$result = $this->post_model->viewPostById($this->input->get('id'));
   	 	echo json_encode($result);
    }

    public function update_post(){
    	$id = $this->input->post('id');
    	$title = $this->input->post('title');
    	$content = $this->input->post('edit_content');
    	echo $this->post_model->update_post($id,$title,$content);
    	
    }

    public function delete_post(){
    	$this->post_model->delete_post($this->input->post('id'));
    }

    public function category(){
		$data = array(
					'title' => 'Category'
				);
		$this->web_templater->backend('admin/post/category',$data);
    }

    public function tags(){
		$data = array(
					'title' => 'Tags'
				);
		$this->web_templater->backend('admin/post/tags',$data);
    }

    
}
