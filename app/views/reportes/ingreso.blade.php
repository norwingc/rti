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
							<th>Ret ir 1.5%</th>
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
			];

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
			$('.comision_tarjeta').focusout(function(){
				calculoTotales();
				var row = $(this).parent(0).parent(0);				

				var pago = $(row).find('.pago_neto').html();
				var pago_resta = Number(pago) * ($(this).val() / 100);				

				pago = Math.round((pago - pago_resta) * 100) / 100;			

				$(row).find('.pago_neto').html(pago);

				calculoTotales();
			});

			$('.forma_pago_caja').change(function(){
				var row = $(this).parent(0).parent(0);	
				var pago = $(row).find('.pago_neto_caja').html();

				if($(this).val() == 'TARJETA DE CREDITO'){								

					var ret_tarjeta = Math.round((Number(pago) * .015) *100) / 100;

					$(row).find('.ret_tarjeta_caja').html(ret_tarjeta);
				}else{
					$(row).find('.ret_tarjeta_caja').html('0');
				}
			});

			$('.comision_tarjeta_caja').focusout(function(){
				
				var row = $(this).parent(0).parent(0);				

				var pago = $(row).find('.pago_neto_caja').html();
				var pago_resta = Number(pago) * ($(this).val() / 100);			

				pago = Math.round((pago - pago_resta) * 100) / 100;			

				$(row).find('.pago_neto_caja').html(pago);				
			});


			$('.valor_ret_ir_caja').focusout(function(){
				calculoPagoNeto_caja($(this));
			});
			$('.valor_ret_alma_caja').focusout(function(){
				calculoPagoNeto_caja($(this));
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

		function calculoTotales() {
			var pago_neto          = 0;
			var c_c           = 0;
			var subtotal      = 0;
			var descuento     = 0;
			var iva           = 0;		
			
			var ret_ir        = 0;
			var ret_alma      = 0;	

			$('.table_factura').find('.pago_neto:not(.anul)').each(function(){
				var este = $(this);				
				var row = este.parent(0);				
				var ret_actual = $(row).find('.ret_tarjeta').html();

				var ret_tarjeta = Math.round((Number(este.html()) * .015) *100) / 100;

				$(row).find('.ret_tarjeta').html(ret_tarjeta);
			});


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
			$('.iva:not(.anul)').each(function(){
				iva += Number($(this).html());
			});
			$('.valor_ret_ir:not(.anul)').each(function(){
				ret_ir += Number($(this).val());
			});
			$('.valor_ret_alma:not(.anul)').each(function(){
				ret_alma += Number($(this).val());
			});			

			$('#pago_neto strong').html(Math.round(pago_neto * 100) / 100);
			$('#c_c strong').html(Math.round(c_c * 100) / 100);
			$('#subtotal strong').html(Math.round(subtotal * 100) / 100);
			$('#descuento strong').html(Math.round(descuento * 100) / 100);
			$('#iva strong').html(Math.round(iva * 100) / 100);
			$('#ret_ir strong').html(Math.round(ret_ir * 100) / 100);
			$('#ret_ir strong').html(Math.round(ret_ir * 100) / 100);			

			clasificacion_ventas();
		}

		function clasificacion_ventas(){
			var re_total   = 0;
			var re_credito = 0;
			var re_contado = 0;

			$('.RE:not(.anul)').each(function(){
				re_total += Number($(this).html());			
			});
			$('.pago_neto.RE:not(.anul)').each(function(){
				re_contado += Number($(this).html());			
			});
			$('.c_c.RE:not(.anul)').each(function(){
				re_credito += Number($(this).html());
			});	

			$('#re_total').html(Math.round(re_total * 100) / 100);
			$('#re_credito').html(Math.round(re_credito * 100) / 100);
			$('#re_contado').html(Math.round(re_contado * 100) / 100);

			var ra_total   = 0;
			var ra_credito = 0;
			var ra_contado = 0;
			
			$('.RA:not(.anul)').each(function(){
				ra_total += Number($(this).html());			
			});
			$('.pago_neto.RA:not(.anul)').each(function(){
				ra_contado += Number($(this).html());			
			});
			$('.c_c.RA:not(.anul)').each(function(){
				ra_credito += Number($(this).html());
			});	

			$('#ra_total').html(Math.round(ra_total * 100) / 100);
			$('#ra_credito').html(Math.round(ra_credito * 100) / 100);
			$('#ra_contado').html(Math.round(ra_contado * 100) / 100);

			var en_total   = 0;
			var en_credito = 0;
			var en_contado = 0;
			
			$('.EN:not(.anul)').each(function(){
				en_total += Number($(this).html());			
			});
			$('.pago_neto.EN:not(.anul)').each(function(){
				en_contado += Number($(this).html());			
			});
			$('.c_c.EN:not(.anul)').each(function(){
				en_credito += Number($(this).html());
			});	

			$('#en_total').html(Math.round(en_total * 100) / 100);
			$('#en_credito').html(Math.round(en_credito * 100) / 100);
			$('#en_contado').html(Math.round(en_contado * 100) / 100);

			var eu_total   = 0;
			var eu_credito = 0;
			var eu_contado = 0;
			
			$('.EU:not(.anul)').each(function(){
				eu_total += Number($(this).html());			
			});
			$('.pago_neto.EU:not(.anul)').each(function(){
				eu_contado += Number($(this).html());			
			});
			$('.c_c.EU:not(.anul)').each(function(){
				eu_credito += Number($(this).html());
			});	

			$('#eu_total').html(Math.round(eu_total * 100) / 100);
			$('#eu_credito').html(Math.round(eu_credito * 100) / 100);
			$('#eu_contado').html(Math.round(eu_contado * 100) / 100);

			var ru_total   = 0;
			var ru_credito = 0;
			var ru_contado = 0;
			
			$('.RU:not(.anul)').each(function(){
				ru_total += Number($(this).html());			
			});
			$('.pago_neto.RU:not(.anul)').each(function(){
				ru_contado += Number($(this).html());			
			});
			$('.c_c.RU:not(.anul)').each(function(){
				ru_credito += Number($(this).html());
			});	

			$('#ru_total').html(Math.round(ru_total * 100) / 100);
			$('#ru_credito').html(Math.round(ru_credito * 100) / 100);
			$('#ru_contado').html(Math.round(ru_contado * 100) / 100);

			var fl_total   = 0;
			var fl_credito = 0;
			var fl_contado = 0;
			
			$('.FL:not(.anul)').each(function(){
				fl_total += Number($(this).html());			
			});
			$('.pago_neto.FL:not(.anul)').each(function(){
				fl_contado += Number($(this).html());			
			});
			$('.c_c.FL:not(.anul)').each(function(){
				fl_credito += Number($(this).html());
			});	

			$('#fl_total').html(Math.round(fl_total * 100) / 100);
			$('#fl_credito').html(Math.round(fl_credito * 100) / 100);
			$('#fl_contado').html(Math.round(fl_contado * 100) / 100);

			var co_total   = 0;
			var co_credito = 0;
			var co_contado = 0;
			
			$('.CO:not(.anul)').each(function(){
				co_total += Number($(this).html());			
			});
			$('.pago_neto.CO:not(.anul)').each(function(){
				co_contado += Number($(this).html());			
			});
			$('.c_c.CO:not(.anul)').each(function(){
				co_credito += Number($(this).html());
			});	

			$('#co_total').html(Math.round(co_total * 100) / 100);
			$('#co_credito').html(Math.round(co_credito * 100) / 100);
			$('#co_contado').html(Math.round(co_contado * 100) / 100);

			var st_total   = 0;
			var st_credito = 0;
			var st_contado = 0;
			
			$('.ST:not(.anul)').each(function(){
				st_total += Number($(this).html());			
			});
			$('.pago_neto.ST:not(.anul)').each(function(){
				st_contado += Number($(this).html());			
			});
			$('.c_c.ST:not(.anul)').each(function(){
				st_credito += Number($(this).html());
			});	

			$('#st_total').html(Math.round(st_total * 100) / 100);
			$('#st_credito').html(Math.round(st_credito * 100) / 100);
			$('#st_contado').html(Math.round(st_contado * 100) / 100);

			var pr_total   = 0;
			var pr_credito = 0;
			var pr_contado = 0;
			
			$('.PR:not(.anul)').each(function(){
				pr_total += Number($(this).html());			
			});
			$('.pago_neto.PR:not(.anul)').each(function(){
				pr_contado += Number($(this).html());			
			});
			$('.c_c.PR:not(.anul)').each(function(){
				pr_credito += Number($(this).html());
			});	

			$('#pr_total').html(Math.round(pr_total * 100) / 100);
			$('#pr_credito').html(Math.round(pr_credito * 100) / 100);
			$('#pr_contado').html(Math.round(pr_contado * 100) / 100);

			var cv_total   = 0;
			var cv_credito = 0;
			var cv_contado = 0;
			
			$('.CV:not(.anul)').each(function(){
				cv_total += Number($(this).html());			
			});
			$('.pago_neto.CV:not(.anul)').each(function(){
				cv_contado += Number($(this).html());			
			});
			$('.c_c.CV:not(.anul)').each(function(){
				cv_credito += Number($(this).html());
			});	

			$('#cv_total').html(Math.round(cv_total * 100) / 100);
			$('#cv_credito').html(Math.round(cv_credito * 100) / 100);
			$('#cv_contado').html(Math.round(cv_contado * 100) / 100);
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

		function calculoPagoNeto_caja(este){
			var row = $(este).parent(0).parent(0);
			console.log(row);

			var pago = $(row).find('.pago_neto_caja').html();
			var pago_resta = $(este).val();				

			pago = Math.round((pago - pago_resta) * 100) / 100;			

			$(row).find('.pago_neto_caja').html(pago);

		}

	</script>
@stop	