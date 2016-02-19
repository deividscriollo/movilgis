<?php
	if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../../admin/class.php');
	$class=new constante();
	if (isset($_POST['llenar_mapa'])) {
		$resultado = $class->consulta("	SELECT id,'lugar_turistico' as lugar, posicion FROM lugar_turistico WHERE STADO='1';");
		while ($row=$class->fetch_array($resultado)) {	
			$data[]= array($row[0],$row[1],$row[2]);			
		}
		$resultado = $class->consulta("	SELECT id,'establecimiento' as lugar, posicion FROM establecimientos WHERE STADO='1';");
		while ($row=$class->fetch_array($resultado)) {	
			$data[]= array($row[0],$row[1],$row[2]);			
		}
		
		print_r(json_encode($data));
	}
	if (isset($_POST['llenar_parroquia'])) {
		$resultado = $class->consulta("	SELECT id, nom FROM parroquias WHERE STADO='1';");
		while ($row=$class->fetch_array($resultado)) {	
			print'	<li>
                        <a href="#" id="model" onclick=parroquia_select("'.$row['id'].'")>'.$row['nom'].'</a>
                    </li>';	
		}
	}
	if (isset($_POST['llenar_datos'])) {
		$acu;

		$resultado = $class->consulta("	SELECT id, nombre FROM lugar_turistico WHERE STADO='1';");
		while ($row=$class->fetch_array($resultado)) {	
			$nombre = ucwords(strtolower($row['nombre']));
			$acu[] = array('id' => $row['id'], 'nombre' => $nombre );
		}

		print_r(json_encode($acu));
	}
	if (isset($_POST['llenar_datos1'])) {
		$acu;

		$resultado = $class->consulta("	SELECT id, nombre FROM establecimientos WHERE STADO='1';");
		while ($row=$class->fetch_array($resultado)) {	
			$nombre = ucwords(strtolower($row['nombre']));
			$acu[] = array('id' => $row['id'], 'nombre' => $nombre );
		}

		print_r(json_encode($acu));
	}
	if (isset($_POST['info_id'])) {
		$acu;
		$resultado = $class->consulta("	SELECT id, nombre, posicion FROM lugar_turistico WHERE ID='$_POST[id]';");
		while ($row=$class->fetch_array($resultado)) {	
			$nombre = ucwords(strtolower($row['nombre']));
			$acu[] = array('id' => $row['id'], 'nombre' => $nombre, 'posicion'=>$row['posicion']);
		}

		$resultado = $class->consulta("	SELECT id, nombre, posicion FROM establecimientos WHERE ID='$_POST[id]';");
		while ($row=$class->fetch_array($resultado)) {	
			$nombre = ucwords(strtolower($row['nombre']));
			$acu[] = array('id' => $row['id'], 'nombre' => $nombre, 'posicion'=>$row['posicion']);
		}

		print_r(json_encode($acu));
	}
	

	
	
	if (isset($_POST['info_user'])) {
		$id = $_SESSION['fulldata'][0];
		$acu;
		$resultado = $class->consulta("	SELECT * FROM cliente.turista WHERE ID='$id';");
		while ($row=$class->fetch_array($resultado)) {	
			$acu  = array(	'id' => $row['id'],
							'nombre' => $row['nombre'],
							'correo' => $row['correo'],
							'telefono' => $row['telefono'],
							'direccion' => $row['direccion']
							 );
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['verificar_pass'])) {
		$id = $_SESSION['fulldata'][0];
		$acu = 'false';
		$resultado = $class->consulta("	SELECT T.* FROM cliente.acceso_turista AT, cliente.turista T WHERE T.ID=AT.ID_TURISTA AND AT.ID_TURISTA='$id' AND PASSWORD=md5('$_POST[pass]');");
		while ($row=$class->fetch_array($resultado)) {	
			$acu  = 'true';
		}
		print $acu;
	}
	if (isset($_POST['mostrar_info'])) {
		$data;
		if ($_POST['ty']=='lugar_turistico') {
			$resultado = $class->consulta("	SELECT upper(nombre) as nombre, upper(propietario), direccion, telefono, correo,sitio_web, descripcion,
												(SELECT tipo FROM tipo_lugar_turistico WHERE ID=id_tipo_lugar_turistico) as tipo,
												(SELECT clima FROM clima WHERE ID=id_clima) as clima,
												(SELECT nom FROM parroquias WHERE ID=id_parroquia) as parroquia
											FROM lugar_turistico WHERE ID='$_POST[id]';");
			while ($row=$class->fetch_array($resultado)) {	
				$data['nombre']=$row['nombre'];
				$data['direccion']=$row['direccion'];
				$data['telefono']=$row['telefono'];
				$data['correo']=$row['correo'];
				$data['sitio_web']=$row['sitio_web'];
				$data['descripcion']=$row['descripcion'];
				$data['parroquia']=$row['parroquia'];
				$data['clima']=$row['clima'];
				$data['tipo']=$row['tipo'];
			}
			$acu= array();
			$resultado = $class->consulta("	SELECT url_img FROM img_lugares_establecimientos WHERE ID_REFERENCIA='$_POST[id]';");
			while ($row=$class->fetch_array($resultado)) {	
				$acu[]=$row['url_img'];
			}
			$data['fotos']=$acu;
		}	
		if ($_POST['ty']=='establecimiento') {
			$resultado = $class->consulta("	SELECT upper(nombre) as nombre, upper(propietario), direccion, posicion, telefono, correo,sitio_web, descripcion,
												categoria, n_hab, n_plazas,
												(SELECT tipo FROM tipo_establecimientos WHERE ID=tipo_establecimiento) as tipo,
												(SELECT nom FROM parroquias WHERE ID=id_parroquia) as parroquia
											FROM establecimientos WHERE ID='$_POST[id]';");
			while ($row=$class->fetch_array($resultado)) {	
				$data['nombre']=$row['nombre'];
				$data['direccion']=$row['direccion'];
				$data['telefono']=$row['telefono'];
				$data['telefono']=$row['telefono'];
				$data['hab']=$row['n_hab'];
				$data['plazas']=$row['n_plazas'];
				$data['correo']=$row['correo'];
				$data['sitio_web']=$row['sitio_web'];
				$data['descripcion']=$row['descripcion'];
				$data['parroquia']=$row['parroquia'];
				$data['tipo']=$row['tipo'];
				$data['categoria']=$row['categoria'];
			}
			$acu= array();
			$resultado = $class->consulta("	SELECT url_img FROM img_lugares_establecimientos WHERE ID_REFERENCIA='$_POST[id]';");
			while ($row=$class->fetch_array($resultado)) {	
				$acu[]=$row['url_img'];
			}
			$data['fotos']=$acu;
		}		
		print_r(json_encode($data));
	}
	if (isset($_POST['name'])) {
		# code...
		$id=$_POST['pk'];
		$valor=$_POST['value'];

		if ($_POST['name']=='txt_nombre') {
			$class->consulta("	UPDATE cliente.turista SET nombre='$valor' WHERE id='$id'");
		}
		if ($_POST['name']=='txt_correo') {
			$class->consulta("	UPDATE cliente.turista SET correo='$valor' WHERE id='$id'");
		}
		if ($_POST['name']=='txt_telefono') {
			$class->consulta("	UPDATE cliente.turista SET telefono='$valor' WHERE id='$id'");
		}
		if ($_POST['name']=='txt_direccion') {
			$class->consulta("	UPDATE cliente.turista SET direccion='$valor' WHERE id='$id'");
		}
		
	}
	if (isset($_POST['save_update'])) {
		$id = $_SESSION['fulldata'][0];
		$acu[0] = 0;
		$resultado = $class->consulta("	UPDATE cliente.acceso_turista 
										SET password=md5('$_POST[npass]')  WHERE ID_TURISTA='$id';");
		if ($resultado) {
			$acu[0] = 1;
		}
		print_r(json_encode($acu));
	}
	

?>

