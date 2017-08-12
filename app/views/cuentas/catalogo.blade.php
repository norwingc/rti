@extends('templates.maintemplate')

@section('css')
	<style type="text/css">
		input[type=radio]{
			vertical-align: sub;
   			margin: 0 6px 0 6px;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@stop

@section('contenido')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Catalogo <small>Cuentas</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Catalogo de Cuentas</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">	
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title"><small>Catalogo de Cuentas</small></h3>
		</div>				

		<div class="box-body">	
		  
			<div class="table-responsive">
				<table id="table" class="table table-bordered table-hover">
					<thead>
			            <tr>
			            	<th>Cuenta</th>								
							<th>Clasificacion</th>
							<th>Movimiento</th>
							<th>Cuenta Padre</th>
							<th>Descripcion</th>						
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach ($cuentas as $value)
			        		<tr>
			        			<td>{{ $value->Cuenta }}</td>
			        			<td>{{ $value->Clasificacion }}</td>
			        			<td>{{ $value->Movimiento }}</td>
			        			<td>{{ $value->Cuenta_Padre }}</td>
			        			<td>{{ $value->Descripcion }}</td>
			        		</tr>
			        	@endforeach			        	
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

@stop


@section('js')
<!-- DataTables -->
{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
<script type="text/javascript">
    $('#table').DataTable();   
</script>
@stop