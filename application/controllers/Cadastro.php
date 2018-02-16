<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filmes');
	}


	public function index()
	{
		$data['view'] = 'cadastro';
		$data['titulo'] = 'FilmesMania | Pagina de Cadastro';
		$this->load->view('Site',$data);
	}
	
	public function register()
	{

	}

}
