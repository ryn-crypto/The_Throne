<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Model {

	public function index()
	{
		$this->db->select('*');
		$this->db->from('daftar_game');
        $this->db->order_by('id', 'ASC');
		return $this->db->get()->result_array();
	}

	public function gamedipilih($id)
	{
		$this->db->select('*');
		$this->db->from('daftar_game');
		$this->db->where('id', $id);
        return $this->db->get()->row_array();
	}

	public function select($id)
	{
		$this->db->select('*');
		$this->db->from('game_rank');
		$this->db->where($id);
        return $this->db->get()->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('transaksi', $data);
	}
}