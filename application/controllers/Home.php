<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {

	public function _construct() {
		parent::_construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data = array();
		$this->_showPage($data);
	}
}