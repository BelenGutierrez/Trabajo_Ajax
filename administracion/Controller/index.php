<?php
  require_once '../Model/Excursion.php';
  // Obtiene todos las excursiones
  $data['excursiones'] = Excursion::getExcursiones();
  // Carga la vista de listado
  include '../View/listado.php';

