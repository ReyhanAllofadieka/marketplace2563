<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Transaksi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        //jk tidak ada tiket bioskop,maka suruh login
        if(!$this->session->userdata('id_member')) {
            redirect('/','refresh');
        }
    }
    public function index(){

    //dapatkan id member yang login
      $id_member = $this->session->userdata("id_member");

    //panggil model Mtransaksi dan fungsi transaksi_member_beli(id_member yang login)
    $this->load->model('Mtransaksi');
    $data['transaksi'] = $this->Mtransaksi->transaksi_member_beli($id_member);


     $this->load->view('header');
     $this->load->view('transaksi_tampil',$data);
     $this->load->view('footer');
    }

    function detail($id_transaksi){


        //panggil model transaksi
        $this->load->model('Mtransaksi');
        //panggil fungsi detail()
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);
        if ($data["transaksi"]["id_member_beli"]!==$this->session->userdata("id_member")) {
            $this->session->Set_flashdata('pesan_gagal','tidak valid');
            redirect('transaksi','refresh');

    }

        //panggil fungsi transaksi detail
        $data["transaksi_detail"] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        $snapToken = "";
        $data["cekmidtrans"] = array();
        if ($data['transaksi']['status_transaksi']=="pesan"){

    

        include 'midtrans-php/Midtrans.php'; 
        \Midtrans\Config::$serverKey = 'SB-Mid-server-g3tGyECXbkhHIEV9MxTh6eFW';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $params['transaction_details']['order_id'] = $data['transaksi']['kode_transaksi'];
        $params['transaction_details']['gross_amount'] = $data['transaksi']['total_transaksi'];
        
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (Exception $e){

        }
        $data['snapToken'] = $snapToken;

        
        //cek ke midtrans transaksi sudah masuk/belum/dibayar/belum
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/".$data["transaksi"]["kode_transaksi"]."/status",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json","authorization: Basic U0ItTWlkLXNlcnZlci1nM3RHeUVDWGJraEhJRVY5TXhUaDZlRlc6YW1pa29t"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //echo $response;
        $responsi = json_decode($response,TRUE);
       
        if (isset($responsi['status_code']) && in_array($responsi['status_code'],[200,201]) ) {
            $data['cekmidtrans'] = $responsi;

            if ($responsi['transaction_status']=="settlement"){
                $this->Mtransaksi->set_lunas($id_transaksi);
                redirect("transaksi/detail/".$id_transaksi,'refresh');
            }
        }
        }
    }

        if ($this->input->post()){
           $this->Mtransaksi->kirim_rating($this->input->post());
           $this->session->set_flashdata('pesan_sukses','Ulasan telah terkirim');
           redirect('transaksi/detail/'.$id_transaksi,'refresh');
        }

        //panggil fungsi detail_transaksi()
        $this->load->view('header');
        $this->load->view('transaksi_detail',$data);
        $this->load->view('footer');
    }
}

?>