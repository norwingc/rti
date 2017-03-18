<?php

class IngresoController extends BaseController {

	/**
	 * @param [type]
	 */
	public static function addRowFactura($result)
	{		
		//ret de tarjeta se hacen antes o despude de ivay descuento
		$texto = "";
		$clasificacion = "";
		
		$data = array(
			'fecha_transaccion'  => $result['fecha_transaccion'],
			'clasif_ventas'      => null,
			'no_factura'         => $result['no_factura'],
			'codigo_cliente'     => $result['codigo_de_cliente'],
			'nombre'             => $result['nombre'],
			'sub_total'          => $result['subtotal'],
			'flete'              => null,
			'descuento_venta'    => null,
			'descuento_alquiler' => null,
			'iva'                => $result['impuesto_1'],
			'cxc'                => $result['saldo_a_pagar'],
			'forma_pago'         => $result['forma_de_pago_1'],
			'pago_neto'          => null,
			'ret_tarjeta'        => null
		);		
	
	
		if($result['aqui'] != '') {
			$clasificacion         = 'RE';
			$data['clasif_ventas'] = 'RE';
			$data['descuento']     = $result['desc_alqui'];
			$data['sub_total']     = $result['aqui'];	
			$data['iva']           = round(($result['aqui'])*.15, 2);
			if($data['cxc'] != ''){
				$data['pago_neto'] = null;
				$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
			}else {				
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
				$data['ret_tarjeta'] = round(($data['pago_neto'])*.015, 2);		
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'] - $data['ret_tarjeta'];
			}
			
			$texto .= IngresoController::filaFactura($data, $clasificacion);
		}

		if($result['ventas'] != '') {
			$clasificacion         = $result['enviado_a_3'];
			$data['clasif_ventas'] = $result['enviado_a_3'];
			$data['descuento']     = $result['desc_vtas'];
			$data['sub_total']     = $result['ventas'];	
			$data['iva']           = round(($result['ventas'])*.15, 2);	
			if($data['cxc'] != ''){
				$data['pago_neto'] = null;
				$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
			}else {				
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];					
				$data['ret_tarjeta'] = round(($data['pago_neto'])*.015, 2);	
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'] - $data['ret_tarjeta'];					
			}	
			
			$texto .= IngresoController::filaFactura($data, $clasificacion);
		}		
	
		return $texto;			
	}
	
	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public static function filaFactura($data, $clasificacion)
	{
		$time = strtotime($data['fecha_transaccion']);
		$fecha = date('Y-m-d', $time);


		if($data['forma_pago'] == 'TARJETA DE CREDITO'){
			return
				"<tr>".
					"<td>".
						"<input type='checkbox' class='anul'>".
					"</td>".					
					"<td>".
						$fecha.
					"</td>".
					"<td class='clasificacion'>".
						$data['clasif_ventas'].
					"</td>".
					"<td class='no_factura'>".
						$data['no_factura'].
					"</td>".
					"<td>".
						$data['codigo_cliente'].
					"</td>".
					"<td>".
						$data['nombre'].
					"</td>".
					"<td class='subtotal'>".
						$data['sub_total'].
					"</td>".				
					"<td class='descuento'>".
						$data['descuento'].
					"</td>".
					"<td class='iva'>".
						$data['iva'].
					"</td>".
					"<td class='ret_ir'>".
						"<input type='text' class='form-control valor_ret_ir'>".
					"</td>".
					"<td>".
						"<input type='text' class='form-control valor_ret_alma'>".
					"</td>".			
					"<td class='pago_neto " .$clasificacion. "'>".
						$data['pago_neto'].
					"</td>".
					"<td class='c_c " .$clasificacion. "'>".
						$data['cxc'].
					"</td>".
					"<td class='TARJETA'>".
						$data['forma_pago'].
					"</td>".
					"<td class='ret_tarjeta'>".
						$data['ret_tarjeta'].
					"</td>".
					"<td>".
						"<input type='text' class='form-control comision_tarjeta'>".
					"</td>".
					"<td class='comision_tarjeta_valor'>".
						"&nbsp;&nbsp;".
					"</td>"
				."</tr>";
		}else{
			return
				"<tr>".
						"<td>".
							"<input type='checkbox' class='anul'>".
						"</td>".					
						"<td>".
							$fecha.
						"</td>".
						"<td class='clasificacion'>".
							$data['clasif_ventas'].
						"</td>".
						"<td class='no_factura'>".
							$data['no_factura'].
						"</td>".
						"<td>".
							$data['codigo_cliente'].
						"</td>".
						"<td>".
							$data['nombre'].
						"</td>".
						"<td class='subtotal'>".
							$data['sub_total'].
						"</td>".				
						"<td class='descuento'>".
							$data['descuento'].
						"</td>".
						"<td class='iva'>".
							$data['iva'].
						"</td>".
						"<td class='ret_ir'>".
							"&nbsp;&nbsp;".
						"</td>".
						"<td>".
							"&nbsp;&nbsp;".
						"</td>".			
						"<td class='pago_neto " .$clasificacion. "'>".
							$data['pago_neto'].
						"</td>".
						"<td class='c_c " .$clasificacion. "'>".
							$data['cxc'].
						"</td>".
						"<td class='" . $data['forma_pago'] ." '>".
							$data['forma_pago'].
						"</td>".
						"<td>".
							"&nbsp;&nbsp;".
						"</td>".
						"<td>".
							"&nbsp;&nbsp;".
						"</td>".
						"<td>".
							"&nbsp;&nbsp;".
						"</td>"	
				."</tr>";
		}

		
	}

	/**
	 * @param [type]
	 */
	public static function addRowCaja()
	{
		$texto = "";

		$data = IngresoController::getReferencia();

		for ($i=0; $i < count($data); $i++) { 
			$texto .= IngresoController::filaCaja($data[$i]);
		}		

		return $texto;
	}

	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public static function filaCaja($data, $clasificacion = null)
	{

		$time = strtotime($data['fecha']);
		$fecha = date('Y-m-d', $time);

		return
		"<tr>".
				"<td>".
					"<button class='btn btn-info btn_view_referencia' data-referencia='".$data['referencia']."'>Ver</button>".
				"</td>".
				"<td>".
					$data['no_cliente'].
				"</td>".
				"<td>".
					$data['descripcion'].
				"</td>".
				"<td>".
					$fecha.
				"</td>".
				"<td class='no_referencia'>".
					$data['referencia'].
				"</td>".
				"<td class='pago_caja'>".
					$data['pago'].
				"</td>".
				"<td>".
					$data['no_factura'].
				"</td>".			
				"<td>".
					"<input type='text' class='form-control valor_ret_ir_caja'>".
				"</td>".
				"<td>".
					"<input type='text' class='form-control valor_ret_alma_caja'>".
				"</td>".
				"<td><select class='form-control forma_pago_caja'><option value=''>Seleccionar<option value='TARJETA DE CREDITO'>TARJETA DE CREDITO</option><option value='CHEQUE'>CHEQUE</option><option value='EFECTIVO'>EFECTIVO</option><option value='TRANSFERENCIA'>TRANSFERENCIA</option></select></td>".
				"<td class='pago_neto_caja'>".
					$data['pago'].
				"</td>".
				"<td class='ret_tarjeta_caja'>".
					"0".
				"</td>".
				"<td>".
					"<input type='text' class='form-control comision_tarjeta_caja'>".
				"</td>".
				"<td class='comision_tarjeta_valor_caja'>".
					"&nbsp;&nbsp;".
				"</td>"	
		."</tr>";	
	}

	/**
	 * [getReferencia description]
	 * @return [type] [description]
	 */
	public static function getReferencia()
	{
		$result = Excel::selectSheets('CajaSirius')->load('files/CajaSirius.xlsx',function($reader){})->get();
		$referencia = array();
		$datas = array();

		for ($i=0; $i < $result->count(); $i++) { 

			if (in_array($result[$i]['referencia'], $referencia) == false) {
			  	array_push($referencia, $result[$i]['referencia']);
			   	$data = array(
					'no_cliente'  => $result[$i]['no_cliente'],
					'descripcion' => $result[$i]['descripcion'],
					'fecha'       => $result[$i]['fecha'],
					'referencia'  => $result[$i]['referencia'],
					'pago'        => $result[$i]['pago'],			
					'no_factura'  => $result[$i]['no_factura'],	
					'importe'     => $result[$i]['importe']		
					
				);	

				array_push($datas, $data);
			}
			
		}
		return $datas;
	}

	/**
	 * [getFactura description]
	 * @param  [type] $factura       [description]
	 * @param  [type] $clasificacion [description]
	 * @return [type]                [description]
	 */
	public function getFactura($factura, $clasificacion)
	{
		$data = null;		
		$result_factura = false;
		$result = Excel::selectSheets('FacturaSirius')->load('files/FacturaSirius.xlsx',function($reader){})->get();

		for ($i=0; $i < $result->count(); $i++) { 
			if($result[$i]['no_factura'] == $factura){
				$result_factura = $result[$i];

				$data = array(
					'fecha_transaccion'  => $result_factura['fecha_transaccion'],
					'clasif_ventas'      => null,
					'no_factura'         => $result_factura['no_factura'],
					'codigo_cliente'     => $result_factura['codigo_de_cliente'],
					'nombre'             => $result_factura['nombre'],
					'sub_total'          => $result_factura['subtotal'],
					'flete'              => null,
					'descuento_venta'    => null,
					'descuento_alquiler' => null,
					'iva'                => $result_factura['impuesto_1'],
					'cxc'                => $result_factura['saldo_a_pagar'],
					'forma_pago'         => $result_factura['forma_de_pago_1'],
					'pago_neto'          => null,
					'ret_tarjeta'        => null
				);	

				if($clasificacion == 'RE'){

					$data['descuento']     = $result_factura['desc_alqui'];
					$data['sub_total']     = $result_factura['aqui'];	
					$data['iva']           = round(($result_factura['aqui'])*.15, 2);	

					if($data['cxc'] != ''){
						$data['pago_neto'] = null;
						$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
					}else {
						$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];	
						$data['ret_tarjeta'] = round(($data['pago_neto'])*.015, 2);		
					}	
					
				}else{					
					$data['descuento']     = $result_factura['desc_vtas'];
					$data['sub_total']     = $result_factura['ventas'];	
					$data['iva']           = round(($result_factura['ventas'])*.15, 2);		

					if($data['cxc'] != ''){
						$data['pago_neto'] = null;
						$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
					}else {
						$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];		
						$data['ret_tarjeta'] = round(($data['pago_neto'])*.015, 2);	
					}						
				}				
			}
		}

		return Response::json(array(
			'data' =>     $data
		));	
		
	}

	/**
	 * [getCaja description]
	 * @param  [type] $referencia [description]
	 * @return [type]             [description]
	 */
	public function getCaja($referencia)
	{
		$data = null;		
		$referencia_edit = explode("-", $referencia);
		$result_caja = null; 
		$result = Excel::selectSheets('CajaSirius')->load('files/CajaSirius.xlsx',function($reader){})->get();


		if(count($referencia_edit) == 1){
			$referencia_edit = $referencia_edit[0];	
		}else{
			$referencia_edit = $referencia_edit[0] .'/'. $referencia_edit[1];
		}		

		for ($i=0; $i < $result->count(); $i++) { 
			if($result[$i]['referencia'] == $referencia_edit){
				$result_caja = $result[$i];

				$data = array(
					'no_cliente'  => $result_caja['no_cliente'],
					'descripcion' => $result_caja['descripcion'],
					'fecha'       => $result_caja['fecha'],
					'referencia'  => $result_caja['referencia'],
					'pago'        => $result_caja['pago'],			
					'no_factura'  => $result_caja['no_factura'],	
					'importe'     => $result_caja['importe']
				);
			}
		}	

		return Response::json(array(
			'data' =>     $data
		));		
	}
}