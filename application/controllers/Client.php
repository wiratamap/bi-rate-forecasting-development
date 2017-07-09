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

	public function forecasting_form() {
		$this->load->view('client/forecasting_form');
	}

	//The Real Forecasting Result
	public function forecasting_result() {
		$this->form_validation->set_rules('datefrom', 'Dari', 'required');
		$this->form_validation->set_rules('dateto', 'Sampai', 'required');
		$this->form_validation->set_rules('interval_length', 'Panjang interval', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('n_top_frequency', 'Rank', 'required|is_natural_no_zero|less_than[11]');
		$this->form_validation->set_rules('sub_interval_length', 'Panjang sub interval', 'required|is_natural_no_zero|less_than[26]|greater_than[0]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('client/forecasting_form');
		} else {
			$dateFrom0 = $this->input->post('datefrom');
			$dateTo0 = $this->input->post('dateto');
			$intervalLength = $this->input->post('interval_length');
			$nTopFrequency = $this->input->post('n_top_frequency');
			$subIntervalLength = $this->input->post('sub_interval_length');

			$dateFromString = explode("-", $dateFrom0);
			$dateToString = explode("-", $dateTo0);
			$dateFrom = [];
			$dateTo = [];
			for ($a=0; $a < count($dateFromString); $a++) {
				$dateFrom[$a] = (int) $dateFromString[$a];
				$dateTo[$a] = (int) $dateToString[$a];
			}

			//percentage change
			$data['data_training'] = $this->data_model->get_all_data_training_by_param($dateFrom);
			$data['data_uji'] = $this->data_model->get_all_data_uji_by_param($dateFrom);

			$b = 0;
			$index = 0;
			foreach ($data['data_training'] as $row) {
				if($b == 0) {
					$initBI = $row->bi_rate;
				} elseif($b >= 1) {
					$percentageChange[$index][0] = round((($row->bi_rate - $initBI)/ $initBI) * 100, 4);
					$percentageChange[$index][1] = 0;
					$initBI = $row->bi_rate;
					$lastDataTraining = $initBI;
					$index++;
				}
				$b++;
			}

			//universe of discourse
			$D1 = 0.1053;
			$D2 = 0.7143;
			$Dmin = min(array_column($percentageChange, 0));
			$Dmax = max(array_column($percentageChange, 0));
			$U[0] = (double)$Dmin - (double)$D1;
			$U[1] = (double)$Dmax + (double)$D2;

			//Interval awal
			$intervalSize = ($U[1] - $U[0]) / $intervalLength;
			$X = array_fill(0, $intervalLength, null);
			$X[0][0] = $U[0];
			$X[0][1] = $U[0] + $intervalSize;
			$X[0][2] = ($X[0][1] + $X[0][0]) / 2;
			$X[0][3] = 0;
			for ($c=1; $c < $intervalLength; $c++) {
				$X[$c][0] = $X[$c-1][1];
				$X[$c][1] = $X[$c][0] + $intervalSize;
				$X[$c][2] = ($X[$c][1] + $X[$c][0]) / 2;
				$X[$c][3] = 0;
			}

			//menghitung frequency density based partitioning
			for ($d=0; $d < count($percentageChange); $d++) {
				for ($da=0; $da < count($X); $da++) {
					if ($percentageChange[$d][0] >= $X[$da][0] && $percentageChange[$d][0] < $X[$da][1]) {
						$X[$da][3] = $X[$da][3] +1;
						$percentageChange[$d][1] = $da;
					}
				}
			}

			//mencari n frekuensi tertinggi
			for ($e=0; $e < count($X); $e++) {
				$XSorted[$e][0] = $X[$e][0];
				$XSorted[$e][1] = $X[$e][1];
				$XSorted[$e][2] = $X[$e][2];
				$XSorted[$e][3] = $X[$e][3];
			}

			for ($ea=0; $ea < count($XSorted) ; ++$ea) {
				for ($eaa=0; $eaa <= 3 ; $eaa++) {
					$max[$eaa] = null;
				}
				$maxKey = null;
				for ($eab=$ea; $eab < count($XSorted); ++$eab) {
					if (null == $max[3] || $XSorted[$eab][3] > $max[3]) {
						$maxKey = $eab;
						$max[0] = $XSorted[$eab][0];
						$max[1] = $XSorted[$eab][1];
						$max[2] = $XSorted[$eab][2];
						$max[3] = $XSorted[$eab][3];
					}
				}
				$XSorted[$maxKey][0] = $XSorted[$ea][0];
				$XSorted[$maxKey][1] = $XSorted[$ea][1];
				$XSorted[$maxKey][2] = $XSorted[$ea][2];
				$XSorted[$maxKey][3] = $XSorted[$ea][3];
				$XSorted[$ea][0] = $max[0];
				$XSorted[$ea][1] = $max[1];
				$XSorted[$ea][2] = $max[2];
				$XSorted[$ea][3] = $max[3];
			}

			//fuzzy intervals
			$subIntervalLengthTemp = $subIntervalLength;
			$subXSize = 0;
			for ($fc=0; $fc < $nTopFrequency; $fc++) {
				$subXSize = $subXSize + ($subIntervalLengthTemp-$fc);
			}
			$indexHelper0 = 0;
			$subX = array_fill(0, $subXSize, null);
			for ($f=0; $f < $nTopFrequency; $f++) {
				$subIntervalSize[$f] = ($XSorted[$f][1] - $XSorted[$f][0]) / $subIntervalLengthTemp;
				$subX[$indexHelper0][0] = $XSorted[$f][0];
				$subX[$indexHelper0][1] = (double)$subX[$indexHelper0][0] + (double)$subIntervalSize[$f];
				$subX[$indexHelper0][2] = ((double)$subX[$indexHelper0][1] + (double)$subX[$indexHelper0][0]) / 2;
				$subX[$indexHelper0][3] = 0;
				$indexHelper0++;
				for ($fa=1; $fa < $subIntervalLengthTemp; $fa++) {
					$subX[$indexHelper0][0] = $subX[$indexHelper0-1][1];
					$subX[$indexHelper0][1] = $subX[$indexHelper0][0] + (double)$subIntervalSize[$f];
					$subX[$indexHelper0][2] = ((double)$subX[$indexHelper0][1] + (double)$subX[$indexHelper0][0]) / 2;
					$subX[$indexHelper0][3] = 0;
					$indexHelper0++;
				}
				$subIntervalLengthTemp = $subIntervalLengthTemp-1;
			}

			$newXLength = (count($XSorted) - $nTopFrequency) + count($subX);
			$newX = array_fill(0, $newXLength, null);
			for ($g=0; $g < count($subX); $g++) {
				for ($ga=0; $ga < 4; $ga++) {
					$newX[$g][$ga] = $subX[$g][$ga];
				}
			}
			$indexHelper = $nTopFrequency;
			for ($h=count($subX); $h < $newXLength; $h++) {
				for ($ha=0; $ha < 4; $ha++) {
					$newX[$h][$ha] = $XSorted[$indexHelper][$ha];
				}
				$indexHelper++;
				$newX[$h][3] = 0;
			}

			for ($i=0; $i < count($newX); $i++) {
				for ($ii=0; $ii < 4; $ii++) {
					$XFinal[$i][$ii] = $newX[$i][$ii];
				}
			}

			for ($ia=0; $ia < count($XFinal) ; ++$ia) {
				for ($iaa=0; $iaa <= 3 ; $iaa++) {
					$min[$iaa] = null;
				}
				$minKey = null;
				for ($iab=$ia; $iab < count($XFinal); ++$iab) {
					if (null == $min[2] || $XFinal[$iab][2] < $min[2]) {
						$minKey = $iab;
						$min[0] = $XFinal[$iab][0];
						$min[1] = $XFinal[$iab][1];
						$min[2] = $XFinal[$iab][2];
						$min[3] = $XFinal[$iab][3];
					}
				}
				$XFinal[$minKey][0] = $XFinal[$ia][0];
				$XFinal[$minKey][1] = $XFinal[$ia][1];
				$XFinal[$minKey][2] = $XFinal[$ia][2];
				$XFinal[$minKey][3] = $XFinal[$ia][3];
				$XFinal[$ia][0] = $min[0];
				$XFinal[$ia][1] = $min[1];
				$XFinal[$ia][2] = $min[2];
				$XFinal[$ia][3] = $min[3];
			}
			for ($ib=0; $ib < count($XFinal) ; $ib++) {
				$XFinal[$ib][3] = $ib+1;
			}

			//fuzzifikasi data historis
			for ($j=0; $j < count($percentageChange); $j++) {
				for ($ja=0; $ja < count($XFinal); $ja++) {
					if ($percentageChange[$j][0] >= $XFinal[$ja][0] && $percentageChange[$j][0] < $XFinal[$ja][1]) {
						$percentageChange[$j][1] = $XFinal[$ja][3];
					}
				}
			}

			//membentuk FLR
			$FLR = [[]];
			for ($k=0; $k < count($percentageChange)-1; $k++) {
				$FLR[$k]['prevState'] = $percentageChange[$k][1];
				$FLR[$k]['nextState'] = $percentageChange[$k+1][1];
			}

			//membentuk FLRG
			for ($l=0; $l < count($FLR) ; $l++) {
				$FLR_PS[$l] = $FLR[$l]['prevState'];
			}

			$FLRG_PS = array_unique($FLR_PS);
			$indexHelper1 = 0;
			foreach ($FLRG_PS as $r) {
				$FLRG[$indexHelper1]['prevState'] = $r;
				for ($m=0; $m < count($FLR) ; $m++) {
					if ($r ==  $FLR[$m]['prevState']) {
						$FLRG[$indexHelper1]['nextState'][] = $FLR[$m]['nextState'];
					}
				}
				$indexHelper1++;
			}

			$indexHelper2 = 0;
			foreach ($FLRG as $FLRG_final) {
				unset($FLRG[$indexHelper2]['nextState']);
				$FLRG[$indexHelper2]['nextState'] = array_values(array_unique($FLRG_final['nextState']));
				asort($FLRG);
				asort($FLRG[$indexHelper2]['nextState']);
				$FLRG[$indexHelper2]['nextState'] = array_values($FLRG[$indexHelper2]['nextState']);
				$FLRG_new = array_values($FLRG);
				$indexHelper2++;
			}

			//fuzzy set
			$maximum = 1;
			for ($n=1; $n <= count($XFinal); $n++) {
				$membershipDegree = $maximum;
				for ($na=1; $na <= count($XFinal); $na++) {
					if ($n == 1) {
						$fuzzySet[$n][$na] = $membershipDegree;
						if($membershipDegree > 0) {
							$membershipDegree = $membershipDegree - 0.5;
						}
					} else {
						$fuzzySet[$n][$na] = $membershipDegree;
						$membershipDegree = $fuzzySet[$n-1][$na];
					}
				}
				if ($maximum>0) {
					$maximum = $maximum - 0.5;
				}
			}

			//fuzzifikasi data uji
			$q = 0;
			foreach ($data['data_uji'] as $row) {
				$percentageChangeDataUji[$q][0] = round((($row->bi_rate - $initBI)/ $initBI) * 100, 4);
				for ($qa=0; $qa < count($XFinal); $qa++) {
					if ($percentageChangeDataUji[$q][0] >= $XFinal[$qa][0] && $percentageChangeDataUji[$q][0] < $XFinal[$qa][1]) {
						$percentageChangeDataUji[$q][1] = $XFinal[$qa][3];
					}
				}
				$initBI = $row->bi_rate;
				$dataUjiBIrate[$q] = $initBI;
				$q++;
			}

			//fuzzy output
			$lastState[0] = $percentageChange[count($percentageChange)-1][1];
			for ($pb=1; $pb < count($percentageChangeDataUji); $pb++) {
				$lastState[$pb] = $percentageChangeDataUji[$pb][1];
			}
			for ($pc=0; $pc < count($FLRG_new); $pc++) {
				for ($pca=0; $pca < count($lastState); $pca++) {
					if($lastState[$pca] == $FLRG_new[$pc]['prevState']) {
						$lastStateFLRG[$pc] = $FLRG_new[$pc]['prevState'];
					}
				}
			}
			// $lastStateFLRG = array_values($lastStateFLRG);
			$arrayKeyLastStateFLRG = array_keys($lastStateFLRG);

			for ($o=0; $o < count($lastStateFLRG); $o++) {
				for ($oa=0; $oa < count($FLRG_new[$arrayKeyLastStateFLRG[$o]]['nextState']); $oa++) {
					for ($oaa=1; $oaa <= count($fuzzySet); $oaa++) {
						for ($oaaa=1; $oaaa <= count($fuzzySet); $oaaa++) {
							$relationalMatriks[$arrayKeyLastStateFLRG[$o]][$oa][$oaa][$oaaa] = min($fuzzySet[$FLRG_new[$arrayKeyLastStateFLRG[$o]]['prevState']][$oaa],
																																										 $fuzzySet[$FLRG_new[$arrayKeyLastStateFLRG[$o]]['nextState'][$oa]][$oaaa]);
						}
					}
				}
			}
			for ($r=0; $r < count($relationalMatriks); $r++) {
				for ($ra=1; $ra <= count($fuzzySet); $ra++) {
					for ($rb=1; $rb <= count($fuzzySet) ; $rb++) {
						$maxTemporary = -99;
						for ($rc=0; $rc < count($FLRG_new[$arrayKeyLastStateFLRG[$r]]['nextState']); $rc++) {
							$relationalMatriks2[$arrayKeyLastStateFLRG[$r]][$ra][$rb] = max($maxTemporary, $relationalMatriks[$arrayKeyLastStateFLRG[$r]][$rc][$ra][$rb]);
							$maxTemporary = $relationalMatriks2[$arrayKeyLastStateFLRG[$r]][$ra][$rb];
						}
					}
				}
			}
			for ($s=0; $s < count($relationalMatriks2); $s++) {
				for ($sa=1; $sa <= count($fuzzySet); $sa++) {
					for ($sb=1; $sb <= count($fuzzySet); $sb++) {
						$compositionMatriks[$arrayKeyLastStateFLRG[$s]][$sa][$sb] = min($fuzzySet[$FLRG_new[$arrayKeyLastStateFLRG[$s]]['prevState']][$sb],
																																						$relationalMatriks2[$arrayKeyLastStateFLRG[$s]][$sa][$sb]);
					}
				}
			}
			for ($t=0; $t < count($compositionMatriks); $t++) {
				for ($ta=1; $ta <= count($fuzzySet) ; $ta++) {
					$maxTemporary = -99;
					for ($tb=1; $tb <= count($fuzzySet) ; $tb++) {
						$compositionMatriks2[$arrayKeyLastStateFLRG[$t]][$ta] = max($maxTemporary, $compositionMatriks[$arrayKeyLastStateFLRG[$t]][$tb][$ta]);
						$maxTemporary = $compositionMatriks2[$arrayKeyLastStateFLRG[$t]][$ta];
					}
				}
			}

			//defuzzifikasi
			for ($u=0; $u < count($compositionMatriks2); $u++) {
				if(array_sum($compositionMatriks2[$arrayKeyLastStateFLRG[$u]]) != 0 ) {
					$defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['pembilang'] = array_sum($compositionMatriks2[$arrayKeyLastStateFLRG[$u]]);
					$defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['penyebut'] = 0;
					for ($ua=1; $ua <= count($fuzzySet); $ua++) {
						$defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['penyebut'] = $defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['penyebut']
																																				 + ($compositionMatriks2[$arrayKeyLastStateFLRG[$u]][$ua] / $XFinal[$ua-1][2]);
					}
					$defuzzifikasiRule[$arrayKeyLastStateFLRG[$u]] = $defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['pembilang'] / $defuzzifikasiResult[$arrayKeyLastStateFLRG[$u]]['penyebut'];
				} else {
					$defuzzifikasiRule[$arrayKeyLastStateFLRG[$u]] = 0;
				}
			}
			$predictedPercentageChange = [];
			for ($v=0; $v < count($lastState) ; $v++) {
				for ($va=0; $va < count($lastStateFLRG) ; $va++) {
					if($lastState[$v] == $lastStateFLRG[$arrayKeyLastStateFLRG[$va]] ) {
						$predictedPercentageChange[$v] = $defuzzifikasiRule[$arrayKeyLastStateFLRG[$va]];
					}
				}
			}

			//mengembalikan percentage change ke data aktual
			$forecastedData[0] = $lastDataTraining + (($predictedPercentageChange[0] / 100) * $lastDataTraining);
			for ($w=1; $w < count($predictedPercentageChange); $w++) {
				$forecastedData[$w] = $dataUjiBIrate[$w-1] + (($predictedPercentageChange[$w] / 100) * $dataUjiBIrate[$w-1]);
			}

			//cek MAPE
			for ($x=0; $x < count($forecastedData) ; $x++) {
				$errorRate[$x] = abs(($forecastedData[$x] - $dataUjiBIrate[$x]) / $dataUjiBIrate[$x]);
			}
			$MAPE = (array_sum($errorRate) / count($forecastedData)) * 100;

			// echo '<pre>' . var_export($FLRG_new, true) . '</pre>';
			// echo '<pre>' . var_export($lastState, true) . '</pre>';

			// echo '<pre>' . var_export($lastStateFLRG, true) . '</pre>';
			// echo '<pre>' . var_export($predictedPercentageChange, true) . '</pre>';
			// echo '<pre>' . var_export($forecastedData, true) . '</pre>';
			// echo '<pre>' . var_export($errorRate, true) . '</pre>';
			// echo '<pre>' . var_export($dataUjiBIrate, true) . '</pre>';
			// echo json_encode($dataUjiBIrate);

			// variabel x sudah dipakai untuk interval awal, jangan dipakai lagi untuk variabel looping
			$this->load->view('client/forecasting_result', array('percentage_change' => $percentageChange,
																								'data_training' => $data['data_training'],
																								'data_uji' => $data['data_uji'],
																								'percentage_change_data_uji' => $percentageChangeDataUji,
																								'D1' => $D1,
																								'D2' => $D2,
																								'Dmin' => $Dmin,
																								'Dmax' => $Dmax,
																								'U' => $U,
																								'interval_awal' => $X,
																								'n_top_frequency' => $nTopFrequency,
																								'x_nTopFrequency' => $XSorted,
																								'x_final' => $XFinal,
																								'FLR' => $FLR,
																								'FLRG' => $FLRG_new,
																								'predicted_percentage_change' => $predictedPercentageChange,
																								'forecasted_data' => $forecastedData,
																								'error_rate' => $errorRate,
																								'MAPE' => $MAPE));

		}



	}

	//Faker forecasting result
	public function fake_forecasting_result() {
		$this->load->view('client/forecasting_result');
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
