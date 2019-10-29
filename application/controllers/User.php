<?php
class User extends CI_Controller{

    public function index(){
        $data["title"] = "Ta-45";
        $this->load->view("header", $data);
        $this->load->view("home");
        $this->load->view("footer");
    }

    public function produk(){
        if($this->input->method() == "get"){
            $nama = $this->input->get("nama");
            $id_kategori = $this->input->get("id_kategori");
            $id_sub_kategori = $this->input->get("id_sub_kategori");
            $data["result"] = $this->Produk_model->cari($nama, $id_kategori, $id_sub_kategori);
        }
        $data["kategori"] = $this->Kategori_model->tampilkanSemuaKategori();
        $data["sub_kategori"] = $this->Sub_kategori_model->tampilkanSemuaSubKategori();
        $data["title"] = "Ta-45 - Produk";
        $this->load->view("header", $data);
        $this->load->view("produk");
        $this->load->view("footer");
    }

    public function detail($id_produk = NULL){
        $data["result"] = $this->Produk_model->produk($id_produk);
        $data["title"] = "Ta-45 - Detail";
        $this->load->view("header", $data);
        $this->load->view("detail");
        $this->load->view("footer");
    }

    public function tentang_kami(){
        $data["title"] = "Ta-45 - Tentang kami";
        $this->load->view("header", $data);
        $this->load->view("tentang_kami");
        $this->load->view("footer");
    }
}