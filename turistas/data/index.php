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
    <link rel="stylesheet" href="http://js.arcgis.com/3.14/esri/css/esri.css">

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
                <a href="index-2.html"> <span class="nav-label">Home</span> </a>
            </li>
            
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="#">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>            
            <section id="map">
                <div id="map1" style="height: 500px"></div>
            </section>
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
<script src="http://js.arcgis.com/3.14/"></script>
<!-- App scripts -->
<script src="../../dashboard/scripts/homer.js"></script>
<script src="../../dashboard/scripts/charts.js"></script>

<script src="app.js"></script>
</body>

</html>
