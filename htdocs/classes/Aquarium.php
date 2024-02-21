<?php
class Aquarium extends Enclos
{
    private $salinite = 2;

    public function getSalinite($salinite)
    {
        $this->salinite = $this->salinite + $salinite;
    }
}