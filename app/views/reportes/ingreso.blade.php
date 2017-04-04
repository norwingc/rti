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
			            	<th>Select</th>
			            	<th>Fecha</th>								
							<th>clasif ventas</th>
							<th>Factura</th>
							<th>Codigo</th>
							<th>Cliente</th>							
							<th>subtotal</th>							
							<th>descuento</th>
							<th>iva</th>							
							<th>ret ir C$</th>
							<th>ret alma C$</th>							
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
							<th>descuento</th>
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
			        		<td id="descuento"><strong>0</strong></td>
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
							<th>pago</th>
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
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>	
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.myTable').DataTable({
				 paging: false
			});

			$('.anul').click(function(){				
				anul($(this));
			});			


			findClasificacion();

			$('.select_clasificacion').focusout(function(){
				findClasificacion();
			});
			

			$('.valor_ret_ir').focusout(function(){
				calculoPagoNeto($(this));
			});
			$('.valor_ret_alma').focusout(function(){
				calculoPagoNeto($(this));
			});
			$('.comision_tarjeta').focusout(function(){
				calculoPagoNeto($(this));
			});


			$('.forma_pago_caja').change(function(){
				calculoPagoNeto_caja($(this));
			});
			$('.comision_tarjeta_caja').focusout(function(){				
				calculoPagoNeto_caja($(this));
			});
			$('.valor_ret_ir_caja').focusout(function(){
				calculoPagoNeto_caja($(this));
			});
			$('.valor_ret_alma_caja').focusout(function(){
				calculoPagoNeto_caja($(this));
			});


			$('.iva_input').focusout(function(){				
				calculoPagoNeto($(this));
			});



			$('.btn_view_referencia').click(function(){

				var title = 'Ver Referencia: ' + $(this).data('referencia');
				$('.modal-title').html(title);
				$('#tbody_referencia').html('');
				var html = "";
				var referencia_edit = "";

				var referencia = $(this).data('referencia').split('/');	
				if(referencia.length ==1){
					referencia_edit = referencia[0];					
				}else{
					referencia_edit = referencia[0] +'-'+ referencia[1];					
				}				


				$.get('{{ URL() }}/Ingreso/Referencia/'+ referencia_edit, function(data){						
					for(var i=0; i< data.datas.length; i++){
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

		function findClasificacion() {

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
			];

			$('.table_factura .clasificacion input').each(function(){
				var no_clasificacion = false;

				for(var i=0; i< clasificacion.length; i++){
					if($(this).val() == clasificacion[i]){
						no_clasificacion = true;						
					}
				}
				if(no_clasificacion == false){					
					var row = $(this).parent(0);
					$(row).css({'background-color':'rgba(256,100,100,.5)', 'color':'white', 'font-weight':'bold'});					

					$(row).parent(0).find('td').each(function(){
						$(this).addClass('anul');
					})
				}else{
					var row = $(this).parent(0);
					$(row).removeAttr('style');

					$(row).parent(0).find('td').each(function(){
						$(this).removeClass('anul');
					});

					var pago = Number($(row).parent(0).find('.pago_neto').html());					
					var select_clasificacion = $(row).find('.select_clasificacion').val();					

					if(pago != 0){					
						if(select_clasificacion != ''){
							$(row).parent(0).find('.pago_neto').addClass(select_clasificacion);	
						}					
					}else{
						$(row).parent(0).find('.c_c').addClass(select_clasificacion);
					}
				}
			});

			calculoIvaDescuento();
		}		

		function calculoIvaDescuento(){

			$('.iva_input').each(function(){
				var iva_total = 0;	
				var descuento = 0;
				var row = $(this).parent(0).parent(0);
				var subtotal_iva_descuento = Number($(row).find('.subtotal').html());
				var valor_actual = $(this).val();

				descuento = Number($(row).find('.descuento').html());
				iva_total = Math.round((subtotal_iva_descuento * 0.15) *100) /100;

				if(valor_actual != iva_total){
					iva_total = valor_actual;
				}				

				subtotal_iva_descuento = Math.round((subtotal_iva_descuento - descuento + iva_total) *100 ) / 100;

				$(this).val(iva_total);

				if(Number($(row).find('.c_c').html()) == 0){
					$(row).find('.pago_neto').html(subtotal_iva_descuento);	
				}else{
					$(row).find('.c_c').html(subtotal_iva_descuento);	
				}						
			});	
			calculoTotales();
		}

		function calculoTotales() {			

			var pago_neto              = 0;
			var c_c                    = 0;
			var subtotal               = 0;
			var descuento              = 0;			
			var iva                    = 0;	
			
			var ret_ir                 = 0;
			var ret_alma               = 0;
			
			var ret_tarjeta_total      = 0;
			var comision_tarjeta_total = 0; 

			$('.pago_neto:not(.anul)').each(function(){
				pago_neto = pago_neto + Number($(this).html());
			});
			$('.c_c:not(.anul)').each(function(){
				c_c += Number($(this).html());
			});	
			$('.subtotal:not(.anul)').each(function(){
				subtotal += Number($(this).html());
			});
			$('.descuento:not(.anul)').each(function(){
				descuento += Number($(this).html());
			});
			$('.iva:not(.anul) input').each(function(){
				iva += Number($(this).val());
			});
			$('.valor_ret_ir:not(.anul)').each(function(){
				ret_ir += Number($(this).val());
			});
			$('.valor_ret_alma:not(.anul)').each(function(){
				ret_alma += Number($(this).val());
			});	
			$('.ret_tarjeta:not(.anul)').each(function(){
				ret_tarjeta_total += Number($(this).val());
			});	
			$('.comision_tarjeta_valor:not(.anul)').each(function(){
				comision_tarjeta_total += Number($(this).val());
			});	
					

			$('#pago_neto strong').html(Math.round(pago_neto * 100) / 100);
			$('#c_c strong').html(Math.round(c_c * 100) / 100);
			$('#subtotal strong').html(Math.round(subtotal * 100) / 100);
			$('#descuento strong').html(Math.round(descuento * 100) / 100);
			$('#iva strong').html(Math.round(iva * 100) / 100);
			$('#ret_ir strong').html(Math.round(ret_ir * 100) / 100);
			$('#ret_alma strong').html(Math.round(ret_alma * 100) / 100);
			$('#ret_ir_tarjeta strong').html(Math.round(ret_tarjeta_total * 100) / 100);
			$('#comision_tarjeta strong').html(Math.round(comision_tarjeta_total * 100) / 100);			

			clasificacion_ventas();
		}

		function clasificacion_ventas(){
			var re_total   = 0;
			var re_credito = 0;
			var re_contado = 0;

			$('.subtotal.RE:not(.anul)').each(function(){
				re_total += Number($(this).html());			
			});
			$('.CONTADO.RE:not(.anul)').each(function(){
				re_contado += Number($(this).html());			
			});
			$('.CREDITO.RE:not(.anul)').each(function(){
				re_credito += Number($(this).html());
			});	

			$('#re_total').html(Math.round(re_total * 100) / 100);
			$('#re_credito').html(Math.round(re_credito * 100) / 100);
			$('#re_contado').html(Math.round(re_contado * 100) / 100);

			var ra_total   = 0;
			var ra_credito = 0;
			var ra_contado = 0;
			
			$('.subtotal.RA:not(.anul)').each(function(){
				ra_total += Number($(this).html());			
			});
			$('.CONTADO.RA:not(.anul)').each(function(){
				ra_contado += Number($(this).html());			
			});
			$('.CREDITO.RA:not(.anul)').each(function(){
				ra_credito += Number($(this).html());
			});	

			$('#ra_total').html(Math.round(ra_total * 100) / 100);
			$('#ra_credito').html(Math.round(ra_credito * 100) / 100);
			$('#ra_contado').html(Math.round(ra_contado * 100) / 100);

			var en_total   = 0;
			var en_credito = 0;
			var en_contado = 0;
			
			$('.subtotal.EN:not(.anul)').each(function(){
				en_total += Number($(this).html());			
			});
			$('.CONTADO.EN:not(.anul)').each(function(){
				en_contado += Number($(this).html());			
			});
			$('.CREDITO.EN:not(.anul)').each(function(){
				en_credito += Number($(this).html());
			});	

			$('#en_total').html(Math.round(en_total * 100) / 100);
			$('#en_credito').html(Math.round(en_credito * 100) / 100);
			$('#en_contado').html(Math.round(en_contado * 100) / 100);

			var eu_total   = 0;
			var eu_credito = 0;
			var eu_contado = 0;
			
			$('.subtotal.EU:not(.anul)').each(function(){
				eu_total += Number($(this).html());			
			});
			$('.CONTADO.EU:not(.anul)').each(function(){
				eu_contado += Number($(this).html());			
			});
			$('.CREDITO.EU:not(.anul)').each(function(){
				eu_credito += Number($(this).html());
			});	

			$('#eu_total').html(Math.round(eu_total * 100) / 100);
			$('#eu_credito').html(Math.round(eu_credito * 100) / 100);
			$('#eu_contado').html(Math.round(eu_contado * 100) / 100);

			var ru_total   = 0;
			var ru_credito = 0;
			var ru_contado = 0;
			
			$('.subtotal.RU:not(.anul)').each(function(){
				ru_total += Number($(this).html());			
			});
			$('.CONTADO.RU:not(.anul)').each(function(){
				ru_contado += Number($(this).html());			
			});
			$('.CREDITO.RU:not(.anul)').each(function(){
				ru_credito += Number($(this).html());
			});	

			$('#ru_total').html(Math.round(ru_total * 100) / 100);
			$('#ru_credito').html(Math.round(ru_credito * 100) / 100);
			$('#ru_contado').html(Math.round(ru_contado * 100) / 100);

			var fl_total   = 0;
			var fl_credito = 0;
			var fl_contado = 0;
			
			$('.subtotal.FL:not(.anul)').each(function(){
				fl_total += Number($(this).html());			
			});
			$('.CONTADO.FL:not(.anul)').each(function(){
				fl_contado += Number($(this).html());			
			});
			$('.CREDITO.FL:not(.anul)').each(function(){
				fl_credito += Number($(this).html());
			});	

			$('#fl_total').html(Math.round(fl_total * 100) / 100);
			$('#fl_credito').html(Math.round(fl_credito * 100) / 100);
			$('#fl_contado').html(Math.round(fl_contado * 100) / 100);

			var co_total   = 0;
			var co_credito = 0;
			var co_contado = 0;
			
			$('.subtotal.CO:not(.anul)').each(function(){
				co_total += Number($(this).html());			
			});
			$('.CONTADO.CO:not(.anul)').each(function(){
				co_contado += Number($(this).html());			
			});
			$('.CREDITO.CO:not(.anul)').each(function(){
				co_credito += Number($(this).html());
			});	

			$('#co_total').html(Math.round(co_total * 100) / 100);
			$('#co_credito').html(Math.round(co_credito * 100) / 100);
			$('#co_contado').html(Math.round(co_contado * 100) / 100);

			var st_total   = 0;
			var st_credito = 0;
			var st_contado = 0;
			
			$('.subtotal.ST:not(.anul)').each(function(){
				st_total += Number($(this).html());			
			});
			$('.CONTADO.ST:not(.anul)').each(function(){
				st_contado += Number($(this).html());			
			});
			$('.CREDITO.ST:not(.anul)').each(function(){
				st_credito += Number($(this).html());
			});	

			$('#st_total').html(Math.round(st_total * 100) / 100);
			$('#st_credito').html(Math.round(st_credito * 100) / 100);
			$('#st_contado').html(Math.round(st_contado * 100) / 100);

			var pr_total   = 0;
			var pr_credito = 0;
			var pr_contado = 0;
			
			$('.subtotal.PR:not(.anul)').each(function(){
				pr_total += Number($(this).html());			
			});
			$('.CONTADO.PR:not(.anul)').each(function(){
				pr_contado += Number($(this).html());			
			});
			$('.CREDITO.PR:not(.anul)').each(function(){
				pr_credito += Number($(this).html());
			});	

			$('#pr_total').html(Math.round(pr_total * 100) / 100);
			$('#pr_credito').html(Math.round(pr_credito * 100) / 100);
			$('#pr_contado').html(Math.round(pr_contado * 100) / 100);

			var cv_total   = 0;
			var cv_credito = 0;
			var cv_contado = 0;
			
			$('.subtotal.CV:not(.anul)').each(function(){
				cv_total += Number($(this).html());			
			});
			$('.CONTADO.CV:not(.anul)').each(function(){
				cv_contado += Number($(this).html());			
			});
			$('.CREDITO.CV:not(.anul)').each(function(){
				cv_credito += Number($(this).html());
			});	

			$('#cv_total').html(Math.round(cv_total * 100) / 100);
			$('#cv_credito').html(Math.round(cv_credito * 100) / 100);
			$('#cv_contado').html(Math.round(cv_contado * 100) / 100);

			formaPago();
		}

		function formaPago() {
			var forma_pago_transferncia = 0,  forma_pago_efectivo = 0, forma_pago_cheque = 0, forma_pago_tarjeta = 0;

			$('.table_factura').find('.TARJETA').each(function(){
				var row = $(this).parent(0);
				forma_pago_tarjeta += Number($(row).find('.pago_neto').html());				
			});

			$('.table_factura').find('.TRANSFERENCIA').each(function(){
				var row = $(this).parent(0);
				forma_pago_transferncia += Number($(row).find('.pago_neto').html());				
			});

			$('.table_factura').find('.CHEQUE').each(function(){
				var row = $(this).parent(0);
				forma_pago_cheque += Number($(row).find('.pago_neto').html());				
			});

			$('.table_factura').find('.EFECTIVO').each(function(){
				var row = $(this).parent(0);
				forma_pago_efectivo += Number($(row).find('.pago_neto').html());				
			});

			$('#forma_pago_tarjeta').html(Math.round( forma_pago_tarjeta * 100   ) / 100);
			$('#forma_pago_transferncia').html(Math.round( forma_pago_transferncia * 100   ) / 100);
			$('#forma_pago_efectivo').html(Math.round( forma_pago_efectivo * 100   ) / 100);
			$('#forma_pago_cheque').html(Math.round( forma_pago_cheque * 100   ) / 100);

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

				$(row).find('.select_clasificacion').val('');
				
			}else{
				var row = $(este).parent(0).parent(0);
				$(row).removeAttr('style');

				$(row).find('td').each(function(){
					$(this).removeClass('anul');
				});
			}

			findClasificacion();
			calculoTotales();
		}

		function calculoPagoNeto(este) {
			
			var row = $(este).parent(0).parent(0);	

			var no_factura = $(row).find('.no_factura').html();			
			var clasificacion = $(row).find('.select_clasificacion').val(); 
			var url = '{{URL()}}/getFactura/' +no_factura+'/' + clasificacion;	
			var iva = $(row).find('.iva').find('input').val();				
			var descuento = Number($(row).find('.descuento').html());			

			var pago_neto = 0;
			var pago = 0;
			var ret_ir = 0;
			var ret_alma = 0;
			var ret_tarjeta = 0;
			var comision = 0;	
			var comision_tarjeta_valor = 0;				

			if(clasificacion != ""){
				$.get(url, function(data){

					var subtotal = data.data['sub_total'];

					pago = Number(subtotal) - descuento + Number(iva) ;

					//pago = data.data['pago_neto'];

					if($(row).find('.valor_ret_ir').val() != ''){
						ret_ir = $(row).find('.valor_ret_ir').val();	
					}

					if($(row).find('.valor_ret_alma').val() != ''){
						ret_alma = $(row).find('.valor_ret_alma').val();	
					}	

					if($(row).find('.comision_tarjeta').val() != ''){

						if($(row).find('.comision_tarjeta').val() != undefined){

							comision_tarjeta_valor = Math.round(((pago * $(row).find('.comision_tarjeta').val())/100)*100)/100;

							$(row).find('.comision_tarjeta_valor').html(comision_tarjeta_valor);

							comision = comision_tarjeta_valor;
						}
						
					}else{
						$(row).find('.comision_tarjeta_valor').html('');
					}


					if($(row).find('.ret_tarjeta').html() != undefined){
						ret_tarjeta = Number($(row).find('.ret_tarjeta').html());				
					}					

					pago_neto = pago - ret_ir - ret_alma - ret_tarjeta - comision;

					pago_neto = Math.round((pago_neto) * 100) / 100;

					if(Number($(row).find('.c_c').html()) == 0){
						$(row).find('.pago_neto').html(pago_neto);	
					}else{
						$(row).find('.c_c').html(pago_neto);	
					}
						
				});	
			}					
			
			calculoTotales();
		}

		function calculoPagoNeto_caja(este){
			
			var row = $(este).parent(0).parent(0);
			var referencia = $(row).find('.no_referencia').html();	
			var referencia_edit = null;

			referencia = referencia.split('/');

			if(referencia.length ==1){
				referencia_edit = referencia[0];					
			}else{
				referencia_edit = referencia[0] +'-'+ referencia[1];					
			}

			var pago_neto = 0;
			var pago = 0;
			var ret_ir = 0;
			var ret_alma = 0;
			var ret_tarjeta = 0;
			var comision = 0;	
			var comision_tarjeta_valor = 0;		

			$.get('{{URL()}}/getCaja/'+referencia_edit, function(data){
				pago = data.data['pago'];

				if($(row).find('.valor_ret_ir_caja').val() != ''){
					ret_ir = $(row).find('.valor_ret_ir_caja').val();	
				}

				if($(row).find('.valor_ret_alma_caja').val() != ''){
					ret_alma = $(row).find('.valor_ret_alma_caja').val();	
				}

				if($(row).find('.comision_tarjeta_caja').val() != ''){

					comision_tarjeta_valor = Math.round(((pago * $(row).find('.comision_tarjeta_caja').val())/100)*100)/100;

					$(row).find('.comision_tarjeta_valor_caja').html(comision_tarjeta_valor);

					comision = comision_tarjeta_valor;
				}else{
					$(row).find('.comision_tarjeta_valor_caja').html('');
				}

				if($(row).find('.forma_pago_caja').val() == 'TARJETA DE CREDITO'){

					var retencion_tarjeta = Math.round(( pago * 0.015) * 100 )/100;

					ret_tarjeta = retencion_tarjeta;	

					$(row).find('.ret_tarjeta_caja').html(ret_tarjeta);	
				}else{
					$(row).find('.ret_tarjeta_caja').html('0');	
				}

				pago_neto = pago - ret_ir - ret_alma - ret_tarjeta - comision;

				pago_neto = Math.round((pago_neto) * 100) / 100;


				$(row).find('.pago_neto_caja').html(pago_neto);	
			});	

			formaPagoCaja();

		}

		function formaPagoCaja() {

			var forma_pago_transferncia = 0,  forma_pago_efectivo = 0, forma_pago_cheque = 0, forma_pago_tarjeta = 0;

			$('.table_caja').find('.forma_pago_caja').each(function(){
				var select = $(this).val().trim();
				var row = $(this).parent(0).parent(0);				

				if(select == 'TARJETA DE CREDITO'){					
					forma_pago_tarjeta += Number($(row).find('.pago_neto_caja').html());	
				}

				if(select == 'CHEQUE'){
					forma_pago_cheque += Number($(row).find('.pago_neto_caja').html());	
				}

				if(select == 'EFECTIVO'){
					forma_pago_efectivo += Number($(row).find('.pago_neto_caja').html());	
				}

				 if(select == 'TRANSFERENCIA'){
					forma_pago_transferncia += Number($(row).find('.pago_neto_caja').html());	
				}
							
			});


			$('#forma_pago_tarjeta_caja').html(Math.round( forma_pago_tarjeta * 100   ) / 100);
			$('#forma_pago_transferncia_caja').html(Math.round( forma_pago_transferncia * 100   ) / 100);
			$('#forma_pago_efectivo_caja').html(Math.round( forma_pago_efectivo * 100   ) / 100);
			$('#forma_pago_cheque_caja').html(Math.round( forma_pago_cheque * 100   ) / 100);
		}

	</script>
@stop	