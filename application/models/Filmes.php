<?php 

class Filmes extends CI_MODEL{
	function __construct()
	{
		parent::__construct();
	}

	function listar_filmes_all($por_pagina,$inicio)
	{
		// opcional = $this->db->select();
		$this->db->select()->from('filmes')->limit($por_pagina,$inicio);
		$query = $this->db->get();
		return $query->result();
	}
	function total_filmes()
	{
		$query = $this->db->get('filmes');
		return $query->num_rows();
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