<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();
        $data['title'] = 'Login Page';
        $this->template->load('layout/auth', 'auth/login', $data);
    }

    public function proses()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->template->load('layout/auth', 'auth/login', $data);
        } else {
            $cek_username = $this->m_auth->cek_username($username);
            if ($cek_username > 0) {
                $data_password = $this->m_auth->get_password($username);
                if (hash_verified($password, $data_password)) {
                    $user_db = $this->m_auth->userdata($username);
                    $userdata = [
                        'id_user'  => $user_db['id_user'],
                        'npm' => $user_db['npm'],
                        'nama' => $user_db['nama'],
                        'username' => $user_db['username'],
                        'foto' => $user_db['foto'],
                        'role'  => $user_db['role'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata('login_session', $userdata);
                    $flash = [
                        'title' => 'Login Berhasil!',
                        'message' => 'Selamat datang kembali ' . $user_db['nama'],
                        'icon' => 'success'
                    ];
                    $this->session->set_flashdata('flash_message', $flash);
                    redirect('dashboard');
                } else {
                    $flash = [
                        'title' => 'Error!',
                        'message' => 'Password salah!',
                        'icon' => 'error'
                    ];
                    $this->session->set_flashdata('flash_message', $flash);
                    redirect('login');
                }
            } else {
                $flash = [
                    'title' => 'Error!',
                    'message' => 'Akun belum terdaftar!',
                    'icon' => 'error'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');
        $flash = [
            'title' => 'Success!',
            'message' => 'Anda berhasil logout!',
            'icon' => 'success'
        ];
        $this->session->set_flashdata('flash_message', $flash);
        redirect('login');
    }
}
