<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
		$this->load->model('count_model', 'count', TRUE);
		if ($this->session->userdata('seller') == FALSE)
        {
            redirect('login');
		} else{
            $querycat = $this->db->select('*')
                          ->where('id_seller', $this->session->userdata('id'))
                          ->get('toko');
       		$rowcat = $querycat->row();
       		$data = array(
       						'nama_toko'		=> @$rowcat->nama_toko,
                         	'id_toko'	  	=> @$rowcat->id_toko,
            				'foto_toko'		=> @$rowcat->foto_toko);
            $this->session->set_userdata($data); 
            
        }
	}
	
	public function index()
	{
		$data['cOrder'] = $this -> count -> countOrder();
		$data['cCustomer'] = $this -> count -> countCustomer();
		$data['cFood'] = $this -> count -> countFoodSeller();
		$data['cRevenue'] = $this -> count -> countRevenue();
		$revenue =  $data['cRevenue']->Revenue;
		$data['rp'] = $this -> data -> rp($revenue); 
		$data['content']='dashboard';
		$this->load->view('sellerboard', $data);
		$querycat = $this->db->select('*')
                          ->where('id_seller', $this->session->userdata('id'))
                          ->get('toko');
		if ($querycat->num_rows() == 1)
                   {} else {
                       redirect('seller/addToko','refresh');
                  }
	}
	public function profile()
	{
		$id = $this->session->userdata('id');
		$id_toko = $this->session->userdata('id_toko');
		$data['content']='cat_profile';
		$data['getToko']= $this->data->getToko($id);
		$data['getMenu']= $this->data->getMenu(md5($id_toko));
		$this->load->view('sellerboard', $data);
		$querycat = $this->db->select('*')
                          ->where('id_seller', $this->session->userdata('id'))
                          ->get('toko');
		if ($querycat->num_rows() == 1)
                   {} else {
                       redirect('seller/addToko','refresh');
                  }
	}
	public function customer()
	{
		$data['content']='cat_costum';
		$data['getCustomer']=$this->data->getCustomer();
		$this->load->view('sellerboard', $data);
		$querycat = $this->db->select('*')
                          ->where('id_seller', $this->session->userdata('id'))
                          ->get('toko');
		if ($querycat->num_rows() == 1)
                   {} else {
                       redirect('seller/addToko','refresh');
                  }
	}
	public function addToko()
	{
		$data['content']='form_toko';
		$this->load->view('sellerboard', $data);
	}
	public function addMenu()
	{
		$data['content']='form_menu';
		$this->load->view('sellerboard', $data);
		$querycat = $this->db->select('*')
                          ->where('id_seller', $this->session->userdata('id'))
                          ->get('toko');
		if ($querycat->num_rows() == 1)
                   {} else {
                       redirect('seller/addToko','refresh');
                  }
	}
	public function konfirmasi($id_pesan)
	{
		$getPesan = $this->data->getPesanan($id_pesan);
		$update = $this->data->orderConfirm($id_pesan);
		if ($update) {
			echo "<h1> Sending to ".$getPesan->email_pesan."</h1><h4> please wait... </h4>";
			redirect('email/orderConfirm/'.$id_pesan,'refresh');
			return TRUE;
		} else {
			echo "gagal";
			return FALSE;
		}
	}
	public function cancel($id_pesan)
	{
		$getPesan = $this->data->getPesanan($id_pesan);
		$update = $this->data->orderCancel($id_pesan);
		if ($update) {
			echo "<h1> Sending to ".$getPesan->email_pesan."</h1><h4> please wait... </h4>";
			redirect('email/orderCancel/'.$id_pesan,'refresh');
			return TRUE;
		} else {
			echo "gagal";
			return FALSE;
		}
	}
	public function delete($id_pesan)
	{
		$update = $this->data->orderDelete($id_pesan);
		if ($update) {
			echo "success";
			redirect('seller/customer','refresh');
			return TRUE;
		} else {
			echo "gagal";
			return FALSE;
		}
	}
}

/* End of file seller.php */
/* Location: ./application/controllers/seller.php */