<?php
class Mail_model extends CI_Model {

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

  public function get_all_inbox($receiver) {
    $this->db->select('ms_user.full_name, ms_mail.subject, ms_mail.body, ms_mail.dtm_send, ms_mail_receiver.*');
    $this->db->from('ms_mail');
    $this->db->join('ms_user', 'ms_user.uuid_ms_user = ms_mail.uuid_ms_user_sender');
    $this->db->join('ms_mail_receiver', 'ms_mail.uuid_ms_mail = ms_mail_receiver.uuid_ms_mail');
    $this->db->where('ms_mail.uuid_ms_user_receiver', $receiver);
    $this->db->where('ms_mail_receiver.is_viewable', '1');
    $this->db->where('ms_mail_receiver.is_removed', '0');
    $this->db->order_by('dtm_send', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_all_trash($receiver) {
    $this->db->select('ms_user.full_name, ms_mail.subject, ms_mail.body, ms_mail.dtm_send, ms_mail_receiver.*');
    $this->db->from('ms_mail');
    $this->db->join('ms_user', 'ms_user.uuid_ms_user = ms_mail.uuid_ms_user_sender');
    $this->db->join('ms_mail_receiver', 'ms_mail.uuid_ms_mail = ms_mail_receiver.uuid_ms_mail');
    $this->db->where('ms_mail.uuid_ms_user_receiver', $receiver);
    $this->db->where('ms_mail_receiver.is_viewable', '1');
    $this->db->where('ms_mail_receiver.is_removed', '1');
    $this->db->order_by('dtm_send', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  //buggy feature. still on development
  // public function get_all_draft($receiver) {
  //   $this->db->select('ms_user.full_name, ms_mail.subject, ms_mail.dtm_send, ms_mail_sender.*');
  //   $this->db->from('ms_mail');
  //   $this->db->join('ms_user', 'ms_user.uuid_ms_user = ms_mail.uuid_ms_user_sender');
  //   $this->db->join('ms_mail_sender', 'ms_mail.uuid_ms_mail = ms_mail_sender.uuid_ms_mail');
  //   $this->db->where('ms_mail.ms_mail_sender', $receiver);
  //   $this->db->where('ms_mail_receiver.is_viewable', '1');
  //   $this->db->where('ms_mail_receiver.is_removed', '1');
  //   $query = $this->db->get();
  //   return $query->result();
  // }

  public function get_all_sent_mail($sender) {
    $this->db->select('ms_user.full_name, ms_mail.subject, ms_mail.body, ms_mail.dtm_send, ms_mail_sender.*');
    $this->db->from('ms_mail');
    $this->db->join('ms_user', 'ms_user.uuid_ms_user = ms_mail.uuid_ms_user_receiver');
    $this->db->join('ms_mail_sender', 'ms_mail.uuid_ms_mail = ms_mail_sender.uuid_ms_mail');
    $this->db->where('ms_mail.uuid_ms_user_sender', $sender);
    $this->db->where('ms_mail_sender.is_viewable', '1');
    $this->db->where('ms_mail_sender.is_removed', '0');
    $this->db->where('ms_mail_sender.is_drafted', '0');
    $this->db->order_by('dtm_send', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function send_mail($data) {
    $uuid_ms_mail = $this->db->set('uuid_ms_mail', 'UUID()', FALSE);
    $this->db->set('dtm_send', 'CURRENT_TIME()', FALSE);
    send_mail_sender_trigger($uuid_ms_mail);
    send_mail_receiver_trigger($uuid_ms_mail);
    return $this->db->insert('ms_mail', $data);
  }

  public function send_mail_sender_trigger($uuid_ms_mail) {
    $this->db->set('uuid_ms_mail', $uuid_ms_mail);
    return $this->db->insert('ms_mail_sender');
  }

  public function send_mail_receiver_trigger($uuid_ms_mail) {
    $this->db->set('uuid_ms_mail', $uuid_ms_mail);
    return $this->db->insert('ms_mail_receiver');
  }

  public function send_to_trash($uuid_ms_mail) {
    $this->db->set('is_removed', '1');
    $this->db->set('dtm_upd', 'CURRENT_TIME', FALSE);
    $this->db->where('uuid_ms_mail', $uuid_ms_mail);
    return $this->db->update('ms_mail_receiver');
  }

  // public function send_to_draft($uuid_ms_mail) {
  //
  // }
}
?>
