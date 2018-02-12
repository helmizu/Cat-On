<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
		if ($this->session->userdata('user') == FALSE)
        {
            redirect('login');
		}
	}
	public function index()
	{
		$id=$this->session->userdata('id');
		$data['getCart']=$this->data->getCart($id);
		
	}
	public function cart()
	{
		$id=$this->session->userdata('id');
		$data['getCart']=$this->data->getCart($id);
		$data['getTotalCart']=$this->data->getTotalCart($id);
		$data['content'] = "cart"; 
		$data['judul'] ="Cart List";
		$this->load->view('templateHome',$data);
	}
	public function stepOne()
	{
		$id=$this->session->userdata('id');
		$data['getCart']=$this->data->getCart($id);
		$data['getTotalCart']=$this->data->getTotalCart($id);
		$data['content'] = "formTransaksi"; 
		$data['judul'] ="Transaksi";
		$this->load->view('templateHome',$data);
	}
	public function stepTwo($id_pesan)
	{
		$id=$this->session->userdata('id');
		$data['getPesan']=$this->data->getPesanan($id_pesan);
		$data['getCart']=$this->data->getCart($id);
		$data['getTotalCart']=$this->data->getTotalCart($id);
		$data['content'] = "formBayar"; 
		$data['judul'] ="Transaksi";
		$this->load->view('templateHome',$data);
	}
	public function proses()
	{
		$id_user=$this->session->userdata('id');
		$id_pesan=$this->session->userdata('id_pesan');
		$id_seller=$this->input->post('idseller');
		$bayar=$this->input->post('bayar');
		$status=$this->input->post('status');
		$tambah=$this->data->addTransaksi($id_user,$id_seller,$id_pesan,$bayar,$status);

		if($tambah){
			echo "success";
			redirect('email/userOrder');
		} else {
			redirect('transaksi/stepTwo','refresh');
		}
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */