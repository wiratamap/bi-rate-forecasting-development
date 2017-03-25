<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller {

	public $GLOBAL_DATA_SUBSYSTEM_VALUE;

	public function __construct() {
		parent::__construct();

		$this->GLOBAL_DATA_SUBSYSTEM_VALUE = $this->expert_model->get_one('subsystem_value', 'ms_subsystem', $this->session->userdata('uuid_ms_subsystem'));

		if(empty($this->session->userdata('is_logged_in')) && $this->session->userdata('uuid_ms_subsystem') != GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT) {
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You dont have an access to view this page!</div>');
			redirect('');
		}
	}

	public function index() {

	}

	public function home() {
		$this->load->view('expert/home');
	}

  public function list_data_training() {
		$data['data_training'] = $this->data_model->get_all_data_training();

		$a=0;
		$bi_percentage[$a] = 0;
		foreach ($data['data_training'] as $row) {
			$bi_percentage[$a] = $row->bi_rate * 100;
			$a++;
		}

		$this->load->view('expert/list_data_training', array('data_training' => $data['data_training'],
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

		$this->load->view('expert/list_data_uji', array('data_uji' => $data['data_uji'],
																									 'bi_percentage' => $bi_percentage));
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

		$this->load->view('expert/pre_forecasting', array('data_training' => $data['data_training'],
																											'data_uji' => $data['data_uji'],
																											'bi_percentage_training' => $bi_percentage_training,
																											'bi_percentage_uji' => $bi_percentage_uji));
	}

}
