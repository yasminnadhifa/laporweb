<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Testi_model extends CI_Model
{
    public $table = 'penilaian';
    public $id = 'penilaian.id';
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
    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getById($id)
    {
        $this->db->Select('k.*,l.nama as lembaga');
        $this->db->from('konsumen k');
        $this->db->join('lembaga l', 'k.lembaga=l.id');
        $this->db->where('k.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
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
    public function ttesti()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getAll()
    {
        $this->db->Select('k.*,l.nama as nama, l.lembaga , l.nohp ');
        $this->db->from('penilaian k');
        $this->db->join('konsumen l', 'k.id_user=l.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllExcel()
    {
        $this->db->Select('k.*,l.nama as nama, l.lembaga ');
        $this->db->from('penilaian k');
        $this->db->join('konsumen l', 'k.id_user=l.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_user_data($id){
        $this->db->select('*, konsumen.nama as nama, konsumen.lembaga as lembaga');
        $this->db->from('penilaian');
        $this->db->join('konsumen', 'penilaian.id_user = konsumen.id');
        $this->db->where('penilaian.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_rating_count() {
        $this->db->select('star, COUNT(star) as count');
        $this->db->from('penilaian');
        $this->db->group_by('star');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function avg_rate() {
        $this->db->select('avg(star) as avg');
        $this->db->from('penilaian');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
