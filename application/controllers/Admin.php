<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
		$this->load->model('count_model', 'count', TRUE);
	}

	public function index()
	{
		$data['cSeller'] = $this -> count -> countSeller();
		$data['cUser'] = $this -> count -> countUser();
		$data['cFood'] = $this -> count -> countFood();
		$data['cCatering'] = $this -> count -> countCatering();
		$data['cTransaction'] = $this -> count -> countTransaction();
		$data['cOverallRevenue'] = $this -> data -> rp($this -> count -> countOverallRevenue()->OverallRevenue);
		$data['isi'] = $this -> data -> adminView();
		$data['content'] = "adminDashboard";
		$this->load->view('admin',$data);
	}

	public function userTable()
	{
		$data['isi'] = $this -> data -> viewUser();
		$data['content'] = "table_user";
		$this->load->view('admin',$data);
	}

	public function sellerTable()
	{
		$data['isi'] = $this -> data -> viewSeller();
		$data['isi1'] = $this -> data -> viewAllSeller();	
		$data['content'] = "table_seller";
		$this->load->view('admin',$data);
	}

	public function formUser()
	{
		$data['content'] = "form_addUser";
		$this->load->view('admin',$data);
	}

	public function formSeller()
	{
		$data['content'] = "form_addSeller";
		$this->load->view('admin',$data);
	}

	public function hapus($id_user)
	{
		# code...
		$this -> data -> delete($id_user);
		redirect('admin/userTable','refresh');
	}

	public function hapusSeller($id_seller)
	{
		# code...
		$this -> data -> delete($id_seller);
		redirect('admin/sellerTable','refresh');
	}

	public function validasi($id_toko)
	{
		$this -> data -> validasiSeller($id_toko);
		redirect('admin/sellerTable','refresh');
	}

	public function addSeller(){
		$nama=$this->input->post('name');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$kota=$this->input->post('kota');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('telepon');
		$tambah=$this->data->signupseller($nama,$username,$password,$email,$kota,$alamat,$no_telp);

		if($tambah){
			redirect('admin/formSeller');
		} else {
			$this->load->view('signup');
		}
	}

	public function addUser(){
		$nama=$this->input->post('name');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$kota=$this->input->post('kota');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('telepon');
		$tambah=$this->data->addUser($nama,$username,$password,$email,$kota,$alamat,$no_telp);

		if($tambah){
			redirect('admin/formUser');
		} else {
			$this->load->view('signup');
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */