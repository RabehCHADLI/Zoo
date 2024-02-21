<?php
require_once '../config/connexion.php';
include '../config/autoload.php';
if (!empty($_POST['user_id']) && !empty($_POST['namezoo']) &&!empty($_POST['age']) && !empty($_POST['sexe']) && !empty($_POST['nameEmploye'])) {
$employeManager = new EmployeManager($db);
$zooManager = new ZooManager($db);


$zooManager->AddZooDb($_POST['user_id'],$_POST['namezoo']); 

$zoo = $zooManager->getZooByName($_POST['namezoo']);

$employeManager->AddEmployeDb($zoo['id'],$_POST['nameEmploye'], $_POST['age'],$_POST['sexe']);


}




?>