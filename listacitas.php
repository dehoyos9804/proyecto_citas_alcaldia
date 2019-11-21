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
            $coddependencia = $_GET['iddependencia'];
            //$dependencias = tblAdministradores::getAllDependencia($coddependencia);
            $citas = tblAdministradores::getAllCitas($coddependencia);
            
           
    ?>

</head>

<body>
    
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
                                <li><a title="View Mail" href="listafuncionarios2.php"><i class="fa fa-television sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Funcionarios</span></a></li>
                                
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
                                                <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
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
            <!-- Mobile Menu end -->
            <!-- PAGE CONTENT WRAPPER -->
                
                <!-- PAGE CONTENT WRAPPER -- >
                <div class="page-content-wrap">                

                    <div class="row">                                        
                        <div class="col-md-12">
                            <!-- CONTACTS WITH CONTROLS -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title" align="center">Lista </h3>
                                </div>
                                <div class="panel-heading">
                                    <h3 class="panel-title" align="center"> </h3>
                                </div>
                                <div class="panel-heading">
                                    <h3 class="panel-title" align="center">Lista De Citas</h3>
                                </div>

                                <div class="panel-body list-group list-group-contacts"> 
                                    <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="60">Id</th>
                                                    <th class="text-center" width="180">Funcionario a Cargo</th>
                                                    <th class="text-center" width="130">Fecha</th>
                                                    <th class="text-center" width="100">Hora Inicio</th>
                                                    <th class="text-center" width="100">Hora Fin</th>
                                                    <th class="text-center" width="250">Tema</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($citas as $key) {
                                                ?>
                                                <tr id="trow_1">
                                                    <td class="text-center"><?php echo $key['codcita'];?></td>
                                                    <td class="text-center"><?php echo $key['nombres'];?><?php echo $key['apellidos'];?></td>
                                                    <td class="text-center"><?php echo $key['fechareal'];?></td>
                                                    <td class="text-center"><?php echo $key['horareali'];?></td>
                                                    <td class="text-center"><?php echo $key['horarealf'];?></td>
                                                    <td><?php echo $key['tema'];?></td>
                                                </tr> 
                                                <?php
                                                }
                                                ?>
                                            </tbody>    
                                        </table>    
                                    </div>                          
                                </div>

                                </div>
                            </div>
                            <!-- END CONTACTS WITH CONTROLS -->

                        </div>                   
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>


                <!-- END PAGE CONTENT WRAPPER -->                
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
