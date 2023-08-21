<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
        $data['title'] = 'Register Page';
        $this->template->load('layout/auth', 'auth/register', $data);
    }
    public function proses()
    {
        $npm = $this->input->post("npm");
        $nama = $this->input->post("nama");
        $username = $this->input->post("username");
        $password = get_hash($this->input->post("password"));

        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('foto', 'foto', 'callback_check_file_upload');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Page';
            $this->template->load('layout/auth', 'auth/register', $data);
        } else {
            $cek = $this->db->query("select * from users where username = '$username' or npm = '$npm'");
            if ($cek->num_rows() > 0) {
                $flash = [
                    'title' => 'Error!',
                    'message' => 'Username atau NPM sudah terdaftar!',
                    'icon' => 'error'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('register');
            } else {
                $config['upload_path']   = './assets/upload/user-images/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = '2048';
                $config['file_name'] = 'user_' . time();
                $this->upload->initialize($config);
                $this->upload->do_upload('foto');
                $gambar = $this->upload->data();
                $data = array(
                    'npm' => $npm,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'role' => 2,
                    'foto' => $gambar['file_name']
                );
                $this->m_user->insert_table('users', $data);
                $flash = [
                    'title' => 'Success!',
                    'message' => 'Registrasi berhasil, Silahkan login!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('login');
            }
        }
    }

    public function check_file_upload()
    {
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_message('check_file_upload', 'Foto belum diunggah');
            return false;
        } else {
            return true;
        }
    }
}
