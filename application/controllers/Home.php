<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/home_model', 'home');
        $this->load->model('admin/produk_model', 'produk');
        $this->load->model('admin/kategori_model', 'kategori');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Stars Coffee | Dashboard';
        $data['bestseller'] = $this->home->getBestSellers();
        $this->load->view('user/template/headerlogin', $data);
        $this->load->view('user/template/carousel');
        $this->load->view('user/home', $data);
        $this->load->view('user/template/footer');
    }
    public function katalog()
    {
        $data['title'] = 'Produk';
        $data['produkkopi'] = $this->produk->getProdukKopi();
        $data['produktools'] = $this->produk->getProdukTools();
        $this->load->view('user/template/headerlogin', $data);
        $this->load->view('user/template/carousel');
        $this->load->view('user/katalog', $data);
        $this->load->view('user/template/footer');
    }
    public function detail($id)
    {
        $data = array(
            'title' => 'Detail Produk',
            'produk' => $this->produk->getProduk($id),
        );

        $this->load->view('user/template/headerlogin', $data);
        // $this->load->view('user/template/carousel');
        $this->load->view('user/detail', $data);
        $this->load->view('user/template/footer');
    }
}

/* End of file Home.php */
