<?php
include '../config/autoload.php';
require_once '../config/connexion.php';


if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $userManager = new UserManager($db);
    $userManager->addUser($_POST['pseudo'],$_POST['password']);
    $userConnextionVerify = $userManager->connexion($_POST['pseudo'],$_POST['password']);
    header('Location: ../zooList.php');
}