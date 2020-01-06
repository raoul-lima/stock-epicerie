<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model{

	public function valid_login($data){
	$query = $this->db->get_where('admin', $data);
		return $query->result();
	}
	public function insert_login($data){
		$this->db->insert('admin', $data);
	}

	public function inserer($data){
		$this->db->insert('produit', $data);
	}
	public function inserer_categ($data){
		$this->db->insert('categorie', $data);
	}

	public function get_produit($id){
		if($id){
			$this->db->where('id_produit', $id);
		}
		else{
			$this->db->order_by('id_produit', 'DESC');
		}
		$query = $this->db->get('produit');
		return $query->result();
	}
	
	public function update($id, $data, $dataimg){
		$this->db->where('id_produit', $id);
		if($dataimg){
			$this->db->update('produit',$dataimg);
		}
		else{
			$this->db->update('produit',$data);
		}
		
	}
	public function update_prod($name, $data){
		$this->db->where('libelle', $name);
		$this->db->update('produit',$data);
	}

	public function get_name($name){
		$this->db->where('libelle', $name);
		$this->db->select('libelle');
		$query = $this->db->get('produit');
		return $query->row_array();
	}

	public function get_volume($id_prod, $name){
		if($id_prod){
			$this->db->where('id_produit', $id_prod);
			$this->db->select('volume_vendus');
		}
		else{
			$this->db->where('libelle', $name);
			$this->db->select('volume');
		}
		
		$query = $this->db->get('produit');
		return $query->row_array();
	}

	public function list_categorie(){
		$query = $this->db->get('categorie');
		return $query->result();
	}
	public function delete($id_categ, $id_prod){
		if($id_categ){
			$this->db->where("id_categ", $id_categ);
			$this->db->delete("categorie");
		}
		else{
			$this->db->where("id_produit", $id_prod);
			$this->db->delete("produit");
		}
		
	}


}
