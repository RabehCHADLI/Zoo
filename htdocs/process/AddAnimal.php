<?php 
include '../config/autoload.php';
include '../config/connexion.php';
$animalManager = new AnimalManager($db);
$animauxArray = $animalManager->getAnimalsArray($_POST['enclos_id']);
$countarray = count($animauxArray);
var_dump($animauxArray);
if (!$animauxArray) {
    if (!empty($_POST['espece']) && !empty($_POST['name'])) {
        $enclosManager = new EnclosManager($db);
        $enclosManager->UpdateEnclos($countarray,$_POST['enclos_id']);
        $animal = new $_POST['espece']($_POST);
        
        $animalManager = new AnimalManager($db);
        $animalManager->AddAnimalDb($animal);
}
     
}else{

    if ($countarray < 6) {
        if (!empty($_POST['espece']) && !empty($_POST['name']) && $animauxArray[0]['espece'] == $_POST['espece']) {
                $enclosManager = new EnclosManager($db);
                $enclosManager->UpdateEnclos($countarray,$_POST['enclos_id']);
                $animal = new $_POST['espece']($_POST);
                
                $animalManager = new AnimalManager($db);
                $animalManager->AddAnimalDb($animal);
        }
               
           
    }
}
?>