<?php
ob_start();
?>
<?php
if (isset($_SESSION['Pseudo'])) {
    if (($_SESSION['Role']) == 1) { ?>
    <div class="container pt-5">
            <div class="text-center mb-5">
                <div class="my-4 fw-bold text-uppercase">
                    <h2 class="text-white pt-5">Manage Utilisateur</h2>
                </div>
            </div>
            <table class="table table-striped table-hover text-white text-center mb-0">
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <div class="d-grid col-6 mx-auto">
                    <a href="<?= URL ?>admin/ajoutuser" class="btn btn-success mb-4">Ajouter utilisateur</a>
                </div>
                    <?php
                    for ($i = 0; $i < count($Users); $i++) : ?>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td class="text-white"><?= $Users[$i]->getPseudo() ?></td>
                            <td class="text-white"><?= $Users[$i]->getEmail() ?></td>
                            <td class="text-white"><?= $Users[$i]->getRole() ?></td>
                            <td>
                                <div class="d-flex justify-content-center mb-2">
                                    <form action="<?= URL ?>admin/modificationuser/<?= $Users[$i]->getId() ?>" method="POST">
                                        <button class="btn btn-warning mx-auto d-flex justify-content-center me-3" type="submit">Modifier</button>
                                    </form>
                                    <form action="<?= URL ?>admin/supprimeruser/<?= $Users[$i]->getId() ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?')" method="POST">
                                        <button class="btn btn-danger mx-auto d-flex justify-content-center" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endfor ?>
            </table> 
        </div>
        </div>
<?php }
} else {
    header("Location: " . URL . "connexion");
} ?>
<?php
$content = ob_get_clean();
require "template.php";
?>