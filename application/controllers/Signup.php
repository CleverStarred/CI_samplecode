<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends Base_Controller {

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
		$this->load->view('signup', $data);
		$this->load->view('page_layout/footer');
	}

	public function register() {
		$data = $this->input->post();
		$reg_data = array(
			'email'		=> $data['sign_email'],
			'password'	=> md5($data['sign_pass'])
		);
		$user_id = $this->baseM->insertData("users", $reg_data);
		
		$session_data = array(
			'id'		=> $user_id,
			'email'		=> $data['sign_email'],
		);
		$this->session->set_userdata($session_data);
		redirect('dashboard');
	}
}