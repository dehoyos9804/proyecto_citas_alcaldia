<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Alcaldia SAMPUES</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/owl.carousel.css">
    <link rel="stylesheet" href="other/css/owl.theme.css">
    <link rel="stylesheet" href="other/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="other/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="other/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="other/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="color-line"></div>
    
    <div class="container-fluid">
    	<br><br><br>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>Inciar Sesion Admin App</h3>
                    <p>Alcaldia Municipal De Sampues</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="usuario">Usuario</label>
                                <input type="text" placeholder="example admin" title="Please enter you username" required="" value="" name="usuario" id="usuario" class="form-control">
                                <span class="help-block small">Tú usuario unico</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="clave">Contraseña</label>
                                <input type="password" title="Please enter your clave" placeholder="******" required="" value="" name="clave" id="clave" class="form-control">
                                <span class="help-block small">Tú contraseña fuerte</span>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Iniciar Sesión</button>

                            <br>
                            <!--Gestión De Errores-->
		                    <?php
		                        if(isset($error)){
                            ?>
                                    <div class="alert-icon shadow-reset wrap-alert-b">
                                        <div class="alert alert-danger alert-mg-b alert-success-style">
                                            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                                </button> 
                                            <?php echo $error;?>
                                        </div> 
                                    </div>
                            <?php
                                }    
		                    ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <p>Copyright &copy; 2019 <a href="https://colorlib.com/wp/templates/">C.U.N</a> Todos los derechos reservados</p>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="other/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="other/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="other/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="other/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="other/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="other/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="other/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="other/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="other/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="other/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="other/js/metisMenu/metisMenu.min.js"></script>
    <script src="other/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="other/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="other/js/icheck/icheck.min.js"></script>
    <script src="other/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="other/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="other/js/main.js"></script>
</body>

</html>