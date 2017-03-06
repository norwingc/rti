<?php

class IngresoController extends BaseController {

	/**
	 * @param [type]
	 */
	public static function addRowFactura($result)
	{		
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
		);		
	
	
		if($result['aqui'] != '') {
			$clasificacion         = 'RENTA';
			$data['clasif_ventas'] = 'RENTA';
			$data['descuento']     = $result['desc_alqui'];
			$data['sub_total']     = $result['aqui'];	
			//$data['iva']           = round(($result['aqui'])*.15, 2);
			if($data['cxc'] != ''){
				$data['pago_neto'] = null;
				$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
			}else {
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];			
			}
			
			$texto .= IngresoController::filaFactura($data, $clasificacion);
		}

		if($result['ventas'] != '') {
			$clasificacion         = $result['enviado_a_3'];
			$data['clasif_ventas'] = $result['enviado_a_3'];
			$data['descuento']     = $result['desc_vtas'];
			$data['sub_total']     = $result['ventas'];	
			//$data['iva']           = round(($result['ventas'])*.15, 2);	
			if($data['cxc'] != ''){
				$data['pago_neto'] = null;
				$data['cxc'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];
			}else {
				$data['pago_neto'] = ($data['sub_total'] - $data['descuento']) + $data['iva'];			
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
		return
		"<tr>".
				"<td>".
					$data['fecha_transaccion'].
				"</td>".
				"<td>".
					$data['clasif_ventas'].
				"</td>".
				"<td>".
					$data['no_factura'].
				"</td>".
				"<td>".
					$data['codigo_cliente'].
				"</td>".
				"<td>".
					$data['nombre'].
				"</td>".
				"<td>".
					$data['sub_total'].
				"</td>".				
				"<td>".
					$data['descuento'].
				"</td>".
				"<td>".
					$data['iva'].
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>".				
				"<td class='pago_neto " .$clasificacion. "'>".
					$data['pago_neto'].
				"</td>".
				"<td class='c_c " .$clasificacion. "'>".
					$data['cxc'].
				"</td>".
				"<td>".
					$data['forma_pago'].
				"</td>"
		."</td></tr>";
	}

	/**
	 * @param [type]
	 */
	public static function addRowCaja($result)
	{
		$text = "";
		$data = array(
			'no_cliente'  => $result['no_cliente'],
			'descripcion' => $result['descripcion'],
			'fecha'       => $result['fecha'],
			'referencia'  => $result['referencia'],
			'pago'        => $result['pago'],			
			'no_factura'  => $result['no_factura'],			
			
		);		

		$texto = IngresoController::filaCaja($data);

		return $texto;
	}

	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public static function filaCaja($data, $clasificacion = null)
	{
		return
		"<tr>".
				"<td>".
					$data['no_cliente'].
				"</td>".
				"<td>".
					$data['descripcion'].
				"</td>".
				"<td>".
					$data['fecha'].
				"</td>".
				"<td>".
					$data['referencia'].
				"</td>".
				"<td>".
					$data['pago'].
				"</td>".
				"<td>".
					$data['no_factura'].
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>"				
		."</td></tr>";	
	}
}
