<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lembaga_model extends CI_Model
{
    public $table = 'lembaga';
    public $id = 'lembaga.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getActive()
    {
        $this->db->from($this->table);
        $this->db->where('status', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tlembaga()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert_batch($data){
		$this->db->insert_batch('lembaga',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
}