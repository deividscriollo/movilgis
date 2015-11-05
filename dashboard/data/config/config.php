<?php 
if(!isset($_SESSION))
    {
        session_start();        
    }
/**
* 
*/
class menu
{
	
	function lateral(){
		print'
				<aside id="menu">
				    <div id="navigation">
				        <div class="profile-picture">
				            <a href="index-2.html">
				                <img src="../../images/profile.jpg" class="img-circle m-b" alt="logo">
				            </a>

				            <div class="stats-label text-color">
				                <span class="font-extra-bold font-uppercase">'.$_SESSION['fulldataadmin'][0].$_SESSION['fulldataadmin'][1].'</span>

				                <div class="dropdown">
				                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
				                        <small class="text-muted">Administrado<b class="caret"></b></small>
				                    </a>
				                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
				                        <li><a href="profile.html">Perfil</a></li>
				                        <li class="divider"></li>
				                        <li><a href="../exit/">Salir</a></li>
				                    </ul>
				                </div>
				            </div>
				        </div>

				        <ul class="nav" id="side-menu">
				            <li class="active">
				                <a href="index-2.html"> <span class="nav-label">Inicio</span></a>
				            </li>
				            <li>
				                <a href="#"><span class="nav-label">Ingresos</span><span class="fa arrow"></span> </a>
				                <ul class="nav nav-second-level">
				                    <li><a href="../parroquias/">Parroquias</a></li>
				                    <li><a href="../clima/">Clima</a></li>
				                    <li><a href="../tipo_lugares">Tipo Lugares Turí..</a></li>
				                    <li><a href="../lugares_turisticos/">Lugares Turisticos</a></li>				                    
				                    <li><a href="../tipo_establecimiento/">Tipo de Estable...</a></li>
				                    <li><a href="../establecimiento/">Establecimientos</a></li>
				                </ul>
				            </li>
				        </ul>
				    </div>
				</aside>


		';
	}
}




 ?>