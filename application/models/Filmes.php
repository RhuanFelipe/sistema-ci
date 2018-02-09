<?php 

class Filmes extends CI_MODEL{
	function __construct()
	{
		parent::__construct();
	}

	function listar_filmes_all()
	{
		// opcional = $this->db->select();
		$this->db->select()->from('filmes');
		$query = $this->db->get();
		return $query->result();
	}
	
	function cadastrar_filmes($attribute){
		$this->db->insert('filmes',$attribute);
	}
	
	function deletar_filmes($id){
		$this->db->where('id_filme',$id);
		$this->db->delete('filmes');
	}

	function atualizar_filmes($id, $attribute){
		$this->db->where('id_filme',$id);
		$this->db->update('filmes',$attribute);
	}	
}