<?php
class User_model extends CI_Model {

  private $GLOBAL_PARAM_UUID_SUBSYSTEM_CLIENT = "d8067dd0-06ba-11e7-88db-c454448293a1";
  private $GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT = "4249cbf4-06ba-11e7-88db-c454448293a1";
  private $GLOBAL_PARAM_UUID_SUBSYSTEM_ADMIN = "4249b7c8-06ba-11e7-88db-c454448293a1";

  public function __construct(){
    parent::__construct();
  }

  public function insert_user($data) {
    $this->db->set('uuid_ms_user', 'UUID()', FALSE);
    $this->db->set('dtm_crt', 'CURRENT_TIME()', FALSE);
    $this->db->set('uuid_ms_subsystem', $this->GLOBAL_PARAM_UUID_SUBSYSTEM_CLIENT);
    return $this->db->insert('ms_user', $data);
  }

  public function insert_expert($data) {
    $this->db->set('uuid_ms_user', 'UUID()', FALSE);
    $this->db->set('dtm_crt', 'CURRENT_TIME()', FALSE);
    $this->db->set('is_active', '1', FALSE);
    $this->db->set('uuid_ms_subsystem', $this->GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT);
    return $this->db->insert('ms_user', $data);
  }

  public function is_exist($select, $table, $where) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($select, $where);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_all_user() {
    $query = $this->db->query("select ms_user.*, ms_subsystem.subsystem_value
                               from ms_user
                               left join ms_subsystem on ms_user.uuid_ms_subsystem=ms_subsystem.uuid_ms_subsystem");
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
