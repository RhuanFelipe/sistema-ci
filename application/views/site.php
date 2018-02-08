<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Página Inicial</title>	
	<?php  echo link_tag('assets/css/site.css')?>
</head>
<body>
	<div id="container">
		<h1>Site Codeigniter!</h1>
		<div id="body">
			<?php $this->load->view("$view"); ?>
		</div>
	</div>
</body>
</html>