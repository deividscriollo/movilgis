
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Login - Santa Ana de Cotacachi</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="../dashboard/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../dashboard/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="../dashboard/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="../dashboard/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../dashboard/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="../dashboard/vendor/select2-bootstrap/select2-bootstrap.css" />
    <link rel="stylesheet" href="../dashboard/vendor/alert/sweetalert.css" />
    <!-- App styles -->
    <link rel="stylesheet" href="../dashboard/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="../dashboard/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="../dashboard/styles/style.css">

</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div>
    <div class="splash-title">
        <h1>Registro - Santa Ana de Cotacachi</h1>
        <p></p>
        <img src="../dashboard/images/loading-bars.svg" width="64" height="64" /> 
    </div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Registro</h3>
                <small>Todos los campos son obligatorios. </small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form role="form" id="form-registro">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nombres</label>
                                    <input type="text" id="txt_nombre" name="txt_nombre" placeholder="Ingrese nombre" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" id="txt_correo" name="txt_correo" placeholder="Ingrese Correo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="last_name">Nacionalidad</label>
                                    <select class="js-source-country" id="select_pais" name="select_pais" style="width: 100%">
                                            <option value=""></option>
                                    </select>
                                </div>
                                <div id="obj_pro_ciu">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="username">Teléfono</label>
                                    <input type="text" id="txt_tel" name="txt_tel" placeholder="Teléfono" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for="number">Dirección</label>
                                    <input type="text" id="txt_direccion" name="txt_direccion" placeholder="Dirección" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for="number">Password</label>
                                    <input type="password" id="txt_pass" name="txt_pass" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for="number">Repita Password</label>
                                    <input type="password" id="txt_pass2" name="txt_pass2" placeholder="Repita Password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="checkbox"><label> <input type="checkbox" name="agree" id="agree"  class="i-checks" checked> Acepto la política</label></div>    
                                
                            </div>

                        </div>
                        <div class="row">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit" name="btn_registro">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="../turistas/">
                        <button type="button" class="btn btn-outline btn-info pull-right"><i class="pe-7s-global"></i> Entrar</button>
                    </a>
                    <a href="recuperar.php">
                    <button type="button" class="btn btn-outline btn-info"><i class="fa fa-key"></i> Recuperar Password</button>
                    </a>
                    

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>login</strong> - Portal Web Movil  2015 Copyright Catacachi
        </div>
    </div>
</div>


<!-- Vendor scripts -->
<script src="../dashboard/vendor/jquery/dist/jquery.min.js"></script>
<script src="../dashboard/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../dashboard/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../dashboard/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../dashboard/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="../dashboard/vendor/iCheck/icheck.min.js"></script>
<script src="../dashboard/vendor/sparkline/index.js"></script>
<script src="../dashboard/vendor/select2-3.5.2/select2.min.js"></script>
<script src="../dashboard/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../dashboard/vendor/jQuery-Mask-Plugin/jquery.mask.min.js"></script>
<script src="../dashboard/vendor/alert/sweetalert.min.js"></script>
<script src="../dashboard/vendor/alert/jquery.blockUI.js"></script>
<!-- App scripts -->
<script src="../dashboard/scripts/homer.js"></script>
<script src="app.js"></script>

</body>
</html>
<style type="text/css" media="screen">
    .login-container {
        max-width: 520px;
        margin: auto;
        padding-top: 1%;
    }
    .help-block {
        display: block;
        margin-top: -10px;
        margin-bottom: 1px;
        color: #D62C1A;
    }
</style>                    