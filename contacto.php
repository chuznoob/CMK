<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- *****************************************HEADER***********************************************************-->  
    <head>

        <meta charset="UTF-8">
        <title>Contacto</title>
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
                    <!-- KETCHUP-->
    <link href="css/herramientas/jquery.ketchup.css" rel="stylesheet">
    <link href="css/herramientas/jcomfirmaction.css" rel="stylesheet">

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
                            <a class="mains active" href="contacto.php"><i class="fa fa-envelope fa-lg"></i><br />Contacto</a>
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
                        <i class="fa fa-envelope page-title-icon" ></i>
                        <h2>Contacto /</h2>
                        <p>En esta página encontraras información para comunicarte con nosotros </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="contact-us container">
            <div class="row">
                <div class="contact-form span7">
                    <p>Con este formulario puedes enviarnos tus datos para ponernos en contacto contigo para realizar aclaraciones, solicitudes o la cotización de algún servicio, <span class="violet2">Compu</span>-<span class="red2">Mark</span> siempre en contacto contigo.</p>
<?php if(isset($_SESSION['sesion']))
{ ?>    
                    <form method="post" class="validator" action="lib/ops_contacto/UpContacto.php">
            <input id="name" type="hidden" name="cliente_id_Cliente" value="<?php echo $_SESSION['id_Cliente']; ?>"  >
                        <label for="subject"> <i class="fa fa-tags"></i>&nbsp; Asunto:</label>
                <input id="subject" type="text" name="asunto_contacto" 
                data-validate="validate(required,maxlength(45))"         
                placeholder="Ingrese su asunto..." >
                       
                        <label for="message"><i class="fa fa-comment"></i>&nbsp; Mensaje:</label>
                          <textarea type="text" id="message" name="text_contacto" 
                           data-validate="validate(required,maxlength(500))"  
                          placeholder="Ingrese su Mensaje..."></textarea>
                        <button type="submit">Enviar</button>
                    </form>
<?php }else{ ?>
          
                <form method="post" action="#">
                        <label for="subject"> <i class="fa fa-tags"></i>&nbsp; Asunto:</label>
                          <input id="subject" type="text" name="subject" placeholder="Ingrese su asunto..." disabled>
                        <label for="message"><i class="fa fa-comment"></i>&nbsp; Mensaje:</label>
                          <textarea id="message" name="message" placeholder="Ingrese su Mensaje..." disabled></textarea>
                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal5">Información&nbsp;<i class="fa fa-question-circle fa-x"></i>
                       </button>
                    </form>
                         
<?php } ?>
               
                </div>
                <div class="contact-address span5">
                    <h4>Encuentranos Aquí</h4>
                    <div class="map"></div>
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
        

<!-- **********************************Modal 5************************************************************** -->          
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
 Por el momento no puede contactarnos debido a que necesitamos sus datos para responder,inicie sesión <a href="login.php" class="violet2">Aquí</a>, si usted no tiene una cuenta regístrese gratuitamente <br><a href="login.php" class="red2">en este link</a>.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
<!-- **********************************Modal 5************************************************************** -->
<!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>
    <script src="js/ketchup/jquery.js"></script>
    <script src="js/ketchup/jquery.ketchup.js"></script>
    <script src="js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="js/ketchup/jconfirmaction.jquery.js"></script>
    
    <script> 
      $(document).ready(function(){
          $('.validator').ketchup();
      });
  </script>
        <!-- Javascript -->
        <script src="herramientas/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.tweet.js"></script>
        <script src="js/jflickrfeed.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/jquery.ui.map.min.js"></script>
        <script src="js/jquery.quicksand.js"></script>
        <script src="herramientas/prettyPhoto/js/jquery.prettyPhoto.js"></script>
         <script src="js/messages.js"></script>
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
 