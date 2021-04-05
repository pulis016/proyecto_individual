<?php
function conectarbase($host,$usuario,$clave,$base){
	if(!$enlace = @mysqli_connect($host,$usuario,$clave,$base)){
		return false;
	}
	else{
		return $enlace;
	}
}

function consultar($conexion, $consulta){
	if(!$datos = mysqli_query($conexion, $consulta) or mysqli_num_rows($datos)<1)
	{
		return false;
	}
	else{
		return $datos;
	}
}

function tabular($datos){
	$codigo = '<table border = "1" cellpading = "8"> ';
	while ($fila = @mysqli_fetch_array($datos)){
		$codigo .= '<tr>';
		$codigo .= '<td>' . utf8_encode($fila["id_user"]) . '</td>';
		$codigo .= '<td>' . utf8_encode($fila["nombre"]) . '</td>';
		$codigo .= '<td>' . utf8_encode($fila["apellido"]) . '</td>';
		$codigo .= '<td>' . utf8_encode($fila["user"]) . '</td>';
		$codigo .= '<td>' . utf8_encode($fila["correo"]) . '</td>';
		$codigo .= '<td>' . utf8_encode($fila["localidad"]) . '</td>';
		$codigo .= '<td><a href="borrar.php?codigo='.$fila["id_user"].'">BORRAR </a></td>';
		$codigo .= '<td><a href="modificar.php?codigo='.$fila["id_user"].'">MODIFICAR </a></td>';
		$codigo .= '</tr>';
	}
	$codigo .= '</table>';
	return $codigo;
}

function editarRegistros($datos){
	//Estraeremos a $fila el registro:
	if($fila = @mysqli_fetch_array($datos)) {
		$nombreActual = utf8_encode($fila["nombre"]);
		$apellidoActual = utf8_encode($fila["apellido"]);
		$userActual = utf8_encode($fila["user"]);
		$localidadActual = utf8_encode($fila["localidad"]);
		$correoActual = utf8_encode($fila["correo"]);
		$codigoActual = utf8_encode($fila["id_user"]);
		//Aquí acumularemos al $codigo cada dato de $fila ubicado dentro de atributos values campos:
		$codigo = '<form action = "modificado.php" method = "post">
		<fieldset> <legend>Puede modificar los datos de este registro:</legend>
		<p> <label>Nombre:
		<input name = "nombre" type = "text" value = " '.$nombreActual.' " >
		</label> </p>
		<p> <label>Apellido:
		<input name = "apellido" type = "text" value = " '.$apellidoActual.' " >
		</label> </p>
		<p> <label>User:
		<input name = "user" type = "text" value = " '.$userActual.' " >
		</label> </p>
		<p> <label>Localidad:
		<input name = "localidad" type = "text" value = " '.$localidadActual.' " >
		</label> </p>
		<p> <label>Correo:
		<input name = "correo" type = "text" value = " '.$correoActual.' " >
		</label> </p>
		<input name = "usecode" type = "hidden" value = " '.$codigoActual.' " >
		<p> <input type = "submit" name = "Submit" value = "GUARDAR CAMBIOS">
		</p></fieldset></form>';
	}
	else{
		$codigo = false;
	}
	return $codigo;
}
?>