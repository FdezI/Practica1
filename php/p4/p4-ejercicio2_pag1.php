<!DOCTYPE html> 
<html> 
<head> 
<title>Formulario</title> 
</head> 
<body> 
<h1>Ejemplo de formulario</h1> 
<p>Por favor, rellene los siguientes datos y haga click en el botón Enviar.</p> 
<?php
if(isset($_POST['pag']))
	$pag=$_POST['pag']+1;
else
	$pag=1;

echo '<form action="p4-ejercicio2_pag1.php" method="post">' .
	'<label for="nombre"'; if ($pag!=1){ echo ' hidden';} echo '>Nombre</label>';
echo '<input type="text" name="nombre" id="nombre" value=""'; if ($pag!=1){ echo ' hidden';} echo '/>';
echo '<label for="apellido"'; if ($pag!=1){ echo ' hidden';} echo '>Apellido</label>';
echo '<input type="text" name="apellido" id="apellido" value=""'; if ($pag!=1){ echo ' hidden';} echo '/>';

echo '<label for="password1"'; if ($pag!=2){ echo ' hidden';} echo '>Contrase&ntilde;a</label>';
echo '<input type="password"'; if ($pag!=2){ echo ' hidden';} echo ' name="password1" id="password1" value="" />';
echo '<label for="password2"'; if ($pag!=2){ echo ' hidden';} echo '>Repita la contrase&ntilde;a</label>';
echo '<input type="password"'; if ($pag!=2){ echo ' hidden';} echo ' name="password2" id="password2" value="" />';
echo '<label for="generoHombre"'; if ($pag!=3){ echo ' hidden';} echo '>&iquest;Eres hombre</label>';
echo '<input type="radio"'; if ($pag!=3){ echo ' hidden';} echo ' name="genero" id="generoHombre" value="H" />';
echo '<label for="generoFemale"'; if ($pag!=3){ echo ' hidden';} echo '>... o mujer&#63;</label>';
echo '<input type="radio"'; if ($pag!=3){ echo ' hidden';} echo ' name="genero" id="generoMujer" value="M" />';
echo '<label for="rangoEdad"'; if ($pag!=4){ echo ' hidden';} echo '>Rango de edad</label>';
echo '<select name="rangoEdad"'; if ($pag!=4){ echo ' hidden';} echo ' id="rangoEdad" size="1">';
echo '<option value="infante">Infante</option>';
echo '<option value="adolescente">Adolescente</option>';
echo '<option value="adulto">Adulto</option>'; 
echo '<option value="mayor">Mayor</option>';
echo '</select>';
echo '<label for="deporte"'; if ($pag!=4){ echo ' hidden';} echo '>Practicas deporte</label>';
echo '<input type="checkbox"'; if ($pag!=4){ echo ' hidden';} echo ' name="deporte" id="deporte" value="S&iacute;" />';
echo '<label for="comentarios"'; if ($pag!=5){ echo ' hidden';} echo '>&iquest;Alg&uacute; comentario?</label>';
echo '<textarea name="comentarios"'; if ($pag!=5){ echo ' hidden';} echo ' id="comentarios" rows="4" cols="50"> </textarea>';
echo '<input type="submit"'; if ($pag!=5){ echo ' hidden';} echo ' name="botonDeEnvio" id="botonDeEnvio"';
echo 'value="Enviar datos" />';
echo '<input type="reset"'; if ($pag!=5){ echo ' hidden';} echo ' name="bontoDeReset" id="botonDeEnvio"';
echo 'value="Vaciar formulario" />';
echo '<input hidden type="text" id="pag" name="pag" value="' . $pag . '"/>';
if ($pag!=5){ echo '<br><input type="submit" value="Siguiente página" name="nextPage">';}
?>
</form> 
</body> 
</html> 
