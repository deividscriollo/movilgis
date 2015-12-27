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
    <!-- openlayer map entorno -->
    <link rel="stylesheet" href="http://openlayers.org/en/v3.9.0/css/ol.css" type="text/css">

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
            <a href="index-2.html">
                <img src="../../dashboard/images/profile.jpg" class="img-circle m-b" alt="logo">
            </a>
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase"><?php print_r($_SESSION['fulldata'][1]); ?></span>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">
                    <span class="nav-label">Mapa</span>
                    <span class="glyphicon glyphicon-map-marker pull-right"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-label">Parroquias</span>
                    <span class="fa arrow pull-right"></span>
                </a>
                <ul class="nav nav-second-level" id="menu_parroquias" >
                    
                </ul>
            </li>
            <ul class="nav nav-second-level">
                <li>
                    <a href="../lugares/">
                        <span class="nav-label">Lugares Turist.</span>
                        <span class="glyphicon glyphicon-tower pull-right"></span>
                    </a>
                </li>                    
            </ul>
            <ul class="nav nav-second-level">
                <li>
                    <a href="../establecimientos/">
                        <span class="nav-label">Establecimientos </span>
                        <span class="glyphicon glyphicon-cutlery pull-right"></span>
                    </a>                    
                </li>                    
            </ul>
        </ul>
    </div>
</aside>

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
                                <img alt="logo" class="img-circle m-b m-t-md" src="../../dashboard/images/profile.jpg">
                                <h3><a href="#" id="element_nombre"></a></h3>
                                <div class="text-muted font-bold m-b-xs" id="element_propietario"></div>
                                
                                <div>
                                    <span class="glyphicon glyphicon-star hellow font-18" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="border-right border-left">
                                <section>
                                    <div id="map1" style="height: 200px"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hpanel hgreen">
                            <div class="panel-body">
                                <h3><a href="#">Descripción</a></h3>
                                <div class="text-muted font-bold m-b-xs" id="element_direccion"></div>
                                <p id="element_descripcion"></p>
                            </div>
                            <div class="border-right border-left">
                                
                            </div>
                            <div class="panel-footer contact-footer">
                                <div class="row">
                                    <div class="col-md-4 border-right">
                                        <div class="contact-stat"><span>Clima: </span> <strong id="element_clima">200</strong></div>
                                    </div>
                                    <div class="col-md-4 border-right">
                                        <div class="contact-stat"><span>Tipo: </span> <strong id="element_tipo">300</strong></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="contact-stat"><span>teléfono: </span> <strong id="element_tele">400</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lightBoxGallery animate-panel" id="element_img"> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor scripts -->
<script src="../../dashboard/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../dashboard/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../dashboard/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../dashboard/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../dashboard/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="../../dashboard/vendor/iCheck/icheck.min.js"></script>
<script src="../../dashboard/vendor/sparkline/index.js"></script>
<script src="../../dashboard/vendor/peity/jquery.peity.min.js"></script>

<!-- map scrip -->
<script src="http://openlayers.org/en/v3.9.0/build/ol.js"></script>
<script src="http://openlayers.org/en/v3.4.0/resources/example-behaviour.js"></script>

<!-- App scripts -->
<script src="../../dashboard/scripts/homer.js"></script>
<script src="../../dashboard/scripts/charts.js"></script>

<script src="app.js"></script>
</body>

</html>
