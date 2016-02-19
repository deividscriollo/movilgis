<?php 
if(!isset($_SESSION))
    {
        session_start();        
    }
    if(!isset($_SESSION["fulldata"])) {
        header('Location: ../');
    }
    
 ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Home | Turista</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="../../dashboard/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../dashboard/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="../../dashboard/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="../../dashboard/vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="../../dashboard/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="../../dashboard/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="../../dashboard/styles/style.css">
    <link rel="stylesheet" href="../../dashboard/vendor/xeditable/bootstrap3-editable/css/bootstrap-editable.css" />
    <!-- openlayer map entorno -->
    <link rel="stylesheet" href="http://openlayers.org/en/v3.9.0/css/ol.css" type="text/css">

    <!-- map style -->
    <link rel="stylesheet" href="../../dashboard/leaflet/leaflet.css" />
    <link rel="stylesheet" href="../../dashboard/leaflet/routing-machine/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="../../dashboard/leaflet/mapzen/leaflet.routing.mapzen.css" />

</head>
<body>

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div>
    <div class="splash-title">
        <h1>Registro - Santa Ana de Cotacachi</h1>
        <p></p>
        <img src="../../dashboard/images/loading-bars.svg" width="64" height="64" /> 
    </div>
</div>
<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            GeO Portal
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscar lugares" class="form-control" name="search">
            </div>
        </form>
        
        <div class="navbar-right">
            
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="perfil.php">
                <img src="../../dashboard/images/profile.jpg" class="img-circle m-b" alt="logo">
            </a>
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase"><?php print_r($_SESSION['fulldata'][1]); ?></span>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="rutas.php">
                    <span class="nav-label">Rutas</span>
                    <span class="fa fa-location-arrow pull-right"></span>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <span class="nav-label">Mapa</span>
                    <span class="fa fa-map pull-right"></span>
                </a>
            </li>
            <li>
                <a href="perfil.php">
                    <span class="nav-label">Mi Perfil</span>
                    <span class="fa fa-user-plus pull-right"></span>
                </a>
            </li>
            <li>
                <a href="exit.php">
                    <span class="nav-label">Salir</span>
                    <span class="fa fa-times-circle pull-right"></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row projects">
            <div class="text-center m-b-xl">
                <h3>Perfil</h3>

                <p>
                    La información digitada se actualizara dinámicamente :)
                </p>
            </div>
            <div class="col-lg-6">
                <div class="hpanel hgreen">
                    <div class="panel-heading hbuilt text-center">
                        <h4 class="font-bold">Información Perfil</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">                            
                            <table id="user" class="table .table-condensed" style="clear: both">
                                <tbody>
                                    <tr>
                                        <td width="40%">Nombre:</td>
                                        <td width="60%">
                                            <i class="fa fa-user text-red"></i> 
                                            <a href="#" id="editable_nombre" class="editable editable-click">superuser
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Correo: </td>
                                        <td><a href="#" id="editable_correo" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">Empty</a></td>
                                    </tr>
                                    <tr>
                                        <td>Teléfono: </td>
                                        <td><a href="#" id="editable_telefono" class="editable editable-click editable-empty">Empty</a></td>
                                    </tr>
                                    <tr>
                                        <td>Dirección: </td>
                                        <td><a href="#" id="editable_direccion" class="editable editable-click editable-empty">Empty</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Additional information about project in footer
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hpanel hyellow">
                    <div class="panel-heading hbuilt text-center">
                        <h4 class="font-bold">Seguridad</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <h4><a href="#"> Actualizar Password</a></h4>
                                <form role="form" id="form_2">
                                    <div class="form-group">
                                        <label for="name">First name</label>
                                        <input type="password" id="pass" name="pass" placeholder="Password" class="form-control">
                                        <input type="hidden" id="pass" name="save_update">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nuevo Password</label>
                                        <input type="password" id="npass" name="npass" placeholder="Nuevo Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Repita Nuevo Password</label>
                                        <input type="password" id="npass1" name="npass1" placeholder="Repita Nuevo Password" class="form-control">
                                    </div>
                                    
                                    
                                    <div>
                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 project-info">
                                <img alt="logo" class="img-circle" src="../../dashboard/images/a7.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Additional information about project in footer
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!-- Vendor scripts -->
<script src="../../dashboard/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../dashboard/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../dashboard/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../dashboard/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../dashboard/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="../../dashboard/vendor/iCheck/icheck.min.js"></script>
<script src="../../dashboard/vendor/sparkline/index.js"></script>
<script src="../../dashboard/vendor/peity/jquery.peity.min.js"></script>
<script src="../../dashboard/vendor/xeditable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!-- map scrip -->
<script src="http://openlayers.org/en/v3.9.0/build/ol.js"></script>
<script src="http://openlayers.org/en/v3.4.0/resources/example-behaviour.js"></script>

<!-- App scripts -->
<script src="../../dashboard/scripts/homer.js"></script>
<script src="../../dashboard/scripts/charts.js"></script>
<script src="../../dashboard/scripts/lockr.js"></script>

<!-- maps scrip-->
<script src="../../dashboard/leaflet/leaflet.js"></script>
<script src="https://mapzen.com/tangram/0.4/tangram.min.js"></script>
<script src="../../dashboard/leaflet/routing-machine/leaflet-routing-machine.js"></script>
<script src="../../dashboard/leaflet/mapzen/lrm-mapzen.js"></script>
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<script src="../../dashboard/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="applogin.js"></script>
</body>
</html>