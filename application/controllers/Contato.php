<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filmes');
	}


	public function index()
	{
		$data['view'] = 'contato';
		$data['titulo'] = 'FilmesMania | contato';
		$this->load->view('Site',$data);
	}

	public function enviar()
	{

		if($_POST):
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if (!$this->form_validation->run()){
				$data['errors'] = validation_errors();
			}else{
				$data['sucesso'] = 'Formulário enviado com sucesso!';
			}
			

			$data['view'] = 'contato';
			$data['titulo'] = 'FilmesMania | contato';
			$this->load->view('Site',$data);
		endif;
	}
}
