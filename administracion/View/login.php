<?php
ini_set('error_reporting',0);
//session_start();

include "../Model/Conexion.php";

?>
<!DOCTYPE html>
<!--

-->
<html>
  <head>
    <meta charset="UTF-8">
    <link href="../../css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <div class="bodyAdm">
      <div id="header">
        <h1>ADMINISTRACIÓN</h1>
        <h2>Acceso con login</h2>
      </div>

      <div id="content">
        <br><br>
        <?php
        
		$conexion = Conexion::connectDB();
        $sentencia = "SELECT nombre, password FROM usuario";
        $datosUsuarios = $conexion->query($sentencia);



        //---------------- inicializo logueado-------------------------//

        if (!isset($_SESSION['logueado'])) {
          $_SESSION['logueado'] = false;
        }

        //---------------- verifico el login-------------------------//
        $count = 0;
        while ($pass = $datosUsuarios->fetchObject()) {
          if ($pass->nombre == $_POST['nom'] && $pass->password== $_POST['pass']) {
            $count++;
          }
        }
		//var_dump($pass);

        if (isset($_POST['nom'])) {
          if ($count == 1) {
			session_start();
            $_SESSION['logueado'] = true;
            header("Location: listado.php");
          } else {
            echo '<span style="color: red">Verifique los datos. Inténtelo de nuevo.</span><br><br>';
          }
        }

        ?>


        <h3>Por favor introduzca los datos para acceder</h3>
        <form action="#" method="post">
          Usuario:
          <input type="text" name ="nom" required autofocus>
          Contraseña:
          <input type="text" name ="pass" required>

          <input type="submit" value="OK">
        </form>

        <br><br><br><br><br><br><br><br><br><br><br><br>



        <div id="footer">
          © Belén Gutierrez
        </div>
      </div>
    </div>
  </body>
</html>
