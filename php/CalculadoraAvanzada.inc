<?php

require("Calculadora.inc");

class CalculadoraAvanzada extends Calculadora{
	public function __construct($valor1){
		$this->_valor1=$valor1;
	}

	public function potencia($valor=2){
		return pow($this->_valor1,$valor);
	}

	public function raizCuadrada($valor=2){
		return sqrt($this->_valor1,$valor);
	}

	public function exponencial($valor=2){
		return exp($this->_valor1,$valor);
	}
}

?>
