<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

	const __TABLE_NAME = 'lp_team_list';

	public function __construct() {
		parent::__construct();
	}
	
	/*get team list*/
	public function get_team_list() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT 
			`id` AS 'id',
			`mHomeId` AS 'mHomeId' ,
			`mHome` AS 'mHome'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	/*insert copied list*/
	public function insertCopyList($data){
		$tbl_name = self::__TABLE_NAME;
	   	extract($data);
		$sql = "INSERT INTO `$tbl_name`
			(
				`mHomeId`,
				`mHome`
			) VALUES(?,?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();

		return $id;
	}

	/*delete list*/
	public function deleteCopyList($mHomeId){
		$tbl_name = self::__TABLE_NAME;
		$data[] = $mHomeId;
		$sql = "DELETE FROM `$tbl_name`
			WHERE (`mHomeId` = ?)
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}
}
