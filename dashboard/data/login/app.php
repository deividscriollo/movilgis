<?php 
	require('../../../admin/class.php');
	$class=new constante();
	if (isset($_POST['peticion_acceso'])) {
		$resultado = $class->consulta("SELECT * FROM SEG.ACCESO A WHERE A.USUARIO='$_POST[txt_1]' AND PASSWORD=md5('$_POST[txt_2]') AND A.STADO='1'");
		$data[0]=0;	
		while ($row=$class->fetch_array($resultado)) {	
			$data[0]=1;
		}
		print_r(json_encode($data));
	}
?>