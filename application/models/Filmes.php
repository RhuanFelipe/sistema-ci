<?php 

class Filmes extends CI_MODEL{
	function __construct()
	{
		parent::__construct();
	}

	function listar_filmes_all()
	{
		// opcional = $this->db->select();
		$query = $this->db->get('filmes');
		return $query->result();
	}	
}