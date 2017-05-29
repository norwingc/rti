<script type="text/javascript">

	$(document).ready(function(){

		calculoTotales();
	
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
		$('#btn-mostrar_reporte').click(function(){
			mostrarReporte();
		});
	});	

	function calculoTotales(){
		var total_pago_caja           = 0;
		var tota_ret_ir_caja          = 0;
		var total_ret_alma_caja       = 0;
		var total_pago_neto_caja      = 0;
		var total_ret_ir_tarjeta_caja = 0;
		var total_comision_caja       = 0;

		$('.table_caja .pago_caja').each(function(){
			total_pago_caja += Number($(this).html());
		});
		$('.table_caja .valor_ret_ir_caja').each(function(){
			tota_ret_ir_caja += Number($(this).val());
		});
		$('.table_caja .valor_ret_alma_caja').each(function(){
			total_ret_alma_caja += Number($(this).val());
		});
		$('.table_caja .pago_neto_caja').each(function(){
			total_pago_neto_caja += Number($(this).html());
		});
		$('.table_caja .ret_tarjeta_caja').each(function(){
			total_ret_ir_tarjeta_caja += Number($(this).html());
		});
		$('.table_caja .comision_tarjeta_valor_caja').each(function(){
			total_comision_caja += Number($(this).html());
		});		

		$('#total_pago_caja strong').html(Math.round((total_pago_caja)*100)/100);
		$('#tota_ret_ir_caja strong').html(Math.round((tota_ret_ir_caja)*100)/100);
		$('#total_ret_alma_caja strong').html(Math.round((total_ret_alma_caja)*100)/100);
		$('#total_pago_neto_caja strong').html(Math.round((total_pago_neto_caja)*100)/100);
		$('#total_ret_ir_tarjeta_caja strong').html(Math.round((total_ret_ir_tarjeta_caja)*100)/100);
		$('#total_comision_caja strong').html(Math.round((total_comision_caja)*100)/100);
		console.log(total_comision_caja);
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
		var comision_total = 0;	

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

				if(comision != 0){
					comision_total = pago - comision;
					var retencion_tarjeta = Math.round(( comision_total * 0.015) * 100 )/100;

					ret_tarjeta = retencion_tarjeta;	

					$(row).find('.ret_tarjeta_caja').html(ret_tarjeta);	
				}

			}else{
				$(row).find('.ret_tarjeta_caja').html('0');	
			}

			pago_neto = pago - ret_ir - ret_alma - ret_tarjeta - comision;

			pago_neto = Math.round((pago_neto) * 100) / 100;


			$(row).find('.pago_neto_caja').html(pago_neto);	

			calculoTotales();
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

		$('#forma_pago_tarjeta_caja').html(Math.round( forma_pago_tarjeta * 100) / 100);
		$('#forma_pago_transferncia_caja').html(Math.round( forma_pago_transferncia * 100) / 100);
		$('#forma_pago_efectivo_caja').html(Math.round( forma_pago_efectivo * 100) / 100);
		$('#forma_pago_cheque_caja').html(Math.round( forma_pago_cheque * 100) / 100);		
	}

	function mostrarReporte(){
		$('#segundo_reporte').hide();
		$('#reporte_ingresar_caja1').show();

		$('#reporte_ingreso_caja_caja1').html($('#total_pago_neto_caja strong').html());
		$('#reporte_ingreso_retencion_caja1').html(Number($('#tota_ret_ir_caja strong').html()) + Number($('#total_ret_ir_tarjeta_caja strong').html()));
		$('#reporte_ingreso_imi_caja1').html($('#total_ret_alma_caja strong').html());
		$('#reporte_ingreso_comision_tarjeta_caja1').html($('#total_comision_caja strong').html());	


		var clientes = [];	
		var clientes_comparacion = [];
		var html = '';
		var html_total = '';	

		$('.table_caja .clientes').each(function(){
			var row     = $(this).parent(0);
			var cliente = Number($(this).html());					
			var pago    = Number(row.find('.pago_caja').html());

			if($.inArray(Number($(this).html()), clientes_comparacion) == -1){	//no esta en el array			
				var new_array = [cliente, pago, row.find('.cliente_nombre').html()];	
				clientes.push(new_array);
				clientes_comparacion.push(Number($(this).html()));									
			}else{
				for(var i=0; i < clientes.length; i++){
					if(Number($(this).html()) == clientes[i][0]){
						var valor = clientes[i][1];
						clientes[i][1] = Number(valor) + Number(pago);
					}
				}
			}
		});	

		for(var i=0; i < clientes.length; i++){
			html += "<tr><td>"+clientes[i][2]+"</td><td></td><td class='haber_caja1'>"+Math.round((clientes[i][1]) *100)/100+"</td></tr>";
		}

		$('#table_reporte_caja1').append(html);

		var debe = 0;
		var haber = 0;

		$('#table_reporte_caja1 .debe_caja1').each(function(){
			debe += Number($(this).html());
		});
		$('#table_reporte_caja1 .haber_caja1').each(function(){
			haber += Number($(this).html());
		});

		html_total = "<tr><th>Total</th><td><strong>"+Math.round((debe)*100)/100+"</strong></td><td><strong>"+Math.round((haber)*100)/100+"</strong></td></tr>";
		$('#table_reporte_caja1').append(html_total);
	
	}
</script>