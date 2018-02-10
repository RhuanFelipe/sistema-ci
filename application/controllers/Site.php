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
		$inicio = ($this->uri->segment(2) != '') ? $inicio = $this->uri->segment(2) : $inicio = 0;

		$config = array(
			"base_url" => base_url('page'),
			"per_page" => 2,
			"num_links" => 5,
			"uri_segment" => 2,
			"total_rows" => $this->Filmes->total_filmes(),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);


		$this->pagination->initialize($config);

		$data['paginacao_filmes'] = $this->pagination->create_links();
		$data['view'] = 'home';
		$data['titulo'] = 'FilmesMania | Home';
		$data['listar_filmes_all'] = $this->Filmes->listar_filmes_all($config['per_page'], $inicio);
		
		$this->load->view('Site',$data);
	}
}
