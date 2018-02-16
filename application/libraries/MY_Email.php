<?php 

class MY_Email extends CI_Email
{
	private $config = array(); 

	public function __construct()
	{
		parent::__construct();
	}
	public function setConfiguration(){
		$this->config['protocol'] = 'smtp';
		$this->config['smtp_host'] = 'ftp.epizy.com';
		$this->config['smtp_port'] = '25';
		$this->config['smtp_user'] = 'rhuan@rhuanfelsilva.epizy.com';
		$this->config['smtp_pass'] = 'programacao';
		$this->config['mailtype'] = 'html';
		$this->config['charset'] = 'utf-8';

		return $this->config;
	}
}