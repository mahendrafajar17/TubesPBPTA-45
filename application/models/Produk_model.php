<?php
class Produk_model extends CI_Model{

    public function login($nama, $id_sub_kategori){
        $result = $this->db->get_where("produk", "nama='{$nama}' and id_sub_kategori='{$id_sub_kategori}'");
        if($result->num_rows() == 1) {
            $this->session->set_userdata(array(
                "login" => true,
                "nama" => $nama,
                "file_gambar" => $result->row()->file_gambar
            ));
            return true;
        }else return false;
    }

    public function tampilkanSemuaProduk(){
        $this->db->select("produk.*, kategori.nama as nama_kategori, 
        sub_kategori.nama as nama_sub_kategori, pegawai.nama_lengkap");
        $this->db->from("produk");
        $this->db->join("kategori", "produk.id_kategori=kategori.id_kategori");
        $this->db->join("sub_kategori", "produk.id_sub_kategori=sub_kategori.id_sub_kategori");
        $this->db->join("pegawai", "produk.id_pegawai=pegawai.id_pegawai");
        return $this->db->get();
    }

    public function produk($id_produk){
        $this->db->select("produk.*, kategori.nama as nama_kategori, sub_kategori.nama as nama_sub_kategori");
        $this->db->from("produk");
        $this->db->join("kategori", "produk.id_kategori=kategori.id_kategori");
        $this->db->join("sub_kategori", "produk.id_sub_kategori=sub_kategori.id_sub_kategori");
        $this->db->where("produk.id_produk='{$id_produk}'");
        $result = $this->db->get();
        return $result->row();
    }

    public function rekapProduk(){
        $this->db->select("produk.*, kategori.nama as nama_kategori, 
        sub_kategori.nama as nama_sub_kategori, pegawai.nama_lengkap");
        $this->db->from("produk");
        $this->db->join("kategori", "produk.id_kategori=kategori.id_kategori");
        $this->db->join("sub_kategori", "produk.id_sub_kategori=sub_kategori.id_sub_kategori");
        $this->db->join("pegawai", "produk.id_pegawai=pegawai.id_pegawai");
        $this->db->order_by("produk.id_kategori, produk.id_sub_kategori", "ASC");
        $produk = $this->db->get();
        $array = array();
        foreach($produk->result() as $row){
            $this->db->select("count(id_kategori) as count");
            $this->db->from("produk");
            $this->db->where("id_kategori='{$row->id_kategori}'");
            $sum_kategori = $this->db->get()->row()->count;

            $this->db->select("count(id_sub_kategori) as count");
            $this->db->from("produk");
            $this->db->where("id_sub_kategori='{$row->id_sub_kategori}'");
            $sum_sub_kategori = $this->db->get()->row()->count;
            
            $array[] = array(
                "count_kategori" => $sum_kategori,
                "count_sub_kategori" => $sum_sub_kategori,
                "nama_kategori" => $row->nama_kategori,
                "nama_sub_kategori" => $row->nama_sub_kategori,
                "nama" => $row->nama
            );
        }
        return $array;
    }
    
    public function grafik(){
        $this->db->select("produk.id_kategori, kategori.nama");
        $this->db->from("produk");
        $this->db->join("kategori", "produk.id_kategori=kategori.id_kategori");
        $this->db->group_by("produk.id_kategori");
        $produk = $this->db->get();
        $array = array();
        foreach($produk->result() as $row){
            $this->db->select("count(id_kategori) as count");
            $this->db->from("produk");
            $this->db->group_by("produk.id_kategori");
            $this->db->where("id_kategori='{$row->id_kategori}'");
            $count = $this->db->get()->row()->count;
            $array[] = array(
                "produk" => $row,
                "count" => $count
            );
        }
        return $array;
    }

    public function cari($nama, $id_kategori, $id_sub_kategori){
        $this->db->select("produk.id_produk, produk.nama, produk.deskripsi, 
        kategori.nama as nama_kategori, sub_kategori.nama as nama_sub_kategori, 
        produk.file_gambar, produk.last_update, pegawai.nama_lengkap");
        $this->db->from("produk");
        $this->db->join("kategori", "produk.id_kategori=kategori.id_kategori");
        $this->db->join("sub_kategori", "produk.id_sub_kategori=sub_kategori.id_sub_kategori");
        $this->db->join("pegawai", "produk.id_pegawai=pegawai.id_pegawai");
        if($nama != "") $this->db->where("produk.nama like '%{$nama}%'");
        if($id_kategori != "") $this->db->where("produk.id_kategori='{$id_kategori}'");
        if($id_sub_kategori != "") $this->db->where("produk.id_sub_kategori='{$id_sub_kategori}'");
        return $this->db->get()->result();
    }

    public function tambahProduk($nama, $deskripsi, $id_kategori, $id_sub_kategori, $filename, $id_pegawai, $last_update){
        $this->db->insert("produk", array(
            "nama" => $nama,
            "deskripsi" => $deskripsi,
            "id_kategori" => $id_kategori,
            "id_sub_kategori" => $id_sub_kategori,
            "file_gambar" => "img/produk/" . $filename,
            "last_update" => $last_update,
            "id_pegawai" => $id_pegawai
        ));    
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function editProduk($id_produk, $nama, $deskripsi, $id_kategori, $id_sub_kategori, $last_update){
        $this->db->update("produk", array(
            "nama" => $nama,
            "deskripsi" => $deskripsi,
            "id_kategori" => $id_kategori,
            "id_sub_kategori" => $id_sub_kategori,
            "last_update" => $last_update,
        ), "id_produk='{$id_produk}'");
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function hapusProduk($id_produk){
        $this->db->delete("produk", array("id_produk" => $id_produk));
        if($this->db->affected_rows()) return true;
        else return false;
    }

    public function autoIncrementId(){
        $this->db->select("AUTO_INCREMENT");
        $this->db->from("information_schema.TABLES");
        $this->db->where("TABLE_SCHEMA='{$this->db->database}'");
        $this->db->where("TABLE_NAME='produk'");
        return $this->db->get()->row()->AUTO_INCREMENT;
    }
}