<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	
		//jika ada inputan
		$inputan = $this->input->post();


		//form validation username dan password wajib diisi sesuai kotak bolong

		$this->form_validation->set_rules("email_member","Email","required");
		$this->form_validation->set_rules("password_member","Password","required");

		//atur pesan dalam b.indo
		$this->form_validation->set_message("required","%s wajib diisi");

		//pakai validasinya
		if( $this->form_validation->run()==TRUE ) {
			$this->load->model('Mmember');
			$output = $this->Mmember->login($inputan);

			if ($output=="ada") {

				$this->session->set_flashdata('pesan_sukses','Berhasil Login');
				redirect('home','refresh');
			} else {
				$this->session->set_flashdata('pesan_gagal','gagal login');
				redirect('/','refresh');
			}
		}

		//pertama panggil dulu modelnya 
		$this->load->model('Mslider');
		$this->load->model('Mkategori');
		$this->load->model('Mproduk');
		$this->load->model('Martikel');
		// kdeua kemudian panggil fungsinya
		$data['slider'] = $this->Mslider->tampil();
		$data['kategori'] = $this->Mkategori->tampil();
		$data['produk'] = $this->Mproduk ->tampil_produk_terbaru();
		$data['artikel'] = $this->Martikel ->tampil_artikel_terbaru();


		$this->load->view('header');
		$this->load->view('welcome',$data);
		$this->load->view('footer');
	}
}
