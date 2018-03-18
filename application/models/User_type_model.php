<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_type_model extends CI_Model {

	const __TABLE_NAME = 'lp_user_type';

	public function __construct() {
		parent::__construct();
	}

	public function insert($name) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $name;
		$sql = "INSERT INTO `$tbl_name`
			(
				`name`
			) VALUES(?)";
		$this->db->query($sql, $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function remove($id) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $id;
		$sql = "DELETE FROM `$tbl_name`
			WHERE (`id` = ?)
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}

	public function update($name, $id) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $name;
		$data[] = $id;
		$sql = "UPDATE `$tbl_name`
			SET `name` = ?
			WHERE (`id` = ?) 
			LIMIT 1";
		$this->db->query($sql, $data);
		$affected_rows = $this->db->affected_rows();

		return $affected_rows;
	}

	public function find($id) {
		$tbl_name = self::__TABLE_NAME;
		$data[] = $id;
		$Sql = "SELECT 
			`id` AS 'id',
			`name` AS 'name' 
			FROM `$tbl_name` 
			WHERE (`id` = ?) 
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();

		return $result;
	}

	public function find_all() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT 
			`id` AS 'id',
			`name` AS 'name' 
			FROM `$tbl_name`
			ORDER BY `name` ASC";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	public function get_total_rows() {
		$tbl_name = self::__TABLE_NAME;
		$sql = "SELECT
			COUNT(`id`) AS 'total_rows'
			FROM `$tbl_name` 
			LIMIT 1";
		$query = $this->db->query($sql, $data);
		$result = $query->result();
		$total_rows = 0;
		foreach($result as $row) { $total_rows = $row->total_rows; }

		return $total_rows;
	}
}
