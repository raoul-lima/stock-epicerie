<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_main');
		$this->load->helper(array('form','url'));
		$this->load->helper('string');
		$this->load->library('form_validation');
		if(!$this->session->userdata('epicerie'))
			redirect(base_url(). "login/");
	}
	public function index(){
		$resultat['result'] = $this->Model_main->get_produit($id=[]);
		$resultat['list'] = $this->Model_main->list_categorie();
		$this->load->view('main',$resultat);
	}
	public function add_produit(){
		$id_categ = $this->input->post('option');
		$name = $this->input->post('libelle');
		$volume = $this->input->post('volume');
		$libelle = $this->Model_main->get_name($name);
		if( ($volume) > 0 ){

			if($libelle){
			$donnees['result']= $this->Model_main->get_volume($id_prod=[],$name);
			$new_v['volume'] = ($donnees['result']['volume'])+($volume);
			echo ($donnees['result']['volume'])+($volume);
			$this->Model_main->update_prod($name, $new_v);
			redirect(base_url(). ""); 
		}
		else{
				//echo "tsy misy ty ao";
			$data['libelle'] = $name;
			$data['id_categ'] = $id_categ;
			$data['volume'] = $volume;
			$data['date'] = date("Y/m/d");
			$this->Model_main->inserer($data);
			redirect(base_url(). "");
			}
		}
		else redirect(base_url(). "");
	}
	public function add_categ(){
		$data['categ'] = $this->input->post('nom_categ');
		$this->Model_main->inserer_categ($data);
		redirect(base_url(). "");
	}

	public function add_vendus(){
		$id_produit = $this->input->post('id_prods');
		$v_vendus = $this->input->post('v_vendus');
		$libelle = $this->input->post('libelle');
		
		if(($v_vendus) >0){
			$data['volv']= $this->Model_main->get_volume($id_produit, $name=[]);
			$donnees['result']= $this->Model_main->get_volume($id_prod=[],$libelle);
			if( ( ($data['volv']['volume_vendus'])+($v_vendus) ) > ($donnees['result']['volume']) ){
			redirect(base_url(). "main/affiche/$id_produit");
			}
		else{
			$new_v['volume_vendus'] = ($data['volv']['volume_vendus'])+($v_vendus);
			$this->Model_main->update($id_produit, $new_v, $dataimg=[]);
			redirect(base_url(). "main/affiche/$id_produit");
			}
		}else redirect(base_url(). "main/affiche/$id_produit");
	
		
	}
	public function update_image(){
		$key = $this->input->post('id_prod');
		$dataimg['image'] = $this->do_upload_image();

		$this->Model_main->update($key, $data=[], $dataimg);
		redirect(base_url(). "main/affiche/$key");
	}

	public function list_categorie(){
		$resultat['result'] = $this->Model_main->list_categorie();
		$this->load->view('list_ports', $resultat);
	}

	public function delete_categ(){
		$key = $this->uri->segment(3);
		$this->Model_main->delete($key, $id_prod=[]);
		redirect(base_url(). "");
	}
	public function delete_produit(){
		$key = $this->uri->segment(3);
		$this->Model_main->delete($id_categ=[], $key);
		redirect(base_url(). "");
	}

	public function affiche(){
		$key = $this->uri->segment(3);
		$resultat['result'] = $this->Model_main->get_produit($key);
		$resultat['list'] = $this->Model_main->list_categorie();
		$this->load->view('affiche',$resultat);
	}

	public function do_upload_image(){
		$file = $_FILES['image']['name'];

		if(is_uploaded_file($_FILES['image']['tmp_name'])){
			move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/".$file);
			return $file;
		}
		else return "";
	}

}
