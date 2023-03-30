<?php
ob_start();
?>
<?php if (isset($_SESSION['Pseudo'])) {
  if (($_SESSION['Role']) == 1) { ?>
<div class="container-fluid px-4 pt-5">
  <h2 class="text-center my-4 fw-bold text-uppercase text-white pt-5">BOUTIQUE ADMIN</h2>
  <div id="target" class="container-fluid pt-5 px-5 ">
    <div class="row px-xl-3">
      <div class="col-lg-3 col-md-4">
        <div class="product-list p-4 mb-30 mx-auto rounded" style="background-color: #1a1a1a;">
          <h3 class="product-list-title mb-4 text-uppercase text-center text-white fs-2 fw-bold">Categorie</h3>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Config PC</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Ecran</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Clavier</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Souris</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Casque</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Tapis</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Chaise</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Accessoire</a>
          <a class="btn btn-product-list rounded text-white d-block my-2 fw-semibold fst-italic" href="">Ordinateur Portable</a>
        </div>
      </div>
      <div class="col py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <form method="post" action="" class="input-group" style="width: 250px;">
            <input type="text" class="form-control rounded-start rounded-end bg-dark text-white" placeholder="Search by name" id="search-input">
          </form>
          <div>
            <a href="<?= URL ?>admin/ajoutcomposant" class="btn btn-success px-auto pe-3" style="font-size: 14px;">Ajouter composant</a>
            <div class="btn-group ms-3">
              <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #1a1a1a;">Trier par</button>
              <div class="dropdown-menu dropdown-menu-end" style="background-color: #1a1a1a;">
                <a class="dropdown-item text-white" href="?sort=asc">Prix croissant</a>
                <a class="dropdown-item text-white" href="?sort=desc">Prix décroissant</a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-grid gap-4 mx-auto" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
          <?php foreach ($Boutique as $item) : ?>
            <a href="<?= URL ?>boutique/l/<?= $item->getId() ?>#target" class="link-light text-decoration-none boutique-item">
              <div class="card zoom" style="height: 450px;background-color: #1a1a1a;">
                <div class="card-img-top position-relative" style="height: 250px; overflow: hidden;">
                  <img src="/public/images/<?= $item->getImage() ?>" class="position-absolute top-50 start-50 translate-middle" style="max-height: 100%; max-width: 100%; transform: translate(-50%, -50%);" />
                </div>
                <div class="card-body">
                  <h5 class="card-title mb-0 text-white"><?= $item->getName() ?></h5>
                  <p class="card-text text-muted"><?= $item->getCategorie() ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="card-text text-white fw-bold"><?= $item->getPrix() ?>€</p>
                    <button class="btn btn-outline-light btn-sm">En savoir plus..</button>
                  </div>
                  <div class="d-flex justify-content-center my-3">
                    <form action="<?= URL ?>admin/modificationcomposant/<?= $item->getId() ?>" method="POST">
                      <button class="btn btn-warning mx-auto me-3" type="submit">Modifier</button>
                    </form>
                    <form action="<?= URL ?>admin/supprimercomposant/<?= $item->getId() ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?')" method="POST">
                      <button class="btn btn-danger mx-auto" type="submit">Supprimer</button>
                    </form>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach ?>
        </div>
      </div>
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