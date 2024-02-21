<?php 
include '../config/autoload.php';
include '../config/connexion.php';
$animalManager = new AnimalManager($db);
$animal = $animalManager->getAnmalById($_POST['ani_id']);
$animalManager->AddNourriture($animal);
