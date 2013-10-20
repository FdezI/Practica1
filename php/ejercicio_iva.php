<!doctype html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title> Práctica 1 - Formulario </title>
</head>
<body>
  <?php
    $precio_hamburguesa=6.4;
    $precio_ensalada=4;
    $precio_papas=2.4;
    $precio_refresco=2.1;
    $total=$precio_hamburguesa+$precio_ensalada+$precio_papas+$precio_refresco;
    $iva=0.21;
    echo "<p>";
    echo "Hamburguesa............ " . number_format($precio_hamburguesa, 2, ",",".") . "<br>";
    echo "Ensalda................ " . number_format($precio_ensalada, 2, ",",".") . "<br>";
    echo "Papas.................. " . number_format($precio_papas, 2, ",",".") . "<br>";
    echo "Refresco................ " . number_format($precio_refresco, 2, ",",".") . "<br>";
    echo "----------------------------<br>";
    echo "Total: " . ($total+($total*$iva));
    echo "</p>";

   $nombre = "Juan"; 
   $var1 = "$nombre"; 
   $var2 = '$nombre'; 
   echo $var1,"\n"; 
   echo $var2,"\n";
   $cad1 = "­ Cadena entre\n\tcomillas dobles ­ "; 
   $cad2 = '­ Cadena entre\n\tcomillas simples ­ ';
   echo $cad1,"\n";
   echo $cad2,"\n";
   $numero = 10; 
   $cad1 = "­ Hay '$numero' personas en la cola. ­ "; 
   $cad2 = '­ Hay "$numero" personas esperando. ­'; 
   echo $cad1,"\n"; 
   echo $cad2;

  ?>
</body>
</html>
