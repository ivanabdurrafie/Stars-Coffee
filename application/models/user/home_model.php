<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home_model extends CI_Model
{

    public function getBestSellers()
    {
        $this->db->select('td.id_produk, sum(td.qty) as jml, p.*');
        $this->db->join('produk p', 'td.id_produk = p.id_produk');
        $this->db->group_by('td.id_produk');
        $this->db->limit(4);
        return $this->db->get('detail_transaksi td')->result();
    }

    public function getUserCart()
    {
        $this->db->select('l.*, p.*, qty');
        $this->db->join('login l', 'k.username = l.username');
        $this->db->join('produk p', 'k.id_produk = p.id_produk');
        $this->db->where('k.username', $this->session->userdata('username'));
        return $this->db->get('keranjang k')->result();
    }

    public function addToCart()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'id_produk' => $this->input->post('id_produk'),
            'qty' => 1
        );

        $cek = $this->db->get_where('keranjang', array('username' => $data['username'], 'id_produk' => $data['id_produk']));

        if ($cek->num_rows() > 0) {
            $this->db->set('qty', 'qty+1', FALSE);
            $this->db->where(array('username' => $data['username'], 'id_produk' => $data['id_produk']));
            $this->db->update('keranjang');
        } else {
            $this->db->insert('keranjang', $data);
        }
    }

    public function tambahQty()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'id_produk' => $this->input->post('id_produk'),
        );

        $this->db->set('qty', 'qty+1', FALSE);
        $this->db->where(array('username' => $data['username'], 'id_produk' => $data['id_produk']));
        $this->db->update('keranjang');
    }

    public function kurangQty()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'id_produk' => $this->input->post('id_produk'),
        );

        $this->db->set('qty', 'qty-1', FALSE);
        $this->db->where(array('username' => $data['username'], 'id_produk' => $data['id_produk']));
        $this->db->update('keranjang');
    }

    public function hapusProduk()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'id_produk' => $this->input->post('id_produk'),
        );

        $this->db->where(array('username' => $data['username'], 'id_produk' => $data['id_produk']));
        $this->db->delete('keranjang');
    }
}

/* End of file home_model.php */
