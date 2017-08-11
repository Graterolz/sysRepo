<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
	</div>
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
			'placeholder' => $usuario_rules[CEDULA]['label'],
			'required' => TRUE
		),
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'value' => $usuario_row->nombre,
			'placeholder' => $usuario_rules[NOMBRE]['label'],
			'required' => TRUE
		),
		APELLIDO => array(
			'class' => 'form-control',
			'name' => APELLIDO,
			'value' => $usuario_row->apellido,
			'placeholder' => $usuario_rules[APELLIDO]['label'],
			'required' => TRUE
		),
		GENERO => array(
			'class' => 'form-control',
			'name' => GENERO,
			'value' => $usuario_row->genero,
			'placeholder' => $usuario_rules[GENERO]['label'],
			'required' => TRUE
		),
		FECHA_NACIMIENTO => array(
			'class' => 'form-control',
			'name' => FECHA_NACIMIENTO,
			'value' => date(FORMATO_FECHA, strtotime($usuario_row->fecha_nacimiento)),
			'placeholder' => $usuario_rules[FECHA_NACIMIENTO]['label'],
			'required' => TRUE
		),
		NACIONALIDAD => array(
			'class' => 'form-control',
			'name' => NACIONALIDAD,
			'value' => $usuario_row->nacionalidad,
			'placeholder' => $usuario_rules[NACIONALIDAD]['label'],
			'required' => TRUE
		),
		DIRECCION => array(
			'class' => 'form-control',
			'name' => DIRECCION,
			'value' => $usuario_row->direccion,
			'placeholder' => $usuario_rules[DIRECCION]['label'],
			'required' => TRUE
		),
		TELEFONO => array(
			'class' => 'form-control',
			'name' => TELEFONO,
			'value' => $usuario_row->telefono,
			'placeholder' => $usuario_rules[TELEFONO]['label'],
			'required' => TRUE
		),
		EMAIL => array(
			'class' => 'form-control',
			'name' => EMAIL,
			'value' => $usuario_row->email,
			'placeholder' => $usuario_rules[EMAIL]['label'],
			'required' => TRUE
		),
		USER => array(
			'class' => 'form-control',
			'name' => USER,
			'value' => $usuario_row->user,
			'placeholder' => $usuario_rules[USER]['label'],
			'required' => TRUE
		)
	);
}
?>
			<?= form_open('',$form_attributes);?>
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
									<div class="col-lg-12">
										<div class="form-group">
											<div class="row">
												<div class="col-lg-4">
													<?= form_label($usuario_rules[CEDULA]['label'],$usuario_rules[CEDULA]['field']); ?>
													<?= form_input($usuario_form[CEDULA]) ?>
												</div>
												<div class="col-lg-3">
													<?= form_label($usuario_rules[NOMBRE]['label'],$usuario_rules[NOMBRE]['field']); ?>
													<?= form_input($usuario_form[NOMBRE]) ?>
												</div>
												<div class="col-lg-3">
													<?= form_label($usuario_rules[APELLIDO]['label'],$usuario_rules[APELLIDO]['field']); ?>
													<?= form_input($usuario_form[APELLIDO]) ?>
												</div>
												<div class="col-lg-2">
													<center>
														<button type="submit" class="btn btn-success "><i class="fa fa-gear fa-fw"></i><strong>EDITAR</strong></button>
													</center>
												</div>
											</div>
										</div>
									</div>
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
			<?= form_close(); ?>
			<!-- /.row (nested) -->
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->