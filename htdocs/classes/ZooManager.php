<?php
class ZooManager 
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function AddZooDb($POSTuser_id ,$POSTnamezoo)
    
    {
        if(!empty($_POST['user_id']) && !empty($_POST['namezoo']) ){
            $preparedRequest = $this->db->prepare(' INSERT INTO `zoo`(`zoo_name`, `user_id`) VALUES (?,?)');
            $preparedRequest->execute([
                $POSTnamezoo,
                $POSTuser_id
            ]);
        }
    }
    public function getZooByName($namezoo)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `zoo` WHERE zoo_name = ?');
        $preparedRequest->execute([
            $namezoo
        ]);
        $zooarray = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $zooarray;
    }
    public function getZooByUserId($user_id)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `zoo` WHERE user_id = ?');
        $preparedRequest->execute([
            $user_id
        ]);
        $zooarray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $zooarray;
    }
    public function getZooAjax($user_id)
    {
        $preparedRequest = $this->db->prepare('SELECT * , zoo.id AS zoo_id FROM zoo INNER JOIN user ON zoo.user_id = user.id WHERE user_id = ?;
        ');
        $preparedRequest->execute([
            $user_id
        ]);
        $zooarray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $zooarray;
    }
    public function UpdatenbEnclos($nb_enclos, $zoo_id)
    {
        $preparedRequest = $this->db->prepare('UPDATE `zoo` SET `nb_enclos`=? WHERE id = ?');
        $preparedRequest->execute([
            $nb_enclos,
            $zoo_id
        ]);
    }   



}