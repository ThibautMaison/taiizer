<?php
ob_start();
$servername = "db5012291248.hosting-data.io";
$username = "dbu1266840";
$password = "pahys26@QX6Diiu";
$dbname = "dbs10339721";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<div class="container pt-5">
    <div class="pt-5 row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Commentaires</h1>

            <h2 class="mb-4 text-center">Liste des commentaires :</h2>
            <?php
            $sql = "SELECT commentaires.id, commentaires.commentaire, commentaires.date_creation, users.pseudo
            FROM commentaires
            JOIN users ON commentaires.user_id = users.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<p><strong>" . $row["pseudo"] . "</strong></p>";
                    echo "<p>" . $row["commentaire"] . "</p>";

                    $date = new DateTime($row["date_creation"]);
                    $date->setTimezone(new DateTimeZone('Europe/Paris'));
                    echo "<p><small>" . $date->format('l d F Y H:i:s') . "</small></p>";

                    echo "</div>";
                }
            } else {
                echo "<p>Aucun commentaire trouvé.</p>";
            }
            $conn->close();
            ?>

            <?php if (isset($_SESSION['Pseudo'])) : ?>
                <form action="<?= URL ?>forum/ajoutcommentaire" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" name="commentaire" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Ajouter un commentaire">
                    </div>
                </form>
            <?php else : ?>
                <p class="text-center">Connectez-vous pour ajouter un commentaire.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>