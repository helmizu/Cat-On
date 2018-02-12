<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		$data['getToko']= $this->data->getTokoHome();
		$data['content'] = "home";
		$data['judul'] ="Cat-On";
		$this->load->view('templateHome',$data);
	}
}
