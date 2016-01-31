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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="lightBoxGallery animate-panel" id="element_img"></div>
                                <h3><a href="#" id="element_nombre"></a></h3>
                                <div id="element_categoria">
                                    
                                </div>
                            </div>
                            <div class="border-right border-left">
                                <section>
                                    <div id="map1" style="height: 200px">
                                        
                                    </div>
                                    <div id="popup"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="hpanel hgreen">
                            <div class="panel-body">
                                <h3><a href="#">Descripción</a></h3>
                                <div class="text-muted font-bold m-b-xs" id="element_direccion"></div>
                                <p id="element_descripcion"></p>
                            </div>
                            <div class="alert alert-success">
                                <i class="fa fa-map-marker"></i> Llegar a este lugar 
                                <button class="btn btn-info" type="button" id="btn_como_llegar">
                                    <i class="pe-7s-right-arrow"></i>
                                </button>
                            </div>
                            <div class="alert alert-primary">
                                <i class="fa fa-globe"></i><a href="" id="element_website" target="_blank">Sitio Web</a>
                            </div>
                            <div class="panel-footer contact-footer">
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="contact-stat" id="element_1"></div>
                                    </div>
                                    <div class="col-md-3 border-right">
                                        <div class="contact-stat" id="element_2"></div>
                                    </div>
                                    <div class="col-md-3 border-right">
                                        <div class="contact-stat" id="element_3"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="contact-stat" id="element_4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="hpanel hblue">
                            <div class="panel-body">
                            hola men
                            </div>
                        </div>
                        <div class="hpanel hyellow">
                            <div class="panel-body">
                            hola men
                            </div>
                        </div>
                        <div class="hpanel hviolet">
                            <div class="panel-body">
                            hola men
                            </div>
                        </div>
                        <div class="hpanel horange">
                            <div class="panel-body">
                            hola men
                            </div>
                        </div>
                        <div class="hpanel hred">
                            <div class="panel-body">
                            hola men
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalmap" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="hpanel">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-bicycle"></i>
                            En Bicicleta 
                        </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-4">
                            <i class="fa fa-automobile"></i>
                            En Vehiculo
                        </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-5">
                            <i class="fa fa-street-view"></i>
                            A Pie 
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-3" class="tab-pane active">
                        <div class="panel-body">
                            <div id="map2" style="height: 500px"></div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body">
                            <strong>Donec quam felis</strong>

                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane">
                        <div class="panel-body">
                            <strong>Donec quam felis</strong>

                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
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
<script src="../../dashboard/scripts/lockr.js"></script>

<!-- maps scrip-->
<script src="../../dashboard/leaflet/leaflet.js"></script>
<script src="https://mapzen.com/tangram/0.4/tangram.min.js"></script>
<script src="../../dashboard/leaflet/routing-machine/leaflet-routing-machine.js"></script>
<script src="../../dashboard/leaflet/mapzen/lrm-mapzen.js"></script>
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<script src="app.js"></script>
</body>

</html>


<style type="text/css">
    .popover{
        width: 300px;
    }
</style>