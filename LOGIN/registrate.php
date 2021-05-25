<?php 
  require 'database.php';

$message = '';




 if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {

      header('location: /PROYECTO%20DE%20GRADO/LOGIN/login.php');;
    } else {

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
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>

<!----------------------- CABEZERA PARA LA PAGINA BB------------>
 <body>

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


</body>



<!----------------------- FORMULARIO PARA LA PAGINA BB------------>


    <form action="registrate.php" method="post" class="formulario"> 
      <br>
    <h1>Regístrate</h1>
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
        <input type="password" name="password" placeholder="Contraseña">
      </div>

       <input type="submit" value="ENVIAR" class="button" >
       <br><br>
  
      <p>¿Ya tienes una cuenta?<a class="link" href="login.php">Inicia Sesión</a></p>
      <p>Todos los derehos reservados Copyright ©2021 </p>

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