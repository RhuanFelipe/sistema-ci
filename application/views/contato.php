<h2>Página de contato</h2>
<?php 

	if($_POST){
		(isset($errors)) ? $msg = $errors : $msg = $sucesso;  
		(isset($errors)) ? $class = 'alert-warning'  : $class = 'alert-success';  
	}	
?>
<?php if($_POST){ ?>
	<div class="alert <?php echo $class; ?>">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <?php echo $msg; ?>
	</div>
<?php } ?>

	<form action="<?php echo base_url('contato/enviar'); ?>" method="post">
		<div class="col-sm-12">
		  <div class="form-group col-sm-6" >
		    <label for="exampleInputEmail1">Nome </label>
		    <input type="text" class="form-control" name="nome" id="exampleInputEmail1"  placeholder="informe o nome">
		  </div>
		 </div>

		 <div class="col-sm-12">
		  <div class="form-group col-sm-6">
		    <label for="exampleInputEmail1">Email:</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="informe o email">
		  </div>
		</div>
		 <div class="col-sm-12">
		  <div class="form-group col-sm-6">
		    <label for="exampleInputEmail1">Assunto:</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="assunto"></textarea>

		  </div>
		</div>
		 <div class="col-sm-12">
		  <div class="form-group col-sm-6">
			<button class="btn btn-primary" name="enviar" >Enviar</button>
		  </div>
		</div>
	</form>
	

