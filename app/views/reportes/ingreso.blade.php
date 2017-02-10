@extends('templates.maintemplate')

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
			            	<th width="5%">Numbero Comprobante</th>								
							<th width="10%">Clasificacion</th>
							<th>Fecha</th>
							<th>Tipo de Cambio</th>
							<th>Documento</th>
							<th>Concepto</th>
							<th>Cuenta Contable</th>
							<th>Descripcion</th>
							<th>Monto</th>
							<th>Movimiento</th>							
							<th>Monto en U$</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<tr>
			        		<td>001</td>
			        		<td>
			        			<select class="form-control">
			        				<option value="Primera">Primera</option>
			        				<option value="Segunda">Segunda</option>
			        				<option value="Tercera">Tercera</option>
			        			</select>
			        		</td>
			        		<td>{{ date('Y-m-d') }}</td>
			        		<td>29.30</td>
			        		<td>VARIOS</td>
			        		<td><input type="text" class="form-control"></td>
			        		<td>Caja</td>
			        		<td>Caja</td>
			        		<td>200</td>
			        		<td>Haber</td>			        		
			        		<td>6000</td>
			        	</tr> 
			        </tbody>
		        </table>
        	</div>
			
			<div style="overflow:scroll;">
        		<p>{{ $result1 }}</p>
        		<p>{{ $result2 }}</p>
        	</div>
		</div>
	</div>
</section>

@stop		