<?php


class Poissons extends Animals 
{
    private string $image = 'poissons.pnj';
    public function son(Animals $animals)
    {
        echo 'JE Bloubloublou' ;
    }

}