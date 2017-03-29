<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public $GLOBAL_DATA_SUBSYSTEM_VALUE;

	public function __construct() {
		parent::__construct();

		$this->GLOBAL_DATA_SUBSYSTEM_VALUE = $this->client_model->get_one('subsystem_value', 'ms_subsystem', $this->session->userdata('uuid_ms_subsystem'));

		if(empty($this->session->userdata('is_logged_in')) && $this->session->userdata('uuid_ms_subsystem') != GLOBAL_PARAM_UUID_SUBSYSTEM_CLIENT) {
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You dont have an access to view this page!</div>');
			redirect('');
		}
	}

	public function index() {

	}

	public function home() {
		$this->load->view('client/home');
	}

	public function pre_forecasting() {
		$data['data_training'] = $this->data_model->get_all_data_training();
		$data['data_uji'] = $this->data_model->get_all_data_uji();

		$a=0;
		$bi_percentage_training[$a] = 0;
		foreach ($data['data_training'] as $row) {
			$bi_percentage_training[$a] = $row->bi_rate * 100;
			$a++;
		}

		$b=0;
		$bi_percentage_uji[$b] = 0;
		foreach ($data['data_uji'] as $row) {
			$bi_percentage_uji[$b] = $row->bi_rate * 100;
			$b++;
		}

		$this->load->view('client/pre_forecasting', array('data_training' => $data['data_training'],
																											'data_uji' => $data['data_uji'],
																											'bi_percentage_training' => $bi_percentage_training,
																											'bi_percentage_uji' => $bi_percentage_uji));
	}

	public function list_inbox() {
		$data['inbox'] = $this->mail_model->get_all_inbox($this->session->userdata('uuid_ms_user'));

		$this->load->view('client/list_inbox', array('inbox' => $data['inbox']));
	}

	public function list_trash() {
		$data['list_trash'] = $this->mail_model->get_all_trash($this->session->userdata('uuid_ms_user'));

		$this->load->view('client/list_trash', array('list_trash' => $data['list_trash']));
	}

	public function list_sent_mail() {
		$data['sent_mail'] = $this->mail_model->get_all_sent_mail($this->session->userdata('uuid_ms_user'));

		$this->load->view('client/list_sent_mail', array('sent_mail' => $data['sent_mail']));
	}

	public function compose_mail() {
		$this->form_validation->set_rules('subject', 'Subject', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE) {
			$data['all_user'] = $this->user_model->get_all_user();
			$this->load->view('client/compose_mail', array('all_user' => $data['all_user']));
		} else {
			$data = array(
	      'uuid_ms_user_sender' => $this->session->userdata('uuid_ms_user'),
				'uuid_ms_user_receiver' => $this->input->post('receiver'),
	      'subject' => $this->input->post('subject'),
	      'body' => $this->input->post('body'),
		  );

			if ($this->mail_model->send_mail($data)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent! Please check your sentbox</div>');
				redirect('client/compose-mail');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
				redirect('client/compose-mail');
			}
		}
	}

	public function send_to_trash($uuid_ms_mail) {
		$this->mail_model->send_to_trash($uuid_ms_mail);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been sent to trash!</div>');
		redirect('client/list-inbox');
	}

	public function remove_mail($uuid_ms_mail) {
		$this->mail_model->remove_mail($uuid_ms_mail);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been permanently deleted!</div>');
		redirect('client/list-trash');
	}

	public function read_mail($uuid_ms_mail) {
		$data = $this->mail_model->get_one_mail($uuid_ms_mail);
		$this->load->view('client/read_mail', $data);
	}

	// public function send_to_draft() {
	//
	// }

	//buggy feature. still on development
	// public function list_draft() {
	//
	// }

}
