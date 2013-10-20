<script>
$(document).ready(function(){
	$('#registerForm #username').blur(function(){
				  $.ajax({
					type: "POST",
					url: "operations/check_username_availability.php",
					data: 'username='+$(this).val(),
					success: function(data) {
						$('#availabilityImg').attr('src', "includes/images/"+data+".png");
						$('#availabilityImg').attr('alt', data+" disponible");
						
					}
				});
			  });
});
</script>
<?php if(!Session::verifyUser()){ ?>
<div id="mainbody">
	<section id="inner-full">
		<header></header>
		<form action="index.php" method="post" id="registerForm" name="registerForm">
			<fieldset>
				<h3>Datos personales</h3>
				<table>
					<tr class="zebra0">
						<td><label for="username" id="label"><span class="required">* </span>Nombre de Usuario:</label></td>
						<td><input type="text" name="username" id="username" <?php if(!strpos($_POST['username'],'@')) echo 'value="' . $_POST['username'] . '"'; ?> required autofocus /><img id="availabilityImg" src="includes/images/si.png" alt="si disponible"></td>
					</tr>
					<tr class="zebra1">
						<td><span class="required">* </span><label for="name">Nombre:</label></td>
						<td><input type="text" name="name" id="name" required /></td>
					</tr>
					<tr class="zebra0">
						<td><span class="required">* </span><label for="surname">Apellidos:</label></td>
						<td><input type="text" name="surname" id="surname" required /></td>
					</tr>
					<tr class="zebra1">
						<td><span class="required">* </span><label for="password">Contraseña:</label></td>
						<td><input type="password" name="password" id="password" <?php echo 'value="' . $_POST['password'] . '"'; ?> required /></td>
					</tr>
					<tr class="zebra0">
						<td><span class="required">* </span><label for="email">E-mail:</label></td>
						<td><input type="email" name="email" id="email" <?php if(strpos($_POST['username'],'@')) echo 'value="' . $_POST['username'] . '"'; ?> required /></td>
					</tr>
					<tr class="zebra1"> 
						<td><label for="phone">Teléfono:</label></td>
						<td><input type="tel" name="phone" id="phone" /></td>
					</tr>
					<tr class="zebra0"> 
						<td><label for="address">Dirección:</label></td>
						<td><input type="text" name="address" id="address" /></td>
					</tr>
					<tr class="zebra1"> 
						<td><label for="zip">CP:</label></td>
						<td><input type="number" name="zip" id="zip" /></td>
					</tr>
					<tr class="zebra0">
						<td><label for="birthday">Fecha de nacimiento:</label></td>
						<td><input type="date" name="birthday" id="birthday" /></td>
					</tr>
				</table>
				</fieldset>
				<fieldset>
					<h4>Suscripciones</h4>
					<ul><li>
						<input type = "checkbox" id = "suscription" name="menu" checked/> 
						<label for="terms">Deseo recibir noticias del periódico </label>
					</li></ul>
				</fieldset>
				<fieldset>
					<h4>Términos legales</h4>
					<ul>
						<li>
							<input type = "checkbox" id = "terms" name="menu" /> 
							<label for="terms">He leído y acepto los términos de uso.</label>
						</li>
						<li>
							<input type = "checkbox" id = "terms" name="menu" checked/> 
							<label for="terms">Estoy de acuerdo con que se use mi información con fines estadísticos.</label>
						</li>
					</ul>
				<br><button type="submit" onclick="javascript:return validate_form('registerForm')" value = "register" name = "op">Registrarse</button>
				<input type = "reset" value = "Reiniciar" />
			</fieldset>
<?php }else echo "Deslogueate para registrar otro usuario"; ?>
