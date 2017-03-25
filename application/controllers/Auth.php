<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $GLOBAL_PARAM_UUID_SUBSYSTEM_ADMIN = "4249b7c8-06ba-11e7-88db-c454448293a1";
	private $GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT = "4249cbf4-06ba-11e7-88db-c454448293a1";
	private $GLOBAL_PARAM_UUID_SUBSYSTEM_CLIENT = "d8067dd0-06ba-11e7-88db-c454448293a1";

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('login');
	}

	public function authentication() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$result = $this->auth_model->login_validate('ms_user', $where)->num_rows();

		if($result>0) {
			if($this->auth_model->get_is_active('is_active', 'ms_user', $username) == "1") {
				if($this->auth_model->get_is_logged_in('is_logged_in', 'ms_user', $username) == "0") {
					$this->auth_model->is_logged_in_update($username, "1");
					$data_session = array(
						'username' => $username,
						'full_name' => $this->auth_model->get_one('full_name', 'ms_user', $username),
						'uuid_ms_subsystem' => $this->auth_model->get_one('uuid_ms_subsystem', 'ms_user', $username),
						'uuid_ms_user' => $this->auth_model->get_one('uuid_ms_user', 'ms_user', $username),
						'dtm_crt' => $this->auth_model->get_one('dtm_crt', 'ms_user', $username),
						'is_logged_in' => $this->auth_model->get_one('is_logged_in', 'ms_user', $username),
						'prm_appversion' => $this->gs_model->get_one('gs_value', 'ms_general_settings', 'PRM1_APPVERSION')
					);

					$this->session->set_userdata($data_session);

					if ($this->session->userdata('uuid_ms_subsystem') == $this->GLOBAL_PARAM_UUID_SUBSYSTEM_ADMIN) {
						redirect('admin/home');
					} elseif ($this->session->userdata('uuid_ms_subsystem') == $this->GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT) {
						redirect('expert/home');
					} elseif ($this->session->userdata('uuid_ms_subsystem') == $this->GLOBAL_PARAM_UUID_SUBSYSTEM_CLIENT) {
						redirect('client/home');
					} else {
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Invalid Subsystem, Please contact your Administrator or Web Master!</div>');
		        redirect('');
						// var_dump($this->session->userdata('full_name'));
					}
				} else {
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your account has been logged in on another device, please log out first</div>');
					redirect('');
				}
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your account is expired, please contact your Administrator or Web Master!</div>');
				redirect('');
			}
		 } else {
			 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Wrong username or password!</div>');
			 redirect('');
		 }
	}

	public function registration() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]|max_length[30]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[15]|required');
    $this->form_validation->set_rules('passconf', 'Retype password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('registration');
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
				if ($this->user_model->insert_user($data)) {
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please contact your Administrator to verify your account</div>');
	        redirect('auth/registration');
				} else {
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
	        redirect('auth/registration');
				}
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">username or email already used! please use another username or email!</div>');
				redirect('auth/registration');
			}
		}
	}

	public function logout() {
		$username = $this->session->userdata('username');
		$this->auth_model->is_logged_in_update($username, "0");

		$this->session->sess_destroy();
		// session_destroy();
		redirect('auth');
	}
}
