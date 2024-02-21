<?php
include './config/autoload.php';
include './partials/header.php';
if (!empty($_GET['zoo_id'])) {
    $zoo_id = $_GET['zoo_id'];
}elseif(!empty($_POST['zoo_id'])){
    $zoo_id = $_POST['zoo_id'];
}
?>
<div class="d-flex flex-row-reverse">
<form action="" method="post">
    
    <button class="btn">Aller Dormir</button>
</form>
</div>

<div class="container-fluid">

    <div class="col-4" id='divform'>

        <?php
        ?>
        <form action="" method="post" class="d-flex flex-column cardAnimal mt-2" id="formEnclos">
            <div class="col-3 mt-3 ms-4">
                <h5 class="text-center ms-4 text-white">Enclos</h5>
                <label for="typeEnclos">Enclos : </label>
                <select name="typeEnclos" id="typeEnclos" class="input mt-1 mb-1">
                    <option value="Cage">Cage (Ours ou Tigres)</option>
                    <option value="Voliere">Voliere (Aigles)</option>
                    <option value="Aquarium">Aquarium (Poissons)</option>
                </select>
                <label for="espece">Pour les :</label>
                <select name="espece" id="espece" class="input mt-1 mb-2">
                    <option value="Ours">Ours</option>
                    <option value="Tigres">Tigres</option>
                    <option value="Aigles">Aigles</option>
                    <option value="Poisson">Poisson</option>
                </select>
                <input type="hidden" name="zoo_id" id="zoo_id" value="<?= $zoo_id?> ">
                <button type="submit" class="btn">Construire</button>
            </div>
        </form>
    </div>
    <div class="container" >
        <div class="row text-white d-flex justify-content-between"id='listEnclos'>
            
            </div>
        </div>
    </div>



</div>
<script src="./asset/js/scriptAddEnclosDb.js"></script>
<script src="./asset/js/scriptFatigueFaimAnimals.js"></script>
<?php
include './partials/footer.php';
?>