<?php 

class MY_Email extends CI_Email
{
	private $config = array(); 

	public function __construct()
	{
		parent::__construct();
	}
	public function setConfiguration(){

		$this->config['protocol']    = 'smtp';
        $this->config['smtp_host']    = 'ssl://smtp.gmail.com';
        $this->config['smtp_port']    = '465';
        $this->config['smtp_timeout'] = '7';
        $this->config['smtp_user']    = 'rhuanfelsilva@gmail.com';
        $this->config['smtp_pass']    = '';
        $this->config['charset']    = 'utf-8';
        $this->config['newline']    = "\r\n";
        $this->config['mailtype'] = 'text'; // or html
    
		return $this->config;
	}
}