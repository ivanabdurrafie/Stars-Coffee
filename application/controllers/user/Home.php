<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/home_model', 'home');
        $this->load->model('user/trans_model', 'hometrans');
        $this->load->model('admin/produk_model', 'produk');
        $this->load->model('admin/kategori_model', 'kategori');
        $this->load->model('admin/user_model', 'user');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Stars Coffee | Dashboard';
        $data['bestseller'] = $this->home->getBestSellers();
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/carousel');
        $this->load->view('user/masuk/home', $data);
        $this->load->view('user/template/footer');
    }
    public function katalog()
    {
        $data['title'] = 'Produk';
        $data['produkkopi'] = $this->produk->getProdukKopi();
        $data['produktools'] = $this->produk->getProdukTools();
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/carousel');
        $this->load->view('user/masuk/katalog', $data);
        $this->load->view('user/template/footer');
    }
    public function detail($id)
    {
        $data = array(
            'title' => 'Detail Produk',
            'produk' => $this->produk->getProduk($id),
        );

        $this->load->view('user/template/header', $data);
        // $this->load->view('user/template/carousel');
        $this->load->view('user/masuk/detail', $data);
        $this->load->view('user/template/footer');
    }
    public function cart()
    {
        $data = array(
            'title' => 'Keranjang',
            'keranjang' => $this->home->getUserCart(),
        );

        $this->load->view('user/template/header', $data);
        $this->load->view('user/masuk/cart');
        $this->load->view('user/template/footer');
    }
    public function addToCart()
    {
        $this->home->addToCart();
        redirect('user/home/katalog');
    }

    public function plusQuantity()
    {
        $this->home->tambahQty();
        redirect('user/home/cart');
    }

    public function minusQuantity()
    {
        $this->home->kurangQty();
        redirect('user/home/cart');
    }

    public function delProduct()
    {
        $this->home->hapusProduk();
        redirect('user/home/cart');
    }

    public function confirm()
    {
        $this->hometrans->insertTransDetail();
        redirect('user/home/mytrans');
    }

    public function mytrans()
    {
        $data = array(
            'title' => 'Transaksiku',
            'kumpulanTransaksi' => $this->hometrans->getUserTrans(),
            'user' => $this->user->showUser($this->session->userdata('username')),
        );

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/carousel');
        $this->load->view('user/masuk/mytrans');
        $this->load->view('user/template/footer');
    }

    public function receipt()
    {
        $data = array(
            'title' => 'Konfirmasi Pesanan',
        );

        $this->load->view('user/template/header', $data);
        $this->load->view('user/masuk/receipt');
        $this->load->view('user/template/footer');
    }

    public function pay()
    {
        $cek = $this->hometrans->upload();
        if ($cek['result'] == 'success') {
            $this->hometrans->uploadReceipt($cek);
            redirect('user/home/mytrans');
        } else {
            echo $cek['error'];
        }
    }
}

/* End of file Home.php */
