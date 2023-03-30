<?php
// definie la constante URL
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// recup le fichier Boutiquecontroller
require_once "controllers/BoutiqueController.php";
$ComposantController = new BoutiqueController;

// recup le fichier Usercontroller
require_once "controllers/UserController.php";
$UsersController = new UserController;

try {
    // si lutilisateur est nulle part dans url page accueil
    if (empty($_GET["page"])) {
        require "views/accueil.view.php";
    }
    // permet de gerer le chgment de page quand utilisateur est deja dans une autre page
    else {
        $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));

        // on test premier element de url
        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;
            case "test":
                require "views/test.view.php";
                break;
            case "optimisation":
                require "views/Optimisation.view.php";
                break;
            case "forum":
                require "views/Forum.view.php";
                break;
            case "admin":
                if (empty($url[1])) {
                    require "views/Admin.view.php";
                } else if ($url[1] === "boutique") {
                    // afficher le Users concerner
                    $ComposantController->afficherBoutiqueAdmin();
                }else if ($url[1] === "users") {
                    // afficher le Users concerner
                    $UsersController->afficherUsersAdmin();
                } else if ($url[1] === "ajoutuser") {
                    $UsersController->ajoutUsers();
                }else if ($url[1] === "ajoutvalidationuser") {
                    $UsersController->ajoutUsersValidationAdmin();
                }else if ($url[1] === "ajoutcomposant") {
                    $ComposantController->ajoutComposant();
                }else if ($url[1] === "ajoutvalidationcomposant") {
                    $ComposantController->ajoutComposantValidation();
                }else if ($url[1] === "modificationcomposant") {
                    $ComposantController->modificationComposant((int)$url[2]);
                }else if ($url[1] === "modificationvalidationcomposant") {
                    $ComposantController->modificationComposantValidation();
                }else if ($url[1] === "modificationuser") {
                    $UsersController->modificationUsers((int)$url[2]);
                }else if ($url[1] === "modificationvalidationuser") {
                    $UsersController->modificationUsersValidation();
                } else if ($url[1] === "supprimercomposant") {
                    $ComposantController->suppressionComposant((int)$url[2]);
                } else if ($url[1] === "supprimeruser") {
                    $UsersController->suppressionUsers((int)$url[2]);
                };
                break;
            case "contact":
                require "views/Contact.view.php";
                break;
            case "logout":
                require "views/logout.php";
                break;
            case "inscription":
                if (empty($url[1])) {
                    $UsersController->inscription();
                } else if ($url[1] === "9") {
                    // afficher le Users concerner
                    $UsersController->ajoutUsersValidation();
                };
                break;
            case "connexion":
                if (empty($url[1])) {
                    $UsersController->connexion();
                } else if ($url[1] === "3") {
                    // afficher le Users concerner
                    $UsersController->UsersValidation();
                };
                break;
            case "boutique":
                // si on a rien en tant que 2ème élément dans mon URL
                if (empty($url[1])) {
                    $ComposantController->afficherBoutique();
                } else if ($url[1] === "l") {
                    // afficher le Composant concerner
                    $ComposantController->afficherComposant((int)$url[2]);
                } else {
                    // lever l'erreur si page nexiste pas
                    throw new Exception("La page n'existe pas");
                }
                break;
                // c'est une sorte de else ! De plus on lève lerreur
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {   //permet dafficher le message
    echo $e->getMessage();
}
