<?php
include_once './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';
?>
<div class="container">
    <div class="row d-flex justify-content-between">


        <div class="cardAddZoo col-4 mt-5">

            <h3 class="mt-3">Création d'un Zoo</h3>
            <form action="./process/AddZooEmploye.php" method="post" class="d-flex flex-column col-4 form mt-4" id='form'>
                <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['id'] ?>">
                <label class="text-white" for="namezoo">Nom du Zoo</label>
                <input type="text" id='namezoo' name='namezoo' placeholder="Nom du zoo" class="input">
                <label class="text-white" for="nameEmploye">Nom employé</label>
                <input type="text" id='nameEmploye' name='nameEmploye' placeholder="Nom de ton futur employé" class="input">
                <label class="text-white" for="sexe">SEXE</label>
                <select name="sexe" id="sexe" class="input">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
                <label class="text-white" for="age">Age employé</label>
                <input type="number" id='age' name='age' placeholder='Age employé' class="input">
                <button type="submit" class="btn mt-2">Créer</button>
            </form>
        </div>
        <div id='divZoo' class="col-4 mt-1">


        </div>
    </div>
</div>
<script src="./asset/js/scriptAddZoo.js"></script>
<?php
include './partials/footer.php'
?>


















