<!doctype html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title> Práctica 1 - Formulario </title>
</head>
<body>
  <?php
    $matriz['vehiculos']['coche'] = "pequeño";
    $matriz['vehiculos']['camión'] = "grande";
    $matriz['vehiculos'][] = "sin tamaño";
    $matriz['cosas'][0] = "cosa1";
    $matriz2 = array(
                 "vehiculos"=>array("coche"=>"pequeño", "camión"=>"grande", 0=>"sin tamaño"),
                 "cosas"=>array(0=>"cosa1")
               );

    echo "<p>Primera forma:</p><pre>";
    print_r($matriz);
    echo "</pre><p>Segunda forma:</p><pre>";
    print_r($matriz2);
    echo "</pre><p>Con bucle for:</p><pre>";
    foreach($matriz as $elemento => $subelemento){
       echo "Elemento: $elemento";
       echo "SubElemento: $subelemento";
    }
    echo "</pre>";
  ?>
</body>
</html>
