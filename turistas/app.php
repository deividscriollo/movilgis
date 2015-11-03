<?php
	if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../admin/class.php');
	require('../admin/correo.php');
	$class=new constante();
	if (isset($_POST['llenar_pais'])) {
		$resultado = $class->consulta("SELECT id, upper(nom_pais) FROM localizacion.pais;");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	if (isset($_POST['llenar_provincia'])) {
		$resultado = $class->consulta("SELECT id, upper(nom_provincia) FROM localizacion.provincia WHERE ID_PAIS='$_POST[id]';");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	if (isset($_POST['llenar_ciudad'])) {
		$resultado = $class->consulta("SELECT id, nom_ciudad FROM localizacion.ciudad WHERE ID_PROVINCIA='$_POST[id]';");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	if (isset($_POST['existencia_correo'])) {
		$resultado = $class->consulta("SELECT id FROM cliente.turista WHERE CORREO='$_POST[txt_correo]'");
		$acu='true';
		while ($row=$class->fetch_array($resultado)) {	
			$acu='false';
		}
		print $acu;
	}
	if (isset($_POST['btn-acceso'])) {
		$acu[0]=0;
		$resultado = $class->consulta("SELECT T.* FROM cliente.acceso_turista AT, cliente.turista T WHERE AT.CORREO='$_POST[txt_nombre]' AND PASSWORD=md5('$_POST[txt_pass]') AND AT.STADO='1'");
		while ($row=$class->fetch_array($resultado)) {	
			$acu[0]=1;
			$_SESSION['fulldata'][0]=$row[0];
			$_SESSION['fulldata'][1]=$row[1];
			$_SESSION['fulldata'][2]=$row[2];
			$_SESSION['fulldata'][3]=$row[3];
			$_SESSION['fulldata'][4]=$row[4];
			$_SESSION['fulldata'][5]=$row[5];
		}
		$resultado = $class->consulta("SELECT * FROM cliente.acceso_turista WHERE CORREO='$_POST[txt_nombre]' AND PASSWORD=md5('$_POST[txt_pass]') AND STADO='0'");
		while ($row=$class->fetch_array($resultado)) {	
			$acu[0]=2;	
		}
		print_r(json_encode($acu));
	}

	
	if (isset($_POST['proceso_activacion'])) {
		$fullname=$_POST['id'];
		$id=explode('=', $fullname);
		$acu[0]=0;
		$resultado = $class->consulta("UPDATE cliente.turista SET stado='1' WHERE ID='$id[1]'");
		$resultado = $class->consulta("UPDATE cliente.acceso_turista SET stado='1' WHERE ID_TURISTA='$id[1]'");
		if (!$resultado) {
			$acu[0]=1;
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['btn_registro'])) {
		$id=$class->idz();
		$id1=$class->idz();
		$fecha=$class->fecha_hora();
		$localizacion=$_POST['select_pais'];
		if (isset($_POST['select_ciudad'])) {
			$localizacion=$_POST['select_ciudad'];
		}
		$resultado = $class->consulta("INSERT INTO cliente.turista VALUES ('$id', '$_POST[txt_nombre]', '$_POST[txt_correo]', '$localizacion', '$_POST[txt_tel]', '$_POST[txt_direccion]', '0', '$fecha');");
		$resultado = $class->consulta("INSERT INTO cliente.acceso_turista    VALUES ('$id1', '$id', '$_POST[txt_correo]', md5('$_POST[txt_pass]'), '0', '$fecha');");
		confirmacion_registro('deividscriollo@gmail.com', $id);
		$acu[0]=1;
		if (!$resultado) {
			$acu[0]=0;//informacion NO almacenada
		}
		print_r(json_encode($acu));
	}
	

?>