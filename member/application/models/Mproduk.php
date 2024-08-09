<?php 
class Mproduk extends CI_Model {
    function tampil(){  
        $q = $this->db->get('produk');
        $d = $q->result_array();

        return $d;

    }
    function tampil_produk_terbaru(){
        $this->db->order_by('id_produk','desc');
        $q= $this->db->get('produk',4,0);
        $d = $q->result_array();

        return $d;
    }
    function produk_member($id_member) {
        $this->db->where('id_member',$id_member);
        $q = $this->db->get('produk');
        $d = $q->result_array();

        return $d;
    }
    function simpan($inputan){
        //urusan foto
        $config['upload_path'] = $this->config->item('assets_produk');
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload',$config);

        $ngupload = $this->upload->do_upload('foto_produk');

        if ($ngupload){
            $inputan['foto_produk'] = $this->upload->data('file_name');
        }


        $inputan['id_member'] = $this->session->userdata('id_member');

        //echo "<pre>";
        //print_r ($inputan);
        //echo "</pre>";
        //exit();

        //query insert ke tabel
        $this->db->insert('produk',$inputan);
    }

    function detail($id_produk){
        //detail produk sesuai id_produk dan id_member yang login
        $this->db->where('id_member',$this->session->userdata('id_member'));
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori','produk.id_kategori = kategori.id_kategori','left');

        $q = $this->db->get('produk');
        $d = $q->row_array();

        return $d;
    }

    function ubah($inputan,$id){
        //urusan foto
        $config['upload_path'] = $this->config->item('assets_produk');
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload',$config);

        $ngupload = $this->upload->do_upload('foto_produk');

        if ($ngupload){
            $inputan['foto_produk'] = $this->upload->data('file_name');
        }


        $inputan['id_member'] = $this->session->userdata('id_member');

        //echo "<pre>";
        //print_r ($inputan);
        //echo "</pre>";
        //exit();

        //query update

        //ubah produk sesuai id_produk dan id_member yang login
        $this->db->where('id_member',$this->session->userdata('id_member'));
        $this->db->where('id_produk',$id);
        $this->db->update('produk',$inputan);
    }

    function hapus($id_produk){
        //hapus produk sesuai id_produk dan id_member yang login
        $this->db->where('id_member', $this->session->userdata('id_member'));
        $this->db->where('id_produk',$id_produk);
        $this->db->delete('produk');

    }
    function detail_umum($id_produk){
        //detail produk sesuai id_produk dan id_member yang login
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori','produk.id_kategori = kategori.id_kategori','left');

        $q = $this->db->get('produk');
        $d = $q->row_array();

        return $d;
    }
}
?>