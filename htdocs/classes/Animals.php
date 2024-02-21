<?php
abstract class Animals
{   
   private int $id;
   private string $espece;
   private string $name;
   private bool $sante = true ;
   private int $fatigue = 100;
   private int $faim = 100;
   private int $poids = 5;
   private int $taille = 50 ;
   private int $age = 0;
   private int $enclos_id;
   



//    public function __construct($name , $espece , $poid , $taille , $age = 0)
//    {
//         $this->espece = $espece;
//         $this->name = $name;
//         $this->poids = $poid;
//         $this->taille = $taille;
//         $this->age = $age;
//    }
public function __construct(array $data)
{
    $this->hydrate($data);
}
public function hydrate(array $data){
    foreach ($data as $key => $value) {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }
}


//GETTER
    public function getSante(){
        return $this->sante;
    }
    public function getFatigue(){
        return $this->fatigue;
    }
    public function getPoids(){
        return $this->poids;
    }
    public function getName(){
        return $this->name;
    }
    public function getTaille(){
        return $this->taille;
    }
    public function getAge(){
        return $this->age;
    }
    public function getEspece(){
        return $this->espece;
    }
    public function getFaim(){
        return $this->faim;
    }
    public function getId(){
        return $this->id;
    }
    public function getEnclosId(){
        return $this->enclos_id;
    }
//SETTER
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEspece($espece)
    {
        $this->espece = $espece;
    }
    public function setSante($sante)
    {
        $this->sante = $sante;
    }
    public function setFatigue($fatigue)
    {
        $this->fatigue = $fatigue;
    }
    public function setPoint($poid)
    {
        $this->poids = $poid;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setTaille($taille)
    {
        $this->taille = $taille;
    }
    public function setFaim($faim){
        $this->faim = $faim;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setEnclosId($enclos_id){
        $this->enclos_id = $enclos_id;
    }


    }
