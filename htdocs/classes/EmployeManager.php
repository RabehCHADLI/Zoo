<?php


class EmployeManager
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function AddEmployeDb($zooId, $name , $age , $sexe){
        $preparedRequest = $this->db->prepare('INSERT INTO `employe`(`zoo_id`, `name`, `age`, `sexe`) VALUES (?,?,?,?)');
        $preparedRequest->execute([
            $zooId,
            $name,
            $age,
            $sexe
        ]);
    }
}