@section('css')
    {{ HTML::style('plugins/morris/morris.css') }} 
	<!-- DataTables -->
    {{ HTML::style('plugins/datatables/dataTables.bootstrap.css') }}    
@stop

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Dashboard <small>Resume</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">		
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-4 col-xs-12">
			<!-- small box -->
			<a href="{{ URL::to('ReportesDiarios') }}">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>Ingresar Reporte</h3>
						<p>Diario</p>
					</div>
					<div class="icon">
						<i class="ion ion-clock"></i>
					</div>				
				</div>
			</a>
		</div>	
	</div>
	
</section>
<!-- /.content -->


@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- DataTables -->
{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
<script type="text/javascript">

$('#interview-resume').highcharts({
    title: {
        text: 'Interviews Year',
        x: -20 //center
    },       
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Total Interview'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },    
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    },
    series: [{
        name: 'Interview',
        data: [10, 12, 20, 20, 30, 50, 50, 60]       
    }]
});

$('#calllog-resume').highcharts({
    title: {
        text: 'Call Log Year',
        x: -20 //center
    },       
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Total Call Log'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },    
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    },
    series: [{
        name: 'Interview',
        data: [10, 12, 10, 12, 8, 20, 18, 28]       
    }]
});
$('#example1').DataTable();
$('#example2').DataTable();

	
</script>
@stop