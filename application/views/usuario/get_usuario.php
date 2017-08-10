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
<?php
if ($usuario){
	$usuario_row = $usuario->row();

	$usuario_form = array(
		CEDULA => array(
			'class' => 'form-control',
			'name' => CEDULA,
			'value' => $usuario_row->cedula,
			'readonly' => TRUE
		),
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'value' => $usuario_row->nombre,
			'readonly' => TRUE
		),
		APELLIDO => array(
			'class' => 'form-control',
			'name' => APELLIDO,
			'value' => $usuario_row->apellido,
			'readonly' => TRUE
		),
		GENERO => array(
			'class' => 'form-control',
			'name' => GENERO,
			'value' => $usuario_row->genero,
			'disabled' => TRUE
		),
		FECHA_NACIMIENTO => array(
			'class' => 'form-control',
			'name' => FECHA_NACIMIENTO,
			'value' => date("d/m/Y", strtotime($usuario_row->fecha_nacimiento)),
			'readonly' => TRUE
		),
		NACIONALIDAD => array(
			'class' => 'form-control',
			'name' => NACIONALIDAD,
			'value' => $usuario_row->nacionalidad,
			'disabled' => TRUE
		),
		DIRECCION => array(
			'class' => 'form-control',
			'name' => DIRECCION,
			'value' => $usuario_row->direccion,
			'readonly' => TRUE
		),
		TELEFONO => array(
			'class' => 'form-control',
			'name' => TELEFONO,
			'value' => $usuario_row->telefono,
			'readonly' => TRUE
		),
		EMAIL => array(
			'class' => 'form-control',
			'name' => EMAIL,
			'value' => $usuario_row->email,
			'readonly' => TRUE
		),
		USER => array(
			'class' => 'form-control',
			'name' => USER,
			'value' => $usuario_row->user,
			// 'readonly' => TRUE
		)
	);
}
?>
			<!-- USUARIO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-12">
							<div class="btn btn-default">
								<i class="fa fa-user fa-fw"></i><strong> <?= TITULO_USUARIO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="well">
								<div class="row">
									<div class="col-lg-10">
										<h4>
											<?= $usuario_form[CEDULA]['value'];?>
											<small>
												<?= ' / '.
													$usuario_form[NOMBRE]['value'].
													' '.
													$usuario_form[APELLIDO]['value']; 
												?>
											</small>
											<?= '('.$usuario_form[USER]['value'].')';?>
											<br>
										</h4>
									</div>
									<div class="col-lg-2"> 
										<center>
											<a href="<?= base_url(PATH_MENU)."/".USUARIO_EDIT."/".$usuario_row->idusu; ?>" class="btn btn-success"><i class="fa fa-gear fa-fw"></i><strong>EDITAR</strong></a>
										</center>
									</div>									
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_rules[GENERO]['label'],$usuario_rules[GENERO]['field']); ?>
											<?= form_dropdown(NULL,$generos,$usuario_form[GENERO]['value'],$usuario_form[GENERO]); ?>
										</div> 
										<div class="form-group">
											<?= form_label($usuario_rules[DIRECCION]['label'],$usuario_rules[DIRECCION]['field']); ?>
											<?= form_input($usuario_form[DIRECCION]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_rules[FECHA_NACIMIENTO]['label'],$usuario_rules[FECHA_NACIMIENTO]['field']); ?>
											<?= form_input($usuario_form[FECHA_NACIMIENTO]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rules[TELEFONO]['label'],$usuario_rules[TELEFONO]['field']); ?>
											<?= form_input($usuario_form[TELEFONO]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($usuario_rules[NACIONALIDAD]['label'],$usuario_rules[NACIONALIDAD]['field']); ?>
											<?= form_dropdown(NULL,$nacionalidad,$usuario_form[NACIONALIDAD]['value'],$usuario_form[NACIONALIDAD]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rules[EMAIL]['label'],$usuario_rules[EMAIL]['field']); ?>
											<?= form_input($usuario_form[EMAIL]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
								</div>
							</div>
						</div>
						<!-- /.col-lg-12 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
			</div>
			<!-- /.panel -->

			<!-- CODIGO -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_CODIGO; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<a href="<?= base_url(PATH_MENU)."/".CODIGO_ADD; ?>" class="btn btn-default"><i class="fa fa-code fa-fw"></i> <strong>NUEVO</strong></a>
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
									<th><?= $codigo_rules[FECHA_REGISTRO]['label']; ?></th>
									<th colspan="4"></th>
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
									<td><?= date("d/m/Y H:m:s", strtotime($codigo_row->fecha_registro)); ?></td>
<?php
if(!$readonly){
	if($codigo_row->estado_codigo == ESTADO_CODIGO_EDICION){
?>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_SEND."/".$codigo_row->idcod; ?>" class="btn btn-default btn-sm"><i class="fa fa-send fa-fw"></i> <strong>ENVIAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_EDIT."/".$codigo_row->idcod; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit fa-fw"></i> <strong>EDITAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_DEL."/".$codigo_row->idcod; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i> <strong>ELIMINAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_EXECUTE."/".$codigo_row->idcod; ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-flash fa-fw"></i> <strong>EJECUTAR</strong></a></td>
<?php
	}else if ($codigo_row->estado_codigo == ESTADO_CODIGO_ENVIADO){
?>
									<td><a href="#" class="btn btn-default btn-sm disabled"><i class="fa fa-send fa-fw"></i> <strong>ENVIADO</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_GET."/".$codigo_row->idcod; ?>" class="btn btn-primary btn-sm"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_DOWNLOAD."/".$codigo_row->idcod; ?>" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i> <strong>DESCARGAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_EXECUTE."/".$codigo_row->idcod; ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-flash fa-fw"></i> <strong>EJECUTAR</strong></a></td>
									
<?php
	}else{
?>
									<td><a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-check fa-fw"></i> <strong>APROBADO</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_GET."/".$codigo_row->idcod; ?>" class="btn btn-primary btn-sm"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_DOWNLOAD."/".$codigo_row->idcod; ?>" class="btn btn-success btn-sm"><i class="fa fa-download fa-fw"></i> <strong>DESCARGAR</strong></a></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_EXECUTE."/".$codigo_row->idcod; ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-flash fa-fw"></i> <strong>EJECUTAR</strong></a></td>
<?php
	}
}else{
?>
									<td></td>
									<td></td>
									<td></td>
									<td><a href="<?= base_url(PATH_MENU)."/".CODIGO_GET."/".$codigo_row->idcod; ?>" class="btn btn-primary btn-sm"><i class="fa fa-search fa-fw"></i> <strong>VER</strong></a></td>
<?php	
}	
?>
								</tr>
<?php
		}
	}else{
?>
								<tr>
									<td colspan="8"><center><h3>Sin codigos asociados</h3></center></td>
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