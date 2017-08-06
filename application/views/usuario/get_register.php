<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?= TITULO_MENU; ?> - Registro</h3>                        
					</div>
					<div class="panel-body">
<?php
	$usuario_form = array(
		CEDULA => array(
			'class' => 'form-control',
			'name' => CEDULA,
			'placeholder' => $usuario_rules[CEDULA]['label'],
			'required' => TRUE
		),
		NOMBRE => array(
			'class' => 'form-control',
			'name' => NOMBRE,
			'placeholder' => $usuario_rules[NOMBRE]['label'],
			'required' => TRUE
		),
		APELLIDO => array(
			'class' => 'form-control',
			'name' => APELLIDO,
			'placeholder' => $usuario_rules[APELLIDO]['label'],
			'required' => TRUE
		),
		GENERO => array(
			'class' => 'form-control',
			'name' => GENERO,
			'placeholder' => $usuario_rules[GENERO]['label'],
			'required' => TRUE
		),
		FECHA_NACIMIENTO => array(
			'class' => 'form-control',
			'name' => FECHA_NACIMIENTO,
			'placeholder' => $usuario_rules[FECHA_NACIMIENTO]['label'],
			'required' => TRUE
		),
		NACIONALIDAD => array(
			'class' => 'form-control',
			'name' => NACIONALIDAD,
			'placeholder' => $usuario_rules[NACIONALIDAD]['label'],
			'required' => TRUE
		),
		DIRECCION => array(
			'class' => 'form-control',
			'name' => DIRECCION,
			'placeholder' => $usuario_rules[DIRECCION]['label'],
			'required' => TRUE
		),
		TELEFONO => array(
			'class' => 'form-control',
			'name' => TELEFONO,
			'placeholder' => $usuario_rules[TELEFONO]['label'],
			'required' => TRUE
		),
		EMAIL => array(
			'class' => 'form-control',
			'name' => EMAIL,
			'placeholder' => $usuario_rules[EMAIL]['label'],
			'required' => TRUE
		),
		USER => array(
			'class' => 'form-control',
			'name' => USER,
			'placeholder' => $usuario_rules[USER]['label'],
			'required' => TRUE
		),
		PASS => array(
			'class' => 'form-control',
			'name' => PASS,
			'placeholder' => $usuario_rules[PASS]['label'],
			'required' => TRUE
		),
		PASS2 => array(
			'class' => 'form-control',
			'name' => PASS2,
			'placeholder' => $usuario_rules[PASS2]['label'],
			'required' => TRUE
		)
	);
?>
						<?= form_open('',$form_attributes);?>
							<fieldset>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<?= form_label($usuario_rules[CEDULA]['label'],$usuario_rules[CEDULA]['field']); ?>
											<?= form_input($usuario_form[CEDULA]) ?>
										</div>
										<div class="col-lg-6">
											<?= form_label($usuario_rules[NOMBRE]['label'],$usuario_rules[NOMBRE]['field']); ?>
											<?= form_input($usuario_form[NOMBRE]) ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<?= form_label($usuario_rules[APELLIDO]['label'],$usuario_rules[APELLIDO]['field']); ?>
											<?= form_input($usuario_form[APELLIDO]) ?>
										</div>
										<div class="col-lg-6">
											<?= form_label($usuario_rules[GENERO]['label'],$usuario_rules[GENERO]['field']); ?>
											<?= form_dropdown(NULL,$generos,NULL,$usuario_form[GENERO]); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
									<?= form_label($usuario_rules[FECHA_NACIMIENTO]['label'],$usuario_rules[FECHA_NACIMIENTO]['field']); ?>
									<?= form_input($usuario_form[FECHA_NACIMIENTO]); ?>
										</div>
										<div class="col-lg-6">
									<?= form_label($usuario_rules[NACIONALIDAD]['label'],$usuario_rules[NACIONALIDAD]['field']); ?>
									<?= form_dropdown(NULL,$nacionalidad,NULL,$usuario_form[NACIONALIDAD]); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
									<?= form_label($usuario_rules[DIRECCION]['label'],$usuario_rules[DIRECCION]['field']); ?>
									<?= form_input($usuario_form[DIRECCION]) ?>
										</div>
										<div class="col-lg-6">
									<?= form_label($usuario_rules[TELEFONO]['label'],$usuario_rules[TELEFONO]['field']); ?>
									<?= form_input($usuario_form[TELEFONO]) ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
									<?= form_label($usuario_rules[EMAIL]['label'],$usuario_rules[EMAIL]['field']); ?>
									<?= form_input($usuario_form[EMAIL]) ?>
										</div>
										<div class="col-lg-6">
									<?= form_label($usuario_rules[USER]['label'],$usuario_rules[USER]['field']); ?>
									<?= form_input($usuario_form[USER]) ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
									<?= form_label($usuario_rules[PASS]['label'],$usuario_rules[PASS]['field']); ?>
									<?= form_password($usuario_form[PASS]) ?>
										</div>
										<div class="col-lg-6">
									<?= form_label($usuario_rules[PASS2]['label'],$usuario_rules[PASS2]['field']); ?>
									<?= form_password($usuario_form[PASS2]) ?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-lg btn-success btn-block">Registrar</button>
									<a href="<?= base_url(PATH_MENU)."/". USUARIO_LOGIN; ?>" class="btn btn-lg btn-primary btn-block">Atras</a>									
								</div>
								<div class="form-group">
									<strong><?= $message; ?></strong>
								</dir>
							</fieldset>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>