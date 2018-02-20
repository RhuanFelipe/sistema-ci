<form action="<?php echo base_url(); ?>cadastro/register" enctype="multipart/form-data" 
	method="post" >
	<div class="col-sm-12">
	  <div class="form-group col-sm-6" >
	    <label for="filme">Filme </label>
	    <input type="text" class="form-control" name="filme" id ="filme" placeholder="informe o filme">
	  </div>
	 </div>
	 <div class="col-sm-12">
	  <div class="form-group col-sm-6">
	    <label for="descricao">Descrição:</label>
	    <textarea name="descricao" id="descricao" class="form-control" id="" cols="30" rows="10"></textarea>
	  </div>
	</div>
	<label class="custom-file">
	  <input type="file" id="userfile" class="custom-file-input" name="userfile">
	</label><br>
	<input type="submit" name="ok" value="cadastrar" class="btn btn-primary"  />
</form>
<br>

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
