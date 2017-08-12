<div class="box box-info" id="primer_reporte">
	<div class="box-header">
		<h3 class="box-title"><small>Reporte Ingreso de Facturas</small></h3>
	</div>				

	<div class="box-body">

		<div class="comprobante_diario">
			<h2>Comprobante Diario</h2>
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-6">
						<label>Clasif: </label> 
						<select name="clasificacion_factura" id="clasificacion_factura" class="form-control">
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
						<label>Fecha: </label> <input type="date" class="form-control" id="fecha_factura">						
					</div>
					<div class="col-md-6">						
						<label>Documento: </label> 
						<select name="documento_factura" class="form-control" id="documento_factura">
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
						<label>Concepto: </label> <textarea class="form-control" style="height: 90px" id="concepto_factura"></textarea>
					</div>
				</div>
			</div>
		</div>	

		<div class="table-responsive">
			<table id="table" class="table table-bordered table-hover myTable table_factura">
				<thead>
		            <tr>
		            	<th>Select</th>
		            	<th>Fecha</th>								
						<th width="10%">clasif ventas</th>
						<th>Factura</th>
						<th>Codigo</th>
						<th>Cliente</th>							
						<th>subtotal</th>							
						<th>descuento</th>
						<th width="15%">iva</th>							
						<th width="15%">ret ir C$</th>
						<th width="15%">ret alma C$</th>							
						<th>pago neto</th>
						<th>cxc</th>
						<th>forma de pago</th>
						<th>Ret ir 1.5%</th>
						<th>Comision %</th>
						<th>Comision C$</th>					
		            </tr>
		        </thead>
		        <tbody>			        	
		        	<?php
		        		for ($i=0; $i < $result1->count(); $i++) { 
		        			$row = IngresoController::addRowFactura($result1[$i]);
		        			echo $row;
		        		}			        		
		        	?>	
		        		        	
		        </tbody>
	        </table>
	        <table class="table table-bordered">	
	        	<thead>
		            <tr>
		            	<th>Fecha</th>								
						<th>clasif ventas</th>
						<th>Factura</th>
						<th>Codigo</th>
						<th>Cliente</th>							
						<th>subtotal</th>							
						<th>descuento CONTADO</th>
						<th>descuento CREDITO</th>
						<th>iva</th>							
						<th>ret ir</th>
						<th>ret alma</th>							
						<th>pago neto</th>
						<th>cxc</th>
						<th>Ret ir Tarjeta</th>
						<th>Comision</th>							
		            </tr>
		        </thead>				        	        	
	        	<tbody>			        	
		        	<tr>
		        		<td colspan="5"><h4><strong>TOTAL</strong></h4></td>
		        		<td id="subtotal"><strong>0</strong></td>
		        		<td id="descuento_contado"><strong>0</strong></td>
		        		<td id="descuento_credito"><strong>0</strong></td>
		        		<td id="iva"><strong>0</strong></td>
		        		<td id="ret_ir"><strong>0</strong></td>
		        		<td id="ret_alma"><strong>0</strong></td>
		        		<td id="pago_neto"><strong>0</strong></td>
		        		<td id="c_c"><strong>0</strong></td>
		        		<td id="ret_ir_tarjeta"><strong>0</strong></td>
		        		<td id="comision_tarjeta"><strong>0</strong></td>
		        	</tr>
	        	</tbody>
        	</table>		
    	</div>

    	<div class="container totales_factura">
    		<div class="col-sm-3">
				<h3 style="text-align: left;">Clasif Ventas</h3>
				<ul style="text-align: left;">
					<li>RE</li>
					<li>RA</li>
					<li>EN</li>
					<li>EU</li>
					<li>RU</li>
					<li>FL</li>
					<li>CO</li>
					<li>ST</li>
					<li>PR</li>
					<li>CV</li>						
				</ul>
			</div>
			<div class="col-sm-3">
				<h3>Totales</h3>
				<ul>
					<li id="re_total"></li>
					<li id="ra_total"></li>
					<li id="en_total"></li>
					<li id="eu_total"></li>
					<li id="ru_total"></li>
					<li id="fl_total"></li>
					<li id="co_total"></li>
					<li id="st_total"></li>
					<li id="pr_total"></li>
					<li id="cv_total"></li>
				</ul>
			</div>
			<div class="col-sm-3">
				<h3>Credito</h3>
				<ul>
					<li id="re_credito"></li>
					<li id="ra_credito"></li>
					<li id="en_credito"></li>
					<li id="eu_credito"></li>
					<li id="ru_credito"></li>
					<li id="fl_credito"></li>
					<li id="co_credito"></li>
					<li id="st_credito"></li>
					<li id="pr_credito"></li>
					<li id="cv_credito"></li>
				</ul>
			</div>
			<div class="col-sm-3">
				<h3>Contado</h3>
				<ul>
					<li id="re_contado"></li>
					<li id="ra_contado"></li>
					<li id="en_contado"></li>
					<li id="eu_contado"></li>
					<li id="ru_contado"></li>
					<li id="fl_contado"></li>
					<li id="co_contado"></li>
					<li id="st_contado"></li>
					<li id="pr_contado"></li>
					<li id="cv_contado"></li>
				</ul>
			</div>		        		
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
					<li id="forma_pago_tarjeta"></li>
					<li id="forma_pago_cheque"></li>
					<li id="forma_pago_efectivo"></li>
					<li id="forma_pago_transferncia"></li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 text-center" style="margin-top: 2em">
			<button class="btn btn-success btn-lg" id="btn-mostrar_reporte">Mostrar Reporte</button>
		</div>		    	
	</div>		
</div>