<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class Member extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        //jk tidak ada tiket bioskop,maka suruh login
        if(!$this->session->userdata('id_admin')) {
            redirect('/','refresh');
        }
    }

    public function index()
    {

        //panggil model Mmember dan fungsi tampil

        $this->load->model('Mmember');
        $data['member'] = $this->Mmember->tampil();
    

        $this->load->view('header');
        $this->load->view('member_tampil',$data);
        $this->load->view('footer');
    }

    function detail($id_member){

        $this->load->model('Mmember');
        $data['member'] = $this->Mmember->detail($id_member);

        $this->load->model('Mtransaksi');
        $data['jual']=$this->Mtransaksi->transaksi_member_jual($id_member);
        $data['beli']=$this->Mtransaksi->transaksi_member_beli($id_member);

        $this->load->view('header');
        $this->load->view('member_detail',$data);
        $this->load->view('footer');
    }
}



?>