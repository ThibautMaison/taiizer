<?php 
ob_start()
?>

<form method="POST" action="<?= URL ?>admin/ajoutvalidationuser" enctype="multipart/form-data" class="d-grid gap-2 col-6 mx-auto mt-5">
<!-- enctype="multipart/form-data" obliger de le mettre quand on charge un fichier -->
    <div class="form-group mb-2">
        <label class="text-white" for="Pseudo">Pseudo :</label>
        <input type="text" class="form-control" id="Pseudo" name="Pseudo">
        <!-- id sert pour js et css -->
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Email">Email :</label>
        <input type="text" class="form-control" id="Email" name="Email">
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Password">Password :</label>
        <input type="text" class="form-control" id="Password" name="Password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$Name = "Ajout d'un produit";
require "template.php";
?>