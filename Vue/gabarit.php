<?php
/**
 * Gabarit du blog
 *
 * @author: AW
 */
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <base href="<?= racineBlog ?>">
        <link rel="stylesheet" href="Contenu/style.css">
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <!-- Entête -->
            <header>
                <a href=""></a>
                <p>Bienvenue !</p>
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