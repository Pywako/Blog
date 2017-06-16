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
        <!-- Tinymce -->
        <script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="../../tinymce/js/tinymce/jquery.tinymce.min.js"></script>
        <script>tinymce.init({
                selector:'.mytextarea',
                width: 1000,
                height: 500,
                plugins: "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker " +
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking " +
                "save table contextmenu directionality emoticons template paste textcolor autosave",
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright " +
                "alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | " +
                "forecolor backcolor emoticons | restoredraft spellchecker"
            });</script>

        <!-- Latest compiled and minified CSS Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="Contenu/style.css">

        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <!-- Entête -->
            <header>
                <a href=""><h1 id="titreSites">Un billet pour l'Alaska</h1></a>

                <!-- Message de notification-->
                <?php if(isset ($session)) { $session->flash(); };?>
                <p>Bienvenue ! Pour accéder au tableau de bord c'est par <a href="admin">ici</a> </p>
            </header>

            <!-- Contenu -->
            <div id="contenu">
                <?= $contenu ;?>
            </div>

            <!-- Pied de page -->
            <footer id="piedPage">

            </footer>
        </div>

        <!-- Javascript -->
        <script src="../../jquery-3.2.1.min.js"></script>
        <script>
            $(function(){
                var alert = $('#alert');
                if (alert.length > 0) {
                    alert.hide().slideDown(500);
                    alert.find('.close').click(function(e){
                     e.preventDefault();
                     alert.slideUp();
                    });
                }
            });
        </script>
    </body>
</html>