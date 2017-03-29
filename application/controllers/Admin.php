<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $GLOBAL_DATA_SUBSYSTEM_VALUE;

	public function __construct() {
		parent::__construct();

		$this->GLOBAL_DATA_SUBSYSTEM_VALUE = $this->admin_model->get_one('subsystem_value', 'ms_subsystem', $this->session->userdata('uuid_ms_subsystem'));

		if(empty($this->session->userdata('is_logged_in')) && $this->session->userdata('uuid_ms_subsystem') != GLOBAL_PARAM_UUID_SUBSYSTEM_ADMIN) {
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You dont have an access to view this page!</div>');
			redirect('');
		}
	}

	public function index() {

	}

	public function home() {
		$this->load->view('admin/home');
	}

	public function list_user() {
		$data['user'] = $this->user_model->get_all_user();
		$this->load->view('admin/list_user', array('data_user' => $data['user']));
	}

	public function add_user() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]|max_length[30]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[15]|required');
    $this->form_validation->set_rules('passconf', 'Retype password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('admin/add_user');
		} else {
			$data = array(
	      'full_name' => $this->input->post('full_name'),
	      'username' => $this->input->post('username'),
	      'email' => $this->input->post('email'),
	      'password' => md5($this->input->post('password')),
		  );

			$username_check = $this->user_model->is_exist('username', 'ms_user', $data['username']);
			$email_check = $this->user_model->is_exist('email', 'ms_user', $data['email']);

			if( $username_check == NULL && $email_check == NULL) {
				if ($this->user_model->insert_expert($data)) {
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Expert successfully registered!</div>');
	        redirect('admin/add-user');
				} else {
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
	        redirect('admin/add-user');
				}
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">username or email already used! please use another username or email!</div>');
				redirect('admin/add-user');
			}
		}
	}

	public function delete_user($uuid_ms_user) {
		$this->user_model->delete($uuid_ms_user);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">User successfully deleted!</div>');
		redirect('admin/list-user');
	}

	public function edit_user($uuid_ms_user) {
		$data['user'] = $this->user_model->get_one('*', 'ms_user', $uuid_ms_user);
		$this->load->view('admin/edit_user', $data);
	}

	public function update_user() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]|max_length[30]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('is_active', 'Active Status', 'less_than_equal_to[1]');

		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('admin/list_user');
		} else {
			$data = array(
	      'full_name' => $this->input->post('full_name'),
	      'username' => $this->input->post('username'),
	      'email' => $this->input->post('email'),
				'is_active' => $this->input->post('is_active')
		  );
			if ($this->user_model->update($data)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">User successfully updated!</div>');
        redirect('admin/list-user');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
        redirect('admin/list-user');
			}
		}
	}

	public function list_data_training() {
		$data['data_training'] = $this->data_model->get_all_data_training();

		$a=0;
		$bi_percentage[$a] = 0;
		foreach ($data['data_training'] as $row) {
			$bi_percentage[$a] = $row->bi_rate * 100;
			$a++;
		}

		$this->load->view('admin/list_data_training', array('data_training' => $data['data_training'],
																												'bi_percentage' => $bi_percentage));
	}

	public function list_data_uji() {
		$data['data_uji'] = $this->data_model->get_all_data_uji();

		$a=0;
		$bi_percentage[$a] = 0;
		foreach ($data['data_uji'] as $row) {
			$bi_percentage[$a] = $row->bi_rate * 100;
			$a++;
		}

		$this->load->view('admin/list_data_uji', array('data_uji' => $data['data_uji'],
																									 'bi_percentage' => $bi_percentage));
	}

	public function list_inbox() {
		$data['inbox'] = $this->mail_model->get_all_inbox($this->session->userdata('uuid_ms_user'));

		$this->load->view('admin/list_inbox', array('inbox' => $data['inbox']));
	}

	public function list_trash() {
		$data['list_trash'] = $this->mail_model->get_all_trash($this->session->userdata('uuid_ms_user'));

		$this->load->view('admin/list_trash', array('list_trash' => $data['list_trash']));
	}

	public function list_sent_mail() {
		$data['sent_mail'] = $this->mail_model->get_all_sent_mail($this->session->userdata('uuid_ms_user'));

		$this->load->view('admin/list_sent_mail', array('sent_mail' => $data['sent_mail']));
	}

	public function compose_mail() {
		$this->form_validation->set_rules('subject', 'Subject', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE) {
			$data['all_user'] = $this->user_model->get_all_user();
			$this->load->view('admin/compose_mail', array('all_user' => $data['all_user']));
		} else {
			$data = array(
	      'uuid_ms_user_sender' => $this->session->userdata('uuid_ms_user'),
				'uuid_ms_user_receiver' => $this->input->post('receiver'),
	      'subject' => $this->input->post('subject'),
	      'body' => $this->input->post('body'),
		  );

			if ($this->mail_model->send_mail($data)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent! Please check your sentbox</div>');
				redirect('admin/compose-mail');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
				redirect('admin/compose-mail');
			}
		}
	}

	public function send_to_trash($uuid_ms_mail) {
		$this->mail_model->send_to_trash($uuid_ms_mail);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been sent to trash!</div>');
		redirect('admin/list-inbox');
	}

	public function remove_mail($uuid_ms_mail) {
		$this->mail_model->remove_mail($uuid_ms_mail);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been permanently deleted!</div>');
		redirect('admin/list-trash');
	}

	public function read_mail($uuid_ms_mail) {
		$data = $this->mail_model->get_one_mail($uuid_ms_mail);
		$this->load->view('admin/read_mail', $data);
	}

	// public function send_to_draft() {
	//
	// }

	//buggy feature. still on development
	// public function list_draft() {
	//
	// }


}
