<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	const __TABLE_NAME = 'lp_posts';

	public function __construct() {
		parent::__construct();
	}	

	public function find_all() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT 
			`id` AS 'id',
			`title` AS 'title' ,
			`author` AS 'author' ,
			`content` AS 'content' ,
			`categories` AS 'categories' ,
			`tags` AS 'tags' ,
			`comments` AS 'comments' ,
			`date` AS 'date'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function viewPostById($id){
		$tbl_name = self::__TABLE_NAME;

		$sql = "SELECT 
				`id` AS 'id',
				`title` AS 'title' ,
				`author` AS 'author' ,
				`content` AS 'content' ,
				`categories` AS 'categories' ,
				`tags` AS 'tags' ,
				`comments` AS 'comments' ,
				`date` AS 'date'
				FROM `$tbl_name`
				WHERE `id` = '$id'
				";

		$query 	= $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function insert_post($data){
		$tbl_name = self::__TABLE_NAME;
	   	extract($data);
		$sql = "INSERT INTO `$tbl_name`
			(
				`title`,
				`content`
			) VALUES(?,?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function update_post($id,$title,$content){
		$tbl_name = self::__TABLE_NAME;
		$data[] = $title;
		$data[] = $content;
		$data[] = $id;
		$sql = "UPDATE `$tbl_name`
			SET `title` = ?,
				`content` = ?
			WHERE (`id` = ?) 
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}

	public function delete_post($id){
		$tbl_name = self::__TABLE_NAME;
		$data[] = $id;
		$sql = "DELETE FROM `$tbl_name`
			WHERE (`id` = ?)
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}
}