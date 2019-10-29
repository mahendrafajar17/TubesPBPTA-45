<?php
class Admin extends CI_Controller{

    public function index(){
        if($this->session->userdata("login")) redirect(base_url("admin/dashboard"));
        else{
            $data = array();
            if($this->input->method() == "post"){
                $username = $this->input->post("username");
                $password = md5($this->input->post("password"));
                if($this->Pegawai_model->login($username, $password)) redirect(base_url("admin/dashboard"));
                else $data["message"] = "Username atau password salah";
            }
            $this->load->view("login", $data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url("admin"));
    }

    public function dashboard(){
        $this->check_login();
        $data["result"] = $this->Produk_model->grafik();
        $data["title"] = "Dashboard";
        $data["js"] = "admin/dashboard_js";
        $this->load->view("admin/header", $data);
        $this->load->view("admin/dashboard", $data);
        $this->load->view("admin/footer");
    }

    public function pegawai($id_pegawai = NULL){
        $this->check_login();
        $data = array();      
        if($id_pegawai) $data["result"] = $this->Pegawai_model->pegawai($id_pegawai);
        if($this->input->method() == "post"){
            $username = $this->input->post("username");
            $nama_lengkap = $this->input->post("nama_lengkap");
            $email = $this->input->post("email");
            $password = md5($this->input->post("password"));
            $level = $this->input->post("level");

            if($this->input->post("submit") == "tambah"){
                if($this->Pegawai_model->tambahPegawai($username, $nama_lengkap, $email, $password, $level)) $data["success"] = "Pegawai berhasil ditambahkan";
                else $data["error"] = "Pegawai gagal ditambahkan";
            }else{
                if($this->Pegawai_model->editPegawai($id_pegawai, $username, $nama_lengkap, $email, $password, $level)) {
                    $data["success"] = "Pegawai berhasil diedit";
                }
                else $data["error"] = "Pegawai gagal diedit";
                $data["result"] = NULL;
            }
        }
        $data["title"] = "Pegawai";
        $data["js"] = "admin/pegawai_js";
        $this->load->view("admin/header", $data);
        $this->load->view("admin/pegawai", $data);
        $this->load->view("admin/pegawai_modal");
        $this->load->view("admin/footer", $data);
    }

    public function kategori($id_kategori = NULL){
        $this->check_login();
        $data = array();      
        if($id_kategori) $data["result"] = $this->Kategori_model->kategori($id_kategori);
        if($this->input->method() == "post"){
            $nama= $this->input->post("nama");
            if($this->input->post("submit") == "tambah"){
                if($this->Kategori_model->tambahKategori($nama)) $data["success"] = "Kategori berhasil ditambahkan";
                else $data["error"] = "Kategori gagal ditambahkan";
            }else{
                if($this->Kategori_model->editKategori($id_kategori, $nama)) {
                    $data["success"] = "Pegawai berhasil diedit";
                    $data["result"] = NULL;
                }
                else $data["error"] = "Pegawai gagal diedit";
                $data["result"] = NULL;
            }
        }
        $data["title"] = "Kategori";
        $data["js"] = "admin/kategori_js";
        $this->load->view("admin/header", $data);
        $this->load->view("admin/kategori", $data);
        $this->load->view("admin/kategori_modal");
        $this->load->view("admin/footer", $data);
    }

    public function sub_kategori($id_sub_kategori = NULL){
        $this->check_login();
        $data = array();
        if($id_sub_kategori)$data["result"] = $this->Sub_kategori_model->sub_kategori($id_sub_kategori);
        if($this->input->method() == "post"){
            $nama = $this->input->post("nama");
            if($this->input->post("submit") == "tambah"){
                if($this->Sub_kategori_model->tambahSubKategori($nama)) $data["success"] = "Sub kategori berhasil ditambahkan";
                else $data["error"] = "Sub kategori gagal ditambahkan";
            }else{
                if($this->Sub_kategori_model->editSubKategori($id_sub_kategori, $nama)) $data["success"] = "Sub kategori berhasil diedit";
                else $data["error"] = "Sub kategori gagal diedit";
                $data["result"] = NULL;
            }
        }
        $data["title"] = "Sub Kategori";
        $data["js"] = "admin/sub_kategori_js";
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sub_kategori", $data);
        $this->load->view("admin/sub_kategori_modal");
        $this->load->view("admin/footer", $data);
    }

    public function produk($id_produk = NULL){
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $data = array();     
        if($id_produk) $data["result"] = $this->Produk_model->produk($id_produk);
        if($this->input->method() == "post"){
            $nama = $this->input->post("nama");
            $deskripsi = $this->input->post("deskripsi");
            $id_kategori = $this->input->post("id_kategori");
            $id_sub_kategori = $this->input->post("id_sub_kategori");
            $id_pegawai = $this->session->userdata("id_pegawai");
            $last_update = Date("Y-m-d h:i:s", now("+7"));
            $filename = $this->Produk_model->autoIncrementId();

            if($this->input->post("submit") == "tambah"){
                if($this->do_upload($filename)) {
                    $filename = $filename . $this->upload->data("file_ext");
                    if($this->Produk_model->tambahProduk($nama, $deskripsi, $id_kategori, $id_sub_kategori, $filename, $id_pegawai, $last_update)) $data["success"] = "produk berhasil ditambahkan";
                    else $data["error"] = "produk gagal ditambahkan";
                }else $data["error"] = $this->upload->display_errors();
            }else{
                if(file_exists($_FILES["file_gambar"]["tmp_name"])) if(!$this->do_upload($id_produk)) $data["error"] = $this->upload->display_errors();
                if($this->Produk_model->editProduk($id_produk, $nama, $deskripsi, $id_kategori, $id_sub_kategori, $last_update)) $data["success"] = "produk berhasil diedit";
                else $data["error"] = "produk gagal diedit";
                $data["result"] = NULL;
            }
        }
        $data["title"] = "Produk";
        $data["js"] = "admin/produk_js";
        $data["kategori"] = $this->Kategori_model->tampilkanSemuaKategori();
        $data["sub_kategori"] = $this->Sub_kategori_model->tampilkanSemuaSubKategori();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/produk", $data);
        $this->load->view("admin/produk_modal");
        $this->load->view("admin/footer", $data);
    }

    public function rekap_produk(){
        $data["title"] = "Rekap Produk";
        $data["kategori"] = $this->Kategori_model->tampilkanSemuaKategori();
        $data["sub_kategori"] = $this->Sub_kategori_model->tampilkanSemuaSubKategori();
        $data["result"] = $this->Produk_model->rekapProduk();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/rekap_produk", $data);
        $this->load->view("admin/footer", $data);
    }

    public function settings(){
        if($this->input->method() == "post"){
            $id_pegawai = $this->session->userdata("id_pegawai");
            $password = md5($this->input->post("password"));
            if($this->Pegawai_model->gantiPassword($id_pegawai, $password)) $data["success"] = "Password berhasil diganti";
            else $data["error"] = "Password gagal diganti";
        }
        $data["title"] = "Settings";
        $this->load->view("admin/header", $data);
        $this->load->view("admin/settings", $data);
        $this->load->view("admin/footer", $data);
    }

    public function do_upload($filename){
            $config['file_name'] = $filename;
            $config['upload_path'] = "./img/produk/";
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size'] = 3072;
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);
            if ($this->upload->do_upload("file_gambar")) return true;
            else return false;
    }
    public function check_login(){
        if(!$this->session->userdata("login")) redirect(base_url("admin"));
    }
}
?>