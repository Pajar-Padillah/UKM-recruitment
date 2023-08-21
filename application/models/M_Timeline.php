<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_Timeline extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get_table()
  {
    return $this->db->get('timeline')->result_array();
  }

  function get_data()
  {
    return $this->db->get('timeline')->row();
  }

  function get_table_date()
  {
    return $this->db->get('timeline')->row_array();
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

  function CountTable($table_name)
  {
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }

  function CountTableId($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }
}
