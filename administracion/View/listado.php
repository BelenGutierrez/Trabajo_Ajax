<?php
ini_set('error_reporting', 0);

session_start();

if (!isset($_SESSION['logueado'])) {

	header("Location: login.php");
}
include "../Model/Conexion.php";
?>
<!DOCTYPE html>
<!--

-->
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../css/estilo.css" rel="stylesheet" type="text/css" />
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.10.3.custom.css"/>
		<script src="../../js/jquery-2.1.3.min.js"></script>
		<script src="../../js/jquery-ui-1.10.3.custom.js"></script>

		<script src="../../js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
		<script src="../../js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
		<link rel="stylesheet" href="../../js/jquery-ui-1.12.1.custom/jquery-ui.css">
		<script src="../../js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
		<script src="../Controller/ajax.js"></script>
		<title></title>


	</head>
	<body>

		<div id="container">
			<div id="header">
				<h3 class="text-center">Dashboard Excursiones</h3>

				<form action="../../index.php" method="post">
					<input class="volver" type="submit" value="Cerrar Sesión">
				</form>
			</div>


			<div id="content">
				<select id="selectorNElementos">
					<option value="1">1 filas</option>
					<option value="2">2 filas</option>
					<option value="4">4 filas</option>
				</select>
				<button id="paginaAnterior">Anterior</button>
				<button id="paginaSiguiente">Siguiente</button>
				
				
				<!-----------------------------AUTOCOMPLETE -------------------------------->
				<input id="autocomplete">
				
				
				<?php
				$accion = $_POST['action'];

				if (!isset($_SESSION['pagina'])) {
					$_SESSION['pagina'] = 1;
				}

				// LISTADO TOTAL----------------------------------------------------
				?>
				<div class="table-responsive">
					<table  class="table table-striped">
						<thead>
						<th class="columna" data-column="codigo">CODIGO&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th class="columna" data-column="categoria" >CATEGORIA</th>
						<th class="columna" data-column="nombre">NOMBRE&nbsp;&nbsp;</th>
						<th class="columna" data-column="precio">PRECIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th class="columna" data-column="imagen">IMAGEN&nbsp;&nbsp;</th>
						<th class="columna" data-column="oferta">OFERTA</th>
						<th class="columna" data-column="novedad">NOVEDAD</th>
						<th class="columna" data-column="detalle">DETALLE</th>
						<th class="columna" data-column="fecha_publicacion">FECHA_PUBLICACION</th>
						<th colspan="2">                            
							<button type="submit" id="nuevaExcursion" class="btn btn-success btn-sm"">
								<span class="glyphicon glyphicon-ok"></span> Añadir Excursión
							</button>
						</th>
						</thead>

						<?php
// PAGINACION ---------------------------------->
// MUESTRA PAGINA------------------------------------------------//

						$sentencia = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle FROM excursiones ";
//echo $sentencia;
						$conexion = Conexion::connectDB();
						$excursiones = $conexion->query($sentencia);
//print_r($excursiones);

						$numExcursiones = $excursiones->rowCount();
//echo $numExcursiones;
						$numPaginas = floor(abs($numExcursiones - 1) / 4) + 1;

						$pagina = $_POST['pagina'];

						if ($pagina == "primera") {
							$_SESSION['pagina'] = 1;
						}

						if (($pagina == "anterior") && ($_SESSION['pagina'] > 1)) {
							$_SESSION['pagina'] --;
						}

						if (($pagina == "siguiente") && ($_SESSION['pagina'] < $numPaginas)) {
							$_SESSION['pagina'] ++;
						}

						if ($pagina == "ultima") {
							$_SESSION['pagina'] = $numPaginas;
						}
						?>

						<tr>

							<!-- PRIMERA----------------------------------------->
							<td>
								<form action="#" method="post">
									<button type="submit" name="pagina" value="primera">
										<span class="glyphicon glyphicon-step-backward"></span>
										Primera
									</button>
								</form>
							</td>

							<!-- ANTERIOR--------------------------------->
							<td>
								<form action="#" method="post">
									<button type="submit" name="pagina" value="anterior">
										<span class="glyphicon glyphicon-chevron-left"></span>
										Anterior
									</button>
								</form>
							</td>

							<td>Pág <?= $_SESSION['pagina'] ?> de <?= $numPaginas ?></td>


							<!-- SIGUIENTE--------------------------------------------->
							<td>
								<form action="#" method="post">
									<button type="submit" name="pagina" value="siguiente">
										Siguiente
										<span class="glyphicon glyphicon-chevron-right"></span>
									</button>
								</form>
							</td>

							<!-- ULTIMA---------------------------------------------->
							<td>
								<form action="#" method="post">
									<button type="submit" name="pagina" value="ultima">
										Última
										<span class="glyphicon glyphicon-step-forward"></span>
									</button>
								</form>
							</td>  
							<td></td><td></td><td></td><td></td><td></td><td></td>
						</tr>
					</table>
				</div>

			<br><br>
			<!--Número de excursiones: <span id="totalExcursiones"></span>-->


			<div id="footer" class="text-center">
				© Belén Gutierrez
			</div>


			<!--------------------- MODAL PARA INSERTAR NUEVA EXCURSION --------------------------------------------------------------->

			<div id="alta" title="Nueva excursión:">
				<form id="formularioAlta" method="post" action="">
					<div class="inputFormularioAlta"><p>Codigo: </p><input id="codigoAlta" type="text" name="codigo"></div>
					<div class="inputFormularioAlta"><p>Categoria: </p><input id="categoriaAlta" type="text" name="categoria"></div>
					<div class="inputFormularioAlta"><p>Nombre: </p><input id="nombreAlta" type="text" name="nombre"></div>
					<div class="inputFormularioAlta"><p>Precio: </p><input id="preciotAlta" type="number" name="precio"></div>
					<div class="inputFormularioAlta"><p>Imagen: </p><input id="imagenAlta" type="text" name="imagen"></div>
					<div class="inputFormularioAlta"><p>Oferta: </p><input id="ofertaAlta" type="text" name="oferta"></div>
					<div class="inputFormularioAlta"><p>Novedad: </p><input id="novedadAlta" type="text" name="novedad"></div>
					<div class="inputFormularioAlta"><p>Detalle: </p><input id="detalleAlta" type="text" name="detalle"></div>
					<div class="inputFormularioAlta"><p>Fecha de Publicación: </p><input id="fechaPubliAlta" type="text" name="fecha_publicacion"></div>
				</form>
			</div>


			<!--------------------- MODAL PARA CONFIRMAR BORRADO DE LA EXCURSION ----------------------------------------------------->

			<div id="baja" title="Confirmación de borrado:">
				<h3>¿Está seguro de que desea borrar la excusión?</h3>
			</div>


			<!--------------------- MODIFICAR UNA EXCURSION ------------------------------------------------------------------------>

			<div id="modificar" title="Modificar excursión: ">
				<form id="formularioModificacion" method="post" action="">
					<div><p>Codigo:</p><input name="codigo" id="codigoModificacion" type="text"></div>
					<div><p>Categoria:</p><input name="categoria" id="categoriaModificacion" type="text"></div>
					<div><p>Nombre:</p><input name="nombre" id="nombreModificacion" type="text"></div>
					<div><p>Precio:</p><input name="precio" id="precioModificacion" type="number"></div>
					<div><p>Imagen:</p><input name="imagen" id="imagenModificacion" type="text"></div>
					<div><p>Oferta:</p><input name="oferta" id="ofertaModificacion" type="text"></div>
					<div><p>Novedad:</p><input name="novedad" id="novedadModificacion" type="text"></div>
					<div><p>Detalle:</p><input name="detalle" id="detalleModificacion" type="text"></div>
					<div><p>Fecha de Publicación:</p><input name="fecha" id="fechaPubliModificacion" type="text"></div>
				</form>
			</div>
	</body>
</html>
