<?php 

class Mkategori extends CI_Model {
    function tampil(){

        //melakukan query
        $q= $this->db->get("kategori");

        // pecah ke array
        $d= $q->result_array();

        return $d;
        
    }


    function detail($id_kategori){

        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('kategori');
        $d = $q->row_array();

        return $d;

    }

    function produk($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('produk');
        $d = $q->result_array();

        return $d;
    }

 
}?>