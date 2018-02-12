<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
	}
	public function index()
	{
		if ($this->session->userdata('admin') == TRUE){
            redirect('admin');
        } else if ($this->session->userdata('seller') == TRUE)
        {
            redirect('seller');
        } else if ($this->session->userdata('user') == TRUE)
        {
            redirect('home');
        } else {
            $data['judul']='Login';
			$this->load->view('login', $data);
		}
	}

	public function act_login(){
        $this->data->validasi();
                if($this->data->cek_user()){
                    if ($this->session->userdata('admin') == TRUE)
                    {
                    	redirect('admin');
                        return true;
                    } else if ($this->session->userdata('seller') == TRUE)
                    {
                    	redirect('seller');
                        return TRUE;
                    } else if ($this->session->userdata('user') == TRUE)
                    {
                    	redirect('home');
                        return true;
                    } else {
                    	return false;
                    }
        } else {
            redirect('login');
            return false;
        }
    }

    public function Seller($username,$password)
    {
        $queryseller = $this->db->select('*')
                          ->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('seller');
                          
        $rowseller = $queryseller->row();
        if ($queryseller->num_rows() == 1)
        {
            $data = array(  'username'      => $rowseller->username, 
                            'seller'        => TRUE,
                            'nama'          => $rowseller->nama_seller,
                            'id'            => $rowseller->id_seller,
                            'role'          => $rowseller->role,
                            'alamat'        => $rowseller->alamat,
                            'kota'          => $rowseller->kota,
                            'email'         => $rowseller->email,
                            'no_telp'       => $rowseller->no_telepon);

            $this->session->set_userdata($data);
            if ($this->session->userdata('seller') == TRUE)
                    {
                        redirect('seller/customer');
                        return true;
                    } else {
                        return false;
                    }
            return true;
            $this->db->close();
        } else {
            return false;
        }
    }

    public function admin($username,$password)
    {
        $queryadmin = $this->db->select('*')
                          ->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('admin');
                          
        $rowadmin = $queryadmin->row();
        if ($queryadmin->num_rows() == 1)
        {
            $data = array(  'username'      => $rowadmin->username, 
                            'admin'         => TRUE,
                            'nama'          => $rowadmin->nama,
                            'id'            => $rowadmin->id,
                            'role'          => $rowadmin->role);

            $this->session->set_userdata($data);
            if ($this->session->userdata('admin') == TRUE)
                    {
                        redirect('admin/sellerTable');
                        return true;
                    } else {
                        return false;
                    }
            return true;
            $this->db->close();
        } 
    }

    public function logout(){
        $this->data->logout();
		redirect('');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */