<?php

class Calculadora{
	private $_valor1;
	private $_valor2;

	public __construct($valor1 = 0; $valor2 = 0){
		$_valor1 = $valor1;
		$_valor2 = $valor2;
	}

	public function suma(){
		return $_valor1 + $_valor2;
	}

	public function resta(){
		return $_valor1 - $_valor2;
	}

	public function multiplicacion(){
		return $_valor1 * $_valor2;
	}

	public function division(){
		return $_valor1 / $_valor2;
	}
}

?>
