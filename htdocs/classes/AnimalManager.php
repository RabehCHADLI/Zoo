<?php
class AnimalManager
{
    private PDO $db;


    public function __construct($db)
    {
        $this->db = $db;
    }
    public function AddAnimalDb(Animals $animal)
    {
        $prepareRequest = $this->db->prepare('INSERT INTO `animaux`(`espece`, `Faim`, `fatigue`, `enclos_id`, `name`, `sante`, `poids`, `taille`) VALUES (?,?,?,?,?,?,?,?)');
        $prepareRequest->execute([
            $animal->getEspece(),
            $animal->getFaim(),
            $animal->getFatigue(),
            $animal->getEnclosId(),
            $animal->getName(),
            $animal->getSante(),
            $animal->getPoids(),
            $animal->getTaille(),
        ]);
    }
    public function getAnimalsArray($enclos_id)
    {
        $prepareRequest = $this->db->prepare('SELECT * FROM `animaux` WHERE enclos_id = ?');
        $prepareRequest->execute([
            $enclos_id
        ]);
        $animalsarray = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        return $animalsarray;
    }
    public function getAnimalObject($animal_id)
    {

            $prepareRequest= $this->db->prepare('SELECT * FROM `animaux`WHERE id = ?');
            $prepareRequest->execute([
                $animal_id
            ]);
            $animal = $prepareRequest->fetch(PDO::FETCH_ASSOC);
    }
    public function getAnimalsObject($enclos_id)
    {
        $prepareRequest = $this->db->prepare('SELECT * FROM `animaux` WHERE enclos_id = ?');
        $prepareRequest->execute([
            $enclos_id
        ]);
        $animalsarray = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        $objectArray = [];
        foreach ($animalsarray as $animal) {
            $annimal = new $animal["espece"]($animal['name'],$animal['espece'], 1 , 70, $animal['image']);
            $annimal->setId($animal['id']);
            array_push($objectArray , $annimal);
        }
        return $objectArray;
    }
    public function updateAnimal(Animals $animal)
    {
        $prepareRequest = $this->db->prepare('UPDATE `animaux` SET `Faim`=?,`fatigue`=?,`sante`=?,`poids`=?,`taille`=? WHERE id = ?');
        $prepareRequest->execute([
            $animal->getFaim(),
            $animal->getFatigue(),
            $animal->getSante(),
            $animal->getPoids(),
            $animal->getTaille(),
            $animal->getId()
        ]);
    }
    public function journeUpdate(Animals $animal)
    {
        
    }
    public function getAnmalById($animal_id)
    {
        $prepareRequest= $this->db->prepare('SELECT * FROM `animaux`WHERE id = ?');
        $prepareRequest->execute([
            $animal_id
        ]);
        $animal = $prepareRequest->fetch(PDO::FETCH_ASSOC);
        return $animal;
    }
    public function AddNourriture(array $animal)
    {
        if ($animal['sante'] == 0) {
            $randNourriture = rand(2,30);
        }else{
            $randNourriture = rand(20,30);
        }
        $animal['faim'] = $animal['faim'] + $randNourriture;
        $prepareRequest = $this->db->prepare('UPDATE `animaux` SET `faim` = ? WHERE id = ?');
        $prepareRequest->execute([
            $animal['faim'],
            $animal['id']
        ]);

        
    }
    public function SetFatigueAndFaim($enclos_id)
    {
        $prepareRequest = $this->db->prepare('SELECT * FROM `animaux` WHERE enclos_id = ?');
        $prepareRequest->execute([
            $enclos_id
        ]);
        $animals = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
        foreach ($animals as $animal) {
        if ($animal['faim']> 0  && $animal['fatigue'] > 0 || $animal['faim']> 0 && $animal['fatigue']<=0 ||  $animal['faim']<= 0 && $animal['fatigue'] >0) {
           
            if ($animal['sante'] == 0 ) {
                $randFatigue  = rand(6,10);
                $randFaim = rand(4,10);
        
            }else{
                $randFatigue  = rand(3,5);
                $randFaim = rand(2,5);
            }
            $animalFaim = $animal['faim']- $randFaim;
            $animalFatigue = $animal['fatigue'] - $randFatigue;
            $prepareRequest = $this->db->prepare('UPDATE `animaux` SET `faim` = ?,`fatigue`= ? WHERE id = ?');
            $prepareRequest->execute([
                $animalFaim,
                $animalFatigue,
                $animal['id']
            ]);
        }elseif($animal['faim']<= 0 && $animal['fatigue']<=0 ){

        }
            
        }
    }
    
}   