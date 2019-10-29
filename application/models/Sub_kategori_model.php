<?php
class  Sub_kategori_model extends CI_Model{

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

    public function tampilkanSemuaSubKategori(){
        return $this->db->get("sub_kategori");
    }

    public function sub_kategori($id_sub_kategori){
        $result = $this->db->get_where("sub_kategori", "id_sub_kategori='{$id_sub_kategori}'");
        return $result->row();
    }

    public function tambahSubKategori($nama){
        $this->db->insert("sub_kategori", array(
            "id_sub_kategori" => $this->db->insert_id(),
            "nama" => $nama,
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editSubKategori($id_sub_kategori, $nama){
        $this->db->update("sub_kategori", array(
            "nama" => $nama
        ), "id_sub_kategori='{$id_sub_kategori}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusSubKategori($id_sub_kategori){
        $this->db->delete("sub_kategori", array("id_sub_kategori" => $id_sub_kategori));
        if($this->db->affected_rows()) return true;
        else return false;
    }
}