<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filmes');
		$this->load->library('pagination');
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
		$por_pagina = 2;
		$inicio = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$config['per_page'] = $por_pagina;
		$config['base_url'] = base_url().'page/';
		$config['num_links'] = 5;
		$config['first_url'] = 0;
		$config['uri_segment'] = 2;
		$config['next_link'] = '&raquo;&raquo;';
		$config['prev_link'] = '&laquo;&laquo;';
		$config['total_rows'] = $this->Filmes->total_filmes();
		
		$this->pagination->initialize($config);
		$data['paginacao_filmes'] = $this->pagination->create_links();
		$data['view'] = 'home';

		$data['listar_filmes_all'] = $this->Filmes->listar_filmes_all($por_pagina, $inicio);
		$this->load->view('Site',$data);
	}
}
