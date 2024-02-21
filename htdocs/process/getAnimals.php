<?php
include '../config/autoload.php';
require '../config/connexion.php';
$animalManager = new AnimalManager($db);
$animals = $animalManager->getAnimalsArray($_POST['id']);

echo json_encode($animals);