<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?= base_url(PATH_RESOURCES3)?>/highcharts.js"></script>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
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
									<th><?= $codigo_rules[IDCOD]['label']; ?></th>
									<th><?= $codigo_rules[TITULO]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($codigo){
		foreach($codigo->result() as $codigo_row){
?>
								<tr>
									<td><?= $codigo_row->idcod; ?></td>
									<td><?= $codigo_row->titulo; ?></td>
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
									<th><?= $usuario_rules[IDUSU]['label']; ?></th>
									<th><?= $usuario_rules[USER]['label']; ?></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($usuario){
		foreach($usuario->result() as $usuario_row){
?>
								<tr>
									<td><?= $usuario_row->idusu; ?></td>
									<td><?= $usuario_row->user; ?></td>
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
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->