<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile'
        ];
        $this->template->load('layout/main', 'profile/index', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $this->template->load('layout/main', 'profile/editprofile', $data);
    }

    public function update()
    {
        $id = $this->input->post("id_user");
        $npm = $this->input->post("npm");
        $nama = $this->input->post("nama");
        $username = $this->input->post("username");
        $password = get_hash($this->input->post("password"));

        $this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $this->template->load('layout/main', 'profile/editprofile', $data);
        } else {
            $config['upload_path']   = './assets/upload/user-images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['file_name'] = 'user_' . time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $gambar = $this->upload->data();
                //Jika Password tidak kosong
                if ($this->input->post('password')) {
                    $save  = array(
                        'npm' => $npm,
                        'nama' => $nama,
                        'username' => $username,
                        'password' => $password,
                        'foto' => $gambar['file_name']
                    );
                } else { //Jika password kosong
                    $save  = array(
                        'npm' => $npm,
                        'nama' => $nama,
                        'username' => $username,
                        'foto' => $gambar['file_name']
                    );
                }

                $g = $this->m_user->getImage($id)->row_array();

                if ($g != null) {
                    //hapus gambar yg ada diserver
                    unlink('assets/upload/user-images/' . $g['foto']);
                }

                $this->m_user->update_table('users', 'id_user', $id, $save);
                $flash = [
                    'title' => 'Success!',
                    'message' => 'Update profil berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('profile');
            } else { //Apabila tidak ada gambar yang di upload

                //Jika Password tidak kosong
                if ($this->input->post('password')) {
                    $save  = array(
                        'npm' => $npm,
                        'nama' => $nama,
                        'username' => $username,
                        'password' => $password
                    );
                } else { //Jika password kosong
                    $save  = array(
                        'npm' => $npm,
                        'nama' => $nama,
                        'username' => $username,
                    );
                }
                $this->m_user->update_table('users', 'id_user', $id, $save);
                $flash = [
                    'title' => 'Success!',
                    'message' => 'Update profil berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('profile');
            }
        }
    }
}
