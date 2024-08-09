<?php 

class Martikel extends CI_Model {
    function tampil(){

        //melakukan query
        $q= $this->db->get("artikel");

        // pecah ke array
        $d= $q->result_array();

        return $d;
        
    }

    function simpan($inputan) {
        //kita urusi dulu upload foto_artikel
        $config['upload_path'] = $this->config->item('assets_artikel');
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload',$config);

        //adegan ngupload foto_artikel
        $ngupload = $this->upload->do_upload("foto_artikel");

        //jika ngupload,maka dapatkan nama fotonya untuuk ditampung ke db
        if ($ngupload) {
            $inputan['foto_artikel'] = $this->upload->data("file_name");
        }

        //query simpan data ke tabel artikel
        //insert info artikel bla bla bla

        $this->db->insert('artikel',$inputan);
    }

    function hapus($id_artikel){

        $this->db->where('id_artikel',$id_artikel);
        $this->db->delete('artikel');
    }

    function detail($id_artikel){

        $this->db->where('id_artikel', $id_artikel);
        $q = $this->db->get('artikel');
        $d = $q->row_array();

        return $d;

    }

    function edit($inputan,$id_artikel){
        // ngurusi foto artikel jika user pengguna upload foto

        $config['upload_path'] = $this->config->item('assets_artikel');
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload',$config);

        //adegan ngupload
        $ngupload = $this->upload->do_upload('foto_artikel');

        //jika ngupload
        if ($ngupload) {
            $inputan['foto_artikel'] = $this->upload->data('file_name');
        }

        //query update data sesuai id_artikel
        $this->db->where('id_artikel',$id_artikel);
        $this->db->update('artikel',$inputan);
   

        
    }

    
}?>