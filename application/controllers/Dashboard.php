<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard  extends Base_Controller {

	public function _construct() {
		parent::_construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->check_session();

		$data = array();
		$this->load->model('log_model', 'logM');
		$users = $this->logM->getUsers();
		$url = "https://api.github.com/repos/angular/angular/commits";
		$temp_content = $this->get_fcontent($url);
		$contents = json_decode($temp_content[0]);
		$data = array(
			'users'		=> $users,
			'contents'	=> $contents,
		);
		$this->_showPage($data);
	}
}