@extends('templates.maintemplate')

@section('css')
	<style type="text/css">
		th{
			text-transform: uppercase;
			text-align: center;
			padding: 0 !important;
		}
		li{
			list-style: none;
		}
		td{
			text-align: center;
			text-transform: uppercase;
		}
		.totales_factura {
			text-align: center;
		}
		ul{
			padding:  0
		}
		.dataTables_info{
			display: none;
		}
		table:not(.table_modal){
			width: 1500px !important;
		}
		#table_reporte_caja2 th{
			text-align: left;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
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
	@include('includes.reporte.caja_sirius_nc')
	@include('includes.reporte.reporte_ingresar')	
</section>

<div class="modal fade" id="modalViewReferencia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            	<table class="table table-bordered table_modal">
					<thead>
			            <tr>			            	
			            	<th>No. Cliente</th>								
							<th>Descripcion</th>
							<th>Fecha</th>							
							<th>Referencia</th>
							<th>pago</th>
							<th>No. Factura</th>
							<th>importe</th>														
			            </tr>
			        </thead>
			        <tbody id="tbody_referencia">
			        		<td></td>
	       		        	<td></td>
	       		        	<td></td>
	       		        	<td></td>
	       		        	<td></td>
	       		        	<td></td>
	       		        	<td></td>
	       		        	<td></td>       		        	
			        </tbody>
		        </table>
            </div>
        </div>
    </div>
</div>            

@stop	

@section('js')
	@include('includes.reporte.__script_caja_sirius_nc')	
@stop	