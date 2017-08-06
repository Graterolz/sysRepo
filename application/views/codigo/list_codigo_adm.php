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
		<div class="col-lg-12">
			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-inbox fa-fw"></i> <strong><?= TITULO_BUZON; ?></strong>
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
									<th><?= $usuario_rules[USER]['label']; ?></th>
									<th><?= $codigo_rules[TITULO]['label']; ?></th>
									<th><?= $codigo_rules[FECHA_REGISTRO]['label']; ?></th>
									<th colspan="5"></th>
								</tr>
							</thead>
							<tbody>
<?php
	if($codigo){
		foreach($codigo->result() as $codigo_row){
?>
								<tr>
									<td><?= $codigo_row->idcod; ?></td>
									<td><?= $codigo_row->user; ?></td>
									<td><?= $codigo_row->titulo; ?></td>
									<td><?= date("d/m/Y H:m:s", strtotime($codigo_row->fecha_registro)); ?></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_APROB."/".$codigo_row->idcod; ?>" class="btn btn-success btn-xs"><i class="fa fa-check fa-fw"></i> <strong>APROBAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_NOAPROB."/".$codigo_row->idcod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-times fa-fw"></i> <strong>NO APROBAR</strong></a></td>
									<td></td>
									<td></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_GET."/".$codigo_row->idcod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></td>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="7"><center><h3>Sin codigos asociados.</h3></center></td>
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
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->   
</div>
<!-- /#page-wrapper -->