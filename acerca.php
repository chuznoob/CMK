<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- *****************************************HEADER***********************************************************-->  
    <head>

        <meta charset="UTF-8">
        <title>Conocenos</title>
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
                                 <a class="mains active" href="acerca.php"><i class="fa fa-users fa-lg"></i><br />Conocenos</a>
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
        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <i class="fa fa-users page-title-icon"></i>
                        <h2>Conocenos /</h2>
                        <p>Abajo encontraras más información acerca de nuestra empresa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us container">
            <div class="row">
                <div class="about-us-text span12">
                
                   <h4> <i class="fa fa-info-circle fa-lg"></i> &nbsp; Acerca de CompuMark</h4>
                   <p> CompuMark (computación y mercadotecnia integral) nace el 21 de mayo de 1996 en la ciudad de Acámbaro Guanajuato. Fue fundada por su creador L.R.C Antoni Martin Novas Guerrero como un negocio familiar, apoyado a diversas empresas en la solución de sus problemas con sistemas de cómputo, capacitación y asesorías. Posterior mente se desarrollaron sistemas de control de inventarios no solo como solución informática, si no como un paquete integral con atención a clientes y mercadotecnia.
                       Es por ello que el producto fuerte del negocio es el desarrollo de programas.
                       En las instalaciones, se inició con un pequeño ciber  y oficina, se fue moviendo el negocio en mejores ubicaciones tanto como el sitio como el tamaño. Se buscaba un lugar céntrico y fácil de ubicar, al igual un espacio amplio para que entrara el taller, las oficinas, el mostrador, y la sala de estadía.</p>
                    
                    
                   <h4><i class="fa fa-check-circle fa-lg"></i> &nbsp; Situación actual de la empresa</h4>
                    <p>Actualmente CompuMark se encuentra como una empresa familiar ya que junto con la L.C.S. María piedra Gonzales y una persona en el área de ventas, se ofrecen ahora más servicios, como reparación de equipos de cómputo también se cuenta con locales en los cuales se exhiben consumibles de cómputo y refacciones, también se ofrece a la venta de equipos nuevos, ya sean de marca o ensamblados, proyectores de sistemas de vigilancia; otros servicios adicionales al cliente son la impresión de trabajos, recargas de tiempo aire, captura de trabajos escolares y tesis, declaraciones y publicidad visual de temporada.</p>
                    
                    <h4><i class="fa fa-globe fa-lg"></i> &nbsp; Misión</h4>
                    <p>Sabemos que la tecnología está en bastante cambio, por eso ofrecemos servicios y productos para el desempeño de sus micro empresas ya sea tiendas  de abarrotes, supermercados, parroquias, y todos aquellos clientes que les guste la buena administración y control de sus inventarios.
                    Otorgar una amplia variedad de puntos de venta, tanto lo consumibles como equipos para este.
                    Distribuir nuestros productos por mayoreo y menudeo y darles capacitación a nuestros clientes y sus subordinados para llevar un control e inventario de sus productos, y un buen manejo de los programas de punto de ventas.</p>
                    
                    <h4><i class="fa fa-share-alt fa-lg"></i> &nbsp; Visión</h4>
                    <p>Estar siempre a la vanguardia y establecer más sucursales, ya que se cuentan con clientes de diferentes zonas, y así estar más cerca de usted.  </p>
                    
                </div>
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
 

