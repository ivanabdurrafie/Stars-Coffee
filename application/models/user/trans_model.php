<?php

defined('BASEPATH') or exit('No direct script access allowed');

class trans_model extends CI_Model
{

    public function getIdTransaction()
    {
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        return $this->db->get('transaksi')->result();
    }

    public function getkeranjang()
    {
        return $this->db->get_where('keranjang', array('username' => $this->session->userdata('username')))->result();
    }

    public function insertTransDetail()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'status' => 1,
        );

        $this->db->insert('transaksi', $data);

        foreach ($this->getIdTransaction() as $s) {
            $id_transaksi = $s->id_transaksi;
        }

        $username = $this->session->userdata('username');

        foreach ($this->getkeranjang() as $c) {
            $id_produk = $c->id_produk;
            $qty = $c->qty;

            foreach ($this->db->get_where('produk', array('id_produk' => $id_produk))->result() as $p) {
                $harga = $p->harga;
            }

            $data = array(
                'id_transaksi' => $id_transaksi,
                'id_produk' => $id_produk,
                'harga' => $harga,
                'qty' => $qty,
                'subtotal' => $harga * $qty,
            );

            $this->db->insert('detail_transaksi', $data);

            $querystok = 'update produk set stok = stok - ' . $qty . ' where id_produk = ' . $id_produk;
            $this->db->query($querystok);
        }
        // echo $id_transaksi;die();
        $this->setGrandTotal($id_transaksi);
        $this->delkeranjang($username);
    }

    public function setGrandTotal($id_transaksi)
    {
        $this->db->select('*, SUM(subtotal) as grandtotal');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->group_by('id_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);
        $grandtotal = $this->db->get('detail_transaksi')->result();
        // echo $grandtotal->grandtotal;die();   
        // die();

        foreach ($grandtotal as $g) {
            echo $grandtotal2 = $g->grandtotal;
        }

        $this->db->set('grandtotal', $grandtotal2);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }

    public function delkeranjang($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('keranjang');
    }

    public function getUserTrans()
    {
        return $this->db->get_where('transaksi', array('username' => $this->session->userdata('username')))->result();
    }

    public function uploadReceipt($upload)
    {
        foreach ($this->getIdTransaction() as $s) {
            $id_transaksi = $s->id_transaksi;
        }

        $this->db->set(array(
            'struk' => $upload['file']['file_name'],
            'status' => '2',
        ));
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        foreach ($this->getIdTransaction() as $s) {
            $id_transaksi = $s->id_transaksi;
        }

        $data = array(
            'id_transaksi' => $id_transaksi,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'nomor' => $this->input->post('nomor'),
        );

        $this->db->insert('pengiriman', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './uploads/bukti/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('receipt')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}

/* End of file trans_model.php */
