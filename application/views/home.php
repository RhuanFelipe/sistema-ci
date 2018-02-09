<?php 

foreach($listar_filmes_all as $filmes):
	echo "<div class='box_filmes'>";
	echo ucwords(heading($filmes->nome_filme, 2));
	echo "<p>".$filmes->desc_filme."</p>";
	echo "</div>";
endforeach;
