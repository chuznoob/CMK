<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- *****************************************HEADER***********************************************************-->  
    <head>

        <meta charset="UTF-8">
        <title>Productos</title>
        <link rel="shortcut icon" type="image/x-icon" href="herramientas/ico/logo.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="herramientas/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="herramientas/prettyPhoto/css/prettyPhoto.css">
        <link rel="stylesheet" href="css/herramientas/flexslider.css">
        <link rel="stylesheet" href="css/herramientas/font-awesome.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="herramientas/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="herramientas/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="herramientas/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="herramientas/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="herramientas/ico/apple-touch-icon-57-precomposed.png">

    </head>
<!-- *****************************************HEADER***********************************************************-->
<!-- *****************************************TOP&NAV**********************************************************-->
        <body> 
           <div class="container">
            <div class="header row">
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <i class="fa fa-bars fa-lg"></i>
                            </a>
<?php
if(isset($_SESSION['sesion']))
{
 if($_SESSION['niv_cliente']=="administrador"|| $_SESSION['niv_cliente']=="ad-master")
 { ?>
<a class="brand logPopover" href="#"
 data-trigger="focus" 
              title="<strong><?php echo $_SESSION['nom_cliente']; ?></strong><br>"
              
               data-content="
            <h6>Usuario:</h6>
            <a class='btn btn-default btn-md'href='index.php' title='Inicio'> <i class='fa fa-home'></i></a>
            <a class='btn btn-default btn-md'href='login.php' title='Salir'> <i class='fa fa-user-times'></i></a><hr>
            <h6>Administrador:</h6>
            <a class='btn btn-default btn-md'
            href='administrador/productos.php' target='_blank' title='Productos'> 
            <i class='fa fa-laptop'></i></a>
            <a class='btn btn-default btn-md'
            href='administrador/proveedores.php' target='_blank' title='Proveedores'> 
            <i class='fa fa-users'></i></a>
            <a class='btn btn-default btn-md'
            href='administrador/categorias.php' target='_blank' title='Categorias'> 
            <i class='fa fa-tags'></i></a>
            <a class='btn btn-default btn-md'
            href='administrador/comentarios.php' target='_blank' title='Comentarios'> 
            <i class='fa fa-comments'></i></a>
            <a class='btn btn-default btn-md'
            href='administrador/contactos_cm.php' target='_blank' title='Contacto'> 
            <i class='fa fa-inbox'></i></a>
            <a class='btn btn-default btn-md'
            href='administrador/punto_deVenta.php' target='_blank' title='Punto de Venta'> 
            <i class='fa fa-shopping-cart'></i></a>
             <a class='btn btn-default btn-md'
             href='administrador/ventas.php' target='_blank' title='Historial de Ventas'> 
             <i class='fa fa-line-chart'></i></a>
             <a class='btn btn-default btn-md'
             href='administrador/usuarios.php' target='_blank' title='Usuarios'> 
             <i class='fa fa-user-plus'></i></a>"
              data-placement="bottom" 
              href="#" role="button" aria-expanded="false"><img src="herramientas/img/logo-ad.png"></a>
<?php }else{ ?>
<a class="brand" href="index.php"><img src="herramientas/img/logo.png"></a>
 <?php }
}else{ ?>
 <a class="brand" href="index.php"><img src="herramientas/img/logo.png"></a>
<?php }
    ?>
     
      <div class="nav-collapse collapse">
                                <ul class="nav pull-right">
                                    <li>
                                 <a class="mains" href="acerca.php"><i class="fa fa-users fa-lg"></i><br />Conocenos</a>
                                    </li>
                                    <li>
                        <a class="mains" href="comentarios.php"><i class="fa fa-comments fa-lg"></i><br />Comentarios</a>
                                    </li>
                                    <li>
                             <a class="mains" href="servicios.php"><i class="fa fa-cogs fa-lg"></i><br/>Servicios</a>
                                    </li>
                                    <li>
                                 <a class="mains active"  href="productos.php"><i class="fa fa-th fa-lg"></i><br />Productos</a>
                                    </li>
                                    <li>
                            <a class="mains" href="contacto.php"><i class="fa fa-envelope fa-lg"></i><br />Contacto</a>
                                    </li>
<?php
if(isset($_SESSION['sesion']))
{ ?>
             <li>
                <a class="mains2 usuPopover" 
                   title="<strong><?php echo $_SESSION['nom_cliente']; ?></strong><br>
                       <strong><?php echo $_SESSION['cor_cliente']; ?></strong><br>"
               data-trigger="focus" 
               data-content="
            <a class='btn btn-default btn-md'href='compras.php'> <i class='fa fa-shopping-cart'></i>&nbsp;Compras</a>
            <a class='btn btn-default btn-md'href='login.php'> <i class='fa fa-user-times'></i>&nbsp;Salir</a>"
              data-placement="bottom" 
              href="#" role="button" aria-expanded="false">
               <i class="fa fa-user fa-lg"></i><br/>Mi Cuenta
               </a> 
             </li>
<?php }else{ ?>
                <li role="presentation" class="dropdown">
                <a class="dropdown-toggle mains2" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="fa fa-user fa-lg"></i><br />Login
                </a>
    <ul class="dropdown-menu" role="menu">
     <li><a class="mains-sub"href="login.php"> <i class="fa fa-user-plus dust"></i>&nbsp;Login</a></li>
     <li><a class="mains-sub"href="register.php"> <i class="fa fa-pencil-square dust"></i>&nbsp;Registro</a></li>
    </ul>      
                 </li>                 
<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- *****************************************TOP&NAV**********************************************************-->
<!-- ****************************************CONTENIDO*********************************************************-->
      
       <!-- Page Title -->
        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <i class="fa fa-th page-title-icon"></i>
                        <h2>Productos /</h2>
                        <p>Conoce todo lo que tenemos para ofrecerte</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="portfolio portfolio-page container">
            <div class="row">
                <div class="portfolio-navigator span12">
                    <h4 class="filter-portfolio">
                        <a class="all" id="active-imgs" href="#">Todos</a> /
                        <a class="Productos " id="" href="#">Productos</a> /
                        <a class="Servicios" id="" href="#">Servicios</a> /
                        <a class="Herramientas" id="" href="#">Herramientas</a>
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="portfolio-img">
                    <li data-id="p-1" data-type="Productos" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work1.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work1.jpg" alt="">
                            </a>
                            <h4>Canon PIXMA-MG</h4>
                            <p>Obtén una de las mejores multifuncionales de su generación a un bajo costo.</p>
                        </div>
                    </li>
                    <li data-id="p-2" data-type="Productos" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work2.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work2.jpg" alt="">
                            </a>
                            <h4>HDD Toshiba FD-16</h4>
                            <p>Resistente y con un diseño elegante, te ofrecemos la mejor calidad en HDD’s al mejor precio.</p>
                        </div>
                    </li>
                    <li data-id="p-3" data-type="Productos" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work3.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work3.jpg" alt="">
                            </a>
                            <h4>HUB USB Manhattan</h4>
                            <p>Extiende el poder de tu PC con este HUB de alta calidad, conéctate libremente.</p>
                        </div>
                    </li>
                    <li data-id="p-4" data-type="Productos" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work4.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work4.jpg" alt="">
                            </a>
                            <h4>HP Webcam HD 5210</h4>
                            <p>La mejor calidad de video para tu PC, que esperas para poder tomar video y fotografías de calidad.</p>
                        </div>
                    </li>
                    <li data-id="p-5" data-type="Servicios" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work5.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work5.jpg" alt="">
                            </a>
                            <h4>¡Actualízate !</h4>
                            <p>Actualiza tu sistema operativo y disfruta de nuevas y mejores características.</p>
                        </div>
                    </li>
                    <li data-id="p-6" data-type="Servicios" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work6.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work6.jpg" alt="">
                            </a>
                            <h4>Mantenimiento preventivo</h4>
                            <p>Mantén tu PC en óptimas condiciones, dándole mantenimiento preventivo.</p>
                        </div>
                    </li>
                    <li data-id="p-7" data-type="Servicios" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work7.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work7.jpg" alt="">
                            </a>
                            <h4>Mantenimiento correctivo</h4>
                            <p>Reparamos tu PC pero al mismo tiempo te ofrecemos calidad en el servicio.</p>
                        </div>
                    </li>
                    <li data-id="p-8" data-type="Servicios" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work8.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work8.jpg" alt="">
                            </a>
                            <h4>Componentes</h4>
                            <p>Te hacemos una cotización y cambiamos los componentes de tu PC, todo al mejor precio.</p>
                        </div>
                    </li>
                    <li data-id="p-9" data-type="Servicios" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work9.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work9.jpg" alt="">
                            </a>
                            <h4>Instalación de programas</h4>
                            <p>Te instalamos los programas, te otorgamos la licencia junto con el mejor servicio, CompuMark.</p>
                        </div>
                    </li>
                    <li data-id="p-10" data-type="Herramientas" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work10.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work10.jpg" alt="">
                            </a>
                            <h4>Desarrollo de aplicaciones</h4>
                            <p>Te ofrecemos soluciones basadas en las mejores tecnologías, y un desempeño formidable.</p>
                        </div>
                    </li>
                    <li data-id="p-11" data-type="Herramientas" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work11.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work11.jpg" alt="">
                            </a>
                            <h4>Diseño Grafico</h4>
                            <p>Diseños modernos, llamativos y perfectos para ti, compruébalo en CompuMark.</p>
                        </div>
                    </li>
                    <li data-id="p-12" data-type="Herramientas" class="span3">
                        <div class="work">
                            <a href="herramientas/img/portfolio/work12.jpg" rel="prettyPhoto">
                                <img src="herramientas/img/portfolio/work12.jpg" alt="">
                            </a>
                            <h4>Instituto iMark</h4>
                            <p>Te ofrecemos desde capacitaciones hasta carreras técnicas, ¿Qué esperas? ¡Conócenos!.</p>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    
<!-- ****************************************CONTENIDO*********************************************************-->
<!-- ******************************************FOOTER**********************************************************-->
 
        <footer>
            <div class="container">
                <div class="row">
                    <div class="widget span3">
                        <h4>Acerca de nosotros</h4>
                        <p>CompuMark (computación y mercadotecnia integral) nace el 21 de mayo de 1996 en la ciudad de Acámbaro Guanajuato.Fue fundada por su creador L.R.C Antoni Martin Novas Guerrero como un negocio familiar, apoyado a diversas empresas en la solución de sus problemas con...</p>
                        <p><a href="acerca.php">Leer mas...</a></p>
                    </div>
                    <div class="widget span3">
                        <h4>Regálanos un Like</h4>
                       <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FCompumark%2F505987686131057&;width=auto&amp;height=198&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95%;; height:198px;" allowTransparency="true"></iframe>
                       </div>
                    <div class="widget span3">
                        <h4>Regálanos otro Like</h4>
                       <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Finstituto.imarc&;width=auto&amp;height=198&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95%;; height:198px;" allowTransparency="true"></iframe>
                       </div>
                    <div class="widget span3">
                        <h4>Contáctanos</h4>
                        <p><i class="fa fa-map-marker"></i> Direccion: <a href="https://goo.gl/maps/0l7Hb" target="_blank">Guadalupe Victoria #333-A</a></p>
                        <p><i class="fa fa-globe"></i>Ubicación: <a href="https://goo.gl/maps/3zrCV" target="_blank">Acámbaro,Gunanajuato,Mexico</a></p>
                        <p><i class="fa fa-phone"></i> Telefono: <a href="tel:+4171729096">(417) 17-2-90-96</a></p>
                        <p><i class="fa fa-user"></i> Facebook: <a href="https://www.facebook.com/pages/Compumark/505987686131057">CompuMark</a></p>
                        <p><i class="fa fa-envelope"></i> Email: <a href="mailto:compu-mark@hotmail.com">Click Aqui</a></p>
                    </div>
                </div>
                <div class="footer-border"></div>
                <div class="row">
                    <div class="copyright span4">
                       <p><i class="fa fa-code fa-lg"></i> 2015 DESPAW <i class="fa fa-copyright"></i></p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="herramientas/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/jquery.ui.map.min.js"></script>
        <script src="js/jquery.quicksand.js"></script>
        <script src="herramientas/prettyPhoto/js/jquery.prettyPhoto.js"></script>
        <script src="js/scripts.js"></script>
        
    <script>
    $('.usuTooltip').tooltip({ html : true});
    </script>
        
    <script>
    $('.usuPopover').popover({ html : true});
    </script>
    <script>
    $('.logPopover').popover({ html : true});
    </script>

        </body>
        </html> 
<!-- ******************************************FOOTER**********************************************************-->
 