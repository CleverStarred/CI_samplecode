<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller {

	public function _construct() {
		parent::_construct();
		$this->load->library('session');
	}

	public function index() {
		$user_id = $this->session->userdata('id');
		if (!empty($user_id)) {
			redirect('dashboard');
		}
		$data = array('text' => 'text');
		$this->load->view('page_layout/head');
		$this->load->view('login', $data);
		$this->load->view('page_layout/footer');
	}

	public function log_in() {
		$this->load->model('log_model', 'logM');
		$data = $this->input->post();
		$username = $data['log_username'];
		$user_data = $this->logM->getUserdataByEmail($username);
		$this->session->set_userdata($user_data);
		redirect('dashboard');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}

	public function check_log_info() {
		$this->load->model('log_model', 'logM');
		$data = $this->input->post();
		$cnt =$this->logM->check_loginfo($data['username'], md5($data['password']));
		if ($cnt > 0)
			echo 1;
		else 
			echo 0;
	}

	public function check_reg_email() {
		$this->load->model('log_model', 'logM');
		$email = $this->input->post('email');
		$cnt = $this->logM->checkEmail($email);
		if ($cnt > 0) {
			echo 1;
		} else 
			echo 0;
	}
}