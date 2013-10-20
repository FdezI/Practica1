<!DOCTYPE HTML>
<head>
   <meta charset="UTF-8">
   <title>Formulario TW</title>
</head>
<html>
  <body>
    <?php
      include('cabeceraPie.inc');
      include('formulario.inc');
      
      cabecera();
      
      $form = new Formulario();
      $form->crearFormulario();
      
      pie();
    ?>
  </body>
</html>
