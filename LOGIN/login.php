<?php 
session_start();

 require 'database.php'; 
 if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['users_id'] = $results['id'];
      header('location: /PROYECTO DE GRADO/index.php');
    } else {

  $message = '¡Correo o Contraseña incorrectos!';
    }

 }

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
  <title>PROYECTO DE GRADO</title>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <script src="https://kit.fontawesome.com/43efad9d3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="estilos.css">
  </head>
  <body>

 <!----------------------- CABEZERA PARA LA PAGINA BB------------>
 

<header >
    <a href="#" class="logo">RODITAS</a>
    <ul>
       <li><a href="/PROYECTO%20DE%20GRADO/LOGIN/registrate.php">Regístrate</a></li>
       <li><a href="/PROYECTO%20DE%20GRADO/LOGIN/login.php">Inicia Sesión</a></li>
      <li><a href="/PROYECTO%20DE%20GRADO/cabecera/quienes_somos.html">Acerca de mi</a></li>
      <li><a href="/PROYECTO%20DE%20GRADO/cabecera/objetivo.html">Objetivo</a></li>
    </ul>
    </header>
      <section class="banner"> </section>
     <script type="text/javascript">
       window.addEventListener("scroll", function() {
         var header = document.querySelector("header");
         header.classList.toggle("sticky", window.scrollY > 0);
       })
     </script>

<!----------------------- FORMULARIO LOGIN--------------------->

    <form action="login.php" method="POST" class="formulario">
    <br>
    <h1>Inicia Sesión</h1>
     <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>

    <?php endif; ?>
    <div class="contenedor">
      <div class="registros">   
        <i class="fas fa-envelope icon"></i>
        <input type="text" name="email" placeholder="Correo Electrónico">
      </div>
      <div class="registros">   
        <i class="fas fa-key icon"></i>
        <input name= "password" type="password" placeholder="Contraseña">

      </div>
        <input type="submit" value="ENVIAR" class="button">
        <br><br>
      <p>¿No tienes una cuenta?<a href="registrate.php" class="link">¡Regístrate!</a></p>


    </div>
  </form>

<!----------------------- FOOTER BB----------------------->

<br><br><br><br><br><br><br><br><br>
  <footer class="footer">
        <div class="inner-footer">
        <div class="social-links">
          <ul>
          <li class="social-items"><a href="https://www.facebook.com/israel.rodas.50/"><i class="fab fa-facebook"></i></a></li>
          <li class="social-items"><a href="https://www.instagram.com/isrodas28/"><i class="fab fa-instagram"></i></a></li>
          <li class="social-items"><a href="https://www.pinterest.es/Roditas28/_saved/"><i class="fab fa-pinterest-square"></i></a></li>  
          </ul>  
        </div>
        
       <div class="quick-links">
        <ul>
          <li class="quick-items"><a>Created by: Israel Rodas</a></li>
        </ul>
        </div>
        </div>
        <div class="outer-footer">
          Copyright &copy; Todos los derechos reservados. 
        </div>
     </footer>
  </body>
</html>
