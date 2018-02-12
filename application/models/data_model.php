<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {
	
	
	public function signupseller($nama,$username,$password,$email,$kota,$alamat,$no_telp)
	{
		$data = array('nama_seller' => $nama, 'username' => $username, 'password' => $password, 'email' => $email, 'alamat' => $alamat, 'kota' => $kota, 'no_telepon' => $no_telp, 'role' => 'seller' );

		$simpan=$this->db->insert('seller', $data);
		if($simpan){
			return true;
		} else{
			return false;
		}
	}

  public function getSeller($id_sell)
  {
    return $this->db->where('id_toko', $id_sell)->join('toko', 'toko.id_seller=seller.id_seller')->get('seller')->row();
  }

  public function upload()
  {
    # code...
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']  = '10240';
    $config['remove_space'] = TRUE;
    
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('image')){
      $error = array('error' => $this->upload->display_errors(), 'result' => 'error');
      return $error;
    }
    else{
      $data = array('file' =>$this->upload->data(), 'result' => 'success');
      return $data;
    }

  }
	public function addToko($nama_toko,$address,$description,$foto)
	{
		$data = array('nama_toko' => $nama_toko, 'alamat_toko' => $address, 'deskripsi_toko' => $description, 'status_toko' => 'belum aktif', 'foto_toko' => $foto['file']['file_name'], 'id_seller' => $this->session->userdata['id'] );

		$simpan=$this->db->insert('toko', $data);
		if($simpan){
      redirect('email/newSeller');
			return true;
		} else{
			return false;
		}
	}
  public function getToko($id) 
  {
    $get=$this->db->where('id_seller',$id)->limit(1)->get('toko')->result();
    return $get;
  }
  public function getTokoHome() 
  {
    $get=$this->db->where('status_toko', 'aktif')->limit(8)->get('toko')->result();
    return $get;
  }
  public function getTokoAll() 
  {
    $get=$this->db->where('status_toko', 'aktif')->get('toko')->result();
    return $get;
  }
	public function addMenu($nama_menu, $foto_menu, $status, $harga)
	{
		$data = array('nama_menu' => $nama_menu, 'harga_menu' => $harga, 'foto_menu' => $foto_menu['file']['file_name'], 'status_menu' => $status, 'id_toko' => $this->session->userdata['id_toko'] );

		$simpan=$this->db->insert('menu', $data);
		if($simpan){
			return true;
		} else{
			return false;
		}
	}
	public function editMenu($id,$status)
  {
    $data = array('status_menu' => $status);

    $edit=$this->db->where('id_menu', $id)->update('menu', $data);
    if($edit){
      return true;
    } else{
      return false;
    }
  }
  public function deleteMenu($id)
  {
    $edit=$this->db->where('md5(id_menu)', $id)->delete('menu');
    if($edit){
      return true;
    } else{
      return false;
    }
  }
  public function getTokoinList($id_toko) 
  {
    $get=$this->db->where('md5(id_toko)',$id_toko)->join('seller', 'seller.id_seller = toko.id_seller')->limit(1)->get('toko')->result();
    return $get;
  }
	public function getMenu($id_toko) 
	{
		$get=$this->db->where('md5(id_toko)',$id_toko)->get('menu')->result();
		return $get;
	}
	public function delMenu($id_menu)
	{
		$del=$this->db->where('id_menu',$id_menu)->delete('menu');
	}


	//login
	public function validasi(){
        $this->form_validation->set_rules('username', 'Username','trim|required|strip_tags|xss_clean');
        $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');

        if ($this->form_validation->run()){
            return TRUE;
        } else {
            return FALSE;
        }
    }  

	public function cek_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $queryadmin = $this->db->select('*')
                          ->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('admin');
                          
        $rowadmin = $queryadmin->row();

        $queryseller = $this->db->select('*')
                          ->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('seller');
                          
        $rowseller = $queryseller->row();

        $queryuser = $this->db->select('*')
                          ->where('username', $username)
                          ->where('password', $password)
                          ->limit(1)
                          ->get('user');
                          
        $rowuser = $queryuser->row();

        if ($queryadmin->num_rows() == 1)
        {
            $data = array(	'username' 		=> $rowadmin->username, 
                          	'admin'    		=> TRUE,
                         	'nama'			=> $rowadmin->nama,
                          	'id'   			=> $rowadmin->id,
						  	'role'			=> $rowadmin->role);

            $this->session->set_userdata($data);

            return true;
            $this->db->close();
        } 
        else if ($queryseller->num_rows() == 1)
        {
            $data = array(	'username' 		=> $rowseller->username, 
                          	'seller' 	  	=> TRUE,
                         	'nama'			=> $rowseller->nama_seller,
                          	'id'		   	=> $rowseller->id_seller,
						  	'role'			=> $rowseller->role,
            				'alamat'		=> $rowseller->alamat,
            				'kota'			=> $rowseller->kota,
            				'email'			=> $rowseller->email,
            				'no_telp'		=> $rowseller->no_telepon);

            $this->session->set_userdata($data);
       		
            return true;
            $this->db->close();
        } 
        else if ($queryuser->num_rows() == 1)
        {
            $data = array(	'username' 		=> $rowuser->username, 
                          	'user' 	  		=> TRUE,
                         	'nama'			=> $rowuser->nama_user,
                          	'id'   			=> $rowuser->id_user,
						  	'role'			=> $rowuser->role,
            				'alamat'		=> $rowuser->alamat,
            				'kota'			=> $rowuser->kota,
            				'email'			=> $rowuser->email,
            				'no_telp'		=> $rowuser->no_telepon);
            $this->session->set_userdata($data);

            return true;
            $this->db->close();
        } else {
            return false;
            $this->db->close();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(
        			array(	'username' 		=> '',
        					     'admin'			=> false, 
                          	'seller' 	  	=> false,
                          	'user'			=> false,
                         	'nama'			=> '',
                          	'id'		   	=> '',
						  	'role'			=> '',
            				'alamat'		=> '',
            				'kota'			=> '',
            				'email'			=> '',
            				'no_telp'		=> '',
            				'nama_toko'		=> '',
                         	'id_toko'	   	=> '',
            				'foto_toko'		=> '' ));
        $this->session->sess_destroy();
    }

  //CART
    public function addCart($id_menu,$id_user,$id_toko,$qty,$sub_total)
    {
      $data = array('id_menu' => $id_menu, 'id_user' => $id_user, 'id_toko' => $id_toko, 'qty' => $qty, 'sub_total' => $sub_total);
      $simpan=$this->db->insert('cart', $data);
      if($simpan){
        return true;
      } else{
        return false;
      }
    }
    public function updateCart($id_cart,$id_menu,$id_user,$id_toko,$qty,$sub_total)
    {
      $data = array('id_menu' => $id_menu, 'id_user' => $id_user, 'id_toko' => $id_toko, 'qty' => $qty, 'sub_total' => $sub_total);
      $simpan=$this->db->where('id_cart', $id_cart)->update('cart', $data);
      if($simpan){
        return true;
      } else{
        return false;
      }
    }
    public function deleteCart($id_cart)
    {
      $delete=$this->db->where('md5(id_cart)', $id_cart)->delete('cart');
      if($delete){
        return true;
      } else{
        return false;
      }
    }
    public function getCart($id) 
    {
      $get=$this->db->where('id_user',$id)->join('menu','menu.id_menu=cart.id_menu')->join('toko','toko.id_toko=cart.id_toko')->get('cart')->result();
      return $get;
    }
    public function getTotalCart($id) 
    {
      $get=$this->db->select('nama_toko')->select('sum(qty) as totalqty')->select('sum(sub_total) as total')->where('id_user',$id)->from('cart')->join('menu','menu.id_menu=cart.id_menu')->join('toko','toko.id_toko=cart.id_toko')->get();
      return $get;
    }


  /* USER */
  public function addUser($nama,$username,$password,$email,$kota,$alamat,$no_telp)
  {
    $data = array('nama_user' => $nama, 'username' => $username, 'password' => $password, 'email' => $email, 
    'alamat' => $alamat, 'kota' => $kota, 'no_telepon' => $no_telp, 'role' => 'user' );

    $simpan=$this->db->insert('user', $data);
    if($simpan){
          return true;
    } else{
          return false;
    }
  }

  public function editUser($id_user,$nama,$username,$password,$email,$kota,$alamat,$no_telp)
  {    
    $data = array(
      'nama_user' => $nama, 'username' => $username, 'password' => $password, 'email' => $email, 
      'alamat' => $alamat, 'kota' => $kota, 'no_telepon' => $no_telp, 'role' => 'user'
    );
    
    $this->db->where('id_user', $id_user)->update('user', $data);
    $this->session->set_userdata($data);
  }


  /* ADMIN */
  public function adminVIew()
  {
    return $this->db->get('admin');
  }

  public function viewUser()
  {
    $ambil = $this->db->get('user')->result();
    return $ambil;
  }

  public function viewToko($id_toko)
  {
    $ambilToko = $this->db->get('toko');
    return $ambilToko;
  }

  public function delete($id_user){
    $this->db->where('id_user', $id_user);
    $this->db->delete('user');
  }

  public function viewSeller()
  {
    $ambil = $this->db->join('toko', 'toko.id_seller=seller.id_seller')->get('seller')->result();
    return $ambil;
  }

  public function viewAllSeller()
  {
    $ambil = $this->db->get('seller')->result();
    return $ambil;
  }

  public function deleteSeller($id_seller){
    $this->db->where('id_seller', $id_seller)->delete('seller');
  }

  public function validasiSeller($id_toko)
  {
   $data = array(
      'status_toko' => 'aktif'
    );
    
    $this->db->where('md5(id_toko)', $id_toko)->update('toko', $data);
  }
  public function addPesanan($id_pesan,$nama_pesan,$email_pesan,$alamat_pesan,$telepon_pesan,$tgl_pesan,$tgl_kirim,$rincian_pesan,$jumlah_pesan,$total_bayar,$catatan)
  {
    $data = array('id_pesan' => $id_pesan,'nama_pesan' => $nama_pesan, 'email_pesan' => $email_pesan, 'alamat_pesan' => $alamat_pesan, 'telepon_pesan' => $telepon_pesan, 'tgl_pesan' => $tgl_pesan, 'tgl_kirim' => $tgl_kirim, 'rincian_pesan' => $rincian_pesan, 'jumlah_pesan' => $jumlah_pesan, 'total_harga_pesan' => $total_bayar, 'catatan' => $catatan );
    $simpan=$this->db->insert('pesan', $data);
      if($simpan){
         $this->session->set_userdata('id_pesan', $id_pesan);
        return true;
      } else{
        return false;
      }
  }

  public function getPesanan($id_pesan)
  {
    return $this->db->where('id_pesan', $id_pesan)->get('pesan')->row();
  }

  public function addTransaksi($id_user,$id_seller,$id_pesan,$bayar,$status)
  {
    $data = array('id_user' => $id_user, 'id_seller' => $id_seller, 'id_pesan' => $id_pesan, 'bayar' => $bayar, 'status_transaksi' => $status);
    $add=$this->db->insert('transaksi', $data);
    if ($add) {
      $this->db->where('id_user', $id_user)->delete('cart');
      return true;
    }
    else {
      return false;
    }
  }

  public function getTransaksi()
  {
    $getTrans= $this->db->where('id_pesan', $this->session->userdata('id_pesan'))->join('seller', 'seller.id_seller=transaksi.id_seller')->join('pesan', 'pesan.id_pesan=transaksi.id_pesan')->get('transaksi');
    $rowTrans = $getTrans->row();
    return $rowTrans;
  }

  public function getCustomer()
  {
    $getTrans= $this->db->where('id_seller', $this->session->userdata('id'))->join('pesan', 'pesan.id_pesan=transaksi.id_pesan')->order_by('tgl_pesan', 'desc')->get('transaksi');
    
    return $getTrans->result();
  }
  public function orderConfirm($id_pesan)
  {
   $data = array(
      'status_transaksi' => 'Terkonfirmasi'
    );
    
    if($this->db->where('id_pesan', $id_pesan)->update('transaksi', $data)){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function orderCancel($id_pesan)
  {
   $data = array(
      'status_transaksi' => 'Tertolak'
    );
    
    if($this->db->where('id_pesan', $id_pesan)->update('transaksi', $data)){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function orderDelete($id_pesan)
  {
    
    if($this->db->where('id_pesan', $id_pesan)->delete('transaksi')){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  // Konversi angka ke uang
  public function rp($angka){
    $angka = number_format($angka); $angka = str_replace(',', '.', $angka); 
    $angka ="$angka"; 
    return $angka;
  }

  public function sendEmail($from,$name,$to,$subject,$message)
  {
    $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'adm.caton@gmail.com', 
    'smtp_pass' => 'caton2018',
    'mailtype' => 'html',
    'newline' => "\r\n",
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
  );
  $this->load->library('email', $config);
  
  $this->email->from($from, $name);
  $this->email->to($to);
  
  $this->email->subject($subject);
  $this->email->message($message);
  
  if($this->email->send()){
    return true;
  } else {
    return false;
  }
  echo $this->email->print_debugger();
  }

  public function newUser($email)
  {
    $from='adm.caton@gmail.com';
    $name='Admin Cat-On';
    $to= $email; // Change it to admin email who operation it
    $subject= 'Welcome User';
    $message= '<h1 style="text-align:center;">Thanks for Join Us</h1>';
    $send=$this->sendEmail($from,$name,$to,$subject,$message);
    if ($send) {
      return TRUE;
    } else {
      echo "gagal";
      return false;
    }
  }

  public function newSeller($email)
  {
    $from='adm.caton@gmail.com';
    $name='Admin Cat-On';
    $to= $email; // Change it to admin email who operation it
    $subject= 'Welcome Seller';
    $message= '<h1 style="text-align:center;">Thanks for Join Us</h1><h2 style="text-align:center;">Complete your Data</h2>';
    $send=$this->sendEmail($from,$name,$to,$subject,$message);
    if ($send) {
      return TRUE;
    } else {
      echo "gagal";
      return false;
    }
  }
}



/* End of file data_model.php */
/* Location: ./application/models/data_model.php */