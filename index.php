<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- *****************************************HEADER***********************************************************-->  
    <head>

        <meta charset="UTF-8">
        <title>Página Principal</title>
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
                                 <a class="mains"  href="productos.php"><i class="fa fa-th fa-lg"></i><br />Productos</a>
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
        
      <!-- Slider -->
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="span10 offset1">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="herramientas/img/slider/1.jpg">
                                    <img src="herramientas/img/slider/1.jpg">
                                    <p class="flex-caption">Has clic en el logo de la pagina o logeate <a href="login.php" class="violet2">Aqui</a></p>
                                </li>
                                <li data-thumb="herramientas/img/slider/2.jpg">
                                    <img src="herramientas/img/slider/2.jpg">
                                   <p class="flex-caption">Obtenga el rendimiento del nivel de Intel al que esta habituado y una calidad en la que puede confiar con un procesador Intel Celeron.</p>
                                </li>
                                <li data-thumb="herramientas/img/slider/3.jpg">
                                    <img src="herramientas/img/slider/3.jpg">
                                    <p class="flex-caption">El DataTraveler 101G2 incorpora un protector giratorio sin tapa, y se puede personalizar con el logotipo de su empresa, lo que constituye una excelente manera de promocionar su negocio. </p>
                                </li>
                                <li data-thumb="herramientas/img/slider/4.jpg">
                                    <img src="herramientas/img/slider/4.jpg">
                                </li>
                                 <li data-thumb="herramientas/img/slider/5.jpg">
                                    <img src="herramientas/img/slider/5.jpg">
                                    <p class="flex-caption">Unete a nuestro equipo.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Site Description -->
        <div class="presentation container">
            <h2>Bienvenido a <span class="violet">Compu</span><span class="red">Mark</span>, una pyme enfocada a brindar buenos servicios y ventas de calidad.</h2>
            <p>"Lo unico constante es el Cambio"</p>
        </div>

        <!-- Services -->
        <div class="what-we-do container">
            <div class="row">
               <div class="service span3">
                    <div class="icon-awesome">
                         <i class="fa fa-wrench "></i>&nbsp;<i class="fa fa-desktop "></i>
                    </div>
                    <h4>Reparación de equipos</h4>
                    <p>CompuMark le ofrece una variedad de soluciones para la reparación de su equipo, con atención personalizada y...</p>
                    <a href="servicios.php">Conoce más</a>
                </div>
                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="fa fa-shopping-cart"> </i>&nbsp;<i class="fa fa-plus-circle"></i>
                    </div>
                    <h4>Accesorios para tu PC/Mac</h4>
                    <p>CompuMark te mantiene a la vanguardia en tecnología con su amplia gama de accesorios como dispositivos USB y...</p>
                    <a href="productos.php">Conoce más</a>
                </div>
                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="fa fa-tasks"></i>&nbsp;<i class="fa fa-pencil"></i>
                    </div>
                    <h4>El instituto iMarc </h4>
                    <p>Con ayuda de CompuMark enfréntate a la nueva era de la tecnología, en el instituto i-Mark contamos con ...</p>
                    <a href="servicios.php">Conoce más</a>
                </div>
                <div class="service span3">
                    <div class="icon-awesome">
                        <i class="fa fa-send"></i>&nbsp;<i class="fa fa-heart"></i>
                    </div>
                    <h4>Contáctate con nosotros</h4>
                    <p>Comunícate con nosotros si requieres la cotización de algún servicio, para aclaraciones de dudas, lo único que debes hacer es...</p>
                    <a href="contacto.php">Conoce más</a>
                </div>
            </div>
        </div>

        <!-- Latest Work -->
        <div class="portfolio container">
            <div class="portfolio-title">
                <h3>Ultimas noticias</h3>
            </div>
            <div class="row">
                <div class="work span3">
                    <img src="herramientas/img/news/1.jpg" alt="">
                    <h4>Se solicita nuevo personal</h4>
                    <p>CompuMark solicita nuevo personal, intégrate a nuestro equipo de trabajo.</p>
                    <div class="icon-awesome">
                        <a href="herramientas/img/news/1.jpg" rel="prettyPhoto">
                        <i class="fa fa-search"></i></a>
<a href="https://www.facebook.com/505987686131057/photos/pb.505987686131057.-2207520000.1417274873./741967682533055/?type=3&src=https%3A%2F%2Ffbcdn-sphotos-e-a.akamaihd.net%2Fhphotos-ak-xpa1%2Fv%2Ft1.0-9%2F10489736_741967682533055_2462221274778675905_n.jpg%3Foh%3Df43e79494cb7c4ceccb1b31672823e4c%26oe%3D5513E6ED%26__gda__%3D1426508885_e6cf3b33a6e6890ffeadbb2bb1a26e73&size=960%2C720&fbid=741967682533055">
<i class="fa fa-link"></i>
</a>
                    </div>
                </div>
                <div class="work span3">
                    <img src="herramientas/img/news/2.jpg" alt="">
                    <h4>Inicio de cursos este mes</h4>
                    <p>Te invitamos a formar parte del instituto iMarc y ser parte de una institución de excelencia.</p>
                    <div class="icon-awesome">
                        <a href="herramientas/img/news/2.jpg" rel="prettyPhoto"><i class="fa fa-search"></i></a>
                        <a href="https://www.facebook.com/instituto.imarc">
                        <i class="fa fa-link"></i></a>
                    </div>
                </div>
                
                <div class="work span3">
                    <img src="herramientas/img/news/3.jpg" alt="">
                    <h4>El buen fin casi termina</h4>
                    <p>Aprovecha las ofertas del buen fin, ultimo día con el mayor descuento.</p>
                    <div class="icon-awesome">
                        <a href="herramientas/img/news/3.jpg" rel="prettyPhoto">
                        <i class="fa fa-search"></i></a>
<a href="https://www.facebook.com/505987686131057/photos/pb.505987686131057.-2207520000.1417275328./799911460072010/?type=3&theater">
<i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="work span3">
                    <img src="herramientas/img/news/4.jpg" alt="">
                    <h4>El buen fin está aquí</h4>
                    <p>Aprovecha los descuentos desde el día 14 hasta el 17 de noviembre.</p>
                    <div class="icon-awesome">
                        <a href="herramientas/img/news/4.jpg" rel="prettyPhoto">
                        <i class="fa fa-search"></i></a>
<a href="https://www.facebook.com/505987686131057/photos/pb.505987686131057.-2207520000.1417274873./800428390020317/?type=3&src=https%3A%2F%2Fscontent-a.xx.fbcdn.net%2Fhphotos-xpa1%2Fv%2Ft1.0-9%2F1509663_800428390020317_4770581451446194733_n.jpg%3Foh%3D999032855c9724a29b2970985f576422%26oe%3D550D89CF&size=444%2C520&fbid=800428390020317">
<i class="fa fa-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        

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
    $('.usuPopover').popover({ html : true});
    </script>
        
    <script>
    $('.logPopover').popover({ html : true});
    </script>
        


        </body>
        </html> 
<!-- ******************************************FOOTER**********************************************************-->
   