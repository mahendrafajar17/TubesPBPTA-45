<?php
class Pegawai_model extends CI_Model{

    public function login($username, $password){
        $result = $this->db->get_where("pegawai", "username='{$username}' and password='{$password}'");
        if($result->num_rows() == 1) {
            $this->session->set_userdata(array(
                "login" => true,
                "id_pegawai" => $result->row()->id_pegawai,
                "username" => $username,
                "level" => $result->row()->level
            ));
            return true;
        }else return false;
    }

    public function gantiPassword($id_pegawai, $password){
        $this->db->update("pegawai", array("password" => $password), "id_pegawai='{$id_pegawai}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function tampilkanSemuaPegawai(){
        return $this->db->get("pegawai");
    }

    public function pegawai($id_pegawai){
        $result = $this->db->get_where("pegawai", "id_pegawai='{$id_pegawai}'");
        return $result->row();
    }

    public function tambahPegawai($username, $nama_lengkap, $email, $password, $level){
        $this->db->insert("pegawai", array(
            "id_pegawai" => $this->db->insert_id(),
            "username" => $username,
            "nama_lengkap" => $nama_lengkap,
            "email" => $email,
            "password" => $password,
            "level" => $level
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editPegawai($id_pegawai, $username, $nama_lengkap, $email, $password, $level){
        $this->db->update("pegawai", array(
            "username" => $username,
            "nama_lengkap" => $nama_lengkap,
            "email" => $email,
            "password" => $password,
            "level" => $level
        ), "id_pegawai='{$id_pegawai}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusPegawai($id_pegawai){
        $this->db->delete("pegawai", array("id_pegawai" => $id_pegawai));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}