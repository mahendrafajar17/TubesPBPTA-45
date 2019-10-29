<?php
class Kategori_model extends CI_Model{

    public function login($username, $password){
        $result = $this->db->get_where("pegawai", "username='{$username}' and password='{$password}'");
        if($result->num_rows() == 1) {
            $this->session->set_userdata(array(
                "login" => true,
                "username" => $username,
                "level" => $result->row()->level
            ));
            return true;
        }else return false;
    }

    public function tampilkanSemuaKategori(){
        return $this->db->get("kategori");
    }

    public function kategori($id_kategori){
        $result = $this->db->get_where("kategori", "id_kategori='{$id_kategori}'");
        return $result->row();
    }

    public function tambahKategori($nama){
        $this->db->insert("kategori", array(
            "id_kategori" => $this->db->insert_id(),
            "nama" => $nama,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editKategori($id_kategori, $nama){
        $this->db->update("kategori", array(
            "nama" => $nama,
        ), "id_kategori='{$id_kategori}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusKategori($id_kategori){
        $this->db->delete("kategori", array("id_kategori" => $id_kategori));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}