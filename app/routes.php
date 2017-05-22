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
	$prueba = DB::table('prueba')->get();

	return $prueba;
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
	return View::make('cuentas.catalogo');
});

Route::get('getFactura/{factura}/{clasificacion?}', 'IngresoController@getFactura');
Route::get('getCaja/{referencia}', 'IngresoController@getCaja');
