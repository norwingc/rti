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

		$('.no_cuenta_reporte').focusout(function(){		
			//console.log('fasdfsdf');		
			getNoCuenta($(this));
		});	
		$('.descripcion_cuenta').focusout(function(){				
			getDescricionCuenta($(this));
		});

		$('#guadar_reporte_caja_nc').click(function(){
			$(this).button('loading')
			guadar_reporte_caja_nc();
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
		$('#btn-mostrar_reporte_nc').click(function(){
			mostrarReporte();
		});
	});	

	function calculoTotales(){
		var total_importe_caja   = 0;
		var tota_sub_total_caja  = 0;
		var total_iva_caja       = 0;
		var total_pago_neto_caja = 0;		

		$('.table_caja .pago_caja').each(function(){
			total_importe_caja += Number($(this).html());
		});
		$('.table_caja .subtotal_caja').each(function(){
			tota_sub_total_caja += Number($(this).html());
		});
		$('.table_caja .iva_caja').each(function(){
			total_iva_caja += Number($(this).html());
		});
		$('.table_caja .pago_neto_caja').each(function(){
			total_pago_neto_caja += Number($(this).html());
		});		

		$('#total_importe_caja strong').html(Math.round((total_importe_caja)*100)/100);
		$('#tota_sub_total_caja strong').html(Math.round((tota_sub_total_caja)*100)/100);
		$('#total_iva_caja strong').html(Math.round((total_iva_caja)*100)/100);
		$('#total_pago_neto_caja strong').html(Math.round((total_pago_neto_caja)*100)/100);
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
		//$('#segundo_reporte').hide();
		
		$('.borrar').remove();

		$('#reporte_ingresar_caja2').show();

		$('#reporte_iva_caja1').html($('#total_iva_caja strong').html());

		
		var RE = 0; 
		var RA = 0;
		var EN = 0;
		var EU = 0;
		var RU = 0;
		var FL = 0;
		var CO = 0;
		var ST = 0;
		var PR = 0;
		var CV = 0;	

		$('.table_caja .clasificaion_ventas').each(function (){
			if($(this).val() == 'RE'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				RE += subtotal;
			}
			if($(this).val() == 'RA'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				RA += subtotal;
			}
			if($(this).val() == 'EN'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				EN += subtotal;
			}
			if($(this).val() == 'EU'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				EU += subtotal;
			}
			if($(this).val() == 'RU'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				RU += subtotal;
			}
			if($(this).val() == 'FL'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				FL += subtotal;
			}
			if($(this).val() == 'CO'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				CO += subtotal;
			}
			if($(this).val() == 'ST'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				ST += subtotal;
			}
			if($(this).val() == 'PR'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				PR += subtotal;
			}
			if($(this).val() == 'CV'){
				var row = $(this).parent(0).parent(0);
				var subtotal = Number(row.find('.subtotal_caja').html());
				CV += subtotal;
			}
		});

		$('#cta_RE_caja2_con').html(RE);
		$('#cta_RA_caja2_con').html(RA);
		$('#cta_EN_caja2_con').html(EN);
		$('#cta_EU_caja2_con').html(EU);
		$('#cta_RU_caja2_con').html(RU);
		$('#cta_FL_caja2_con').html(FL);
		$('#cta_CO_caja2_con').html(CO);
		$('#cta_ST_caja2_con').html(ST);
		$('#cta_PR_caja2_con').html(PR);
		$('#cta_CV_caja2_con').html(CV);	

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
			html += "<tr class='borrar'><td>"+clientes[i][2]+"</td><td></td><td class='haber_caja2'>"+Math.round((clientes[i][1]) *100)/100+"</td><td><input type='text' class='no_cuenta_reporte' onfocusout='getNoCuenta($(this))'></td><td><textarea class='descripcion_cuenta' onfocusout='getDescricionCuenta($(this))'></textarea></td><td><textarea class='reporte_concepto_caja_nc'></textarea></td></tr>";
		}

		$('#table_reporte_caja2').append(html);

		var debe = 0;
		var haber = 0;

		$('#table_reporte_caja2 .debe_caja2').each(function(){
			debe += Number($(this).html());
		});
		$('#table_reporte_caja2 .haber_caja2').each(function(){
			haber += Number($(this).html());
		});

		html_total = "<tr class='borrar'><th>Total</th><td><strong id='total_debe_caja_nc'>"+Math.round((debe)*100)/100+"</strong></td><td><strong id='total_haber_caja_nc'>"+Math.round((haber)*100)/100+"</strong></td></tr>";
		$('#table_reporte_caja2').append(html_total);
	
	}


	function getNoCuenta(input) {		
		var row = $(input).parent(0).parent(0);		
		if(input.val() != ''){
			$.get('{{ URL() }}/getCuenta/'+input.val(), function(data){
				if(data.cuenta == 'Cuenta no encontrada'){
					alert(data.cuenta);
				}else{
					$(row).find('.descripcion_cuenta').val(data.cuenta.Descripcion);
				}
			});
		}	
	}
	
	function getDescricionCuenta(input) {
		var row = $(input).parent(0).parent(0);
		if(input.val() != ''){
			$.get('{{ URL() }}/getDescripcion/'+input.val(), function(data){
				if(data.cuenta == 'Descripcion no encontrada'){
					alert(data.cuenta);
				}else{
					$(row).find('.no_cuenta_reporte').val(data.cuenta.Cuenta);
				}
			});
		}
	}

	function guadar_reporte_caja_nc(argument) {
		var fecha         = $('#fecha_caja_nc').val();
		
		fecha             = fecha.split('-');
		var mes           = fecha[1];
		var anio          = fecha[0];
		var dia           = fecha[2];
		var fecha_sistema = dia + '/' + mes + '/' + anio;


		var comprobante = {
			'tipo' : $('#clasificacion_caja_nc').val(),
			'mes' : mes,
			'anio' : anio,
			'fecha' : fecha_sistema,
			'concepto' : $('#concepto_caja_nc').val(),
			'tipo_documento' : $('#documento_caja_nc').val(),
			'debe' : $('#total_debe_caja_nc').html(),
			'haber' : $('#total_haber_caja_nc').html(),			
		}


		var send = 'comprobante_tipo=' + comprobante.tipo + '&comprobante_mes=' + comprobante.mes + 
					'&comprobante_anio=' + comprobante.anio + '&comprobante_fecha=' + comprobante.fecha + 
					'&comprobante_concepto=' + comprobante.concepto + '&comprobante_tipo_documento=' + comprobante.tipo_documento + 
					'&comprobante_debe=' + comprobante.debe + '&comprobante_haber=' + comprobante.haber;

		$.post('{{ URL() }}/Save/Reporte/Factura', send ,function(data){
			alert('Comprobante Guardado');
			var contador = 1;	

			$('#table_reporte_caja2 tr').each(function(){
				console.log($(this));
				if($(this).find('.no_cuenta_reporte').val() != undefined){

					var movimiento = 0;	
					var monto = 0;					

					if($(this).find('.debe_caja2').html() != undefined){
						movimiento = 1;
						monto = $(this).find('.debe_caja2').html();
					}else{
						movimiento = 2;
						monto = $(this).find('.haber_caja2').html();
					}

					if(monto != undefined){
						var detalle_comprobante = {
							'tipo' : $('#clasificacion_caja_nc').val(),
							'comprobante' : data.comprobante.Comprobante,
							'mes' : mes,
							'anio' : anio,
							'cuenta' : $(this).find('.no_cuenta_reporte').val(),	
							'numero' : contador,
							'movimiento' : movimiento,
							'monto' : monto,
							'montousa' : Math.round((monto / data.cambio) * 100)/100,
							'concepto' : $(this).find('.reporte_concepto_caja_nc').val()	
						}
						contador++;

						var send2 = 'detalle_tipo=' + detalle_comprobante.tipo + '&detalle_comprobante=' + detalle_comprobante.comprobante +
									'&detalle_mes=' +  detalle_comprobante.mes + '&detalle_anio=' + detalle_comprobante.anio + 
									'&detalle_cuenta=' + detalle_comprobante.cuenta + '&detalle_numero=' + detalle_comprobante.numero + 
									'&detalle_movimiento=' + detalle_comprobante.movimiento + '&detalle_monto=' + detalle_comprobante.monto + 
									'&detalle_montousa=' + detalle_comprobante.montousa + '&detalle_concepto=' + detalle_comprobante.concepto;

						$.post('{{ URL() }}/Save/Reporte/DetalleFactura', send2 ,function(data2){
							//console.log(data2);
							console.log('detalle guardado')
						});
					}
				}
			});	
			$('#guadar_reporte_caja_nc').button('reset');
		});
	}
</script>