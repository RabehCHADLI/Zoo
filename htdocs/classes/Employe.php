<?php 
class Employé 
{
    private $name;
    private $age;
    private $sexe;

    public function examinerEnclos(Enclos $enclos)
    {
       return $enclos->getStats();
    }
        // MANGER DORMIR SOIGNER
        public function manger()
        {
    
        }
        public function dormir(Animals $animal)
        {
        }
        public function soigner()
        {
    
        }
}