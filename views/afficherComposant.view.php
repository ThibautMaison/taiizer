<?php
ob_start();
$PrixReduction = $Composant->getPrix() + $Composant->getPrix() / 10;
?>
<div class="container px-4 px-lg-5 fade-in pt-5">
  <div class="row gx-4 gx-lg-5 align-items-center pt-5">
    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 rounded" src="<?= URL ?>public/images/<?= $Composant->getImage() ?>" alt="product image" /></div>
    <div class="col-md-6">
      <h1 class="display-5 fw-bolder text-white"><?= $Composant->getName() ?></h1>
      <div class="fs-5 mb-4">
        <span class="text-decoration-line-through text-muted me-3 "><?= $PrixReduction ?></span>
        <span class="text-white"><?= $Composant->getPrix() ?>€</span>
      </div>
      <p class="lead text-white mb-5"><?= $Composant->getDescription() ?></p>
      <div class="d-flex">
        <a href="<?= $Composant->getLien() ?>"><button class="btn btn-primary" type="button">
            Acheter
          </button></a>
      </div>
    </div>
  </div>
</div>



<?php
$Name = $Composant->getName();
$content = ob_get_clean();
require "template.php";
?>