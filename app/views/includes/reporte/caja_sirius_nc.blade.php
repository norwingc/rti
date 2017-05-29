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
						<label>No de Comprob: </label> <input type="number" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Fecha: </label> <input type="date" class="form-control">
						<label>Documento: </label> <input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-6">
						<label>Concepto: </label> <textarea class="form-control" style="height: 90px"></textarea>
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
						<th width="20%">Concepto Factura</th>							
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
			<button class="btn btn-success btn-lg" id="btn-mostrar_reporte_nc">Mostrar Reporte</button>
		</div>		
	</div>
</div>	