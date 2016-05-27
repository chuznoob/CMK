<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<!-- *****************************************HEADER***********************************************************-->  
    <head>

        <meta charset="UTF-8">
        <title>Registro</title>
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
                            <a class="brand" href="index.php"><img src="herramientas/img/logo.png"></a>
     
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
                                   <li role="presentation" class="dropdown">
            <a class="dropdown-toggle mains active" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <i class="fa fa-pencil-square fa-lg"></i><br />Registro
                                    </a>
    <ul class="dropdown-menu" role="menu">
     <li><a class="mains-sub"href="login.php"> <i class="fa fa-user-plus dust"></i>&nbsp;Login</a></li>
    </ul>
                                  </li>
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
                        <i class="fa fa-pencil-square page-title-icon" ></i>
                        <h2>Regístrate /</h2>
                        <p>Disfruta las muchas ventajas de ser usuario Compu-mark </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="contact-us container">
            <div class="row">
                <div class="contact-form span8">
                   
                    <form method="post" class="validator" action="lib/ops_registroUsuario/regValidar.php">
                        <label for="user"> <i class="fa fa-user"></i>&nbsp; Nombre de usuario:</label>
                          <input id="user" type="text" name="nom_cliente" 
                          data-validate="validate(required, rangelength(5, 10),maxlength(45))"
                          placeholder="Ingrese su nombre de usuario...">
                          
                        <label for="password"> <i class="fa fa-ellipsis-h"></i>&nbsp; Contraseña:</label>
                     <input id="password" type="password" name="pass_cliente" 
                     data-validate="validate(required, minlength(5),maxlength(45))"
                     placeholder="Ingrese su contraseña...">
                      
                      <label for="cor_cliente"> <i class="fa fa-at"></i>&nbsp; E-Mail:</label>
                     <input id="cor_cliente" type="email" name="cor_cliente" 
                     data-validate="validate(required, email,maxlength(45))"
                     placeholder="Ingrese su E-Mail...">
                      
                      <label for="tel_cliente"> <i class="fa fa-phone"></i>&nbsp; Teléfono:</label>
                     <input id="tel_cliente" type="tel" name="tel_cliente" 
                     data-validate="validate(required, number,maxlength(45))"
                     placeholder="Ingrese su teléfono...">
                      
                      <label for="dir_cliente"> <i class="fa fa-map-marker"></i>&nbsp; Dirección:</label>
                     <input id="dir_cliente" type="text" name="dir_cliente" 
                      data-validate="validate(required,maxlength(45))"
                      placeholder="Ingrese su dirección ...">
                       
                        <button type="submit">Enviar</button>
                    </form>
                </div>
                <div class="contact-form span4">
                    <img class="img_admin2"src="herramientas/img/social-icons/reg.png">
               
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

        </body>
        </html> 
<!-- ******************************************FOOTER**********************************************************-->
 