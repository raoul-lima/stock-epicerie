<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('Model_main');
		$this->load->helper(array('form','url','file'));
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function verify(){
		$this->form_validation->set_rules('identifiant', 'Identifiant', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
		if($this->form_validation->run()){

			$data = array(
			'user' => $this->input->post('identifiant'),
			'password' => sha1($this->input->post('password'))
			);
			//model------
			$check = $this->Model_main->valid_login($data);
			if($check){
				$this->session->set_userdata('epicerie', '1');
				redirect(base_url(). "main");
			}
			else{
				$this->session->set_flashdata('error', 'Mauvais identifiant ou mot de passe');
				redirect(base_url(). "login");
			}
		
		}
		else{
			redirect(base_url(). "login");
		}

	}

	public function logout(){
		$this->session->unset_userdata('epicerie', '1');
		redirect(base_url(). 'login');
	}

}