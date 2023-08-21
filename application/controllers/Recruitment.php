<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $id = userdata('id_user');
        if (userdata('role') == 1) {
            $data['recruitment'] = $this->m_recruitment->get_table_recruitment_all();
        } else {
            $data['recruitment'] = $this->m_recruitment->get_table_by_user_id($id);
        }
        $data['title'] = 'Data Pendaftaran';
        $this->template->load('layout/main', 'recruitment/index', $data);
    }

    public function tambah()
    {
        if (!is_mhs()) {
            redirect('dashboard');
        }
        $data['title'] = 'Form Pendaftaran';
        $this->template->load('layout/main', 'recruitment/form_pendaftaran', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->m_recruitment->get_tableid('recruitment', 'id_recruitment', $id);
        $data['title'] = 'Detail Recruitment';
        $this->template->load('layout/main', 'recruitment/detail', $data);
    }

    public function edit($id)
    {
        $data['recruitment'] = $this->m_recruitment->get_tableid_edit('recruitment', 'id_recruitment', $id);
        $data['title'] = 'Edit Data Pendaftaran';
        $this->template->load('layout/main', 'recruitment/edit', $data);
    }

    public function create()
    {
        $user_id = $this->input->post("user_id");
        $npm = $this->input->post("npm");
        $nama = $this->input->post("nama");
        $email = $this->input->post("email");
        $hobby = $this->input->post("hobby");
        $tempat_lahir = $this->input->post("tempat_lahir");
        $tanggal_lahir = $this->input->post("tanggal_lahir");
        $asal_sekolah = $this->input->post("asal_sekolah");
        $no_telp = $this->input->post("no_telp");
        $alamat = $this->input->post("alamat");
        $prodi = $this->input->post("prodi");
        $pengalaman_organisasi = $this->input->post("pengalaman_organisasi");
        $jurusan = $this->input->post("jurusan");
        $alasan_bergabung = $this->input->post("alasan_bergabung");
        $motto = $this->input->post("motto");
        $jenis_kelamin = $this->input->post("jenis_kelamin");
        $angkatan = $this->input->post("angkatan");
        $status = 'pending';

        $this->form_validation->set_rules('npm', 'NPM', 'required|trim|max_length[8]');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'nomor telepon', 'required|trim|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('hobby', 'hobby', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'required|trim');
        $this->form_validation->set_rules('pengalaman_organisasi', 'pengalaman organisasi', 'required|trim');
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('alasan_bergabung', 'alasan bergabung', 'required|trim');
        $this->form_validation->set_rules('motto', 'motto', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('foto', 'foto', 'callback_check_file_upload');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required|trim|max_length[4]');

        $id = userdata('id_user');
        $date_data = $this->m_timeline->get_table_date();
        $current_date = date('Y-m-d');
        $check = $this->m_recruitment->get_table_by_user_id_check($id);
        $tgl_awal = $date_data['tgl_awal_pendaftaran'];
        $tgl_akhir = $date_data['tgl_akhir_pendaftaran'];

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Pendaftaran';
            $this->template->load('layout/main', 'recruitment/form_pendaftaran', $data);
        } else {
            //recruitment belum dibuka
            if ($current_date < $date_data['tgl_awal_pendaftaran']) {
                echo "Tidak dapat menyimpan data! Pendaftaran UKM SUKMA belum dibuka!";
                $flash = [
                    'title' => 'Error!',
                    'message' => 'Tidak dapat menyimpan data! Pendaftaran UKM SUKMA belum dibuka! Pendaftaran dibuka pada tanggal ' . tgl_indo($date_data['tgl_awal_pendaftaran']) . '!',
                    'icon' => 'error'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('recruitment/tambah');
            } else {
                //Recruitment ditutup
                if ($current_date > $date_data['tgl_akhir_pendaftaran']) {
                    $flash = [
                        'title' => 'Error!',
                        'message' => 'Tidak dapat menyimpan data! Pendaftaran UKM SUKMA sudah ditutup pada tanggal ' . tgl_indo($date_data['tgl_akhir_pendaftaran']) . '!',
                        'icon' => 'error'
                    ];
                    $this->session->set_flashdata('flash_message', $flash);
                    redirect('recruitment/tambah');
                } else {
                    //check apakah sudah pernah daftar
                    if (isset($check['tanggal_pendaftaran']) >=  $tgl_awal && $check['tanggal_pendaftaran'] <=  $tgl_akhir) {
                        $flash = [
                            'title' => 'Error!',
                            'message' => 'Tidak dapat menyimpan data! Kamu sudah pernah mendaftar pada tanggal ' . tgl_indo($check['tanggal_pendaftaran']) . '!',
                            'icon' => 'error'
                        ];
                        $this->session->set_flashdata('flash_message', $flash);
                        redirect('recruitment/tambah');
                    } else {
                        $config['upload_path']   = './assets/upload/recruitment/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png';
                        $config['max_size']      = '2048';
                        $config['file_name'] = 'recruitment_' . time();
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto');
                        $gambar = $this->upload->data();
                        $save  = array(
                            'npm' => $npm,
                            'nama' => $nama,
                            'email' => $email,
                            'no_telp' => $no_telp,
                            'prodi' => $prodi,
                            'angkatan' => $angkatan,
                            'alamat' => $alamat,
                            'jurusan' => $jurusan,
                            'hobby' => $hobby,
                            'tanggal_pendaftaran' => date('Y-m-d'),
                            'jenis_kelamin' => $jenis_kelamin,
                            'alasan_bergabung' => $alasan_bergabung,
                            'motto' => $motto,
                            'user_id' => $user_id,
                            'status' => $status,
                            'pengalaman_organisasi' => $pengalaman_organisasi,
                            'tempat_lahir' => $tempat_lahir,
                            'tanggal_lahir' => $tanggal_lahir,
                            'asal_sekolah' => $asal_sekolah,
                            'foto' => $gambar['file_name']
                        );
                        $this->m_recruitment->insert_table('recruitment', $save);
                        $flash = [
                            'title' => 'Success!',
                            'message' => 'Pendaftaran berhasil, silahkan menunggu admin memproses data anda!',
                            'icon' => 'success'
                        ];
                        $this->session->set_flashdata('flash_message', $flash);
                        redirect('recruitment');
                    }
                }
            }
        }
    }

    public function update()
    {
        $id = $this->input->post("id_recruitment");
        $npm = $this->input->post("npm");
        $nama = $this->input->post("nama");
        $email = $this->input->post("email");
        $hobby = $this->input->post("hobby");
        $tempat_lahir = $this->input->post("tempat_lahir");
        $tanggal_lahir = $this->input->post("tanggal_lahir");
        $asal_sekolah = $this->input->post("asal_sekolah");
        $no_telp = $this->input->post("no_telp");
        $alamat = $this->input->post("alamat");
        $prodi = $this->input->post("prodi");
        $pengalaman_organisasi = $this->input->post("pengalaman_organisasi");
        $jurusan = $this->input->post("jurusan");
        $alasan_bergabung = $this->input->post("alasan_bergabung");
        $motto = $this->input->post("motto");
        $jenis_kelamin = $this->input->post("jenis_kelamin");
        $angkatan = $this->input->post("angkatan");

        $this->form_validation->set_rules('npm', 'NPM', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'nomor telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('hobby', 'hobby', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'required|trim');
        $this->form_validation->set_rules('pengalaman_organisasi', 'pengalaman organisasi', 'required|trim');
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('alasan_bergabung', 'alasan bergabung', 'required|trim');
        $this->form_validation->set_rules('motto', 'motto', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['recruitment'] = $this->m_recruitment->get_tableid_edit('recruitment', 'id_recruitment', $id);
            $data['title'] = 'Edit Data Pendaftaran';
            $this->template->load('layout/main', 'recruitment/edit', $data);
        } else {
            $config['upload_path']   = './assets/upload/recruitment/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = '2048';
            $config['file_name'] = 'recruitment_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $gambar = $this->upload->data();
                $save  = array(
                    'npm' => $npm,
                    'nama' => $nama,
                    'email' => $email,
                    'no_telp' => $no_telp,
                    'prodi' => $prodi,
                    'angkatan' => $angkatan,
                    'alamat' => $alamat,
                    'jurusan' => $jurusan,
                    'hobby' => $hobby,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alasan_bergabung' => $alasan_bergabung,
                    'motto' => $motto,
                    'pengalaman_organisasi' => $pengalaman_organisasi,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'asal_sekolah' => $asal_sekolah,
                    'foto' => $gambar['file_name']
                );
                $g = $this->m_recruitment->getImage($id)->row_array();

                if ($g != null) {
                    //hapus gambar yg ada diserver
                    unlink('assets/upload/recruitment/' . $g['foto']);
                }
                $this->m_recruitment->update_table('recruitment', 'id_recruitment', $id, $save);
                $flash = [
                    'title' => 'Success!',
                    'message' => 'Update data pendaftaran berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('recruitment');
            } else {
                $save  = array(
                    'npm' => $npm,
                    'nama' => $nama,
                    'email' => $email,
                    'no_telp' => $no_telp,
                    'prodi' => $prodi,
                    'angkatan' => $angkatan,
                    'alamat' => $alamat,
                    'jurusan' => $jurusan,
                    'hobby' => $hobby,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alasan_bergabung' => $alasan_bergabung,
                    'motto' => $motto,
                    'pengalaman_organisasi' => $pengalaman_organisasi,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'asal_sekolah' => $asal_sekolah
                );
                $this->m_recruitment->update_table('recruitment', 'id_recruitment', $id, $save);
                $flash = [
                    'title' => 'Success!',
                    'message' => 'Update data pendaftaran berhasil!',
                    'icon' => 'success'
                ];
                $this->session->set_flashdata('flash_message', $flash);
                redirect('recruitment');
            }
        }
    }

    public function delete($id)
    {
        $g = $this->m_recruitment->getImage($id)->row_array();
        if ($g != null) {
            unlink('assets/upload/recruitment/' . $g['foto']);
        }
        $this->m_recruitment->delete_table('recruitment', 'id_recruitment', $id);
        $flash = [
            'title' => 'Success!',
            'message' => 'Hapus data pendaftaran berhasil!',
            'icon' => 'success'
        ];
        $this->session->set_flashdata('flash_message', $flash);
        redirect('recruitment');
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

    public function validasi($status_validasi)
    {

        $id_recruitment = $this->input->post("id_recruitment");
        $this->m_recruitment->validasi_recruitment($id_recruitment, $status_validasi);
        $flash = [
            'title' => 'Success!',
            'message' => 'Validasi data pendaftaran berhasil!',
            'icon' => 'success'
        ];
        $this->session->set_flashdata('flash_message', $flash);
        redirect('recruitment');
    }

    public function formulir_pdf($id)
    {
        $data['data'] = $this->m_recruitment->get_tableid_edit('recruitment', 'id_recruitment', $id);
        $this->load->library('pdf');
        $paper_size = 'A4';
        $orientation = 'portrait';
        $this->pdf->set_paper($paper_size, $orientation);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "formulir_pendaftaran_ukm_sukma.pdf";
        $this->pdf->load_view('recruitment/formulir_pdf', $data);
    }
}
