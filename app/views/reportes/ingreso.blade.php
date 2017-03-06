@extends('templates.maintemplate')

@section('css')
	<style type="text/css">
		th{
			text-transform: uppercase;
			text-align: center;
		}
		li{
			list-style: none;
		}
		td{
			text-align: center;
		}
		.totales_factura {
			text-align: center;
		}
		ul{
			padding:  0
		}
	</style>
@stop

@section('contenido')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Reportes <small>Diarios</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ URL::to('ReportesDiarios') }}">Reportes Diarios</a></li>
		<li class="active">Ingreso CYSCONTA</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">		
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title"><small>Ingreso a CYSCONTA</small></h3>
		</div>				

		<div class="box-body">	

			<div class="table-responsive">
				<table id="table" class="table table-bordered table-hover">
					<thead>
			            <tr>
			            	<th>Fecha</th>								
							<th>clasif ventas</th>
							<th>Factura</th>
							<th>Codigo</th>
							<th>Cliente</th>							
							<th>subtotal</th>							
							<th>descuento</th>
							<th>iva</th>							
							<th>ret ir</th>
							<th>ret alma</th>							
							<th>pago neto</th>
							<th>cxc</th>
							<th>forma de pago</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php
			        		for ($i=0; $i < $result1->count(); $i++) { 
			        			$row = IngresoController::addRowFactura($result1[$i]);
			        			echo $row;
			        		}			        		
			        	?>	
			        	<tr>
			        		<td colspan="10"><h4><strong>TOTAL</strong></h4></td>
			        		<td id="pago_neto"><strong></strong></td>
			        		<td id="c_c"><strong></strong></td>

			        	</tr>			        	
			        </tbody>
		        </table>
        	</div>

        	<div class="container totales_factura">
        		<div class="col-sm-3">
					<h3 style="text-align: left;">Clasif Ventas</h3>
					<ul style="text-align: left;">
						<li>RENTA</li>
						<li>REP Y ACC</li>
						<li>EQ. NUEVO</li>
						<li>EQ. USADO</li>
						<li>REPUESTOS Y ACCES USADOS</li>
						<li>FLETE</li>
						<li>COMBUTIBLE</li>
						<li>SERVICIO DE TALLER</li>
						<li>PROYECTOS</li>
						<li>ANULADO</li>						
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Totales</h3>
					<ul>
						<li id="renta_total"></li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Credito</h3>
					<ul>
						<li id="renta_credito"></li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Contado</h3>
					<ul>
						<li id="renta_contado"></li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
						<li>--</li>
					</ul>
				</div>
			        		
        	</div>	

        	<h2>Recibos oficiales de caja</h2>

        	<div class="table-responsive">
				<table id="table" class="table table-bordered table-hover">
					<thead>
			            <tr>
			            	<th>No. Cliente</th>								
							<th>Descripcion</th>
							<th>Fecha</th>							
							<th>Referencia</th>
							<th>pago</th>
							<th>No. Factura</th>
							<th>ret ir</th>
							<th>ret alma</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php
			        		for ($i=0; $i < $result2->count(); $i++) { 
			        			$row = IngresoController::addRowCaja($result2[$i]);
			        			echo $row;
			        		}			        		
			        	?>		        	
			        </tbody>
		        </table>
        	</div>
		
		</div>
	</div>
</section>

@stop	

@section('js')
	<script type="text/javascript">
		
		$(document).ready(function(){
			var pago = 0;
			var cxc = 0;
			var renta_total = 0;
			var renta_credito = 0;
			var renta_contado = 0;

			$('.pago_neto').each(function(){
				pago = pago + Number($(this).html());
			});
			$('.c_c').each(function(){
				cxc += Number($(this).html());
			});	

			$('.RENTA').each(function(){
				renta_total += Number($(this).html());			
			});
			$('.pago_neto.RENTA').each(function(){
				renta_credito += Number($(this).html());			
			});
			$('.c_c.RENTA').each(function(){
				renta_contado += Number($(this).html());
			});	


			$('#pago_neto strong').html(Math.round(pago * 100) / 100);
			$('#c_c strong').html(Math.round(cxc * 100) / 100);
			$('#renta_total').html(Math.round(renta_total * 100) / 100);
			$('#renta_credito').html(Math.round(renta_credito * 100) / 100);
			$('#renta_contado').html(Math.round(renta_contado * 100) / 100);
		});

	</script>
@stop	