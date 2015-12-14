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
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="../../vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="../../vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="../../vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="../../fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="../../fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="../../styles/style.css">

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

    <div class="content animate-panel" id="map">
        
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalinfo" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="hpanel plan-box hyellow">
                            <div class="panel-body">
                                <div class="pull-right text-right">
                                    <div class="btn-group">
                                        <i class="fa fa-facebook btn btn-default btn-xs"></i>
                                        <i class="fa fa-twitter btn btn-default btn-xs"></i>
                                        <i class="fa fa-linkedin btn btn-default btn-xs"></i>
                                    </div>
                                </div>
                                <img alt="logo" class="img-circle m-b m-t-md" src="images/profile.jpg">
                                <h3><a href="#">Max Simson</a></h3>
                                <div class="text-muted font-bold m-b-xs">California, LA</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                                </p>
                                <div class="progress m-t-xs full progress-small">
                                    <div style="width: 65%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class=" progress-bar progress-bar-success">
                                        <span class="sr-only">35% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-right border-left">
                                <section id="map">
                                    <div id="map1" style="height: 200px"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hpanel hgreen">
                            <div class="panel-body">
                                <h3><a href="#">Descripción</a></h3>
                                <div class="text-muted font-bold m-b-xs">California, LA</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
                                </p>
                            </div>
                            <div class="border-right border-left">
                                
                            </div>
                            <div class="panel-footer contact-footer">
                                <div class="row">
                                    <div class="col-md-4 border-right">
                                        <div class="contact-stat"><span>Projects: </span> <strong>200</strong></div>
                                    </div>
                                    <div class="col-md-4 border-right">
                                        <div class="contact-stat"><span>Messages: </span> <strong>300</strong></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="contact-stat"><span>Views: </span> <strong>400</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lightBoxGallery animate-panel"> 
                            <img src="../../images/gallery/1s.jpg" class="plan-box hyellow" width="100px" height="100px">
                            <img src="../../images/gallery/2s.jpg" class="plan-box hyellow" width="100px" height="100px">
                            <img src="../../images/gallery/3s.jpg" class="plan-box hyellow" width="100px" height="100px">
                            <img src="../../images/gallery/4s.jpg" class="plan-box hyellow" width="100px" height="100px">
                            <img src="../../images/gallery/5s.jpg" class="plan-box hyellow" width="100px" height="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script src="../../vendor/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>


<!-- map scrip -->
<script src="http://openlayers.org/en/v3.9.0/build/ol.js"></script>
<script src="http://openlayers.org/en/v3.4.0/resources/example-behaviour.js"></script>


<!-- App scripts -->
<script src="../../scripts/homer.js"></script>
<script src="../../scripts/charts.js"></script>
<script src="../../scripts/angular.min.js"></script>

<!-- personal script -->
<script src="app.js"></script>
</body>
</html>
<style type="text/css">
.Content{
    height: 100%;
    background: red
}

    .Content:before
    {
        content: '';
        height: 100%;
        float: left;
    }

.wrapper
{
    position: relative;
    z-index: 1;
}
</style>
<style>

    .lightBoxGallery {
        text-align: center;
    }

    .lightBoxGallery a {
        margin: 5px;
        display: inline-block;
    }

</style>