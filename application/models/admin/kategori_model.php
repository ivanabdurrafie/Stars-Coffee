<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {

    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }
    public function addKategori() {
        $data = [
            "kategori" => $this->input->post('kategori',true)
        ];
        $this->db->insert('kategori', $data);
    }
    public function delete($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
    public function update($id_kategori)
    {
        $data = [
            "kategori" => $this->input->post('kategori',true),
        ];
        // var_dump($data);
        // die();
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
    public function getKategoriById($id_kategori)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
    }

}

/* End of file kategori_model.php */

?>