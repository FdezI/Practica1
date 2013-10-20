<?php
  class Formulario {

    static private $_nombre;
    static private $_cumpleanios;
    static private $_tlfno;
    static private $_email;
    static private $_direccion;

    public function crearFormulario() {
      echo '<FORM id="f_contacto" action="procesar.php" name="f_contacto" method="POST">'; 
      
      echo '<fieldset>';
      
      echo '<ul>';
      echo '<li> <label for="nombre"> Nombre:</label> <input type="name" name="nombre" required autofocus/> </li>';
      echo '<li> <label for="cumpleanyos"> Fecha de nacimiento:</label> <input type="date" name="cumpleanyos"/> </li>';
      echo '<li> <label for="tlfno"> Telefono:</label> <input type="tel" name="tlfno" required/> </li>';
      echo '<li> <label for="email"> e-mail:</label> <input type="email" name="email" required/> </li>';
      echo '<li> <label for="direccion"> Dirección:</label> <input type"text" name="direccion" required/> </li>';
      echo "</ul>";
      
      echo "</fieldset>";
      
      echo '<input type = "submit" value="Registrarse"/><input type="reset" value="Reiniciar formulario" />';
      echo "</FORM>";
    }

    public function mostrarDatos() {
      echo "<p><h1> Registro realizado con éxito </h1></p>";
      echo "<p>Nombre: " . $_POST['nombre'] .
			"</p><p> Fecha de nacimiento: " . $_POST['cumpleanyos'] .
			"</p><p> Teléfono: " . $_POST['tlfno'] .
			"</p><p> E-mail: " . $_POST['email'] .
			"</p><p> Dirección: " . $_POST['direccion'];
    }
}
?>

