<!DOCTYPE html>
<html>

<body>

	<div  align="right">
	<p><b><?php echo $_SESSION['email']?></b>
	<a href="<?=APP_W.'home/logout';?>">Logout!</a></p> <br>
	</div><br>

	<?php

	if($_SESSION['rol'] == 2){

	echo'
			<div class="container">
				<article class="c_anuncio">	<br>
				<p><b>CREAR ANUNCIO</b></p>	<br>
				<form  id="reg" action="'.APP_W.'dashboard/crear_anuncio" method="post">
						Titol:
						<p><input type="text" name="titulo"></p><br>
						Descripcio:
						<p><input type="text" name="descripcio"></p><br>
						Estat: 
						<p><input type="text" name="estat"></p><br>
						<p><input type="submit" value="Envia"></p><br>
				</form>
				</article>
			</div>
	';
	}else{ 

		echo'
			<div class="content">

			<article class="e_user"><br>

		';

		echo  '<a href="'.APP_W.'admin"><b>Editar Usuario</b></p></a><br>';
				
		echo '	
				
				</article>

				<article class="e_user"><br>
				<p><b>Editar Anuncio</b></p><br>
				</article>

				<article class="e_user"><br>
				<p><b>Editar Perfil</b></p><br>
				</article>
			</div>

		';



	}
	?>
	
	
