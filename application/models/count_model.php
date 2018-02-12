<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count_model extends CI_Model {

	public function countSeller()
	{
		return $this->db->get('seller')->num_rows();
	}

	public function countFood()
	{
		return $this->db->get('menu')->num_rows();
	}

	public function countUser()
	{
		return $this->db->get('user')->num_rows();
	}

	public function countCatering()
	{
		return $this->db->where('status_toko', 'aktif')->get('toko')->num_rows();
	}

	public function countTransaction()
	{
		return $this->db->get('transaksi')->num_rows();
	}

	public function countOverallRevenue()
	{
		$cc = $this->db->select('sum(total_harga_pesan) as OverallRevenue')->join('pesan', 'pesan.id_pesan=transaksi.id_pesan')->get('transaksi');
		return $cc->row();
	}

	//SELLER

	public function countFoodSeller()
	{
		return $this->db->where('id_seller', $this->session->userdata('id'))->join('menu', 'toko.id_toko=menu.id_toko')->get('toko')->num_rows();
	}

	public function countCustomer()
	{
		return $this->db->group_by('id_user')->where('id_seller', $this->session->userdata('id'))->get('transaksi')->num_rows();
	}

	public function countOrder()
	{
		return $this->db->where('id_seller', $this->session->userdata('id'))->get('transaksi')->num_rows();
	}

	public function countRevenue()
	{
		$cc = $this->db->select('sum(total_harga_pesan) as Revenue')->where('id_seller', $this->session->userdata('id'))->join('pesan', 'pesan.id_pesan=transaksi.id_pesan')->get('transaksi');
		return $cc->row();
	}
}

/* End of file count_model.php */
/* Location: ./application/models/count_model.php */