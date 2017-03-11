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
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title"><small>Ingreso a CYSCONTA</small></h3>
		</div>				

		<div class="box-body">	

			<div class="table-responsive">
				<table id="table" class="table table-bordered table-hover myTable table_factura">
					<thead>
			            <tr>
			            	<th width="10%">Select</th>
			            	<th>Fecha</th>								
							<th>clasif ventas</th>
							<th>Factura</th>
							<th>Codigo</th>
							<th>Cliente</th>							
							<th>subtotal</th>							
							<th>descuento</th>
							<th>iva</th>							
							<th width="20%">ret ir C$</th>
							<th width="20%">ret alma C$</th>							
							<th>pago neto</th>
							<th>cxc</th>
							<th>forma de pago</th>
							<th>Retancion %</th>
							<th>Comision %</th>
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
							<th>descuento</th>
							<th>iva</th>							
							<th>ret ir</th>
							<th>ret alma</th>							
							<th>pago neto</th>
							<th>cxc</th>							
			            </tr>
			        </thead>				        	        	
		        	<tbody>			        	
			        	<tr>
			        		<td colspan="5"><h4><strong>TOTAL</strong></h4></td>
			        		<td id="subtotal"><strong>0</strong></td>
			        		<td id="descuento"><strong>0</strong></td>
			        		<td id="iva"><strong>0</strong></td>
			        		<td id="ret_ir"><strong>0</strong></td>
			        		<td id="ret_alma"><strong>0</strong></td>
			        		<td id="pago_neto"><strong>0</strong></td>
			        		<td id="c_c"><strong>0</strong></td>
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
				<table id="table" class="table table-bordered table-hover myTable">
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
		
		</div>
	</div>
</section>

<div class="modal fade" id="modalViewReferencia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            	<table class="table table-bordered">
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
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>	
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.myTable').DataTable({
				 paging: false
			});

			$('.anul').click(function(){
				var este = $(this);
				anul(este);
			});
			
			var clasificacion = [
				'RE',
				'RA',
				'EN',
				'EU',
				'RU',
				'FL',
				'CO',
				'ST',
				'PR',
				'CV'			
			]

			calculoTotales();


			$('.table_factura .clasificacion').each(function(){
				var no_clasificacion = false;

				for(var i=0; i< clasificacion.length; i++){
					if($(this).html() == clasificacion[i]){
						no_clasificacion = true;						
					}
				}
				if(no_clasificacion == false){					
					var row = $(this).parent(0);
					$(this).css({'background-color':'rgba(256,100,100,.5)', 'color':'white', 'font-weight':'bold'});
				}
			});

			$('.valor_ret_ir').focusout(function(){
				calculoPagoNeto($(this));
			});
			$('.valor_ret_alma').focusout(function(){
				calculoPagoNeto($(this));
			});



			$('.btn_view_referencia').click(function(){

				var title = 'Ver Referencia: ' + $(this).data('referencia');
				$('.modal-title').html(title);
				$('#tbody_referencia').html('');
				var html = "";

				var referencia = $(this).data('referencia').split('/');	
				//console.log(referencia)		


				$.get('{{ URL() }}/Ingreso/Referencia/'+ referencia[0] +'-'+ referencia[1], function(data){
					//console.log(data);	
					for(var i=0; i<data.datas.length; i++){
						html = html + "<tr>"+
							"<td>"+data.datas[i].no_cliente+"</td>"+
	       		        	"<td>"+data.datas[i].descripcion+"</td>"+
	       		        	"<td>"+data.datas[i].fecha+"</td>"+
	       		        	"<td>"+data.datas[i].referencia+"</td>"+
	       		        	"<td>"+data.datas[i].pago+"</td>"+
	       		        	"<td>"+data.datas[i].no_factura+"</td>"+
	       		        	"<td>"+data.datas[i].importe+"</td>"
						+"</tr>";												
					}

					$('#tbody_referencia').html(html);
				});					
			
				$('#modalViewReferencia').modal('show');
			});

		});

		function calculoTotales() {
			var pago          = 0;
			var cxc           = 0;
			var subtotal      = 0;
			var descuento     = 0;
			var iva           = 0;
			var renta_total   = 0;
			var renta_credito = 0;
			var renta_contado = 0;
			
			var ret_ir        = 0;
			var ret_alma      = 0;


			$('.pago_neto:not(.anul)').each(function(){
				pago = pago + Number($(this).html());
			});
			$('.c_c:not(.anul)').each(function(){
				cxc += Number($(this).html());
			});	
			$('.subtotal:not(.anul)').each(function(){
				subtotal += Number($(this).html());
			});
			$('.descuento:not(.anul)').each(function(){
				descuento += Number($(this).html());
			});
			$('.iva:not(.anul)').each(function(){
				iva += Number($(this).html());
			});
			$('.valor_ret_ir:not(.anul)').each(function(){
				ret_ir += Number($(this).val());
			});
			$('.valor_ret_alma:not(.anul)').each(function(){
				ret_alma += Number($(this).val());
			});

			$('.RE:not(.anul)').each(function(){
				renta_total += Number($(this).html());			
			});
			$('.pago_neto.RE:not(.anul)').each(function(){
				renta_credito += Number($(this).html());			
			});
			$('.c_c.RE:not(.anul)').each(function(){
				renta_contado += Number($(this).html());
			});	


			$('#pago_neto strong').html(Math.round(pago * 100) / 100);
			$('#c_c strong').html(Math.round(cxc * 100) / 100);
			$('#subtotal strong').html(Math.round(subtotal * 100) / 100);
			$('#descuento strong').html(Math.round(descuento * 100) / 100);
			$('#iva strong').html(Math.round(iva * 100) / 100);
			$('#ret_ir strong').html(Math.round(ret_ir * 100) / 100);
			$('#ret_ir strong').html(Math.round(ret_ir * 100) / 100);

			$('#renta_total').html(Math.round(renta_total * 100) / 100);
			$('#renta_credito').html(Math.round(renta_credito * 100) / 100);
			$('#renta_contado').html(Math.round(renta_contado * 100) / 100);
		}

		function anul(este) {
			var check = false;

			if($(este).is(':checked')){
				check = true;
			}

			if(check){
				var row = $(este).parent(0).parent(0);
				$(row).css({'background-color':'rgba(256,100,100,.5)', 'color':'white', 'font-weight':'bold'});

				$(row).find('td').each(function(){
					$(this).css('color', 'black').addClass('anul');
				});
				
			}else{
				var row = $(este).parent(0).parent(0);
				$(row).removeAttr('style');

				$(row).find('td').each(function(){
					$(this).removeClass('anul');
				});
				
			}

			calculoTotales();
		}

		function calculoPagoNeto(este) {

			calculoTotales();
			var row = $(este).parent(0).parent(0);

			var pago = $(row).find('.pago_neto').html();
			var pago_resta = $(este).val();				

			pago = Math.round((pago - pago_resta) * 100) / 100;			

			$(row).find('.pago_neto').html(pago);

			calculoTotales();
			
		}

	</script>
@stop	