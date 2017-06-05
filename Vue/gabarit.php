<?php
/**
 * Gabarit du blog
 *
 * @author: AW
 */
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <base href="<?= $racineBlog ?>">
        <link rel="stylesheet" href="Contenu/style.css">
        <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#chapitre'
            });
        </script>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <!-- Entête -->
            <header>
                <a href=""><h1 id="titreSites">Un billet pour l'Alaska</h1></a>
                <p>Bienvenue !
                    Pour accéder au tableau de bord c'est par <a href="admin">ici</a> </p>
            </header>

            <!-- Contenu -->
            <div id="contenu">
                <?= $contenu ?>

            </div>

            <!-- Pied de page -->
            <footer id="piedPage">

            </footer>
        </div>

    </body>
</html>