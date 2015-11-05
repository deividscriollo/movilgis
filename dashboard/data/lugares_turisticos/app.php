<?php
	if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../../../admin/class.php');
	$class=new constante();
	if (isset($_POST['mostrar_tabla'])) {
		$resultado = $class->consulta("	SELECT id, upper(nombre), upper(propietario), upper(direccion), telefono, correo, 
									       sitio_web, 
									       (SELECT upper(clima) FROM clima WHERE id=id_clima),
									       descripcion, 
									       (SELECT upper(tipo) FROM tipo_lugar_turistico WHERE id=id_tipo_lugar_turistico), 
									       (SELECT upper(nom) FROM parroquias WHERE id=id_parroquia)
										FROM lugar_turistico;");
		while ($row=$class->fetch_array($resultado)) {	
			$data[]=$row[1];
			$data[]=$row[2];
			$data[]=$row[3];
			$data[]=$row[4];
			$data[]=$row[5];
			$data[]=$row[6];
			$data[]=$row[7];
			$data[]=$row[8];
			$data[]=$row[9];
			$data[]=$row[10];
			$data[]='
					<button type="button" class="btn btn-outline btn-info btn-xs" onclick=editar("'.$row[0].'")>
						<i class="fa fa-check-square-o"></i>
					</button>
                    <button type="button" class="btn btn-outline btn-warning2 btn-xs" onclick=eliminar("'.$row[0].'")>
                    	<i class="fa fa-minus-square"></i>
                    </button>
					';
		}
		print_r(json_encode($data));
	}
	if (isset($_POST['mostrar_clima'])) {
		$resultado = $class->consulta("SELECT id, upper(clima) FROM clima WHERE STADO='1';");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	if (isset($_POST['mostrar_tipo'])) {
		$resultado = $class->consulta("SELECT id, upper(tipo) FROM tipo_lugar_turistico WHERE STADO='1';");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	if (isset($_POST['mostrar_parroquia'])) {
		$resultado = $class->consulta("SELECT id, upper(tipo) FROM tipo_lugar_turistico WHERE STADO='1';");
		print'<option value=""></option>';
		while ($row=$class->fetch_array($resultado)) {	
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
	
	if (isset($_POST['btn_guardar'])) {
		$id=$class->idz();
		$fecha=$class->fecha_hora();
		$acu[0]=1;//no almacenado
		$resultado = $class->consulta("INSERT INTO lugar_turistico VALUES (	'$id',
																		'$_POST[txt_1]',
																		'$_POST[txt_2]',
																		'$_POST[txt_3]',
																		'$_POST[txt_4]',
																		'$_POST[txt_5]',
																		'$_POST[txt_6]',
																		'$_POST[txt_7]',
																		'$_POST[sel_8]',
																		'$_POST[txt_9]',
																		'',
																		'$_POST[sel_10]',
																		'$_POST[sel_11]',
																		'1', 
																		'$fecha');");
		if (!$resultado) {
			$acu[0]=0;//almacenado
		}
		print_r(json_encode($acu));	
	}
	if (isset($_POST['name'])) {
		if ($_POST['name']=='txt_1_actualizar') {
			$acu[0]=1;//no actualizado
			$resultado = $class->consulta("UPDATE parroquias SET nom='$_POST[value]' WHERE id='$_POST[pk]';");
			if (!$resultado) {
				$acu[0]=0;// actualizado
			}
		}
	}
	if (isset($_POST['buscar_info'])) {
		$resultado = $class->consulta("SELECT id, upper(nom) FROM parroquias WHERE ID='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {	
			$data[]=$row[0];
			$data[]=$row[1];
		}
		print_r(json_encode($data));
	}
	
	if (isset($_POST['eliminar_registro'])) {
		$acu[0]=1;//no actualizado
		$resultado = $class->consulta("UPDATE parroquias SET stado='0' WHERE id='$_POST[id]';");
		if (!$resultado) {
			$acu[0]=0;// actualizado
		}
	}
?>

