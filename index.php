<?php
session_start();

session_destroy();

include "administracion/Model/Conexion.php";
?>
<!DOCTYPE html>
<!--

-->
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/flexboxgrid.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0"
          <title></title>
  </head>
  <body>
    <div id='cuerpo'>
      <img src="img/fondo3.jpeg">
    </div>
    <div id="container">
      <div id="header">
        <h1>Isla Mujeres</h1>
        <h2>Travel Agency</h2>
      </div>
      <ul class="nav">
        <li><a href="#" role="button"><span id="elem1"></span></a></li>
        <li><a href="#" role="button"><span id="elem2"></span></a></li>
        <li><a href="#" role="button"><span id="elem3"></span></a></li>
        <li><a href="#" role="button"><span id="elem4"></span></a></li>
      </ul>

      <div id="content">
        <div id="excursion">
          <div class="cabeceraExc">
            <h2>Excursiones</h2>

            <div class="news">
              <form action="administracion/View/login.php" method="post">
                <input type="hidden" name="accion" value="adm">                          
                <input id="adm" class="detalle"  type="submit" value="ADMINISTRACION">
              </form>
            </div>
          </div>
          <hr>

          <?php
          

          $sentencia = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle, fecha_publicacion FROM excursiones ";
          //echo $sentencia;
		  $conexion = Conexion::connectDB();
          $consulta = $conexion->query($sentencia);

          while ($articulo = $consulta->fetchObject()) {

            $_SESSION['excursiones'][$articulo->codigo] = array("categoria" => $articulo->categoria,
                "nombre" => $articulo->nombre, "precio" => $articulo->precio,
                "imagen" => $articulo->imagen, "oferta" => $articulo->oferta,
                "novedad" => $articulo->novedad, "detalle" => $articulo->detalle, "fecha_publicacion" => $articulo->fecha_publicacion);
          }

          //print_r($_SESSION['excursiones']);
          // ---------------Tienda ---------------------------------------------------
          ?>
          <div class="flex-container">

            <?php
            foreach ($_SESSION['excursiones'] as $articulo) {
              ?>

              <div class="flex-item">

                <img src="img/<?= $articulo['imagen'] ?>"><br>

                <h3><?= $articulo['nombre'] ?></h3>
                <p>Precio: <?= $articulo['precio'] ?> mxn</p>
                <p>Detalle:<br> <?= $articulo['detalle'] ?></p>

              </div>

              <?php
            }
            ?>

          </div>

        </div>

        <div class="galery">

          <ul class="galeria">

            <li><a href="#img1"><img src="img/galeria1.jpg"></a></li>
            <li><a href="#img2"><img src="img/galeria2.jpg"></a></li>
            <li><a href="#img3"><img src="img/galeria3.jpg"></a></li>
            <li><a href="#img4"><img src="img/galeria4.jpg"></a></li> 
            <li><a href="#img5"><img src="img/galeria5.jpg"></a></li>
          </ul>

          <div class="modal" id="img1">
            <h3>Imagen 1</h3>
            <div class="imagen">
              <a href="#img5">&lt;</a>
              <a href="#img2"><img src="img/galeria1.jpg"></a>
              <a href="#img2">></a>
            </div>
            <a class="cerrar" href="">X</a>
          </div>

          <div class="modal" id="img2">
            <h3>Imagen 2</h3>
            <div class="imagen">
              <a href="#img1">&lt;</a>
              <a href="#img3"><img src="img/galeria2.jpg"></a>
              <a href="#img3">></a>
            </div>
            <a class="cerrar" href="">X</a>
          </div>

          <div class="modal" id="img3">
            <h3>Imagen 3</h3>
            <div class="imagen">
              <a href="#img2">&lt;</a>
              <a href="#img4"><img src="img/galeria3.jpg"></a>
              <a href="#img4">></a>
            </div>
            <a class="cerrar" href="">X</a>
          </div>

          <div class="modal" id="img4">
            <h3>Imagen 4</h3>
            <div class="imagen">
              <a href="#img3">&lt;</a>
              <a href="#img5"><img src="img/galeria4.jpg"></a>
              <a href="#img5">></a>
            </div>
            <a class="cerrar" href="">X</a>
          </div>

          <div class="modal" id="img5">
            <h3>Imagen 5</h3>
            <div class="imagen">
              <a href="#img4">&lt;</a>
              <a href="#img1"><img src="img/galeria5.jpg"></a>
              <a href="#img1">></a>
            </div>
            <a class="cerrar" href="">X</a>
          </div>


        </div>


        <div id="footer">
          © Belén Gutierrez
        </div>
      </div>
    </div>
  </body>
</html>

