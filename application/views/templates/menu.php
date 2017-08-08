<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$idusu = $this->session->userdata(IDUSU_SESSION);
$idrol = $this->session->userdata(IDROL_SESSION);
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url(PATH_MENU)."/".USUARIO_CONTROLLER; ?>"><?= TITULO_MENU; ?></a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user fa-fw"></i> <strong><?= $idrol; ?></strong>
					</a>
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
<?php
	$codigo_form = array(
		CODIGO => array(
			'class' => 'form-control',
			'name' => CODIGO,
			'placeholder' => 'Buscar...',
			'required' => TRUE
		)
	);
?>						
							<?= form_open(CODIGO_SEARCH,array('role' => 'form','autocomplete' => 'off'));?>
							<div class="input-group custom-search-form">
								<?= form_input($codigo_form[CODIGO]); ?>
								<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
							</div>
							<?= form_close() ?>
						</li>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".USUARIO_CONTROLLER; ?>"><i class="fa fa-user fa-fw"></i> <?= MENU_USUARIO; ?></a>
						</li>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".EVENTO_CONTROLLER; ?>"><i class="fa fa-dashboard fa-fw"></i> <?= MENU_EVENTO; ?></a>
						</li>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".USUARIO_REPORTS; ?>"><i class="fa fa-list-alt fa-fw"></i> <?= MENU_REPORTE; ?></a>
						</li>
<?php
if($idrol == ADM){	
?>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".CODIGO_CONTROLLER; ?>"><i class="fa fa-inbox fa-fw"></i> <?= MENU_BUZON; ?></a>
						</li>
<?php	
}
?>
						<li>
							<a href="<?= base_url(PATH_MENU)."/".USUARIO_LOGOUT; ?>"><i class="fa fa-sign-out fa-fw"></i> <?= MENU_LOGOUT; ?></a>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>