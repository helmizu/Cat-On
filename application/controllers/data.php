<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
	}
	public function index()
	{
		
	}
	public function sseller(){
		$nama=$this->input->post('nama_seller');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$kota=$this->input->post('kota');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('no_telepon');
		$foto=$this->input->post('cat-image');
		$tambah=$this->data->signupseller($nama,$username,$password,$email,$kota,$alamat,$no_telp);

		if($tambah){
			$sendmail = $this->data->newSeller($email);
			redirect('login');
		} else {
			$this->load->view('signup');
		}
	}
	
	public function atoko(){
		$nama_toko=$this->input->post('cat-name');
		$address=$this->input->post('cat-address');
		$description=$this->input->post('cat-desc');
		$foto=$this->data->upload();
		$tambah=$this->data->addToko($nama_toko,$address,$description,$foto);

            
		if($tambah){
            redirect('seller/addMenu');
		} else {
			redirect('seller/addToko');
		}
	}
	public function amenu(){
		$nama_menu=$this->input->post('name');
		$status=$this->input->post('status');
		$foto_menu=$this->input->post('imagee');
		$harga=$this->input->post('harga');
		$foto_menu=$this->data->upload();
		$tambah=$this->data->addMenu($nama_menu, $foto_menu, $status, $harga);

		if($tambah){
			redirect('seller/profile');
		} else {
			redirect('seller/addMenu');
		}
	}
	public function dmenu($id){
		$delete=$this->data->deleteMenu($id);

		if($delete){
			redirect('seller/profile');
		} else {
			redirect('seller/profile');
		}
	}
	public function acart(){
		$id_menu=$this->input->post('menu');
		$id_user=$this->input->post('user');
		$id_toko=$this->input->post('toko');
		$qty=$this->input->post('jumlah');
		$total=$this->input->post('sub_total');
		$sub_total=$qty*$total;
		$tambah=$this->data->addCart($id_menu,$id_user,$id_toko,$qty,$sub_total);
		
		if($tambah){
			redirect('catering/detailcat/'.md5($id_toko).'#'.md5($id_menu));
		} else {
			redirect('');
		}
	}
	public function ucart($id_cart){
		$id_menu=$this->input->post('menu');
		$id_user=$this->input->post('user');
		$id_toko=$this->input->post('toko');
		$qty=$this->input->post('jumlah');
		$total=$this->input->post('sub_total');
		$sub_total=$qty*$total;
		$tambah=$this->data->updateCart($id_cart,$id_menu,$id_user,$id_toko,$qty,$sub_total);
		
		if($tambah){
			//redirect('catering/detailcat/'.md5($id_toko).'#'.md5($id_menu));
		} else {
			//redirect('');
		}
	}
	public function dcart($id_cart)
	{
		$delete=$this->data->deleteCart($id_cart);
		if($delete){
			redirect('transaksi/cart/');
		} else {
			redirect('');
		}
	}


	public function daftarCustomer()
	{
		$nama=$this->input->post('input_nama');
		$username=$this->input->post('input_username');
		$password=$this->input->post('input_password');
		$email=$this->input->post('input_email');
		$kota=$this->input->post('input_kota');
		$alamat=$this->input->post('input_alamat');
		$no_telp=$this->input->post('input_nomer');
		$tambah=$this->data->addUser($nama,$username,$password,$email,$kota,$alamat,$no_telp);

		if($tambah){
			$sendmail = $this->data->newUser($email);
			redirect('login');
		} else {
			redirect('signup');
		}
	}

	public function editCustomer()
	{
		$nama=$this->input->post('input_nama');
		$username=$this->input->post('input_username');
		$password=$this->input->post('input_password');
		$email=$this->input->post('input_email');
		$kota=$this->input->post('input_kota');
		$alamat=$this->input->post('input_alamat');
		$no_telp=$this->input->post('input_nomer');
		$edit=$this->data->editUser($nama,$username,$password,$email,$kota,$alamat,$no_telp);

		if($edit){
			redirect('home');
			return TRUE;
		} else {
			echo "gagal";
		}
	}
	
	
	//TRANSAKSI
	public function addPesan()
	{	
		$id_pesan=date("Ymdhis")."".$this->session->userdata('id');
		$nama_pesan=$this->input->post('nama_pesan');
		$email_pesan=$this->input->post('email_pesan');
		$alamat_pesan=$this->input->post('alamat_pesan');
		$telepon_pesan=$this->input->post('telepon_pesan');
		$tgl_pesan=$this->input->post('tgl_pesan');
		$tgl_kirim=$this->input->post('tgl_kirim');
		$rincian_pesan=$this->input->post('rincian_pesan');
		$jumlah_pesan=$this->input->post('jumlah_pesan');
		$total_bayar=$this->input->post('total_harga_pesan');
		$catatan=$this->input->post('catatan');

		$tambah=$this->data->addPesanan($id_pesan,$nama_pesan,$email_pesan,$alamat_pesan,$telepon_pesan,$tgl_pesan,$tgl_kirim,$rincian_pesan,$jumlah_pesan,$total_bayar,$catatan);
		if($tambah){
			redirect('transaksi/steptwo/'.$this->session->userdata('id_pesan'));
			return TRUE;
		} else {
			return false;
		}

	}
	
}

/* End of file data.php */
/* Location: ./application/controllers/data.php */