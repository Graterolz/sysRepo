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
								<i class="fa fa-dashboard fa-fw"></i> <strong><?= TITULO_EVENTO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td><i class="fa fa-code fa-fw"></i></td>
									<th><?= $evento_rules[IDEVE]['label']; ?></th>
									<th><?= $evento_rules[DESCRIPCION]['label']; ?></th>
									<!--<th></th>-->
								</tr>
							</thead>
							<tbody>
<?php
	if($evento){
		foreach($evento->result() as $evento_row){
?>
								<tr>
									<td><?= getIconoDescripcion($evento_row->accion); ?></td>
									<td><?= $evento_row->ideve; ?></td>
									<td><?= getTextoDescripcion($evento_row); ?></td>
									<!--<td><a href="<?= base_url(PATH_MENU)."/".EVENTO_GET."/".$evento_row->ideve; ?>" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></td>-->
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="7"><center><h3>Sin eventos asociados</h3></center></td>
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