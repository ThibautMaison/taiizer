<?php 
ob_start()
?>
<form method="POST" action="<?= URL ?>admin/modificationvalidationcomposant" enctype="multipart/form-data" class="d-grid gap-2 col-6 mx-auto mt-5">
    <div class="form-group mb-2" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Name">Name :</label>
        <input type="text" class="form-control" id="Name" name="Name" value="<?= $Composant->getName() ?>">
    </div>
    <div class="form-group mb-2" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Description">Description :</label>
        <input type="text" class="form-control" id="Description" name="Description" value="<?= $Composant->getDescription() ?>">
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Prix">Prix :</label>
        <input type="text" class="form-control" id="Prix" name="Prix" value="<?= $Composant->getPrix() ?>">
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Lien">Lien :</label>
        <input type="text" class="form-control" id="Lien" name="Lien" value="<?= $Composant->getLien() ?>">
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Categorie">Categorie :</label>
        <input type="text" class="form-control" id="Categorie" name="Categorie" value="<?= $Composant->getCategorie() ?>">
    </div>
    <h3 class="text-white">Images : </h3>
    <img style="width: 300px" src="<?= URL ?>public/images/<?= $Composant->getImage()?>" alt="">
    <div class="form-group mb-2" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="image" class="form-label"> Changer image :</label>
        <input class="form-control-file text-white" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $Composant->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content=ob_get_clean();
$Name="Modifier";
require "template.php";
?>