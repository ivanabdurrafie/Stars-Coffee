<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/transaksi_model', 'transaksi');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function sukses()
    {
        $data['title'] = 'Transaksi Sukses';
        $data['transaksisukses'] = $this->transaksi->getTransaksiSukses();
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/transaksi/indexsukses', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function pending()
    {
        $data['title'] = 'Transaksi Pending';
        $data['transaksipending'] = $this->transaksi->getTransaksiPending();
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/transaksi/indexpending', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function detailSukses($id)
    {
        $data['title'] = 'Detail Transaksi Sukses';
        $data['transaksi'] = $this->transaksi->detailSukses($id);
        $data['user'] = $this->transaksi->getTransaksiUser($id);
        $data['pengiriman'] = $this->transaksi->getPengiriman($id);
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/transaksi/detailsukses', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function detailPending($id)
    {
        $data['title'] = 'Detail Transaksi Pending';
        $data['transaksi'] = $this->transaksi->detailPending($id);
        $data['user'] = $this->transaksi->getTransaksiUser($id);
        $data['pengiriman'] = $this->transaksi->getPengiriman($id);
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/transaksi/detailpending', $data);
        $this->load->view('template/adm_table_footer');
    }
    public function confirm($id)
    {
        $this->transaksi->terimaOrder($id);
        redirect('admin/transaksi/pending', 'refresh');
    }
}

/* End of file Transaksi.php */
