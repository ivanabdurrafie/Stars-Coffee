<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admin/user_model', 'user');
        $this->load->helper('security');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->user->getAllUser();
        $this->load->view('template/adm_header', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('template/adm_table_footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $data['title'] = 'Form User';
        $data['level'] = ['Admin','Customer'];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/user/add', $data);
            $this->load->view('template/adm_footer_form');
        } else {
            $this->user->addUser();
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('admin/user', 'refresh');
        }
    }
    public function delete($username) {
        $this->user->delete($username);
        $this->session->set_flashdata('flash-data','dihapus');
        redirect('admin/user','refresh');
    }
    public function update($username)
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $data['title'] = 'Update User';
        $data['user'] = $this->user->getUserById($username);
        $data['level'] = ['admin','customer'];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/adm_header', $data);
            $this->load->view('admin/user/update', $data);
            $this->load->view('template/adm_footer_form');
        } else {
            $this->user->update($username,$data);
            $this->session->set_flashdata('flash-data','diupdate');
            redirect('admin/user', 'refresh');
        }
    }
}

/* End of file Login.php */
