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
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_RESULTADOS_CODIGO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
<?php
if($codigo){
	foreach($codigo->result() as $codigo_row){
?>
						<div class="col-lg-12">
							<div class="well">
								<div class="row">
									<div class="col-lg-10">
										<h4><?= $codigo_row->titulo; ?></h4>
										<p><?= $codigo_row->descripcion; ?></p>										
									</div>
									<div class="col-lg-2">
										<p><a href="<?= base_url(PATH_MENU)."/".CODIGO_GET."/".$codigo_row->idcod; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></p>
									</div>
								</div>									
							</div>
						</div>
<?php
	}
}else{
?>
						<div class="col-lg-12">
							<div class="well">
								<h4><center>Sin resultados</center></h4>
								<p></p>
							</div>
						</div>
<?php
}
?>
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
								<i class="fa fa-user fa-fw"></i><strong> <?= TITULO_RESULTADOS_USUARIO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
<?php
if($usuario){
	foreach($usuario->result() as $usuario_row){
?>
						<div class="col-lg-4">
							<div class="well">
								<h4><?= $usuario_row->nombre.' '.$usuario_row->apellido; ?></h4>
								<p><?= $usuario_row->user; ?></p>
							</div>
						</div>
<?php
	}
}else{
?>
						<div class="col-lg-12">
							<div class="well">
								<h4><center>Sin resultados</center></h4>
								<p></p>
							</div>
						</div>
<?php
}
?>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->