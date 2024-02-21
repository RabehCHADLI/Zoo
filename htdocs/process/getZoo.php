<?php
include '../config/autoload.php';
require '../config/connexion.php';
$zooManager = new ZooManager($db);
$zooarray = $zooManager->getZooAjax($_SESSION['id']);
echo json_encode($zooarray);




?>