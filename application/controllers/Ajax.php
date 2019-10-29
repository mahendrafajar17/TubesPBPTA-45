<?php
class Ajax extends CI_Controller{

    public function pegawai($parameter){
        $this->check_login();
        $result = array();
        if($parameter == "data"){
            $result = $this->Pegawai_model->tampilkanSemuaPegawai()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_pegawai = $this->input->post("id_pegawai");
                $this->Pegawai_model->hapusPegawai($id_pegawai);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function kategori($parameter){
        $this->check_login();
        $result = array();
        if($parameter == "data"){
            $result = $this->Kategori_model->tampilkanSemuaKategori()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_kategori = $this->input->post("id_kategori");
                $this->Kategori_model->hapusKategori($id_kategori);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function sub_kategori($parameter){
        $this->check_login();
        $result = array();
        if($parameter == "data"){
            $result = $this->Sub_kategori_model->tampilkanSemuaSubKategori()->result();
        }else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_sub_kategori = $this->input->post("id_sub_kategori");
                $this->Sub_kategori_model->hapusSubKategori($id_sub_kategori);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function produk($parameter){
        $this->check_login();
        $result = array();
        if($parameter == "data"){
            $result = $this->Produk_model->tampilkanSemuaProduk()->result();
        } else if($parameter == "hapus"){
            if($this->input->method() == "post"){
                $id_produk = $this->input->post("id_produk");
                $this->Produk_model->hapusProduk($id_produk);
                if($this->db->affected_rows()) $result["status"] = "success";
                else $result["status"] = "error";
            }
        }
        echo json_encode($result);
    }

    public function check_login(){
        if(!$this->session->userdata("login")) redirect(base_url("admin"));
    }
}