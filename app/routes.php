<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('test', function()
{
	$comprobante = new ComprobanteDiario();
	$comprobante->Tipo = 1; //select de clasificacion
	$comprobante->Comprobante = 181; // el mas alto del mes y el año colacado
	$comprobante->Mes = 4; // mes seleccionado
	$comprobante->Anio = 2017; // año seleccionado
	$comprobante->Fecha = '04/04/2017'; // tipo timestamp
	$comprobante->Concepto = 'NA'; // textarea concepto 	
	$comprobante->Generado = 0;
	$comprobante->Anulado = 0;
	$comprobante->Tipo_Documento = 0; //select docuemtos	
	$comprobante->Consolidacion = 0;
	$comprobante->Debe = 0; // sumatoria del debe
	$comprobante->Haber = 0; //sumatoria del haber
	$comprobante->Cierre = 0;

	$comprobante->save();


	$detalle = new ComprobanteDiarioDetalle();
	$detalle->Tipo = 1; //mismo de compovante select
	$detalle->Comprobante = 181;
	$detalle->Mes = 4; // mes seleccionado
	$detalle->Anio = 2017; // año seleccionado
	$detalle->Cuenta = '1000000000'; // campo no cuenta
	$detalle->Numero = 1; // hacer sonsecutivo de cuentas
	$detalle->Movimiento = 1; // 1 debe, 2 haber
	$detalle->Monto = 1000; // monto de la cuenta
	//$detalle->MontoUS = 0; // buscar tabla y dividir por el valor 	 
	$detalle->Concepto = 'NA'; // valor de concepto de la cuenta

	$detalle->save();
});

Route::get('test2', function(){
	$servicio = "https://servicios.bcn.gob.ni/Tc_Servicio/ServicioTC.asmx?WSDL"; //url del servicio
	$parametros = array(); //parametros de la llamada
    $parametros['Dia'] = '12';
    $parametros['Mes'] = '08';
    $parametros['Ano'] = '2017';
    $client = new SoapClient($servicio, $parametros);
    $result = $client->RecuperaTC_Dia($parametros); //llamamos al métdo que nos interesa con los parámetros
    $cambio = ($result->RecuperaTC_DiaResult);
	$cambio = round($cambio,5);	

	return $cambio;
});


Route::get('/', function()
{	
	return View::make('index');
});

Route::get('ReportesDiarios', function()
{	
	$result1 = null;
	$result2 = null;		


	return View::make('reportes.diarios', compact('result1', 'result2'));
});

Route::post('ReportesDiarios', function()
{	

	if (Input::hasFile('first_report')){
		$extension = Input::file('first_report')->getClientOriginalExtension();
		$file1 = 'FacturaSirius.'.$extension;	
		Input::file('first_report')->move('files', $file1);
	}

	if (Input::hasFile('second_report')){
		$extension = Input::file('second_report')->getClientOriginalExtension();
		$file2 = 'CajaSirius.'.$extension;	
		Input::file('second_report')->move('files', $file2);
	}

	return Redirect::to('/');
});

Route::get('FacturaSirius', function(){
	$result1 = Excel::selectSheets('FacturaSirius')->load('files/FacturaSirius.xlsx',function($reader){})->get();
	return View::make('reportes.factura_sirius', compact('result1'));
});

Route::get('CajaSirius', function(){
	$result2 = Excel::selectSheets('CajaSirius')->load('files/CajaSirius.xlsx',function($reader){})->get();
	return View::make('reportes.caja_sirius', compact('result2'));
});

Route::get('CajaSiriusNC', function(){
	$result2 = Excel::selectSheets('CajaSirius')->load('files/CajaSirius.xlsx',function($reader){})->get();
	return View::make('reportes.caja_sirius_nc', compact('result2'));
});

Route::get('Ingreso/Referencia/{nombre}', function($referencia){

	$result = Excel::selectSheets('CajaSirius')->load('files/CajaSirius.xlsx',function($reader){})->get();
	$datas = array();

	$referencia_edit = explode("-", $referencia);

	if(count($referencia_edit) == 1){
		$referencia_edit = $referencia_edit[0];	
	}else{
		$referencia_edit = $referencia_edit[0] .'/'. $referencia_edit[1];
	}

	for ($i=0; $i < $result->count(); $i++) { 
		if ($result[$i]['referencia'] == $referencia_edit) {
			$time = strtotime($result[$i]['fecha']);
			$fecha = date('Y-m-d', $time);
			$data = array(
				'no_cliente'  => $result[$i]['no_cliente'],
				'descripcion' => $result[$i]['descripcion'],
				'fecha'       => $fecha,
				'referencia'  => $result[$i]['referencia'],
				'pago'        => $result[$i]['pago'],			
				'no_factura'  => $result[$i]['no_factura'],	
				'importe'     => $result[$i]['importe']					
			);	
			array_push($datas, $data);
		}
	}
	
	return Response::json(array(
		'datas' => $datas

	));
});

Route::get('CatalogoCuentas', function(){
	$cuentas = Cuenta::all();
	//$cuentas = array();
	return View::make('cuentas.catalogo', compact('cuentas'));
});

Route::get('getFactura/{factura}/{clasificacion?}', 'IngresoController@getFactura');
Route::get('getCaja/{referencia}', 'IngresoController@getCaja');

Route::get('getCuenta/{cuenta}', 'CuentaController@getCuenta');
Route::get('getDescripcion/{descripcion}', 'CuentaController@getDescripcion');

Route::post('Save/Reporte/Factura', function(){

	$data = Input::all();

	$fecha = $data['comprobante_fecha'];
	$fecha = explode('/', $fecha);


	$servicio          = "https://servicios.bcn.gob.ni/Tc_Servicio/ServicioTC.asmx?WSDL"; //url del servicio
	$parametros        = array(); //parametros de la llamada
	$parametros['Dia'] = $fecha[0];
	$parametros['Mes'] = $fecha[1];
	$parametros['Ano'] = $fecha[2];
	$client            = new SoapClient($servicio, $parametros);
	$result            = $client->RecuperaTC_Dia($parametros); //llamamos al métdo que nos interesa con los parámetros
	$cambio            = ($result->RecuperaTC_DiaResult);
	$cambio            = round($cambio,5);	

	//$cambio = 30;
	

	$no_comprobante = ComprobanteDiario::where('Mes', $data['comprobante_mes'])->where('Anio', $data['comprobante_anio'])->orderBy('Comprobante', 'DES')->first();

	$comprobante = new ComprobanteDiario();

	$comprobante->Tipo           = $data['comprobante_tipo'];
	$comprobante->Comprobante    = ($no_comprobante->Comprobante + 1);
	$comprobante->Mes            = $data['comprobante_mes'];
	$comprobante->Anio           = $data['comprobante_anio'];
	$comprobante->Fecha          = $data['comprobante_fecha'];
	$comprobante->Concepto       = $data['comprobante_concepto'];
	$comprobante->Generado       = 0;
	$comprobante->Anulado        = 0;
	$comprobante->Tipo_Documento = $data['comprobante_tipo_documento'];
	$comprobante->Consolidacion  = 0;
	$comprobante->Debe           = $data['comprobante_debe'];
	$comprobante->Haber          = $data['comprobante_haber'];
	$comprobante->Cierre         = 0;

	$comprobante->save();

	return Response::json(array(		
		'cambio' => $cambio,
		'comprobante' => $comprobante
	));
});


Route::post('Save/Reporte/DetalleFactura', function(){
	$data = Input::all();

	$detalle = new ComprobanteDiarioDetalle();

	$detalle->Tipo        = $data['detalle_tipo'];
	$detalle->Comprobante = $data['detalle_comprobante'];
	$detalle->Mes         = $data['detalle_mes'];
	$detalle->Anio        = $data['detalle_anio'];
	$detalle->Cuenta      = $data['detalle_cuenta']; 
	$detalle->Numero      = $data['detalle_numero'];
	$detalle->Movimiento  = $data['detalle_movimiento'];
	$detalle->Monto       = $data['detalle_monto'];
	$detalle->MontoUS     = $data['detalle_montousa']; 
	$detalle->Concepto    = $data['detalle_concepto'];

	$detalle->save();

	return Response::json(array(
		'data' => $detalle
	));

});