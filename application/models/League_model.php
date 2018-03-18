<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class League_model extends CI_Model {

	const __TABLE_NAME = 'lp_league_list';

	public function __construct() {
		parent::__construct();
	}

	public function findIdExist($id){
		$tbl_name = self::__TABLE_NAME;
		$data[] = $id;
		$sql = "SELECT 
			count(`lId`) as lId
			FROM `$tbl_name` 
			WHERE (`lId` = ?) 
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();

		return $result;
	}
	
	/*get league list*/
	public function get_league_list() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT 
			`id` AS 'id',
			`lId` AS 'lId' ,
			`lCountry` AS 'lCountry' ,
			`lName` AS 'lName' ,
			`lCup` AS 'lCup',
			`active` AS 'active',
			`logo` AS 'logo'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	/*standing league*/
	public function get_standing_league_list(){
		$tbl_name = 'lp_league_standings';
		$sql = "SELECT 
			`id` AS 'id',
			`lId` AS 'lId' ,
			`data` AS 'data' ,
			`date` AS 'date'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;

	}

	/*results league*/
	public function get_results_league_list(){
		$tbl_name = 'lp_league_results';
		$sql = "SELECT 
			`id` AS 'id',
			`lId` AS 'lId' ,
			`data` AS 'data' ,
			`date` AS 'date'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;

	}

	/*match league*/
	public function get_match_league_list(){
		$tbl_name = 'lp_league_match';
		$sql = "SELECT 
			`id` AS 'id',
			`lId` AS 'lId' ,
			`data` AS 'data' ,
			`date` AS 'date'
			FROM `$tbl_name`";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;

	}

	/*statistics league*/
	public function get_statistics_league_list(){
		$tbl_name = 'lp_league_statistics';
		$sql = "SELECT 
			`id` AS 'id',
			`lId` AS 'lId' ,
			`data` AS 'data' ,
			`date` AS 'date'
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
				`lId`,
				`lCountry`,
				`lName`,
				`lCup`,
				`active`,
				`logo`
			) VALUES(?,?,?,?,?,?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();

		return $id;
	}

	/*delete list*/
	public function deleteCopyList($lId){
		$tbl_name = self::__TABLE_NAME;
		$data[] = $lId;
		$sql = "DELETE FROM `$tbl_name`
			WHERE (`lId` = ?)
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}

	/**/
	public function uploadLeague($data){
		$tbl_name = self::__TABLE_NAME;
	   	extract($data);
		$sql = "INSERT INTO `$tbl_name`
			(
				`lId`,
				`lCountry`,
				`lName`,
				`lCup`,
				`active`,
				`logo`
			) VALUES(?,?,?,?,?,?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();

		return $id;
	}
}
