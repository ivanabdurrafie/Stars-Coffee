<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{

    public function getTransaksiSukses()
    {
        $this->db->select('t.*, l.username');
        $this->db->join('login l', 't.username = l.username');
        $this->db->where('t.status', '0');
        return $this->db->get('transaksi t')->result_array();
    }
    public function getTransaksiPending(){
        $this->db->select('t.*, l.username');
        $this->db->join('login l', 't.username = l.username');
        $this->db->where('t.status', '2');
        return $this->db->get('transaksi t')->result_array();
    }
    public function detailSukses($id){
        $this->db->select('td.*,t.tanggal,t.grandtotal,p.nama');
        $this->db->join('transaksi t', 't.id_transaksi = td.id_transaksi');
        $this->db->join('produk p', 'td.id_produk = p.id_produk');
        $this->db->where('td.id_transaksi', $id);
        return $this->db->get('detail_transaksi td')->result_array();
    }
    public function detailPending($id){
        $this->db->select('t.*,l.*,p.*');
        $this->db->join('login l', 't.username = l.username');
        $this->db->join('pengiriman p', 't.id_transaksi = p.id_transaksi');
        $this->db->where('t.id_transaksi', $id);
        $this->db->where('t.status', '2');
        return $this->db->get('transaksi t')->result_array();
    }
    public function getTransaksiUser($id){
        $this->db->select('t.*,l.*');
        $this->db->join('login l', 't.username = l.username');
        $this->db->where('t.id_transaksi', $id);
        return $this->db->get('transaksi t')->result_array();
    }
    public function getPengiriman($id){
        $this->db->select('t.*,p.*');
        $this->db->join('transaksi t', 't.id_transaksi = p.id_transaksi');
        $this->db->where('p.id_transaksi', $id);
        return $this->db->get('pengiriman p')->result_array();
    }
    public function terimaOrder($id){
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', array('status' => '0'));
    }
    public function gettrans()
    {
        $this->db->select('count(id_transaksi) trans');
        $this->db->where('status', '0');
        return $this->db->get('transaksi')->result();
    }
    public function gettransp()
    {
        $this->db->select('count(id_transaksi) trans');
        $this->db->where('status', '2');
        return $this->db->get('transaksi')->result();
    }
}

/* End of file transaksi_model.php */
