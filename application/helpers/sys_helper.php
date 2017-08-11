<?php
	//
	function getIconoDescripcion($accion){
		$icon = '<i class="fa fa-check fa-fw"></i>';
		return $icon;
	}

	//
	function getTextoDescripcion($data) {
		//var_dump($data);
		if($data->accion == ACCION_CODIGO_NUEVO){
			$message =
				'El usuario 
				<a href="'.base_url(PATH_MENU).'/'.USUARIO_GET.'/'.$data->idusu.'">
				<strong>'.strtoupper($data->user).'</strong></a> ('.$data->nombre.' '.$data->apellido.')
				ha insertado el codigo
				<a href="'.base_url(PATH_MENU).'/'.CODIGO_GET.'/'.$data->idcod.'">
				<strong>'.$data->titulo.'</strong></a> el dia '.
				date(FORMATO_FECHA, strtotime($data->fecha_registro)).' a las '.
				date(FORMATO_HORA, strtotime($data->fecha_registro)).' horas.';
		}elseif($data->accion == ACCION_CODIGO_MEJORA){
			$message = var_dump($data);
		}
		else{
			$message = var_dump($data);
		}
		return $message;
	}

	//
	function getTextoUsuarioReport($data){
		$message =
		'<a href="'.base_url(PATH_MENU).'/'.USUARIO_GET.'/'.$data->idusu.'">
		<strong>'.strtoupper($data->user).'</strong></a>';
		
		return $message;
	}

	//
	function getTextoCodigoReport($data){
		$message =
		'<a href="'.base_url(PATH_MENU).'/'.CODIGO_GET.'/'.$data->idcod.'">
		<strong>'.strtoupper($data->titulo).'</strong></a>';
		
		return $message;
	}
?>