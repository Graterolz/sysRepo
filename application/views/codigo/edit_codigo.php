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
			'placeholder' => $codigo_rules[TITULO]['label'],
			'value' => $codigo_row->titulo,
			'required' => TRUE
		),
		DESCRIPCION => array(
			'class' => 'form-control',
			'name' => DESCRIPCION,
			'placeholder' => $codigo_rules[DESCRIPCION]['label'],
			'value' => $codigo_row->descripcion,
			'required' => TRUE
		),
		LENGUAJE => array(
			'class' => 'form-control',
			'name' => LENGUAJE,
			'value' => $codigo_row->lenguaje,
			'required' => TRUE
		),
		CODIGO => array(
			'class' => 'form-control',
			'name' => CODIGO,
			'placeholder' => $codigo_rules[CODIGO]['label'],
			'value' => $codigo_row->codigo,
			'style' => 'height: 0px;width: 0px;resize: none;display:none;',
			'required' => TRUE
		)
	);
}	
?>
			<?= form_open('',$form_attributes);?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10">
							<div class="btn btn-default">
								<i class="fa fa-code fa-fw"></i><strong> <?= TITULO_CODIGO; ?></strong>
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-default"><i class="fa fa-code fa-fw"></i><strong>EDITAR</strong></button>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<br>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[TITULO]['label'],$codigo_rules[TITULO]['field']); ?>
											<?= form_input($codigo_form[TITULO]); ?>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[DESCRIPCION]['label'],$codigo_rules[DESCRIPCION]['field']); ?>
											<?= form_input($codigo_form[DESCRIPCION]); ?>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<?= form_label($codigo_rules[LENGUAJE]['label'],$codigo_rules[LENGUAJE]['field']); ?>
											<?= form_dropdown(NULL,$lenguaje,$codigo_form[LENGUAJE]['value'],$codigo_form[LENGUAJE]); ?>
										</div>
									</div>
									<!-- /.col-lg-4 (nested) -->
								</div>
							</div>
							<!-- -->
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
			<?= form_close(); ?>
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
<!--<script src="https://ajaxorg.github.io/ace-builds/src/ace.js"></script>-->
<script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/github");
	editor.getSession().setMode("ace/mode/javascript");
	editor.getSession().setMode("ace/mode/html");
	editor.resize();
	
	var textarea = $('textarea[name="codigo"]').hide();
	editor.getSession().setValue(textarea.val());
	editor.getSession().on('change',function() {
		textarea.val(editor.getSession().getValue());
	});
</script>