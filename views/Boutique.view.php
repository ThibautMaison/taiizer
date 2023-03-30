<?php
ob_start();
?>
<section class="animate__animated animate__fadeIn animate__slow pt-5" style="min-width: 75%;">
  <div class="container pt-5">
    <div class="row align-items-center pt-5">
      <div class="col-md-6 text-md-start text-center">
        <h1 class="mb-4 fw-bold text-white text-uppercase text-center" style="font-size: calc(48px + 1.5vw);">Boutique</h1>
        <p class="mb-6 lead fs-4 text-white text-center">Trouvez tous mes conseils pour vous équiper le mieux possible.
          Je ne propose que des produits de très grande qualité et prévus pour durer dans le temps.
          Je précise que je suis totalement transparent dans le choix des marques.
          Vous pouvez faire vos choix en toute confiance !</p>
      </div>
      <div class="col-md-6 text-end pt-5">
        <img class="pt-7 pt-md-0 img-fluid" src="/public/Accueil/Frame 1.png" alt="" style="max-width: 100%;" />
      </div>
    </div>
  </div>
</section>

<div class="container-fluid px-5 py-5" id="target">
  <div class="row">
    <!-- Categorie -->
    <div class="col-lg-3 col-md-4">
      <div class="product-list p-4 rounded mb-30 mx-auto bg-dark ">
        <h3 class="fs-2 fw-bold text-center text-uppercase text-white mb-4">Categorie</h3>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Config PC</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Ecran</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Clavier</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Souris</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Casque</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Tapis</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Chaise</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Accessoire</a>
        <a class="btn btn-product-list d-block my-2 fw-semibold fst-italic rounded text-white" href="">Ordinateur Portable</a>
      </div>
    </div>
    <!-- Produits -->
    <div class="col py-3">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Recherche -->
        <form method="post" action="" class="input-group" style="width: 250px;">
          <input type="text" class="form-control rounded-start rounded-end bg-dark text-white" placeholder="Rechercher..." id="search-input">
        </form>
        <!-- Tri -->
        <div>
          <div class="btn-group ms-3">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #1a1a1a;">Trier par</button>
            <div class="dropdown-menu dropdown-menu-end" style="background-color: #1a1a1a;">
              <a class="dropdown-item text-white" href="?sort=asc">Prix croissant</a>
              <a class="dropdown-item text-white" href="?sort=desc">Prix décroissant</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Liste de produits -->
      <div class="d-grid gap-4 mx-auto" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
        <?php foreach ($Boutique as $item) : ?>
          <a href="<?= URL ?>boutique/l/<?= $item->getId() ?>" class="text-decoration-none link-light boutique-item">
            <div class="card bg-dark btn-outline-light" style="height: 350px;">
              <div class="card-img-top position-relative" style="height: 70%; overflow: hidden;">
                <img src="/public/images/<?= $item->getImage() ?>" class="position-absolute top-50 start-50 translate-middle" style="max-height: 100%; max-width: 100%; object-fit: cover; transform: translate(-50%, -50%);" />
              </div>
              <div class="card-body">
                <h5 class="card-title text-white mb-0"><?= $item->getName() ?></h5>
                <p class="card-text"><?= $item->getCategorie() ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-text text-white fw-bold"><?= $item->getPrix() ?>€</p>
                  <button class="btn btn-outline-light btn-sm">En savoir plus..</button>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>

<script>
</script>
<?php
$content = ob_get_clean();
require "template.php";
?>