@extends('templates.maintemplate')

@section('css')
	<style type="text/css">
		input[type=radio]{
			vertical-align: sub;
   			margin: 0 6px 0 6px;
		}
	</style>
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
			<h3 class="box-title"><small>Agregar Cuenta</small></h3>
		</div>				

		<div class="box-body">	
			{{ Form::open(array('url' => '', 'class' => 'interview-form form-horizontal')) }}

                <div class="form-group">
                    <div class="col-sm-4">
                        <label>No Cuenta</label>
                        <div>
                            <input type="text" class="form-control"> 
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <label>Descripcion</label>
                        <div>
                            <input type="text" class="form-control"> 
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <label>Cuenta Cons</label>
                        <div>
                            <input type="text" class="form-control"> 
                        </div>
                    </div>                   
                </div>
                <div class="form-group">
                	<div class="col-sm-5">
                		<label>Cuenta</label>
	                	<div>
		                	<input type="radio">Activos
		                	<input type="radio">Pasivos
		                	<input type="radio">Capital
		                	<input type="radio">Ingresos
		                	<input type="radio">Gastos
		                	<input type="radio">Cta Trans
		                </div>	
		            </div>
		            <div class="col-sm-4">
		            	<label>Tipo</label>
	                	<div>
		                	<input type="radio">Debe
		                	<input type="radio">haber		                	
		                </div>	
		            </div>
                </div>
                <div class="col-md-12 text-center" style="margin-top: 2em">
					<button class="btn btn-success">Guardar Cuenta</button>
				</div>	
            {{ Form::close() }}        
		</div>
	</div>
</section>
<!-- /.content -->

@stop