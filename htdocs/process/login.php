<?php
include '../config/autoload.php';
require_once '../config/connexion.php';


$userManager = new UserManager($db);
$user = $userManager->getUserPseudo($_POST['pseudo'] , $_POST['password']);
if ($user) {
    $userManager->connexion($_POST['pseudo'] , $_POST['password']);
    $_SESSION['id'] = $user['id'];
    header('Location: ../zooList.php');

}else{
    header("Location: ../index.php");
}