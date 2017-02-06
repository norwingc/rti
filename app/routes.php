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

	//return $file1;


	$result1 = Excel::selectSheets('FacturaSirius')->load('files/'.$file1,function($reader){})->get();
	$result2 = Excel::selectSheets('CajaSirius')->load('files/'.$file2,function($reader){})->get();		

	return View::make('reportes.diarios', compact('result1', 'result2'));
});



Route::get('CatalogoCuentas', function(){
	return View::make('cuentas.catalogo');
});
