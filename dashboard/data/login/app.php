<?php
	if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../../../admin/class.php');
	$class=new constante();
	if (isset($_POST['peticion_acceso'])) {
		$resultado = $class->consulta("SELECT U.*, A.* FROM seg.acceso A, seg.usuario U WHERE U.ID=A.ID_USUARIO AND A.USUARIO='$_POST[txt_1]' AND PASSWORD=md5('$_POST[txt_2]') AND A.STADO='1'");
		$data[0]=0;	
		while ($row=$class->fetch_array($resultado)) {	
			$data[0]=1;
			$_SESSION['fulldataadmin'][]=$row[1];
			$_SESSION['fulldataadmin'][]=$row[2];
		}
		print_r(json_encode($data));
	}
?>