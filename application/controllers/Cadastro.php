<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	
	 public function __construct() {
        parent::__construct();
    }


	public function index()
	{
		$data['view'] = 'cadastro';
		$data['titulo'] = 'FilmesMania | Pagina de Cadastro';
		$this->load->view('Site',$data);
	}
	
	public function register()
	{
		if($_POST){
			$filme = $this->input->post('filme');
			$descricao = $this->input->post('descricao');

			$this->form_validation->set_rules('filme', 'Filme', 'required');
			$this->form_validation->set_rules('descricao', 'Descrição', 'required');

			$this->load->library('upload');
			$this->upload->setTypes('jpeg|png|jpg');
			$this->upload->setWidth(500);
			$this->upload->setHeight(500);
			$this->upload->setSize(200);
            $this->upload->setPath('./assets/arquivos/');

          if (!$this->form_validation->run()) {
          	$data['errors'] = validation_errors();
          } else {
          	$config = $this->upload->setConfiguration();
			$this->upload->initialize($config);

			if(!$this->upload->do_upload())
				$data['errors'] = $this->upload->display_errors();
			else
				$data['sucesso'] = 'Imagem salva com sucesso!';
          }
			
			$data['view'] = 'cadastro';
			$data['titulo'] = 'FilmesMania | Pagina de Cadastro';
			$this->load->view('Site',$data);
		}
	}

}
