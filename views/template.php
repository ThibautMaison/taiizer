<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAIIZERR</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/vapor/bootstrap.min.css">
  <link rel="stylesheet" href="/public/style.css">
</head>
<body style="background-color: black;">
<nav class="navbar navbar-expand-lg d-flex fixed-top" style="background-color: rgba(26, 9, 50, 0.1);">
    <div class="container">
      <a class="navbar-brand" href="<?= URL ?>accueil"><img src="/public/Accueil/transparent-screen-icon-ventures-icon-pc-tower-and-monitor-ico-609030c4286439.4452916816200624041655.png" alt="Logo" width="80"  class="d-inline-block align-text-top"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
          <a class="nav-link active text-white" href="<?= URL ?>accueil">Accueil</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active text-white" href="<?= URL ?>boutique">Boutique</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active text-white" href="<?= URL ?>optimisation">Optimisation</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active text-white" href="<?= URL ?>forum">Forum</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active text-white" href="<?= URL ?>contact">Contact</a>
          </li>
        </ul>
        <div>
        <?php if (isset($_SESSION['Pseudo'])): ?>
                <?php if ($_SESSION['Role'] == 1): ?>
                    <a class="text-white text-decoration-none me-3" href="<?= URL ?>admin">Admin</a>
                <?php endif; ?>
                <div class="btn-group dropdown-end me-3">
                    <a type="button" class="btn btn-outline-light text-white rounded" data-bs-toggle="dropdown" aria-expanded="false">
                        COMPTE
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle ms-2" height="22" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start bg-dark">
                        <li><a class="btn btn-dark text-white rounded d-flex justify-content-center" href="">Parametre</a></li>
                        <li><a class="btn btn-dark text-white rounded d-flex justify-content-center" href="<?= URL ?>logout">Deconnexion</a></li>
                    </ul>
                </div>
            <?php else: ?>
              <a class="btn btn-outline-light text-white btn" type="button" href="<?= URL ?>connexion">Connexion</a>
            <?php endif; ?>
          </div>
      </div>
  </nav>

  <div class="container-fluide">
    <?= $content ?>
  </div>




  <footer class="text-center text-lg-start text-white pt-5 mt-5" style="bottom: 0;">
    <div class="container p-5 pb-0 ">
      <section class="mb-4">
        <div class="row justify-content-around">
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
            <img class="mb-3" style="width: 100px;height: 60px;" src="/public/Accueil/transparent-screen-icon-ventures-icon-pc-tower-and-monitor-ico-609030c4286439.4452916816200624041655.png" alt="logo">
            <p>Bienvenue sur TAIIZER.fr ! Retrouvez mes conseils pour le meilleur matériel et le forum pour vous aider et échanger librement.</p>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
            <h6 class="text-uppercase mb-4 font-weight-bold">MENU</h6>
            <ul class="list-unstyled mb-0">
              <li><a href="<?= URL ?>accueil" class="text-white text-decoration-none">Accueil</a></li>
              <li><a href="<?= URL ?>forum" class="text-white text-decoration-none">Forum</a></li>
              <li><a href="<?= URL ?>optimisation" class="text-white text-decoration-none">Optimisation</a></li>
              <li><a href="<?= URL ?>boutique" class="text-white text-decoration-none">Boutique</a></li>
              <li><a href="<?= URL ?>contact" class="text-white text-decoration-none">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p></i> Dunkerque, France</p>
            <p>thibautayzer@gmail.com</p>
            <p><a href="https://twitter.com/TAIIZERR" class="text-white text-decoration-none">Twitter</a></p>
          </div>
        </div>
      </section>

      <hr class="my-3">

      <section class="p-3 pt-0">
        <div class="p-3 text-center">
          © 2022 THIBAUT MAISON - Tous droits réservés
        </div>
      </section>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="/public/script.js"></script>
</body>

</html>