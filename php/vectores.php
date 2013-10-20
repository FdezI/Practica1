<!doctype html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title> Práctica 1 - Formulario </title>
</head>
<body>
  <?php
    $vector1['valor1']=0;
    $vector1['valor2']='hola';
    $vector1[]="adios" . 3;

    echo '<p>Con print: </p><pre>';
    print_r($vector1);
    echo '</pre><p>Con var_dump:</p><pre>';
    var_dump($vector1);
    echo '</pre>';

  ?>
</body>
</html>
