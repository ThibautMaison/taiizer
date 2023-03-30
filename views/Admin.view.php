<?php
ob_start();
?>
<?php
if (isset($_SESSION['Pseudo'])) {
  if (($_SESSION['Role']) == 1) { ?>
    <div class="d-flex justify-content-center container flex-wrap w-75 mt-5">
      <a href="<?= URL ?>admin/boutique" class="link-dark text-decoration-none mt-5">
        <div class="d-grid ms-4 mb-4 ">
          <div class="card mx-auto bg-white" style="transition: transform 0.5s ease;">
            <div class="" style="background-color: #c7c7c7;">
              <img src="/public/Accueil/AdminBoutique.png" class=" d-grid gap-2 d-flex justify-content-center services-list my-3 mx-3" style="height: 300px;width: 300px;">
            </div>
            <h5 class=" d-grid gap-2 mx-auto d-flex justify-content-center my-4 fw-bold fs-2 text-uppercase">BOUTIQUE</h5>
          </div>
        </div>
      </a>
      <a href="<?= URL ?>admin/users" class="link-dark text-decoration-none mt-5">
        <div class="d-grid ms-4 mb-4 ">
          <div class="card mx-auto bg-white" style="transition: transform 0.5s ease;">
            <div style="background-color: #c7c7c7;">
              <img src="/public/Accueil/AdminUser.png" class=" d-grid gap-2 d-flex justify-content-center services-list my-3 mx-3" style="height: 300px;width: 300px;">
            </div>
            <h5 class=" d-grid gap-2 mx-auto d-flex justify-content-center my-4 fw-bold fs-2 text-uppercase">UTILISATEUR</h5>
          </div>
        </div>
      </a>
    </div>
<?php }
} else {
  header("Location: " . URL . "connexion");
} ?>
<?php
$content = ob_get_clean();
require "template.php";
?>