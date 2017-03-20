<?php
class Auth_model extends CI_Model {

  private $GLOBAL_VAR_USERNAME = 'username';
  private $GLOBAL_VAR_FULLNAME = 'full_name';
  private $GLOBAL_VAR_UUID_MS_USER = 'uuid_ms_user';
  private $GLOBAL_VAR_UUID_MS_SUBSYSTEM = 'uuid_ms_subsystem';
  private $GLOBAL_VAR_DTM_CRT = 'dtm_crt';

  public function __construct(){
        parent::__construct();
    }

  public function login_validate($table, $where) {
    return $this->db->get_where($table, $where);
  }

  public function logout_validate() {

  }

  public function get_one($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('username', $param);
    $query = $this->db->get();
    $result = $query->row();
    if ($select == $this->GLOBAL_VAR_USERNAME) {
      return $result->username;
    } elseif ($select == $this->GLOBAL_VAR_FULLNAME) {
      return $result->full_name;
    } elseif ($select == $this->GLOBAL_VAR_UUID_MS_USER) {
      return $result->uuid_ms_user;
    } elseif ($select == $this->GLOBAL_VAR_UUID_MS_SUBSYSTEM) {
      return $result->uuid_ms_subsystem;
    } elseif ($select == $this->GLOBAL_VAR_DTM_CRT) {
      return $result->dtm_crt;
    }
  }

  public function get_is_active($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('username', $param);
    $query = $this->db->get();
    $ret = $query->row();
    return $ret->is_active;
  }

  public function get_is_logged_in($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('username', $param);
    $query = $this->db->get();
    $ret = $query->row();
    return $ret->is_logged_in;
  }

  public function is_logged_in_update($username, $value) {
    $this->db->set('is_logged_in', $value );
    $this->db->where('username', $username);
    $this->db->update('ms_user');
  }

  public function get_ms_subsystem($system) {
    $this->db->select('uuid_ms_subsystem');
    $this->db->from('ms_subsystem');
    $this->db->where('uuid_ms_subsystem', $system);
    $query = $this->db->get();
    return $query->result();
  }
}
?>
