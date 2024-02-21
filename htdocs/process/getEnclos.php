<?php
include '../config/autoload.php';
require '../config/connexion.php';
$enclosManager = new EnclosManager($db);
$enclosarray = $enclosManager->getEnclosAjax($_POST['zoo_id']);
echo json_encode($enclosarray);




?>