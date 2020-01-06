<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('string');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('main');
	}
	public function ajout(){
		$this->load->view('ajout');
	}
}
