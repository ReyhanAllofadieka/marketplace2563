<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        //jk tidak ada tiket bioskop,maka suruh login
        if(!$this->session->userdata('id_admin')) {
            redirect('/','refresh');
        }
    }
    public function index(){
    //panggil model Mtransaksi dan fungsi tampil
    $this->load->model('Mtransaksi');
    $data['transaksi'] = $this->Mtransaksi->tampil();


     $this->load->view('header');
     $this->load->view('transaksi_tampil',$data);
     $this->load->view('footer');
    }

    function detail($id_transaksi){


        //panggil model transaksi
$this->load->model('Mtransaksi');
        //panggil fungsi detail()
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

        //panggil fungsi transaksi detail
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        //panggil fungsi detail_transaksi()
        $this->load->view('header');
        $this->load->view('transaksi_detail',$data);
        $this->load->view('footer');
    }
}

?>