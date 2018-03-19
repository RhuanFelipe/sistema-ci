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
			
			/* renomear foto */
            $nome_atual = $_FILES['userfile']['name'];
            $novo_nome = md5(uniqid(time())) . strrchr($nome_atual, ".");
			
			$this->form_validation->set_rules('filme', 'Filme', 'required');
			$this->form_validation->set_rules('descricao', 'Descrição', 'required');
			$this->load->library('upload');
			$this->upload->setName($novo_nome);
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

			if(!$this->upload->do_upload()){
				$data['errors'] = $this->upload->display_errors();
			}else{
				$this->load->model('Filmes');
                $data_upload = $this->upload->data();
       			/* faz resize da foto */
                $this->load->library('image_lib');
                $this->image_lib->setPath($_FILES['userfile']['tmp_name']);
                $this->image_lib->setNew($data_upload['file_path'] . 'thumbs/' . $data_upload['file_name']);
              	$this->image_lib->setLargura(200);
                $this->image_lib->setAltura(150);
                $config_resize = $this->image_lib->setConfiguration();
                $this->image_lib->initialize($config_resize);

               	if (!$this->image_lib->resize()) {
                    unlink($data_upload['full_path']);
                    echo $this->image_lib->display_errors();
                } else {
					$attributes = array(
						"nome_filme" => $filme,
						"desc_filme" => $descricao,
						"foto_filme" => 'public/arquivos/'.$data_upload['file_name'],
	                    "filme_thumb" => 'public/arquivos/thumbs/' . $data_upload['file_name']
					);
				
				$this->Filmes->cadastrar_filmes($attributes);
				$data['sucesso'] = 'Imagem salva com sucesso!';
				}
			}
          }
			
			$data['view'] = 'cadastro';
			$data['titulo'] = 'FilmesMania | Pagina de Cadastro';
			$this->load->view('Site',$data);
		}
	}

}
