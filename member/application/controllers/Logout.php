<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function index()
    {
        //menghancurkan tiket bioskop yang dibuat saat login tadi

        $this->session->unset_userdata('id_member');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_member');
        $this->session->unset_userdata('alamat_member');
        $this->session->unset_userdata('wa_member');
        $this->session->unset_userdata('kode_distrik_member');
        $this->session->unset_userdata('nama_distrik_member');

        //redirect ke halaman lain
        $this->session->set_flashdata('pesan_sukses','Anda telah logout');
        redirect('/',"refresh");
    }
}

?>