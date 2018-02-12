<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('data_model', 'data', TRUE);
		
	}
	public function index()
	{
		$detTrans=$this->data->getTransaksi();
		$from=$
		$this->data->sendEmail($from,$name,$to,$message);
	}
	public function newSeller()
	{
		$from='adm.caton@gmail.com';
		$name='Admin Cat-On';
		$to= 'adm.caton@gmail.com'; // Change it to admin email who operation it
		$subject= 'New Seller Register';
		$message= '<h2>New Seller want to be approved<h2><a href="'.base_url().'login/admin/admin/admin"><h4> Open to Approve </h4></a>';
		$send=$this->data->sendEmail($from,$name,$to,$subject,$message);
		if ($send) {
			redirect('seller/addMenu');
			return TRUE;
		} else {
			echo "gagal";
			return false;
		}
	}
	
	public function userOrder()
	{
		//getData
		$id_pesan = $this->session->userdata('id_pesan');
		$getPesan = $this->data->getPesanan($id_pesan);
		$rincianpesan=json_decode($getPesan->rincian_pesan);
		$getSeller= $this->data->getSeller($rincianpesan[0]->id_toko);
		$a = 0;
		foreach ($rincianpesan as $rc) {
		@$listOrder .= '<tr>
							<td style="border-top: 1px solid #57cd9a; padding:5px; text-align:center;">'.$rincianpesan[$a]->nama_menu.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->harga_menu).'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">'.$rincianpesan[$a]->qty.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->sub_total).'</td>
						</tr>'; 
			$a++;
		}
		$tableOrder= "<table cellspacing='0' cellpadding='0' style='width: 100%; max-width: 100%; margin-bottom: 20px; border: 1px solid #57cd9a;border-top: 0;'>
						<tr>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;'><h4>Makanan</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Harga</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Kuantitas</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Total</h4></th>
						</tr>".$listOrder."<tr><td colspan='2' style='border-top: 1px solid #57cd9a;padding:5px; text-align:center;'>Total</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>".$getPesan->jumlah_pesan."</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>Rp ".$this->data->rp($getPesan->total_harga_pesan)."</td></tr></table>"; 
		//emailSend
		$from= $getPesan->email_pesan;
		$name= $getPesan->nama_pesan;
		$to= $getSeller->email;
		$subject= 'User Order';
		$message= '<h3>'.$name.' akan memesan makanan yang ingin dikirim pada tanggal '.$getPesan->tgl_kirim.' dengan rincian sebagai berikut </h3>'.$tableOrder.' <a href="'.base_url().'login/Seller/'.$getSeller->username.'/'.$getSeller->password.'"><h4> Buka akun anda untuk konfirmasi transaksi </h4></a>';
		$send=$this->data->sendEmail($from,$name,$to,$subject,$message);
		if ($send) {
			echo "<h1> Sending to ".$getSeller->email."</h1><h4> please wait... </h4>";
			redirect('','refresh');
			return TRUE;
		} else {
			echo "gagal";
			return false;
		}
	}

	public function orderConfirm($id_pesan)
	{
		//getData
		$getPesan = $this->data->getPesanan($id_pesan);
		$rincianpesan=json_decode($getPesan->rincian_pesan);
		$getSeller= $this->data->getSeller($rincianpesan[0]->id_toko);
		$a = 0;
		foreach ($rincianpesan as $rc) {
		@$listOrder .= '<tr>
							<td style="border-top: 1px solid #57cd9a; padding:5px; text-align:center;">'.$rincianpesan[$a]->nama_menu.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->harga_menu).'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">'.$rincianpesan[$a]->qty.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->sub_total).'</td>
						</tr>'; 
			$a++;
		}
		$tableOrder= "<table cellspacing='0' cellpadding='0' style='width: 100%; max-width: 100%; margin-bottom: 20px; border: 1px solid #57cd9a;border-top: 0;'>
						<tr>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;'><h4>Makanan</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Harga</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Kuantitas</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Total</h4></th>
						</tr>".$listOrder."<tr><td colspan='2' style='border-top: 1px solid #57cd9a;padding:5px; text-align:center;'>Total</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>".$getPesan->jumlah_pesan."</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>Rp ".$this->data->rp($getPesan->total_harga_pesan)."</td></tr></table>"; 
		//emailSend
		$from= $getSeller->email;
		$name= $getSeller->nama_seller." as Seller from ".$getSeller->nama_toko ;
		$to= $getPesan->email_pesan;
		$subject= 'Order Accepted';
		$message= '<h3>Pesanan anda ke '.$getSeller->nama_toko.' yang akan dikirim pada tanggal '.$getPesan->tgl_kirim.' dengan rincian sebagai berikut </h3>'.$tableOrder.' <h2>telah diterima</h2> ';
		$send=$this->data->sendEmail($from,$name,$to,$subject,$message);
		if ($send) {
			redirect('seller/customer','refresh');
			return TRUE;
		} else {
			echo "gagal";
			return false;
		}
	}
	public function orderCancel($id_pesan)
	{
		//getData
		$getPesan = $this->data->getPesanan($id_pesan);
		$rincianpesan=json_decode($getPesan->rincian_pesan);
		$getSeller= $this->data->getSeller($rincianpesan[0]->id_toko);
		$a = 0;
		foreach ($rincianpesan as $rc) {
		@$listOrder .= '<tr>
							<td style="border-top: 1px solid #57cd9a; padding:5px; text-align:center;">'.$rincianpesan[$a]->nama_menu.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->harga_menu).'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">'.$rincianpesan[$a]->qty.'</td>
							<td style="border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;">Rp '.$this->data->rp($rincianpesan[$a]->sub_total).'</td>
						</tr>'; 
			$a++;
		}
		$tableOrder= "<table cellspacing='0' cellpadding='0' style='width: 100%; max-width: 100%; margin-bottom: 20px; border: 1px solid #57cd9a;border-top: 0;'>
						<tr>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;'><h4>Makanan</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Harga</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Kuantitas</h4></th>
							<th style='border-top: 1px solid #57cd9a;border-bottom-width: 2px;border-left: 1px solid #57cd9a;'><h4>Total</h4></th>
						</tr>".$listOrder."<tr><td colspan='2' style='border-top: 1px solid #57cd9a;padding:5px; text-align:center;'>Total</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>".$getPesan->jumlah_pesan."</td><td style='border-top: 1px solid #57cd9a;border-left: 1px solid #57cd9a;padding:5px; text-align:center;'>Rp ".$this->data->rp($getPesan->total_harga_pesan)."</td></tr></table>"; 
		//emailSend
		$from= $getSeller->email;
		$name= $getSeller->nama_seller." as Seller from ".$getSeller->nama_toko ;
		$to= $getPesan->email_pesan;
		$subject= 'Order Rejected';
		$message= '<h3>Pesanan anda ke '.$getSeller->nama_toko.' yang dipesan pada tanggal '.$getPesan->tgl_pesan.' dengan rincian sebagai berikut </h3>'.$tableOrder.' <h2>telah ditolak</h2> ';
		$send=$this->data->sendEmail($from,$name,$to,$subject,$message);
		if ($send) {
			redirect('seller/customer','refresh');
			return TRUE;
		} else {
			echo "gagal";
			return false;
		}
	}
}

/* End of file email.php */
/* Location: ./application/controllers/email.php */