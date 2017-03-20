<?php
class Admin_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function get_one($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('uuid_ms_subsystem', $param);
    $query = $this->db->get();
    $result = $query->row();
    return $result->subsystem_value;
  }
}
?>
