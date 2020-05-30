<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/produk_model', 'produk');
        $this->load->model('admin/kategori_model', 'kategori');
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Produk';
        $data['produk'] = $this->produk->getAllProduk();
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/produk/index', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function detail($id_produk)
    {
        $data['title'] = 'Detail Produk';
        $data['produk'] = $this->produk->getproduk($id_produk);
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/produk/detail', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function add()
    {
        $data['title'] = 'Tambah Produk';
        $data['kategori'] = $this->kategori->getAllKategori();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/produk/add', $data);
            $this->load->view('template/adm_footer_form');
        } else {
            $upload = $this->produk->upload();
            if ($upload['result'] == 'success') {
                $this->produk->storeProduk($upload);
                $this->session->set_flashdata('flash-data', 'ditambahkan');
                redirect('admin/produk');
            } else {
                echo $upload['error'];
            }
        }
    }
    public function delete($id)
    {
        $this->produk->deleteProduk($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('admin/produk');
    }
    public function update($id)
    {
        $data['title'] = 'Edit Produk';
        $data['kategori'] = $this->kategori->getAllKategori();
        $data['produk'] = $this->produk->getProduk($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/produk/update');
            $this->load->view('template/adm_footer_form');
        } else {
            $upload = $this->produk->upload();
            if ($upload['result'] == 'success') {
                $this->produk->editProduk($upload, $id);
                $this->session->set_flashdata('flash-data', 'diupdate');
                redirect('admin/produk');
            } else {
                echo $upload['error'];
            }
        }
    }
}

/* End of file Produk.php */
