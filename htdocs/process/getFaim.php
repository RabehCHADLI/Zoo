<?php
include '../config/autoload.php';
require '../config/connexion.php';
$animalManager = new AnimalManager($db);
$animal = $animalManager->getAnmalById(77);
$faim = ['faim' => $animal['faim']];
echo json_encode($faim);