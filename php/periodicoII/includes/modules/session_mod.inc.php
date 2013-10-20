<?php if(!Session::verifyUser()){ ?>
<form action="index.php" method="post" id="loginform">
	<fieldset>
		<label for="username">Usuario/E-mail:</label> 
		<input type="text" name="username" id="username" autofocus /> 
		<label for="password">Contraseña:</label> 
		<input type="password" name="password" id="password"/> 
	</fieldset>
	<fieldset>
		<input type = "submit" value = "Login" />
		<input type = "submit" formaction="?view=registration" value = "Registrarse" >
	</fieldset>
</form>
<?php }else{echo 'Bienvenido, ' . Session::getUser();?>
	
	<form action="index.php" method="post" id="loginform">
		<input type="submit" value = "Desconectar" name = "logout">
		<input type = "submit" formaction="?view=administration" value = "Gestionar Noticias" >
	</form>
	
<?php } ?>
