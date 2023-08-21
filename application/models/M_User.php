<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_User extends CI_Model
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

  function get_table($table_name)
  {
    $get_user = $this->db->get($table_name);
    return $get_user->result_array();
  }

  function get_table_by_role_mhs()
  {
    $this->db->order_by('id_user', 'desc');
    $this->db->where('users.role', 2);
    return $this->db->get('users')->result_array();
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
    $this->db->from('users');
    $this->db->where('id_user', $id);
    return $this->db->get();
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

  function CountTableUser()
  {
    $this->db->where('role', 2);
    $Count = $this->db->get('users');
    return $Count->num_rows();
  }

  function CountTableId($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }
}
