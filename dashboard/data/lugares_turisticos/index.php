<?php 
if(!isset($_SESSION))
    {
        session_start();        
    }
    if(!isset($_SESSION["fulldataadmin"])) {
        header('Location: ../login/');
    }
    include'../config/config.php';
    $classmenu=new menu();
 ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Home - Admin</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" ew-->

    <!--Vendor styles -->
    <link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="../../vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="../../vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../../vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="../../vendor/alert/sweetalert.css" />
    <link rel="stylesheet" href="../../vendor/xeditable/bootstrap3-editable/css/bootstrap-editable.css" />
    <!-- App styles -->
    <link rel="stylesheet" href="../../fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="../../fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/jquery-filestyle.min.css">

    <!-- openlayer map entorno -->
    <link rel="stylesheet" href="http://openlayers.org/en/v3.9.0/css/ol.css" type="text/css">
    
    
    

</head>
<body>

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div>
    <div class="splash-title">
        <h1>Registro - Santa Ana de Cotacachi</h1>
        <p></p>
        <img src="../../images/loading-bars.svg" width="64" height="64" /> 
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
            <span class="text-primary">GeO Portal</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscarl" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-keypad"></i>
                    </a>

                    <div class="dropdown-menu hdropdown bigmenu animated flipInX">
                        <table>
                            <tbody>
                            
                            <tr>
                                <td>
                                    <a href="../exit/">
                                        <i class="pe pe-7s-close text-info"></i>
                                        <h5>Salir</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="forum.html">
                                        <i class="pe pe-7s-comment text-info"></i>
                                        <h5>Información</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="analytics.html">
                                        <i class="pe pe-7s-graph1 text-danger"></i>
                                        <h5>Reportes</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="file_manager.html">
                                        <i class="pe pe-7s-box1 text-success"></i>
                                        <h5>Archivos</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="contacts.html">
                                        <i class="pe pe-7s-users text-success"></i>
                                        <h5>Perfil</h5>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<?php $classmenu->lateral(); ?>


<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        Formulario Lugar turístico / <small>todos los campos marcados con (*) son obligatorios</small>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-data" enctype='multipart/form-data'>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Nombre Lugar turístico (*)</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_1" name="txt_1" class="form-control" placeholder="Nombre Lugar turístico">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Gerencia/Propietario (*)</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_2" name="txt_2" class="form-control" placeholder="Gerencia/Propietarios">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Dirección (*)</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_3" name="txt_3" class="form-control" placeholder="Dirección">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Latitud-Longitud (*)</label>
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" id="txt_4" name="txt_4" placeholder="Latirud-Longitud" class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary" id="btn_mapa">Buscar <i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Teléfono (*)</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_5" name="txt_5" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Correo (*)</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_6" name="txt_6" class="form-control" placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Sitio Web</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="txt_7" name="txt_7" class="form-control" placeholder="Sitio Web">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Clima (*)</label>
                                        <div class="col-sm-12">
                                            <select class="form-control m-b" id="sel_8" name="sel_8"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Descripción</label>
                                        <div class="col-sm-12">
                                        <textarea rows="1" cols="50" class="form-control" id="txt_9" name="txt_9" placeholder="Descripción"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                     <div class="form-group">
                                        <label class="col-sm-12 control-label">Fotografías</label>
                                        <div class="col-sm-12">
                                        <input type='file' name='txt_x[]' id="txt_x" multiple/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Tipo (*)</label>
                                        <div class="col-sm-12">
                                            <select class="form-control m-b" id="sel_10" name="sel_10"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Parroquia (*)</label>
                                        <div class="col-sm-12">
                                            <select class="form-control m-b" id="sel_11" name="sel_11"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <button class="btn w-xs btn-info" type="submit" name="btn_guardar">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-down"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        Formulario Lugar turístico / <small>todos los campos marcados con (*) son obligatorios</small>
                    </div>
                    <div class="panel-body" style="display: none;">
                        <table id="tabla-info" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lugar turístico</th>
                                    <th>Gerencia/Propietario</th>
                                    <th>Direccion</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Clima</th>
                                    <th>Tipo</th>
                                    <th>PArroquia</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modales -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <div class="modal-titles">Actualizar información</div>
                </div>
                <div class="modal-body no-padding">
                    <table class="table table-bordered table-striped" style="clear: both">
                        <tbody>
                        <tr>
                            <td width="35%">Lugar turístico</td>
                            <td width="65%"><a href="" id="username" class="editable editable-click">superuser</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal-map" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                    <div id="map" style="height: 350px"></div>
                <div class="color-line"></div>
                <div style="display: none;">
                  <!-- Clickable label for Vienna -->
                  <a class="overlay" id="vienna" target="_blank" href="http://en.wikipedia.org/wiki/Vienna">Vienna</a>
                  <div id="marker" title="Marker"></div>
                  <!-- Popup -->
                  <div id="popup" title="Selección"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            en desarrollo
        </span>
        Company 2015-2016
    </footer>

</div>

<!-- Vendor scripts -->
<script src="../../vendor/jquery/dist/jquery.min.js"></script>
<script src="../../vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vendor/jquery-flot/jquery.flot.js"></script>
<script src="../../vendor/jquery-flot/jquery.flot.resize.js"></script>
<script src="../../vendor/jquery-flot/jquery.flot.pie.js"></script>
<script src="../../vendor/flot.curvedlines/curvedLines.js"></script>
<script src="../../vendor/jquery.flot.spline/index.js"></script>
<script src="../../vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="../../vendor/iCheck/icheck.min.js"></script>
<script src="../../vendor/peity/jquery.peity.min.js"></script>
<script src="../../vendor/sparkline/index.js"></script>
<script src="../../vendor/xeditable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="../../vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../../vendor/alert/sweetalert.min.js"></script>
<script src="../../vendor/jQuery-Mask-Plugin/jquery.mask.min.js"></script>

<!-- map scrip -->
<script src="http://openlayers.org/en/v3.9.0/build/ol.js"></script>
<script src="http://openlayers.org/en/v3.4.0/resources/example-behaviour.js"></script>

<!-- App scripts -->
<script src="../../scripts/homer.js"></script>
<script src="../../scripts/charts.js"></script>
<script src="../../scripts/jquery-filestyle.min.js"></script>
<script src="../../scripts/proj4.js"></script>


<!-- personal script -->
<script src="app.js"></script>
</body>

<!-- Mirrored from webapplayers.com/homer_admin-v1.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Oct 2015 09:57:42 GMT -->
</html>
<style type="text/css">
    #form-data input{
        text-transform: uppercase;
    }
</style>