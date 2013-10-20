<?php
  class DataBase{
	  var $consultaSQL;
	  var $conexion;

	  function conectar(){
		  try{
				$this->conexion = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//$this->conexion->setAttribute(PDO::ATTR_PERSISTENT, true);
			} catch (PDOException $e){echo "Conexión fallida: " . $e->getMessage();}
	  }
	  
	  function preparar($SQL){
		  try{
				$this->consultaSQL = $this->conexion->prepare($SQL);
			} catch (PDOException $e){echo "<br>Conexión fallida: " . $e->getMessage() . ". Pruebe a reconectar";}
	  }

	  function ejecutar(){
		  try{
				$this->consultaSQL->execute();
			} catch (PDOException $e){echo "<br>Ejecución de instrucción fallida, el error devuelto es el siguente: <br><br>" . $e->getMessage();}
			
		  if($this->consultaSQL->columnCount() > 0)
				return $this->consultaSQL->fetchAll();
		  else
				return true;
	  }

	  function desconectar(){
		  $this->conexion="";
	  }
	  
	  function destruir(){
		  $this->desconectar();
		  unset($this);
	  }
	  
	  function realizar($SQL){
		  $dbObject = new DataBase();
		  $dbObject->conectar();
		  $dbObject->preparar($SQL);
		  $result = $dbObject->ejecutar();
		  
		  $dbObject->destruir();
		  return $result;
	  }

  }

?>
