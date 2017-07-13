<?php

class CuentaController extends BaseController {
	
	public function getCuenta($cuenta)
	{
		$cuenta = Cuenta::where('Cuenta', $cuenta)->first();

		if($cuenta){
			return Response::json(array(
				'cuenta' =>  $cuenta
			));	
		}

		return Response::json(array(
			'cuenta' =>  'Cuenta no encontrada'
		));	
	}

	public function getDescripcion($descipcion)
	{
		$cuenta = Cuenta::where('Descripcion', $descipcion)->first();

		if($cuenta){
			return Response::json(array(
				'cuenta' =>  $cuenta
			));	
		}

		return Response::json(array(
			'cuenta' =>  'Descripcion no encontrada'
		));	
	}
}