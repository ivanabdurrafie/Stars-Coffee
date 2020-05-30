<?php

defined('BASEPATH') or exit('No direct script access allowed');

class produk_model extends CI_Model
{

    public function getAllProduk()
    {
        $this->db->select('p.*,k.kategori');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        return $this->db->get('produk p')->result_array();
    }
    public function getProduk($id_produk)
    {
        $this->db->select('p.*,k.kategori');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('produk p')->row_array();
    }
    public function getProdukKopi()
    {
        $this->db->select('p.*,k.kategori');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('p.id_kategori', '1');
        return $this->db->get('produk p')->result_array();
    }
    public function getProdukTools()
    {
        $this->db->select('p.*,k.kategori');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('p.id_kategori', '2');
        return $this->db->get('produk p')->result_array();
    }
    public function getProdukbyid($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    }
    public function getProdukByKategori($id_kategori)
    {
        $this->db->select('p.*,k.kategori');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        return $this->db->get_where('produk p', array('p.id_kategori' => $id_kategori))->result_array();
    }
    public function storeProduk($upload)
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama' => $this->input->post('nama', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'img' => $upload['file']['file_name']
        );
        $this->db->insert('produk', $data);
    }
    public function editProduk($upload, $id_produk)
    {
        $data = array(
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama' => $this->input->post('nama', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'img' => $upload['file']['file_name']
        );
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }
    public function deleteProduk($id_produk)
    {
        $this->_deleteImage($id_produk);
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
    public function upload()
    {
        $config['upload_path'] = './uploads/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    private function _deleteImage($id_produk)
    {
        $product = $this->getProdukbyid($id_produk);
        $filename = $product['img'];
        unlink(FCPATH . "uploads/produk/" . $filename);
    }
    public function getprod()
    {
        $this->db->select('count(id_produk) pro');
        return $this->db->get('produk')->result();
    }
}

/* End of file produk_model.php */
