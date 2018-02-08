<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filmes');
	}
	public function index()
	{
		$data['view'] = 'home';
		$data['listar_filmes_all'] = $this->Filmes->listar_filmes_all();
		$this->load->view('Site',$data);
	}
}
