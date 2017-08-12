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
						<label>Clasif: </label> <input type="text" class="form-control">
						<select name="clasificacion_caja_nc" id="clasificacion_caja_nc" class="form-control">
							<option value="1">Diario</option>
							<option value="2">Ingresos</option>
							<option value="3">Rendiciones</option>
							<option value="4">Factura</option>
							<option value="5">Ajuste</option>
							<option value="6">Compras</option>
							<option value="7">Entradas</option>
							<option value="8">Salidas</option>
							<option value="9">Transferencias</option>
							<option value="10">Cuentas por cobrar</option>
							<option value="11">Cuentas por pagar</option>
							<option value="12">Planilla</option>
						</select>
						<label>Fecha: </label> <input type="date" class="form-control" id="fecha_caja_nc">	
					</div>
					<div class="col-md-6">						
						<label>Documento: </label> <input type="text" class="form-control">
						<select name="documento_caja_nc" class="form-control" id="documento_caja_nc">
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
						<th>Importe</th>
						<th>No. Factura</th>	
						<th>subtotal</th>						
						<th>iva</th>							
						<th>pago neto</th>
						<th>Clasificacion</th>											
		            </tr>
		        </thead>
		        <tbody>
		        	<?php			        		
	        			$row = IngresoController::addRowCaja2();
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
						<th>Total Importe</th>	
						<th>Subtotal</th>
						<th>Iva</th>							
						<th>pago neto</th>	
		            </tr>
		        </thead>				        	        	
	        	<tbody>	
	        		<tr>
		        		<td colspan="4"><h4><strong>TOTAL</strong></h4></td>
			        	<td id="total_importe_caja"><strong></strong></td>
			        	<td id="tota_sub_total_caja"><strong></strong></td>
			        	<td id="total_iva_caja"><strong></strong></td>
			        	<td id="total_pago_neto_caja"><strong></strong></td>			        	
		        	</tr>		        	
				</tbody>
			</table>	
    	</div>    	
		<div class="col-md-12 text-center" style="margin-top: 2em">
			<button class="btn btn-success btn-lg" id="btn-mostrar_reporte_nc">Mostrar Reporte</button>
		</div>		
	</div>
</div>	