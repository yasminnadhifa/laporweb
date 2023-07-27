<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Laporan_model extends CI_Model
{
    public $table = 'laporan';
    public $id = 'laporan.id';
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
        public function getByUser()
    {
        $id = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->Select('k.*');
        $this->db->from('konsumen k');
        $this->db->where('k.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_user_data($id){
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
    public function get_top_4() {
        $this->db->select('p.*, c.nama as category_name');
        $this->db->from('laporan as p');
        $this->db->join('konsumen as c', 'p.id_user = c.id');
        $this->db->where('p.status !=', 'Selesai');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }
    public function tlaporan()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function tlaporans()
    {
        $this->db->from($this->table);
        $this->db->where('status !=', 'Selesai');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getAll()
    {
        $this->db->Select('k.*,l.nama as nama ');
        $this->db->from('laporan k');
        $this->db->join('konsumen l', 'k.id_user=l.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllReport($id)
    {
        $this->db->Select('k.*,l.nama as nama, l.nohp, l.lembaga ');
        $this->db->from('laporan k');
        $this->db->join('konsumen l', 'k.id_user=l.id', 'left');
        $this->db->where('k.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function deleteData($id) {
        // Lakukan operasi penghapusan data sesuai dengan kebutuhan Anda
        // Misalnya, menghapus data dari tabel database

        $this->db->where('id', $id);
        $this->db->delete($this->table);

        return ($this->db->affected_rows() > 0);
    }
    public function getAllExcel()
    {
        $this->db->Select('k.*,l.nama as nama, l.lembaga ');
        $this->db->from('laporan k');
        $this->db->join('konsumen l', 'k.id_user=l.id');
        $query = $this->db->get();
        return $query->result();
}
}
