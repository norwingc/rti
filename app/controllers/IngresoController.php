<?php

class IngresoController extends BaseController {

		
	public static function addRow($result)
	{
		//cuando hay varias formas de pago
		//flete
		//pago neto

		$fecha_transaccion = $result['fecha_transaccion'];
		$clasif_ventas     = null;		
		$no_factura        = $result['no_factura'];		
		$codigo_cliente    = $result['codigo_de_cliente'];		
		$nombre            = $result['nombre'];
		$sub_total         = $result['subtotal'];
		$flete             = null;
		$descuento         = null;
		$iva               = $result['impuesto_1'];
		$ret_ir            = null;
		$ret_alma          = null;		
		$pago_neto         = null;
		$cxc               = $result['saldo_a_pagar'];
		$forma_pago        = null;

		if($result['aqui'] != ''){
			$clasif_ventas = 'RENTA';
			$descuento = $result['desc_vtas'];
		}else{
			$clasif_ventas = $result['enviado_a_3'];
			$descuento = $result['desc_alqui'];
		}
		
		return
			"<tr>".
				"<td>".
					$fecha_transaccion.
				"</td>".
				"<td>".
					$clasif_ventas.
				"</td>".
				"<td>".
					$no_factura.
				"</td>".
				"<td>".
					$codigo_cliente.
				"</td>".
				"<td>".
					$nombre.
				"</td>".
				"<td>".
					$sub_total.
				"</td>".
				"<td>".
					$flete.
				"</td>".
				"<td>".
					$descuento.
				"</td>".
				"<td>".
					$iva.
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>".
				"<td>".
					"<input type='text' class='form-control'>".
				"</td>".				
				"<td>".
					$pago_neto.
				"</td>".
				"<td>".
					$cxc.
				"</td>".
				"<td>".
					$forma_pago.
				"</td>"
		."</td></tr>";
	}

}
