<?php

class EnclosManager
{
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }
    public function AddEnclosDb($POSTzooID , $POSTencloType , $POSTespece)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `enclos`( `zoo_id`,`enclos_type`,`espece_animal`) VALUES (?,?,?)');
        $preparedRequest->execute([
            $POSTzooID,
            $POSTencloType,
            $POSTespece
        ]);
    }
    public function UpdateEnclos($nb_enclos,$enclos_id)
    {
        $preparedRequest = $this->db->prepare('UPDATE `enclos` SET `nb_animaux`= ? WHERE id = ?');
        $preparedRequest->execute([
            $nb_enclos,
            $enclos_id
        ]);  
    }
    public function getEnclosAjax($zoo_id)
    {
        $preparedRequest=$this->db->prepare('SELECT * FROM `enclos` WHERE zoo_id = ?');
        $preparedRequest->execute([
            $zoo_id
        ]);
        $enclosarray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $enclosarray;

    }
    public function getEnclosId($enclos_id)
    {
        $preparedRequest=$this->db->prepare('SELECT * FROM `enclos` WHERE id = ?');
        $preparedRequest->execute([
            $enclos_id
        ]);
        $enclosarray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $enclosarray;

    }
    public function delEnclos($enclos_id)
    {
        $preparedRequest = $this->db->prepare('DELETE FROM `enclos` WHERE id = ?');
        $preparedRequest->execute([
            $enclos_id
        ]);
        
    }
    public function journeUpdate(Enclos $enclos)
    {
        
    }
}