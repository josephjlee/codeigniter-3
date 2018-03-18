<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	const __TABLE_NAME = 'lp_users';

	public function __construct() {
		parent::__construct();
	}
    
    public function check_database($username, $password){
		$tbl_name = self::__TABLE_NAME;
        $this -> db -> select('id, username');
        $this -> db -> from($tbl_name);
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);
      	$query = $this -> db -> get();
        if($query -> num_rows() == 1){
            return $query->result();
        } else{  return false; }
    }

	public function find_all() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT 
			`id` AS 'id',
			`name` AS 'name' ,
			`username` AS 'username' ,
			`email` AS 'email' ,
			`type` AS 'type'
			FROM `$tbl_name`
			ORDER BY `name` ASC";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function insert() {
		
	}
}
