<?php 
class Mproduk extends CI_Model {
    function tampil(){  
        $q = $this->db->get('produk');
        $d = $q->result_array();

        return $d;

    }
}
?>