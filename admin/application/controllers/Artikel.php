<?php 
class Artikel extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        //jk tidak ada tiket bioskop,maka suruh login
        if(!$this->session->userdata('id_admin')) {
            redirect('/','refresh');
        }
    }
    function index() {
  
        
        //panggil model di Martikel

        $this->load->model("Martikel");

        $data["artikel"] = $this->Martikel->tampil();


        // view
        $this->load->view("header"); 
        $this->load->view("artikel_tampil",$data); 
        $this->load->view("footer"); 
    }

    function tambah(){
     

        //mendapatkan  inputan dari formulir pakai $this->input->post()
        $inputan = $this->input->post();

        //form validation judul_artikel wajib diisi
        $this->form_validation->set_rules("judul_artikel","Judul artikel","required");
	

		//atur pesan dalam b.indo
		$this->form_validation->set_message("required","%s wajib diisi");

        //jika ada inputan
        if($this->form_validation->run()==TRUE ) {
            //panggil model Martikel
            $this->load->model('Martikel');
            //jalankan fungsi simpan()
            $this->Martikel->simpan($inputan);

            //pesan dilayar
            $this->session->set_flashdata('pesan_sukses', 'Data artikel tersimpan');

            //redirect ke fitur artikel utk tampil artikel
           
            redirect('artikel','refresh');
        }

        $this->load->view('header');
        $this->load->view('artikel_tambah');
        $this->load->view('footer');
    } 


    function hapus($id_artikel){

        echo $id_artikel;

        //panggil model artikel
        $this->load->model('Martikel');
        
        //jalankan fungsi hapus();

        $this->Martikel->hapus($id_artikel);

        $this->session->set_flashdata('pesan_sukses','artikel telah terhapus');

        //redirect ke artikel untuk tampil data
        redirect('artikel','refresh');


    }

    function edit($id_artikel) {

        
    //tampilkan dulu artikel yang lama
    $this->load->model("Martikel");
    $data['artikel'] = $this->Martikel->detail($id_artikel);
    
    // baruu mikir ubah data

    $inputan = $this->input->post();


        //form validation judul_artikel wajib diisi
        $this->form_validation->set_rules("judul_artikel","Judul artikel","required");
	

		//atur pesan dalam b.indo
		$this->form_validation->set_message("required","%s wajib diisi");


    //jk ada inputan
    if ($this->form_validation->run()==TRUE){
        //jalankan fungsi edit()
        $this->Martikel->edit($inputan, $id_artikel);

        //pesan
        $this->session->set_flashdata('pesan_sukses', 'artikel telah diubah');

        //redirect
        redirect('artikel','edit');
    }

        $this->load->view('header');
        $this->load->view('artikel_edit',$data);
        $this->load->view('footer');
    }



}
?>