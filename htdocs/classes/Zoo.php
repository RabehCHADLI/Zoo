<?php


class Zoo
{
    private $name;
    private $enclos = [];
    private $nb_enclos;
    private $employe_id;

    public function __construct($nb_enclos, $employe_id , $name)
    {
        
    }


    //SETTER
    public function AddEnclos(Enclos $enclos)
    {
        array_push($this->enclos, $enclos);
    }
    public function setEmployeId($id)
    {
        $this->employe_id = $id;
    }
    public function setNbEnclos(int $nb_enclos)
    {
        $this->nb_enclos = $nb_enclos;
    }
}