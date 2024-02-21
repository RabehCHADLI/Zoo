<?php
include '../config/autoload.php';
require '../config/connexion.php';

$enclosManager = new EnclosManager($db);
$enclos = $enclosManager->getEnclosId($_POST['enclos_id_del']);
$enclosManager->delEnclos($_POST['enclos_id_del']);
header('Location: ../zoo.php?zoo_id=' . $enclos[0]['zoo_id']);