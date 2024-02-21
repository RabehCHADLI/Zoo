<?php


abstract class Enclos
{
    private int $id;
    private array $animaux = [];
    private string $typeEnclos;
    private string $statut ;
    private int $nb_animaux = $this->getNbAnimaux();
    private string $especeAnimaux;
    private int $zoo_id ;



    public function __construct($typeEnclos , $especeAnimaux = null ,$statut = 'correct')
    {
        $this->typeEnclos = $typeEnclos;
        $this->especeAnimaux = $especeAnimaux;
        $this->statut = $statut;
    }

    //GETTER
    public function getAnimaux()
    {
        return $this->animaux;
    }
    public function getType()
    {
        return $this->typeEnclos;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function getNbAnimaux()
    {
        $nbAnimaux = count($this->animaux);
        return $nbAnimaux;
    }
    public function getZooId()
    {
        return $this->zoo_id;
    }
    //SETTER
    public function AddAnimaux(Animals $animal)
    {
        $animauxEnclos = count($this->animaux);
        if ($animauxEnclos == 6){
            return "L'enclos est plein il en faut un autre";
        }elseif($this->especeAnimaux == $animal->getEspece()){
            array_push($this->animaux, $animal);

        }else{
            return 'Pas le bonne enclos';
        }
    }
    public function setType($Typeenclos)
    {
        $this->typeEnclos = $Typeenclos;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    public function setZooId($Zooid)
    {
        $this->statut = $Zooid;
    }

// AFFICHER SES STATS
    public function getStats()
    {
        $arrayStats = [];
        array_push($arrayStats,$this->getStatut());
        array_push($arrayStats,$this->getNbAnimaux());
        array_push($arrayStats,$this->getType());
        
    return $arrayStats;
    }


}