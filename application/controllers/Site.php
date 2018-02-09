<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filmes');
	}
	public function cadastrar(){
		$attribute = array(
			'nome_filme' => 'avatar',
			'desc_filme' => 'ficção'
		);
		
		$this->Filmes->cadastrar_filmes($attribute);
	}
	public function atualizar(){
		$attribute = array(
			'nome_filme' => 'Avatar',
			'desc_filme' => 'ficção e ação'
		);
		
		$this->Filmes->atualizar_filmes(3,$attribute);
	}
	
	public function excluir(){
		$this->Filmes->deletar_filmes(4);
	}

	public function index()
	{
		$data['view'] = 'home';
		$data['listar_filmes_all'] = $this->Filmes->listar_filmes_all();
		$this->load->view('Site',$data);
	}
}
