<?php
class Data_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function get_all_data_training() {
    $query = $this->db->query("select * from fp_data_training order by tahun,bulan ASC");
    return $query->result();
  }

  public function get_all_data_uji() {
    $query = $this->db->query("select * from fp_data_uji order by tahun,bulan ASC");
    return $query->result();
  }

  public function delete($uuid_ms_user) {
    $this->db->where('uuid_ms_user', $uuid_ms_user);
    $this->db->delete('ms_user');
  }

  public function get_one($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('uuid_ms_user', $param);
    $query = $this->db->get();
    $result = $query->row();
    return $result;
  }

  public function update($data) {
    $this->db->set('dtm_upd', 'CURRENT_TIME()', FALSE);
    $this->db->where('username', $data['username']);
    $this->db->update('ms_user', $data);
    return true;
  }
}
?>
