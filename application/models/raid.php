<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raid extends CI_Model {

	public function index()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('game_rank', 'transaksi.id_harga = game_rank.id');
		$this->db->join('daftar_game', 'game_rank.game_id = daftar_game.id');
        $this->db->order_by('transaksi.id', 'ASC');
		return $this->db->get()->result_array();
	}

    public function hapus($id)
	{
		$this->db->where('no_pesanan', $id);
        $this->db->delete('transaksi');
	}
}