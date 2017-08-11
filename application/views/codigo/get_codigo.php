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
if ($codigo){
	$codigo_row = $codigo->row();

	$codigo_form = array(
		TITULO => array(
			'class' => 'form-control',
			'name' => TITULO,
			'value' => $codigo_row->titulo,
			'readonly' => TRUE
		),
		DESCRIPCION => array(
			'class' => 'form-control',
			'name' => DESCRIPCION,
			'value' => $codigo_row->descripcion,
			'readonly' => TRUE
		),
		LENGUAJE => array(
			'class' => 'form-control',
			'name' => LENGUAJE,
			'value' => $codigo_row->lenguaje,
			'disabled' => TRUE			
		),
		CODIGO => array(
			'class' => 'form-control',
			'name' => CODIGO,
			'value' => $codigo_row->codigo,
			'style' => 'height: 0px;width: 0px;resize: none;display:none;',
			'readonly' => TRUE
		),
		VISTAS => array(
			'class' => 'form-control',
			'name' => VISTAS,
			'value' => $codigo_row->vistas,
			'readonly' => TRUE
		),
		DESCARGAS => array(
			'class' => 'form-control',
			'name' => DESCARGAS,
			'value' => $codigo_row->descargas,
			'readonly' => TRUE
		),
		EJECUCIONES => array(
			'class' => 'form-control',
			'name' => EJECUCIONES,
			'value' => $codigo_row->ejecuciones,
			'readonly' => TRUE
		),
		FECHA_REGISTRO => array(
			'class' => 'form-control',
			'name' => FECHA_REGISTRO,
			'value' => date(FORMATO_FECHA, strtotime($codigo_row->fecha_registro)),
			'readonly' => TRUE
		),
		FECHA_EDICION => array(
			'class' => 'form-control',
			'name' => FECHA_EDICION,
			'value' => date(FORMATO_FECHA, strtotime($codigo_row->fecha_edicion)),
			'readonly' => TRUE
		)	
	);
}
if ($usuario){
	$usuario_row = $usuario->row();

	$usuario_form = array(
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
			'readonly' => TRUE
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
								<i class="fa fa-code fa-fw"></i> <strong><?= TITULO_CODIGO; ?></strong>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-9">
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<h4>
											<?= $codigo_form[TITULO]['value'];?>
											<small>
												<?= ' / Ultima edicion ('.
													$codigo_form[FECHA_EDICION]['value'].
													')';
												?>
											</small>
											<br>
										</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[DESCRIPCION]['label'],$codigo_rules[DESCRIPCION]['field']); ?>
											<?= form_input($codigo_form[DESCRIPCION]); ?>
										</div> 
										<div class="form-group">
											<?= form_label($codigo_rules[VISTAS]['label'],$codigo_rules[VISTAS]['field']); ?>
											<?= form_input($codigo_form[VISTAS]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[LENGUAJE]['label'],$codigo_rules[LENGUAJE]['field']); ?>
											<!--<?= form_input($codigo_form[LENGUAJE]); ?>-->
											<?= form_dropdown(NULL,$lenguaje,$codigo_form[LENGUAJE]['value'],$codigo_form[LENGUAJE]); ?>
										</div>
										<div class="form-group">
											<?= form_label($codigo_rules[DESCARGAS]['label'],$codigo_rules[DESCARGAS]['field']); ?>
											<?= form_input($codigo_form[DESCARGAS]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[FECHA_REGISTRO]['label'],$codigo_rules[FECHA_REGISTRO]['field']); ?>
											<?= form_input($codigo_form[FECHA_REGISTRO]); ?>										
										</div>
										<div class="form-group">
											<?= form_label($codigo_rules[EJECUCIONES]['label'],$codigo_rules[EJECUCIONES]['field']); ?>
											<?= form_input($codigo_form[EJECUCIONES]); ?>											
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<h4>
											<?= $usuario_form[NOMBRE]['value'].' '.$usuario_form[APELLIDO]['value'];?>
										</h4>
										<div class="form-group">
											<?= form_label($usuario_rules[USER]['label'],$usuario_rules[USER]['field']); ?>
											<?= form_input($usuario_form[USER]); ?>
										</div>
										<div class="form-group">
											<?= form_label($usuario_rules[EMAIL]['label'],$usuario_rules[EMAIL]['field']); ?>
											<?= form_input($usuario_form[EMAIL]); ?>
										</div>
									</div>
								</div>
							</div>
						</div>						
						<div class="col-lg-12">
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?= form_label($codigo_rules[CODIGO]['label'],$codigo_rules[CODIGO]['field']); ?>
											<?= form_textarea($codigo_form[CODIGO]); ?>
											<div id="editor" style="height: 500px;"></div>
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
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->   
</div>
<!-- /#page-wrapper -->

<!-- #C9 --><!-- jQuery -->
<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(PATH_RESOURCES3)?>/ace.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js"></script>
<script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/github");
	editor.getSession().setMode("ace/mode/javascript");
	editor.getSession().setMode("ace/mode/html");
	editor.resize();
	
	var textarea = $('textarea[name="codigo"]').hide();
	editor.getSession().setValue(textarea.val());
	editor.textInput.getElement().disabled = true;
</script>