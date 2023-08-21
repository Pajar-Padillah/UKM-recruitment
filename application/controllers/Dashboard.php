<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'pendaftar' => $this->m_recruitment->get_table_recruitment_latest(),
			'timeline' =>  $this->m_timeline->get_data(),
			'total_pendaftar' => $this->m_recruitment->CountTableRecruitment(),
			'total_user' => $this->m_user->CountTableUser(),
			'jumlah_pending' => $this->m_recruitment->CountTableRecruitmentByPending(),
			'status' => $this->m_recruitment->get_tableid_edit('recruitment', 'user_id', userdata('id_user'))
		];
		$this->template->load('layout/main', 'dashboard', $data);
	}
}
