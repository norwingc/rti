<style type="text/css">
	textarea{
		width: 290px;
			height: 26px;
	}
</style>

<div class="box box-info" id="reporte_ingresar_factura" style="display: none">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte de Ingresos Factura</small></h3>
	</div>			
	
	<div class="box-body">
		<div class="ingreso_contado">
			<table class="table table-bordered table-hover tabla_factura_reporte" id="table_primer_reporte_contado" style="width: 50% !important; margin-left: 0;">
				<thead>	
					<th style="text-align: center">Cuenta</th>
					<th style="text-align: center">Debe</th>
					<th style="text-align: center">Haber</th>
					<th style="text-align: center">No Cuenta</th>
					<th style="text-align: center">Descripcion</th>	
					<th style="text-align: center">Concepto Factura</th>			
				</thead>
				<tbody>
					<tr>					
						<th>Caja</th>
						<td id="reporte_ingreso_caja" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1101020001"></td>
						<td><textarea class="descripcion_cuenta">Caja de Tesoreria  Tienda servicio de Renta</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>Retencion IR</th>
						<td id="reporte_ingreso_retencion" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109020002"></td>
						<td><textarea class="descripcion_cuenta">2% IR Retenido por Clientes CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>Retencion IR Tarjeta</th>
						<td id="reporte_ingreso_retencion_tarjeta" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109020006"></td>
						<td><textarea class="descripcion_cuenta">2% IR Retenciones por Inst. Bancarias CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>IMI</th>
						<td id="reporte_ingreso_imi" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109030001"></td>
						<td><textarea lass="descripcion_cuenta">1% IMI RETENIDO POR CLIENTES CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>Comision de Tarjeta</th>
						<td id="reporte_ingreso_comision_tarjeta" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="6104010007"></td>
						<td><textarea lass="descripcion_cuenta">cargos por servicio de tarjeta de credito</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>Descuentos</th>
						<td id="reporte_ingreso_descuentos_contado" class="debe"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="4101030004"></td>
						<td><textarea class="descripcion_cuenta">DESCUENTOS S/VENTAS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>Cuentas de Contado y Credito</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RE</td>
						<td></td>
						<td id="cta_RE" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010001"></td>
						<td><textarea class="descripcion_cuenta">RENTA DE EQUIPOS MENORES DE CONSTRUCCION</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>RA</td>
						<td></td>
						<td id="cta_RA" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010002"></td>
						<td><textarea class="descripcion_cuenta">REPUESTOS Y ACCESORIOS NUEVOS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>EN</td>
						<td></td>
						<td id="cta_EN" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010004"></td>
						<td><textarea class="descripcion_cuenta">EQUIPOS NUEVOS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>EU</td>
						<td></td>
						<td id="cta_EU" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010005"></td>
						<td><textarea class="descripcion_cuenta">EQUIPOS USADOS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>RU</td>
						<td></td>
						<td id="cta_RU" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010003"></td>
						<td><textarea class="descripcion_cuenta">REPUESTOS Y ACCESORIOS USADOS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>FL</td>
						<td></td>
						<td id="cta_FL" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010006"></td>
						<td><textarea class="descripcion_cuenta">SERVICIO DE TRANSPORTE</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>CO</td>
						<td></td>
						<td id="cta_CO" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010008"></td>
						<td><textarea class="descripcion_cuenta">SUMINISTRO DE COMBUSTIBLE</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>ST</td>
						<td></td>
						<td id="cta_ST" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010007"></td>
						<td><textarea class="descripcion_cuenta">SERVICIO DE TALLER</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>PR</td>
						<td></td>
						<td id="cta_PR" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte"></td>
						<td><textarea class="descripcion_cuenta"></textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>
						<td>CV</td>
						<td></td>
						<td id="cta_CV" class="haber">0</td>
						<td><input type="text" class="no_cuenta_reporte"></td>
						<td><textarea class="descripcion_cuenta"></textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>IVA</th>
						<td></td>
						<td id="reporte_ingreso_iva" class="haber"></td>
						<td><input type="text" class="no_cuenta_reporte" value="2104010001"></td>
						<td><textarea class="descripcion_cuenta">IVA DEBITO FISCAL CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_factura"></textarea></td>
					</tr>
					<tr>					
						<th>CxC</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
				</tbody>
			</table>
			<div class="text-center">
				<button class="btn btn-success btn-lg" id="guadar_reporte_factura">Guardar</button>
			</div>

		</div>
	</div>
</div>


<div class="box box-info" id="reporte_ingresar_caja1" style="display: none">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte de Ingresos Caja</small></h3>
	</div>				

	<div class="box-body">
		<div class="ingreso_contado">
			<table class="table table-bordered table-hover" id="table_reporte_caja1" style="width: 50% !important; margin-left: 0;">
				<thead>	
					<th style="text-align: center">Cuenta</th>
					<th style="text-align: center">Debe</th>
					<th style="text-align: center">Haber</th>
					<th style="text-align: center">No Cuenta</th>
					<th style="text-align: center">Descripcion</th>	
					<th style="text-align: center">Concepto Factura</th>	
				</thead>
				<tbody>
					<tr>					
						<th>Caja</th>
						<td id="reporte_ingreso_caja_caja1" class="debe_caja1"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1101020001"></td>
						<td><textarea class="descripcion_cuenta">Caja de Tesoreria  Tienda servicio de Renta</textarea></td>
						<td><textarea class="reporte_concepto_caja"></textarea></td>
					</tr>
					<tr>					
						<th>Retencion IR</th>
						<td id="reporte_ingreso_retencion_caja1" class="debe_caja1"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109020002"></td>
						<td><textarea class="descripcion_cuenta">2% IR Retenido por Clientes CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_caja"></textarea></td>
					</tr>
					<tr>					
						<th>Retencion IR Tarjeta</th>
						<td id="reporte_ingreso_retencion_tarjeta_caja1" class="debe_caja1"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109020002"></td>
						<td><textarea class="descripcion_cuenta">2% IR Retenciones por Inst. Bancarias CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_caja"></textarea></td>
					</tr>
					<tr>					
						<th>IMI</th>
						<td id="reporte_ingreso_imi_caja1" class="debe_caja1"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="1109030001"></td>
						<td><textarea lass="descripcion_cuenta">1% IMI RETENIDO POR CLIENTES CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_caja"></textarea></td>
					</tr>
					<tr>					
						<th>Comision de Tarjeta</th>
						<td id="reporte_ingreso_comision_tarjeta_caja1" class="debe_caja1"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="6104010007"></td>
						<td><textarea lass="descripcion_cuenta">cargos por servicio de tarjeta de credito</textarea></td>
						<td><textarea class="reporte_concepto_caja"></textarea></td>
					</tr>
					<tr>					
						<th>CxC</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<div class="text-center">
				<button class="btn btn-success btn-lg" id="guadar_reporte_caja">Guardar</button>
			</div>
		</div>			
	</div>
</div>			


<div class="box box-info" id="reporte_ingresar_caja2" style="display: none">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte de Ingresos Caja</small></h3>
	</div>				

	<div class="box-body">
		<div class="ingreso_contado">
			<table class="table table-bordered table-hover" id="table_reporte_caja2" style="width: 50% !important; margin-left: 0;">
				<thead>	
					<th style="text-align: center">Cuenta</th>
					<th style="text-align: center">Debe</th>
					<th style="text-align: center">Haber</th>
					<th style="text-align: center">No Cuenta</th>
					<th style="text-align: center">Descripcion</th>	
					<th style="text-align: center">Concepto Factura</th>	
				</thead>
				<tbody>
					<tr>					
						<th>iva</th>
						<td id="reporte_iva_caja1" class="debe_caja2"></td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="2104010001"></td>
						<td><textarea class="descripcion_cuenta">IVA DEBITO FISCAL CEDIS</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>
					</tr>
					<tr>					
						<th>Cuentas de Contado y Credito</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>RE</td>
						<td id="cta_RE_caja2" class="debe_caja2">0</td>
						<td></td>	
						<td><input type="text" class="no_cuenta_reporte" value="4101010001"></td>
						<td><textarea class="descripcion_cuenta">RENTA DE EQUIPOS MENORES DE CONSTRUCCION</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>
					<tr>
						<td>RA</td>
						<td id="cta_RA_caja2" class="debe_caja2">0</td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010002"></td>
						<td><textarea class="descripcion_cuenta">REPUESTOS Y ACCESORIOS NUEVOS</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>						
					</tr>
					<tr>
						<td>EN</td>
						<td id="cta_EN_caja2" class="debe_caja2">0</td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010004"></td>
						<td><textarea class="descripcion_cuenta">EQUIPOS NUEVOS</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>
					<tr>
						<td>EU</td>
						<td id="cta_EU_caja2" class="debe_caja2">0</td>
						<td></td>
						<td><input type="text" class="no_cuenta_reporte" value="4101010005"></td>
						<td><textarea class="descripcion_cuenta">EQUIPOS USADOS</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>
					</tr>
					<tr>
						<td>RU</td>
						<td id="cta_RU_caja2" class="debe_caja2">0</td>
						<td></td>		
						<td><input type="text" class="no_cuenta_reporte" value="4101010003"></td>
						<td><textarea class="descripcion_cuenta">REPUESTOS Y ACCESORIOS USADOS</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>				
					</tr>
					<tr>
						<td>FL</td>
						<td id="cta_FL_caja2" class="debe_caja2">0</td>
						<td></td>			
						<td><input type="text" class="no_cuenta_reporte" value="4101010006"></td>
						<td><textarea class="descripcion_cuenta">SERVICIO DE TRANSPORTE</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>			
					</tr>
					<tr>
						<td>CO</td>
						<td id="cta_CO_caja2" class="debe_caja2">0</td>
						<td></td>	
						<td><input type="text" class="no_cuenta_reporte" value="4101010008"></td>
						<td><textarea class="descripcion_cuenta">SUMINISTRO DE COMBUSTIBLE</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>
					<tr>
						<td>ST</td>
						<td id="cta_ST_caja2" class="debe_caja2">0</td>
						<td></td>	
						<td><input type="text" class="no_cuenta_reporte" value="4101010007"></td>
						<td><textarea class="descripcion_cuenta">SERVICIO DE TALLER</textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>
					<tr>
						<td>PR</td>
						<td id="cta_PR_caja2" class="debe_caja2">0</td>
						<td></td>	
						<td><input type="text" class="no_cuenta_reporte"></td>
						<td><textarea class="descripcion_cuenta"></textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>
					<tr>
						<td>CV</td>
						<td id="cta_CV_caja2" class="debe_caja2">0</td>
						<td></td>	
						<td><input type="text" class="no_cuenta_reporte"></td>
						<td><textarea class="descripcion_cuenta"></textarea></td>
						<td><textarea class="reporte_concepto_caja_nc"></textarea></td>					
					</tr>					
					<tr>					
						<th>CxP</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="text-center">
				<button class="btn btn-success btn-lg" id="guadar_reporte_caja_nc">Guardar</button>
			</div>
		</div>			
	</div>
</div>	
