<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Custom_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

	function insert($table, $data) {

		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	function insert_batch($table, $data) {

		$this->db->insert_batch($table, $data);
		return $this->db->insert_id();
	}
	function where($condition) {
		$this->db->where($condition);
		return $this;
	}
	function where_in($field, $array) {
		$this->db->where_in($field, $array);
		return $this;
	}

	function get_all($table, $select = '*') {
		$this->db->select($select);
		$result = $this->db->get($table);

		return $result->result_object();
	}

	function first($table, $select = '*') {
		$this->db->select($select);
		$result = $this->db->get($table);

		return $result->first_row();
	}
	function limit($limit = 10, $start = 0) {
		$this->db->limit($limit, $start);
		return $this;
	}
	function count($table) {
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	function count_data($table, $where) {
		$this->db->where($where)->from($table);
		return $this->db->count_all_results();
	}

	function join($table, $condition, $type = 'both') {
		$this->db->join($table, $condition, $type);
		return $this;
	}
	function update($table, $data) {
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function having($condition) {
		$this->db->having($condition);
		return $this;
	}
	function order_by($field, $type = 'DESC') {
		$this->db->order_by($field, $type);
		return $this;
	}
	function group_by($field) {
		$this->db->group_by($field);
		return $this;
	}
	function query($query) {
		return $this->db->query($query);
	}

	function get_last_insertid() {
		return $this->db->insert_id();
	}

	function delete($table) {
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	function trans_start() {
		$this->db->trans_start();
		return $this;
	}
	function trans_complete() {
		$this->db->trans_complete();
		return $this;
	}
	function trans_rollback() {
		$this->db->trans_rollback();
		return $this;
	}
	function getCurrentBalance($userId) {
		$this->db->where(['client_id' => $userId]);
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		return $this->first('scan_credits', 'credit_balance');

	}
	public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));
    }

}
