<?php
date_default_timezone_set('Asia/Jakarta');

/** login codeIgniter menggunakan bycrypt **/

if (!function_exists('get_hash')) {
	function get_hash($PlainPassword)
	{
		$option = [
			'cost' => 5, // proses hash sebanyak: 2^5 = 32x
		];
		return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
	}
}

if (!function_exists('hash_verified')) {
	function hash_verified($PlainPassword, $HashPassword)
	{
		return password_verify($PlainPassword, $HashPassword) ? true : false;
	}
}

/** login codeIgniter menggunakan bycrypt **/

function cek_login()
{
	$ci = get_instance();
	if (!$ci->session->has_userdata('login_session')) {
		redirect('login');
	}
}

function is_admin()
{
	$ci = get_instance();
	$role = $ci->session->userdata('login_session')['role'];

	$status = true;

	if ($role != 1) {
		$status = false;
	}

	return $status;
}

function is_mhs()
{
	$ci = get_instance();
	$role = $ci->session->userdata('login_session')['role'];

	$status = true;

	if ($role != 2) {
		$status = false;
	}

	return $status;
}

function userdata($field)
{
	$ci = get_instance();
	$ci->load->model('m_user', 'user');

	$userId = $ci->session->userdata('login_session')['id_user'];
	return $ci->user->get('users', ['id_user' => $userId])[$field];
}

function slug($s)
{
	$c = array(' ');
	$d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');

	$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

	$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	return $s;
}

function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
