<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Konsumen_model extends CI_Model
{
    public $table = 'konsumen';
    public $id = 'konsumen.id';
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
        $this->db->Select('k.*');
        $this->db->from('konsumen k');
        $this->db->where('k.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getAll()
    {
        $this->db->Select('k.*');
        $this->db->from('konsumen k');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllb()
    {
        $this->db->Select('k.*');
        $this->db->from('konsumen k');
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
    public function min_stok($stok, $idp)
    {
        $query = $this->db->set('stok', 'stok-' . $stok, false);
        $query = $this->db->where('id', $idp);
        $query = $this->db->update($this->table);
        return $query;
    }
    public function tkonsumen()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function check_password($user_id, $password)
    {
        // Lakukan validasi kata sandi dengan yang ada di database
        $this->db->where('id', $user_id);
        $this->db->where('password', $password);
        $query = $this->db->get('konsumen');

        if ($query->num_rows() > 0) {
            // Kata sandi cocok
            return true;
        } else {
            // Kata sandi tidak cocok
            return false;
        }
    }

    
}
