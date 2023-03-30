<?php 
ob_start()
?>
<form method="POST" action="<?= URL ?>admin/modificationvalidationuser" enctype="multipart/form-data" class="d-grid gap-2 col-6 mx-auto mt-5">
    <div class="form-group mb-2" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Pseudo">Pseudo :</label>
        <input type="text" class="form-control" id="Pseudo" name="Pseudo" value="<?= $Users->getPseudo() ?>">
    </div>
    <div class="form-group mb-2" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Email">Email :</label>
        <input type="text" class="form-control" id="Email" name="Email" value="<?= $Users->getEmail() ?>">
    </div>
    <div class="form-group mb-4" style="margin-bottom: 50px;margin-top: 50px;">
        <label class="text-white" for="Role">Role :</label>
        <input type="text" class="form-control" id="Role" name="Role" value="<?= $Users->getRole() ?>">
    </div>
    <input type="hidden" name="identifiant" value="<?= $Users->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content=ob_get_clean();
$Name="Modifier";
require "template.php";
?>