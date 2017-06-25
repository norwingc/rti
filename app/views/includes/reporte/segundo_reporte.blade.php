<div class="box box-info" id="segundo_reporte">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte de Ingreso a la BD</small></h3>
	</div>	

	<div class="box-body">
		<h2>Recibos oficiales de caja</h2>

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
		            </tr>
		        </thead>
		        <tbody>
		        	<?php			        		
	        			$row = IngresoController::addRowCaja2();
	        			echo $row;			        				        		
		        	?>			        		        	
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