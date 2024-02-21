<?php

require '../config/autoload.php';
include '../config/connexion.php';
$enclosManager = new EnclosManager($db);
$enclosarray = $enclosManager->getEnclosAjax($_POST['zoo_id']);
$countarray = count($enclosarray);
if ($countarray < 3) {
    if (!empty($_POST['zoo_id'])&& !empty($_POST['enclos_type'])) {
    $enclosManager->AddEnclosDb($_POST['zoo_id'], $_POST['enclos_type'],$_POST['espece']);
    
        }
}else{
    echo 'pas de place';
}
$enclosarray = $enclosManager->getEnclosAjax($_POST['zoo_id']);
$zooManager = new ZooManager($db);
$countarray = count($enclosarray);
$zooManager->UpdatenbEnclos($countarray , $_POST['zoo_id']);


