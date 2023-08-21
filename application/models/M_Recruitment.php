<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_Recruitment extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function get($table, $data = null, $where = null)
  {
    if ($data != null) {
      return $this->db->get_where($table, $data)->row_array();
    } else {
      return $this->db->get_where($table, $where)->result_array();
    }
  }

  function get_table_recruitment_all()
  {
    $this->db->order_by('id_recruitment', 'desc');
    return $this->db->get('recruitment')->result_array();
  }

  function get_table_recruitment_latest()
  {
    $this->db->order_by('id_recruitment', 'desc');
    $this->db->limit(5);
    return $this->db->get('recruitment')->result_array();
  }

  function get_table_by_user_id($id)
  {
    $this->db->where('recruitment.user_id', $id);
    return $this->db->get('recruitment')->result_array();
  }

  function get_table_by_user_id_check($id)
  {
    $this->db->where('recruitment.user_id', $id);
    return $this->db->get('recruitment')->row_array();
  }

  function get_tableid($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row_array();
  }

  function get_tableid_edit($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function getImage($id)
  {
    $this->db->select('foto');
    $this->db->from('recruitment');
    $this->db->where('id_recruitment', $id);
    return $this->db->get();
  }

  public function validasi_recruitment($id_recruitment, $status_validasi)
  {
    $this->db->trans_start();
    $this->db->query("UPDATE recruitment SET status='$status_validasi'WHERE id_recruitment='$id_recruitment'");
    $this->db->trans_complete();
    if ($this->db->trans_status() == true)
      return true;
    else
      return false;
  }

  public function getPendaftaranSortTgl($tgl_awal, $tgl_akhir)
  {
    $query = "SELECT * FROM recruitment
      WHERE tanggal_pendaftaran BETWEEN '$tgl_awal' AND '$tgl_akhir'
      ORDER BY tanggal_pendaftaran DESC
        ";
    return $this->db->query($query);
  }

  function insert_table($table_name, $data)
  {
    $tambah = $this->db->insert($table_name, $data);
    return $tambah;
  }

  function update_table($table_name, $where, $id, $data)
  {
    $this->db->where($where, $id);
    $update = $this->db->update($table_name, $data);
    return $update;
  }

  function delete_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $hapus = $this->db->delete($table_name);
    return $hapus;
  }

  function edit_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function CountTableRecruitment()
  {
    $Count = $this->db->get('recruitment');
    return $Count->num_rows();
  }

  function CountTableRecruitmentByPending()
  {
    $this->db->where('status', 'pending');
    $Count = $this->db->get('recruitment');
    return $Count->num_rows();
  }
}
