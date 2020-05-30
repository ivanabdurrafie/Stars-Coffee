<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admin/kategori_model', 'kategori');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori->getAllKategori();
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('template/adm_table_footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $data['title'] = 'Form Kategori';
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/kategori/add', $data);
            $this->load->view('template/adm_footer_form');
        } else {
            $this->kategori->addKategori();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('admin/kategori', 'refresh');
        }
    }
    public function delete($id_kategori)
    {
        $this->kategori->delete($id_kategori);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('admin/kategori', 'refresh');
    }
    public function update($id_kategori)
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $data['title'] = 'Update Kategori';
        $data['kategori'] = $this->kategori->getKategoriById($id_kategori);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/kategori/update', $data);
            $this->load->view('template/adm_footer_form');
        } else {
            $this->kategori->update($id_kategori, $data);
            $this->session->set_flashdata('flash-data', 'diupdate');
            redirect('admin/kategori', 'refresh');
        }
    }
}

/* End of file Kategori.php */
