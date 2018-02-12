<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catering extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
	}
	public function index()
	{

		$id=$this->session->userdata('id');
		$data['getCart']=$this->data->getCart($id);
		$data['getToko']= $this->data->getTokoAll();
		$data['content'] = "cateringlist"; 
		$data['judul'] ="Catering List";
		$this->load->view('templateHome',$data);
	}

	public function detailcat($id_toko)
	{

		$id=$this->session->userdata('id');
		$data['getCart']=$this->data->getCart($id);
		$data['getToko']= $this->data->getTokoinList($id_toko);
		$data['getMenu']= $this->data->getMenu($id_toko);
		$data['content']= "detailcat"; 
		$data['judul'] ="Detail Catering";
		$this->load->view('templateHome',$data);;
	}	

}

/* End of file catering.php */
/* Location: ./application/controllers/catering.php */