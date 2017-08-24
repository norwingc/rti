<div class="box box-info" id="segundo_reporte">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte Ingresao a Caja</small></h3>
	</div>	

	<div class="box-body">		

		<div class="comprobante_diario">
			<h2>Comprobante Diario</h2>
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-6">
						<label>Clasif: </label>
						<select name="clasificacion_caja" id="clasificacion_caja" class="form-control">
							<option value="1">Diario</option>							
							<option value="2">Ingresos</option>
							<option value="3">Egresos</option>
							<option value="4">Rendiciones</option>
							<option value="5">Factura</option>
							<option value="6">Ajuste</option>
							<option value="7">Compras</option>
							<option value="8">Entradas</option>
							<option value="9">Salidas</option>
							<option value="10">Transferencias</option>
							<option value="11">Cuentas por cobrar</option>
							<option value="12">Cuentas por pagar</option>
							<option value="13">Planilla</option>
						</select>
						<label>Fecha: </label> <input type="date" class="form-control" id="fecha_caja">	
					</div>
					<div class="col-md-6">						
						<label>Documento: </label> 
						<select name="documento_caja" class="form-control" id="documento_caja">
							<option value="0">Varios</option>
							<option value="1">Depositos</option>
							<option value="2">N/C</option>
							<option value="3">Cheques</option>
							<option value="4">N/D</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-6">
						<label>Concepto: </label> <textarea class="form-control" style="height: 90px" id="concepto_caja"></textarea>
					</div>
				</div>
			</div>
		</div>	

    	<div class="table-responsive">
			<table id="table" class="table table-bordered table-hover myTable table_caja">
				<thead>
		            <tr>
		            	<th>accion</th>
		            	<th>No. Cliente</th>								
						<th>Descripcion</th>
						<th>Fecha</th>							
						<th>Referencia</th>
						<th>pago</th>
						<th>No. Factura</th>							
						<th>ret ir</th>
						<th>ret alma</th>
						<th>FORMA DE PAGO</th>
						<th>pago neto</th>
						<th>ret tarjeta 1.5%</th>
						<th>comision</th>
						<th>Comision C$</th>					
		            </tr>
		        </thead>
		        <tbody>
		        	<?php			        		
	        			$row = IngresoController::addRowCaja();
	        			echo $row;			        				        		
		        	?>			        		        	
		        </tbody>
	        </table>
	        <table class="table table-bordered">	
	        	<thead>
		            <tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>								
						<th>Total Pago</th>	
						<th>ret ir</th>
						<th>ret alma</th>							
						<th>pago neto</th>					
						<th>Ret ir Tarjeta</th>
						<th>Comision</th>							
		            </tr>
		        </thead>				        	        	
	        	<tbody>	
	        		<tr>
		        		<td colspan="4"><h4><strong>TOTAL</strong></h4></td>
			        	<td id="total_pago_caja"><strong></strong></td>
			        	<td id="tota_ret_ir_caja"><strong></strong></td>
			        	<td id="total_ret_alma_caja"><strong></strong></td>
			        	<td id="total_pago_neto_caja"><strong></strong></td>
			        	<td id="total_ret_ir_tarjeta_caja"><strong></strong></td>
			        	<td id="total_comision_caja"><strong></strong></td>
		        	</tr>		        	
				</tbody>
			</table>			       
    	</div>
    	
    	<div class="container totales_forma_pago">
    		<div class="col-sm-3">
				<h3 style="text-align: left;">Forma de Pago</h3>
				<ul style="text-align: left;">
					<li>TARJETA DE CREDITO</li>
					<li>CHEQUE</li>
					<li>EFECTIVO</li>
					<li>TRANSFERENCIA</li>											
				</ul>
			</div>
			<div class="col-sm-3">
				<h3>Total</h3>
				<ul>
					<li id="forma_pago_tarjeta_caja"></li>
					<li id="forma_pago_cheque_caja"></li>
					<li id="forma_pago_efectivo_caja"></li>
					<li id="forma_pago_transferncia_caja"></li>
				</ul>
			</div>
		</div>	
		<div class="col-md-12 text-center" style="margin-top: 2em">
			<button class="btn btn-success btn-lg" id="btn-mostrar_reporte">Mostrar Reporte</button>
		</div>		
	</div>
</div>	