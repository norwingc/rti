<?php

class IngresoController extends BaseController {

		
	public static function addRow($result)
	{
		//cuando hay varias formas de pago		
		//pago neto
		$texto = "";
		$flag = false; //false es alquiler, true es otro
		
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
			$flag                 = false;
			$data['clasif_ventas'] = 'RENTA';
			$data['descuento']     = $result['desc_alqui'];
			$data['sub_total']     = $result['aqui'];	
			$data['iva']           = ($result['aqui'])*.15;
			$data['pago_neto']     = ($data['sub_total'] - $data['descuento']) + $data['iva'];		
			$texto                 .= IngresoController::fila($data, $flag);
		}

		if($result['ventas'] != '') {
			$flag                 = true;
			$data['clasif_ventas'] = $result['enviado_a_3'];
			$data['descuento']     = $result['desc_vtas'];
			$data['sub_total']     = $result['ventas'];	
			$data['iva']           = ($result['ventas'])*.15;	
			$data['pago_neto']     = ($data['sub_total'] - $data['descuento']) + $data['iva'];	
			$texto                 .= IngresoController::fila($data, $flag);
		}		
	
		return $texto;			
	}
	/**
	 * 
	 */
	public static function fila($data, $flag)
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
				"<td>".
					$data['pago_neto'].//calcular pago neto
				"</td>".
				"<td>".
					$data['cxc'].
				"</td>".
				"<td>".
					$data['forma_pago'].
				"</td>"
		."</td></tr>";
	}

}
