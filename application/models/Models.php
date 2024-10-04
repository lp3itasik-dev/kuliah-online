<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model{	
    function Get_Page($limit, $start, $table){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }
	public function Get_All($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	function Save($data, $table){
		$result=$this->db->insert($table, $data);
		return $result;
	}
	function Update($where, $data, $table){
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table){
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table){
		$result=$this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table){
		$result=$this->db->delete($table);
		return $result;
	}
	public function Cek_login($username,$username_value,$password,$password_value,$table)
	{
		$this->db->select('*');
		$this->db->where($username,$username_value);
		$this->db->where($password,$password_value);
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}