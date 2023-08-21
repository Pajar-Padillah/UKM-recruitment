<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $data['title'] = "Laporan Pendaftaran";
        $this->template->load('layout/main', 'recruitment/laporan', $data);
    }

    public function laporan_pendaftaran()
    {
        $data['title'] = "Laporan Semua Data Pendaftaran UKM SUKMA";
        $tgl_awal = date('Y-m-d', strtotime($this->input->post('tanggal_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
        $data['data'] = $this->m_recruitment->getPendaftaranSortTgl($tgl_awal, $tgl_akhir)->result_array();
        $data['tgl_awal'] = $this->input->post('tanggal_awal');
        $data['tgl_akhir'] = $this->input->post('tanggal_akhir');
        $this->template->load('layout/main', 'recruitment/laporan', $data);
    }

    public function laporanPDF()
    {
        $tgl_awal = date('Y-m-d', strtotime($this->uri->segment(3, 0)));
        $tgl_akhir = date('Y-m-d', strtotime($this->uri->segment(4, 0)));
        $data = array(
            'title' => 'Laporan Semua Data Pendaftaran UKM SUKMA',
            'data' => $this->m_recruitment->getPendaftaranSortTgl($tgl_awal, $tgl_akhir)->result_array(),
            'tanggal' => [
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir
            ]
        );
        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', TRUE);
        $paper_size = 'A4';
        $orientation = 'portrait';
        $this->pdf->set_paper($paper_size, $orientation);
        $this->pdf->filename = "laporan_recruitment.pdf";
        $this->pdf->load_view('recruitment/all_laporan_pdf', $data);
    }
}
