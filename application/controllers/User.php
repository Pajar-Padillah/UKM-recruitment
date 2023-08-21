<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_admin()) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['users'] = $this->m_user->get_table_by_role_mhs();
        $data['title'] = 'Data User';
        $this->template->load('layout/main', 'user/index', $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->m_user->get_tableid_edit('users', 'id_user', $id);
        $data['title'] = 'Edit User';
        $this->template->load('layout/main', 'user/edit_user', $data);
    }

    public function update()
    {
        $id = $this->input->post("id_user");
        $npm = $this->input->post("npm");
        $nama = $this->input->post("nama");
        $username = $this->input->post("username");
        $password = get_hash($this->input->post("password"));

        $this->form_validation->set_rules('password', 'password', 'min_length[6]|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->m_user->get_tableid_edit('users', 'id_user', $id);
            $data['title'] = 'Edit User';
            $this->template->load('layout/main', 'user/edit_user', $data);
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
                    'message' => 'Update user berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('user');
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
                    'message' => 'Update user berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('user');
            }
        }
    }

    public function delete($id)
    {
        $g = $this->m_user->getImage($id)->row_array();
        if ($g != null) {
            unlink('assets/upload/user-images/' . $g['foto']);
        }
        $this->m_user->delete_table('users', 'id_user', $id);
        $flash = [
            'title' => 'Success!',
            'message' => 'Hapus user berhasil!',
            'icon' => 'success'
        ];
        $this->session->set_flashdata('flash_message', $flash);
        redirect('user');
    }
}
