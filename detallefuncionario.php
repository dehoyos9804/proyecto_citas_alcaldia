<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | Alcaldia De Sampues - Sucre</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="other/img/favicon.ico">
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/meanmenu.min.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="other/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="other/js/vendor/modernizr-2.8.3.min.js"></script>

    <?php
            require 'boards/tblAdministradores.php';
            
            $numerocedula = $_GET['numerocedula'];

            $funcionario = tblAdministradores::getFuncionario($numerocedula);
    ?>  

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
								   <i class="fa big-icon fa-home icon-wrap"></i>
								   <span class="mini-click-non">Registrar</span>
							</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="registrodependencia.php"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dependencias</span></a></li>
                                <li><a title="Dashboard v.2" href="registrofuncionario.php"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Funcionarios</span></a></li>
                                <li><a title="Dashboard v.2" href="registroevento.php"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Evento</span></a></li>
                                
                            </ul>
                        </li>
                        <li class="active">
                            <a class="has-arrow" href="mailbox.html">
                                <i class="fa big-icon fa-home icon-wrap"></i> 
                                <span class="mini-click-non">Reportes</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="listausuarios.php"><i class="fa fa-inbox sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Usuarios</span></a></li>
                                <li><a title="View Mail" href="listadependencias.php"><i class="fa fa-television sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Citas</span></a></li>
                                <li><a title="View Mail" href="listafuncionarios.php"><i class="fa fa-television sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Funcionarios</span></a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="other/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="fa fa-bars"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                    
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
															<span class="admin-name">Opciones</span>
															<i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="fa fa-user author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="other/views/logout.php"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->

            <div class="page-content-wrap">
                    
                    
                </div>


            <!-- Mobile Menu end -->
            
        </div>
        <div class="calender-area mg-tb-13">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner"><div class="row">
                        <div class="col-md-12">
                            
                            <!-- START TIMELINE -->
                            <div class="timeline timeline-right">
                                <?php
                                foreach ($funcionario as $key) {
                                ?>
                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-content">
                                        <div class="timeline-body" id="links">               
                                                       
                                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        

                                                    <div class="row">
                                                    <p>
                                                        <h5>DATOS PERSONALES</h5>
                                                        <strong>Identificacion: </strong> <?php echo $key['numerocedula'];?> <br>
                                                        <strong>Nombres: </strong> <?php echo $key['nombres'];?> <?php echo $key['apellidos'];?> <br>
                                                        <strong>Telefonos:</strong> <?php echo $key['telefono'];?><br>
                                                        <strong>Direccion Residencial: </strong> <?php echo $key['direccion'];?><br>
                                                        <strong>Correo:  </strong> <?php echo $key['correo'];?><br>
                                                        <strong>Dependencia: </strong> <?php echo $key['nombre'];?><br>
                                                        <strong>Cargo en Dependencia: </strong><?php echo $key['tipofuncionario'];?>
                                                    </p>
                                                </div>  
                                            </div>

                                        </div>  
                                                                                                               
                                    </div>
                                </div>  
                                <?php
                                }
                                ?>
                                                                      
                                <!-- END TIMELINE ITEM -->                            
                        </div>
                    </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>Sampués - Sucre &copy; 2019</p>
                        </div>
                    </div>
                </div>
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
    <!-- morrisjs JS
		============================================ -->
    <script src="other/js/morrisjs/raphael-min.js"></script>
    <script src="other/js/morrisjs/morris.js"></script>
    <script src="other/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="other/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="other/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <!-- plugins JS
		============================================ -->
    <script src="other/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="other/js/main.js"></script>
</body>

</html>