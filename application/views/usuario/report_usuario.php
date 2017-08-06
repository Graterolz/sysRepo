<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-6">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_REPORTE_USUARIO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $report_rules[USER]['label']; ?></th>
									<th><?= $report_rules[CANTIDAD]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($report_usuario){
		foreach($report_usuario->result() as $report_usuario_row){
?>
								<tr>
									<td><?= getTextoReport($report_usuario_row); ?></td>
									<td><?= $report_usuario_row->cantidad; ?></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="2"><center><h3>Sin informacion asociada</h3></center></td>
								</tr>
<?php
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>


		<div class="col-lg-6">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_REPORTE_VISTAS; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $report_rules[TITULO]['label']; ?></th>
									<th><?= $report_rules[VISTAS]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($report_vistas){
		foreach($report_vistas->result() as $report_vistas_row){
?>
								<tr>
									<td><?= $report_vistas_row->titulo; ?></td>
									<td><?= $report_vistas_row->vistas; ?></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="2"><center><h3>Sin informacion asociada</h3></center></td>
								</tr>
<?php
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>




		<div class="col-lg-12">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<!--<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= ''; ?></strong>
							</div>
						</div>
					</div>
				</div>-->
				<div class="panel-body">
					<div class="table-responsive">
						<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>





		<div class="col-lg-6">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_REPORTE_DESCARGAS; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $report_rules[TITULO]['label']; ?></th>
									<th><?= $report_rules[DESCARGAS]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($report_descargas){
		foreach($report_descargas->result() as $report_descargas_row){
?>
								<tr>
									<td><?= $report_descargas_row->titulo; ?></td>
									<td><?= $report_descargas_row->descargas; ?></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="2"><center><h3>Sin informacion asociada</h3></center></td>
								</tr>
<?php
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>



		<div class="col-lg-6">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_REPORTE_DESCARGAS; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><?= $report_rules[TITULO]['label']; ?></th>
									<th><?= $report_rules[EJECUCIONES]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($report_ejecuciones){
		foreach($report_ejecuciones->result() as $report_ejecuciones_row){
?>
								<tr>
									<td><?= $report_ejecuciones_row->titulo; ?></td>
									<td><?= $report_ejecuciones_row->ejecuciones; ?></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="2"><center><h3>Sin informacion asociada</h3></center></td>
								</tr>
<?php
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>

<?php
	$cadena1="'En edicion',".$estado_codigo_edicion->row()->cantidad;
	$cadena2="'Enviado',".$estado_codigo_enviado->row()->cantidad;
	$cadena3="'Aprobado',".$estado_codigo_aprobado->row()->cantidad;
?>
		<script type="text/javascript">
			Highcharts.chart('container', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Codigos fuentes por estado'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				credits: {
					enabled: false
				},					
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						}
					}
				},
				series: [{
					name: 'Brands',
					colorByPoint: true,
					data: [
						[<?= $cadena1; ?>],
						[<?= $cadena2; ?>],
						[<?= $cadena3; ?>]
					]
				}]
			});
		</script>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->