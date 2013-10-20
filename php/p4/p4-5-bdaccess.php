<?php
  require_once "p4-5-bdaccessconfig.inc" ;

  try{
    $conexion = new PDO(DB_DSN, DB_USUARIO, DB_CONTRASENIA);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e){echo "Conexión fallida: " . $e->getMessage();}

  if(isset($_POST['isbn']) && isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['editorial']) && isset($_POST['numpag']) && isset($_POST['anio']) ){
    $consultaSQL = "INSERT INTO Libros VALUES ('" . $_POST['isbn'] .  "' '"
                                                  . $_POST['titulo'] . "' '"
                                                  . $_POST['autor'] . "' '"
                                                  . $_POST['editorial'] . "' '"
                                                  . $_POST['numpag'] . "' '"
                                                  . $_POST['anio'] . "')";
    $conexion->query(consultaSQL);
    echo $consultaSQL;
  }

  $consultaSQL = "SELECT * FROM Libros";

  $resultados = $conexion->query(consultaSQL);
  foreach($resultados as $fila){
    echo $fila;
  }

?>
