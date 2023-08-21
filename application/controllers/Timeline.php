<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timeline extends CI_Controller
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
        $data['timeline'] = $this->m_timeline->get_table();
        $data['title'] = 'Data Timeline';
        $this->template->load('layout/main', 'timeline/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Timeline';
        $this->template->load('layout/main', 'timeline/tambah', $data);
    }

    public function edit($id)
    {
        $data['timeline'] = $this->m_timeline->get_tableid_edit('timeline', 'id_timeline', $id);
        $data['title'] = 'Edit Data Timeline';
        $this->template->load('layout/main', 'timeline/edit', $data);
    }

    public function create()
    {
        $tgl_awal_pendaftaran = $this->input->post("tgl_awal_pendaftaran");
        $tgl_akhir_pendaftaran = $this->input->post("tgl_akhir_pendaftaran");
        $tgl_tes_tertulis = $this->input->post("tgl_tes_tertulis");
        $tgl_pengumuman_tes_tertulis = $this->input->post("tgl_pengumuman_tes_tertulis");
        $tgl_tes_wawancara = $this->input->post("tgl_tes_wawancara");
        $tgl_pengumuman_tes_wawancara = $this->input->post("tgl_pengumuman_tes_wawancara");

        $this->form_validation->set_rules('tgl_awal_pendaftaran', 'tanggal awal pendaftaran', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir_pendaftaran', 'tanggal akhir pendaftaran', 'required|trim');
        $this->form_validation->set_rules('tgl_tes_tertulis', 'tanggal tes tertulis', 'required|trim');
        $this->form_validation->set_rules('tgl_pengumuman_tes_tertulis', 'tanggalpengumuman tes tertulis', 'required|trim');
        $this->form_validation->set_rules('tgl_tes_wawancara', 'tanggal tes wawancara', 'required|trim');
        $this->form_validation->set_rules('tgl_pengumuman_tes_wawancara', 'tanggal pengumuman tes wawancara', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Timeline';
            $this->template->load('layout/main', 'timeline/tambah', $data);
        } else {
            $save  = array(
                'tgl_awal_pendaftaran' => $tgl_awal_pendaftaran,
                'tgl_akhir_pendaftaran' => $tgl_akhir_pendaftaran,
                'tgl_tes_tertulis' => $tgl_tes_tertulis,
                'tgl_pengumuman_tes_tertulis' => $tgl_pengumuman_tes_tertulis,
                'tgl_tes_wawancara' => $tgl_tes_wawancara,
                'tgl_pengumuman_tes_wawancara' => $tgl_pengumuman_tes_wawancara,
            );
            $this->m_timeline->insert_table('timeline', $save);
            $flash = [
                'title' => 'Success!',
                'message' => 'Tambah data timeline berhasil!',
                'icon' => 'success'
            ];
            $this->session->set_flashdata('flash_message', $flash);
            redirect('timeline');
        }
    }

    public function update()
    {
        $id = $this->input->post("id_timeline");
        $tgl_awal_pendaftaran = $this->input->post("tgl_awal_pendaftaran");
        $tgl_akhir_pendaftaran = $this->input->post("tgl_akhir_pendaftaran");
        $tgl_tes_tertulis = $this->input->post("tgl_tes_tertulis");
        $tgl_pengumuman_tes_tertulis = $this->input->post("tgl_pengumuman_tes_tertulis");
        $tgl_tes_wawancara = $this->input->post("tgl_tes_wawancara");
        $tgl_pengumuman_tes_wawancara = $this->input->post("tgl_pengumuman_tes_wawancara");

        $this->form_validation->set_rules('tgl_awal_pendaftaran', 'tanggal awal pendaftaran', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir_pendaftaran', 'tanggal akhir pendaftaran', 'required|trim');
        $this->form_validation->set_rules('tgl_tes_tertulis', 'tanggal tes tertulis', 'required|trim');
        $this->form_validation->set_rules('tgl_pengumuman_tes_tertulis', 'tanggalpengumuman tes tertulis', 'required|trim');
        $this->form_validation->set_rules('tgl_tes_wawancara', 'tanggal tes wawancara', 'required|trim');
        $this->form_validation->set_rules('tgl_pengumuman_tes_wawancara', 'tanggal pengumuman tes wawancara', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['timeline'] = $this->m_timeline->get_tableid_edit('timeline', 'id_timeline', $id);
            $data['title'] = 'Edit Data Timeline';
            $this->template->load('layout/main', 'timeline/edit', $data);
        } else {
            $save  = array(
                'tgl_awal_pendaftaran' => $tgl_awal_pendaftaran,
                'tgl_akhir_pendaftaran' => $tgl_akhir_pendaftaran,
                'tgl_tes_tertulis' => $tgl_tes_tertulis,
                'tgl_pengumuman_tes_tertulis' => $tgl_pengumuman_tes_tertulis,
                'tgl_tes_wawancara' => $tgl_tes_wawancara,
                'tgl_pengumuman_tes_wawancara' => $tgl_pengumuman_tes_wawancara,
            );
            $this->m_timeline->update_table('timeline', 'id_timeline', $id, $save);
            $flash = [
                'title' => 'Success!',
                'message' => 'Update data timeline berhasil!',
                'icon' => 'success'
            ];
            $this->session->set_flashdata('flash_message', $flash);
            redirect('timeline');
        }
    }
}
