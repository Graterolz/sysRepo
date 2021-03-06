<?php
// URLs
define ('PATH_MENU' , 'index.php');
define ('PATH_RESOURCES' , 'resources/startbootstrap-sb-admin-2');
define ('PATH_RESOURCES2' , 'resources/imgs');
define ('PATH_RESOURCES3' , 'resources');

// Helpers
define ('SYS_HELPER','sys_helper');

// Variables de SESSION
define ('IDUSU_SESSION','idusu_sysrepo');
define ('IDROL_SESSION','idrol_sysrepo');

// Modelos
define ('SYS_MODEL','Sys_model');
define ('USUARIO_MODEL','Usuario_model');
define ('CODIGO_MODEL','Codigo_model');
define ('EVENTO_MODEL','Evento_model');

// Controlador USUARIO
define ('USUARIO_CONTROLLER','usuario');
define ('USUARIO_GET','usuario/get');
define ('USUARIO_EDIT','usuario/edit');
define ('USUARIO_PROFILE','usuario/profile');
define ('USUARIO_LOGIN','usuario/login');
define ('USUARIO_REGISTER','usuario/register');
define ('USUARIO_REPORTS','usuario/reports');
define ('USUARIO_LOGOUT','usuario/logout');

// Controlador CODIGO
define ('CODIGO_CONTROLLER','codigo');
define ('CODIGO_GET','codigo/get');
define ('CODIGO_ADD','codigo/add');
define ('CODIGO_EDIT','codigo/edit');
define ('CODIGO_DEL','codigo/del');
define ('CODIGO_SEND','codigo/send');
define ('CODIGO_APROB','codigo/aprob');
define ('CODIGO_NOAPROB','codigo/noaprob');
define ('CODIGO_DOWNLOAD','codigo/download');
define ('CODIGO_EXECUTE','codigo/execute');
define ('CODIGO_SEARCH','codigo/search');

// Controlador EVENTO
define ('EVENTO_CONTROLLER','evento');
define ('EVENTO_GET','evento/get');
define ('EVENTO_ADD','evento/add');
define ('EVENTO_EDIT','evento/edit');
define ('EVENTO_DEL','evento/del');

// Vistas USUARIO
define ('GET_LOGIN','usuario/get_login');
define ('GET_REGISTER','usuario/get_register');
define ('GET_USUARIO','usuario/get_usuario');
define ('EDIT_USUARIO','usuario/edit_usuario');
define ('REPORT_USUARIO','others/report_usuario');

// Vistas CODIGO
define ('GET_CODIGO','codigo/get_codigo');
define ('ADD_CODIGO','codigo/add_codigo');
define ('EDIT_CODIGO','codigo/edit_codigo');
// define ('DEL_CODIGO','codigo/del_codigo');
define ('EXE_CODIGO','codigo/exe_codigo');
define ('SEARCH_CODIGO','others/search_codigo');
define ('LIST_CODIGO_ADM','codigo/list_codigo_adm');

// Vistas EVENTO
define ('GET_EVENTO','evento/get_evento');

// Tablas
define ('TABLA_USUARIO','usuario');
define ('TABLA_CODIGO','codigo');
define ('TABLA_EVENTO','evento');

// Campos tablas
define ('IDUSU','idusu');
define ('IDROL','idrol');
define ('CEDULA','cedula');
define ('NOMBRE','nombre');
define ('APELLIDO','apellido');
define ('GENERO','genero');
define ('FECHA_NACIMIENTO','fecha_nacimiento');
define ('NACIONALIDAD','nacionalidad');
define ('DIRECCION','direccion');
define ('TELEFONO','telefono');
define ('EMAIL','email');
define ('USER','user');
define ('PASS','pass');
define ('PASS2','pass2');
define ('FECHA_REGISTRO','fecha_registro');
define ('FECHA_EDICION','fecha_edicion');
define ('ESTADO_REGISTRO','estado_registro');
define ('IDCOD','idcod');
define ('IDCODORI','idcodori');
define ('TITULO','titulo');
define ('DESCRIPCION','descripcion');
define ('LENGUAJE','lenguaje');
define ('CODIGO','codigo');
define ('VISTAS','vistas');
define ('DESCARGAS','descargas');
define ('EJECUCIONES','ejecuciones');
define ('ESTADO_CODIGO','estado_codigo');
define ('IDEVE','ideve');
define ('ACCION','accion');

// Estado de Registros
define ('ESTADO_REGISTRO_ELIMINADO','0');
define ('ESTADO_REGISTRO_ACTIVO','1');

// Estado de Codigos
define ('ESTADO_CODIGO_EDICION','0');
define ('ESTADO_CODIGO_ENVIADO','1');
define ('ESTADO_CODIGO_APROBADO','2');

// Accion de Codigos
define ('ACCION_CODIGO_NUEVO','NUEVO');
define ('ACCION_CODIGO_MEJORA','MEJORA');

// Roles de Usuario
define ('USR','USR');
define ('ADM','ADM');

// Formato fecha
define ('FORMATO_FECHA','d/m/Y');
define ('FORMATO_HORA','H:m:s');
define ('FORMATO_FECHA_SAVE','Y-m-d H:i:s');

// Vistas MENU
define ('HEADER','templates/header');
define ('MENU','templates/menu');
define ('FOOTER','templates/footer');
define ('TITULO_MENU','SYSRepo');
define ('MENU_USUARIO','Usuario');
define ('MENU_EVENTO','Evento');
define ('MENU_REPORTE','Reportes');
define ('MENU_BUZON','Buzon');
define ('MENU_LOGOUT','Logout');

// Titulos Paneles
define ('TITULO_USUARIO','Informacion de Usuario');
define ('TITULO_CODIGO','Informacion de Codigos');
define ('TITULO_EVENTO','Eventos del Repositorio');
define ('TITULO_BUZON','Buzon del Repositorio');

// Titulos Reportes
define ('TITULO_REPORTE_USUARIO','Usuarios mas destacados');
define ('TITULO_REPORTE_VISTAS','Codigos fuentes mas vistos');
define ('TITULO_REPORTE_DESCARGAS','Codigos fuentes mas descargados');
define ('TITULO_REPORTE_EJECUCIONES','Codigos fuentes mas ejecutados');

// Titulos Busqueda
define ('TITULO_RESULTADOS_USUARIO','Resultados de Usuario/s');
define ('TITULO_RESULTADOS_CODIGO','Resultados de Codigo/s');

// Otros
define ('CANTIDAD','cantidad');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
	define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * https://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * NO TRAILING SLASH!
 */
	$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 */
	// The directory name, relative to the "controllers" directory.  Leave blank
	// if your controller is not in a sub-directory within the "controllers" one
	// $routing['directory'] = '';

	// The controller class file name.  Example:  mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($_temp = realpath($system_path)) !== FALSE)
	{
		$system_path = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		// Ensure there's a trailing slash
		$system_path = strtr(
			rtrim($system_path, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;
	}

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system directory
	define('BASEPATH', $system_path);

	// Path to the front controller (this file) directory
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	// Name of the "system" directory
	define('SYSDIR', basename(BASEPATH));

	// The path to the "application" directory
	if (is_dir($application_folder))
	{
		if (($_temp = realpath($application_folder)) !== FALSE)
		{
			$application_folder = $_temp;
		}
		else
		{
			$application_folder = strtr(
				rtrim($application_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		$application_folder = BASEPATH.strtr(
			trim($application_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

	// The path to the "views" directory
	if ( ! isset($view_folder[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.'views';
	}
	elseif (is_dir($view_folder))
	{
		if (($_temp = realpath($view_folder)) !== FALSE)
		{
			$view_folder = $_temp;
		}
		else
		{
			$view_folder = strtr(
				rtrim($view_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.strtr(
			trim($view_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
require_once BASEPATH.'core/CodeIgniter.php';
