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
			        			$row = IngresoController::addRow($result1[$i]);
			        			echo $row;
			        		}			        		
			        	?>				        	
			        </tbody>
		        </table>
        	</div>

        	<div class="container">
        		<div class="col-sm-3">
					<h3>Clasif Ventas</h3>
					<ul>
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
						<li>--</li>
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
						<li>--</li>
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
						<li>--</li>
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
			            	<th>Fecha</th>								
							<th>RECIBO</th>
							<th>CODIGO</th>							
							<th>Cliente</th>
			            </tr>
			        </thead>
			        <tbody>
			        		        	
			        </tbody>
		        </table>
        	</div>
		
		</div>
	</div>
</section>

@stop		