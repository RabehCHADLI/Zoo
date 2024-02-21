<?php include './config/autoload.php'  ?>
<?php include './config/connexion.php'  ?>
<?php include './partials/header.php';
?>
<nav class="navbar">
  <div class="container-fluid justify-content-around">
     <a href="./zoo.php?zoo_id=<?=$_POST['zoo_id']?>" class="btn">Les Enclos</a>
     <input type="hidden" name="zoo_id" id="zoo_id" value="<?= $_POST['zoo_id']?> ">
  </div>
</nav>
<form action="" method="post" class="d-flex flex-column cardAnimal mt-2" id="form">
    <div class="col-3 mt-3 ms-4">
        <h5 class=" ms-5 text-white">Animal</h5>
        <label for="espece" class="text-white">Espece :</label>
        <select name="espece" id="espece" class="input m-1" id='espece'>
            <option value="Ours">Ours (enclos 'Cage')</option>
            <option value="Aigles">Aigle (enclos 'Voliere')</option>
            <option value="Tigres">Tigre (enclos 'cage')</option>
            <option value="Poissons">Poissons(enclos 'Poissons')</option>
        </select>
        <input type="hidden" name="enclos_id" value="<?= $_POST['enclos_id'] ?>" id='enclos_id'>
        <input type="text" name='name' placeholder="Nom de l'animal" class="input m-1" id="nameAni">
        <button type="submit" class="btn mt-2">Acheter</button>
    </div>
</form>

<div id="liAni" class="d-flex flex-wrap">

</div>

</div>

















<script src="./asset/js/scriptFatigueFaimAnimals.js"></script>
<script src="./asset/js/scriptAddAnimalDb.js"></script>
<script src="./asset/js/scriptAddFaim.js"></script>

<?php include './partials/footer.php'  ?>