<?php
include_once './config/autoload.php';
require_once './config/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body id='bodyindex'>
    <div class="container">
        <div class="row justify-content-between mt-5">
            <div class="cards col-4 p-4">
            <h4 class="ms-5 text-white">Connexion</h4>                  
                <form action="./process/login.php" method="post" class="form">
                    <label for="pseudo" class="label">Pseudo : </label>
                    <input type="text" name='pseudo' class="input" id='pseudo'>
                    <label class="label" for="password">Mot de passe : </label>
                    <input type="password" name='password' class="input" id='password'>
                    <button type="submit" class="btn">Se connecter</button>
                
                </form>
            </div>
            <div class="cards col-4 p-4" > 
                <h4 class="ms-5 text-white">Inscription</h4>               
                <form action="./process/Add_User_Db.php" method="post" class="form">
                    <label for="pseudo" class="label">Pseudo : </label>
                    <input type="text" name='pseudo' class="input" id='pseudo'>
                    <label class="label" for="password">Mot de passe : </label>
                    <input type="password" name='password' class="input" id='password'>
                    <button type="submit" class="btn">S'inscrire</button>
                
                </form> 
            </div>
            

                
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
