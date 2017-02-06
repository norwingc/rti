@extends('templates.maintemplate')

@section('contenido')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Reportes <small>Diarios</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Reportes Diarios</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">		
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title"><small>Ingreso de reportes diarios</small></h3>
		</div>				

		<div class="box-body">	
			{{ Form::open(array('url' => 'ReportesDiarios', 'class' => 'form-horizontal', 'files' => 'true')) }}
				<div class="col-sm-6">					
					<div class="form-group">
						<label class="col-sm-3">Template Factura SIRIUS <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="file" name="first_report" accept=".xlsx, .xls">
						</div>
					</div>
				</div>
				<div class="col-sm-6">					
					<div class="form-group">
						<label class="col-sm-3">Template Recibo Caja SIRIUS <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="file" name="second_report" accept=".xlsx, .xls">
						</div>
					</div>
				</div>
				<div class="form-group col-md-12 text-center">					
					<button type="submit" class="btn btn btn-success">Subir</button>					
				</div>
			{{ Form::close() }}	
		</div>


		<div style="overflow: scroll;">
			@if($result1 && $result2)
				<p>Factura</p>
				<p>{{ $result1 }}</p>

				<p>Caja	</p>
				<p>{{ $result2 }}</p>
			@endif
		</div>
	</div>	


	
</section>
<!-- /.content -->

@stop