<?php

class UserManager
{
    private PDO $db;


    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }
    public function addUser(string $POSTpseudo , string $POSTpassword)
    {
        $passwordHash = password_hash($POSTpassword,PASSWORD_DEFAULT);
        $preparedRequest = $this->db->prepare('INSERT INTO `user` (pseudo,password) VALUES (?,?)');
        $preparedRequest->execute([
        $POSTpseudo,
        $passwordHash
        ]);
    }
    public function connexion(string $POSTpseudo,string $POSTpassword)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $preparedRequest->execute([
            $POSTpseudo
        ]);
        $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $passwordVerify = password_verify($POSTpassword,$user['password']);
            if ($passwordVerify) {
                
                            $_SESSION['pseudo'] = $user['pseudo'];
                            $_SESSION['id'] = $user['id'];
                            return 'Vous avez bien été connecté';
                
            }else{
                return 'Mot de passe incorrect';
            }
        }else{
            return 'Pas de compte';
        }
    }
    public function getUserPseudo(string $POSTpseudo,string $POSTpassword)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $preparedRequest->execute([
            $POSTpseudo
        ]);
        $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}