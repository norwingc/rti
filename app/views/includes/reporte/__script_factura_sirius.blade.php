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
		$('.iva_input').focusout(function(){				
			calculoPagoNeto($(this));
		});	

		$('#btn-mostrar_reporte').click(function(){
			mostrarReporte('Contado');
		});

		$('.no_cuenta_reporte').focusout(function(){				
			getNoCuenta($(this));
		});	
		$('.descripcion_cuenta').focusout(function(){				
			getDescricionCuenta($(this));
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
			var row = $(this).parent(0);
			var forma_pago = $(row).parent(0).find('.forma_pago').html();
			

			if(forma_pago == 'FACTURA INTERNA'){			
				$(row).parent(0).find('td').each(function(){
					$(this).css({'background-color':'rgba(256,100,100,.5)', 'color':'white', 'font-weight':'bold'});					
					$(this).addClass('anul');
				});
			}else{

				if($.inArray($(this).val(), clasificacion) != -1){
					no_clasificacion = true;
				}

				if(no_clasificacion == false){					
					$(row).css({'background-color':'rgba(256,100,100,.5)', 'color':'white', 'font-weight':'bold'});					

					$(row).parent(0).find('td').each(function(){
						$(this).addClass('anul');
					})
				}else{				
					$(row).removeAttr('style');

					$(row).parent(0).find('td').each(function(){
						$(this).removeClass('anul');
					});

					var pago = Number($(row).parent(0).find('.pago_neto').html());					
					var select_clasificacion = $(row).find('.select_clasificacion').val();	

					for(var i=0; i<=clasificacion.length; i++){
						$(row).parent(0).find('.subtotal').removeClass(clasificacion[i]);
						$(row).parent(0).find('.pago_neto').removeClass(clasificacion[i]);			
					}

					$(row).parent(0).find('.subtotal').addClass(select_clasificacion);			

					if(pago != 0){					
						if(select_clasificacion != ''){
							$(row).parent(0).find('.pago_neto').addClass(select_clasificacion);	
						}					
					}else{
						$(row).parent(0).find('.c_c').addClass(select_clasificacion);
					}
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

			if(descuento != 0){
				iva_total = Math.round(((subtotal_iva_descuento - descuento) * 0.15) *100) /100
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
		var descuento_contado      = 0;			
		var descuento_credito      = 0;			
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
		$('.descuento.CONTADO:not(.anul)').each(function(){
			descuento_contado += Number($(this).html());
		});
		$('.descuento.CREDITO:not(.anul)').each(function(){
			descuento_credito += Number($(this).html());
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
			ret_tarjeta_total += Number($(this).html());
		});	
		$('.comision_tarjeta_valor:not(.anul)').each(function(){
			comision_tarjeta_total += Number($(this).html());			
		});	
				

		$('#pago_neto strong').html(Math.round(pago_neto * 100) / 100);
		$('#c_c strong').html(Math.round(c_c * 100) / 100);
		$('#subtotal strong').html(Math.round(subtotal * 100) / 100);
		$('#descuento_contado strong').html(Math.round(descuento_contado * 100) / 100);
		$('#descuento_credito strong').html(Math.round(descuento_credito * 100) / 100);
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
		//calculoTotales();
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
		var comision_total = 0;

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

					if(comision != 0){
						comision_total = pago - comision;
						ret_tarjeta = Math.round((comision_total * 0.015) * 100) /100 ;

						$(row).find('.ret_tarjeta').html(ret_tarjeta);
					}					
				}					

				pago_neto = pago - ret_ir - ret_alma - ret_tarjeta - comision;

				pago_neto = Math.round((pago_neto) * 100) / 100;

				if(Number($(row).find('.c_c').html()) == 0){
					$(row).find('.pago_neto').html(pago_neto);	
				}else{
					$(row).find('.c_c').html(pago_neto);	
				}


				calculoTotales();
					
			});			
		}
	}	

	function mostrarReporte(tipo){
		if(tipo == 'Contado'){
			//$('#primer_reporte').hide();
			//
			$('.borrar').remove();

			$('#reporte_ingresar_factura').show();

			$('#reporte_ingreso_caja').html($('#pago_neto strong').html());
			$('#reporte_ingreso_retencion').html(Number($('#ret_ir strong').html()) + Number($('#ret_ir_tarjeta strong').html()));
			$('#reporte_ingreso_imi').html($('#ret_alma strong').html());
			$('#reporte_ingreso_comision_tarjeta').html($('#comision_tarjeta strong').html());			
			$('#reporte_ingreso_descuentos_contado').html($('#descuento_contado strong').html());			
			$('#reporte_ingreso_iva').html($('#iva strong').html());
			$('#reporte_ingreso_descuentos_credito').html($('#descuento_credito strong').html());

			$('#cta_RE').html($('#re_total').html());
			$('#cta_RA').html($('#ra_total').html());
			$('#cta_EN').html($('#en_total').html());
			$('#cta_EU').html($('#eu_total').html());
			$('#cta_RU').html($('#ru_total').html());
			$('#cta_FL').html($('#fl_total').html());
			$('#cta_CO').html($('#co_total').html());
			$('#cta_ST').html($('#st_total').html());
			$('#cta_PR').html($('#pr_total').html());
			$('#cta_CV').html($('#cv_total').html());

			var clientes = [];	
			var clientes_comparacion = [];
			var html = '';
			var html_total = '';
		
			$('.clientes.CREDITO:not(.anul)').each(function(){
				var row     = $(this).parent(0);
				var cliente = Number($(this).html());					
				var pago    = Number(row.find('.c_c').html());
						
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
				html += "<tr class='borrar'><td>"+clientes[i][2]+"</td><td class='debe'>"+Math.round((clientes[i][1]) *100)/100+"</td><td></td><td><input type='text' class='no_cuenta'></td><td><input type='text' class='descripcion_cuenta'></td></tr>";
			}


			$('#table_primer_reporte_contado').append(html);

			var debe = 0;
			var haber = 0;

			$('#table_primer_reporte_contado .debe').each(function(){
				debe += Number($(this).html());
			});
			$('#table_primer_reporte_contado .haber').each(function(){
				haber += Number($(this).html());
			});

			html_total = "<tr class='borrar'><th>Total</th><td><strong>"+Math.round((debe)*100)/100+"</strong></td><td><strong>"+Math.round((haber)*100)/100+"</strong></td></tr>";
			$('#table_primer_reporte_contado').append(html_total);
		}		
	}

	function getNoCuenta(input) {
		var row = $(input).parent(0).parent(0);
		console.log(row);
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
</script>