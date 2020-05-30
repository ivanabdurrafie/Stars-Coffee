<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('admin/user_model', 'user');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'Login',
        );
        $this->load->view('template/hdrlgn', $data);
        $this->load->view('login');
        $this->load->view('template/ftrlgn');
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register', $data);
        } else {
            $this->user->registerUser();
            $this->session->set_flashdata('pesan', 'Akun Berhasil Dibuat Silahkan Login :)');
            redirect('login');
        }
    }

    public function auth()
    {
        $uname = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        // var_dump($uname,$pass);
        // die();
        $cekLogin = $this->login->auth($uname, $pass);

        if ($cekLogin) {
            foreach ($cekLogin as $row) {
                $this->session->set_userdata('username', $row->username);
                $this->session->set_userdata('level', $row->level);

                if ($this->session->userdata('level') == 'admin') {
                    redirect('admin/home');
                } else {
                    redirect('user/home');
                }
            }
        } else {
            $this->session->set_flashdata('pesan', 'Wrong Username and Password combination.');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo "
                <script>
                    alert('You are logged out.');
                    window.location = '" . base_url() . "';
                </script>
            ";
    }
}
/* End of file Login.php */
