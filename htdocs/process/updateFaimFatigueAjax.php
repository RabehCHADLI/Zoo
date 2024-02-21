<?php
include '../config/autoload.php';
require '../config/connexion.php';

$enclosManager = new EnclosManager($db);
$enclos = $enclosManager->getEnclosAjax($_POST['zoo_id']);
$animalManager = new AnimalManager($db);

foreach ($enclos as $key) {
    $animals = $animalManager->SetFatigueAndFaim($key['id']);
}