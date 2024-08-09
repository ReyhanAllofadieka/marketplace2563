<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class Madmin extends CI_Model {
    function login($inputan) {
        $username = $inputan['username'];
        $password = $inputan['password'];
        $password = sha1($password);

        //cek database
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //jika tidak kososng, maka ada
        if (!empty($cekadmin)) {
            //membuat tiket bioskop yang dipakai selama keliling aplikasi
            $this->session->set_userdata('id_admin', $cekadmin["id_admin"]);
            $this->session->set_userdata('username', $cekadmin["username"]);
            $this->session->set_userdata('nama', $cekadmin["nama"]);
            return "ada";
        } else {
            return"gak ada";
        }
    }

    function ubah($inputan,$id_admin) {

        //jika tidak kososng password , maka enkripsi
        if (!empty($inputan["password"])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }
        
        $this->db->where('id_admin',$id_admin);
        $this->db->update('admin',$inputan);

        //karena akun admin telah diubah pada database , maka tiket bioskopnya jg harus membuat baru

        //dapatkan dulu data admin yang baru yang telah diupdate
        
        $this->db->where('id_admin',$id_admin);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //buat tiket lagi
        $this->session->set_userdata("id_admin",$cekadmin["id_admin"]);
        $this->session->set_userdata("username",$cekadmin["username"]);
        $this->session->set_userdata("nama",$cekadmin["nama"]);
    }
}