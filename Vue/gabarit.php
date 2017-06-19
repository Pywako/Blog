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

    <!-------------------------------- Tinymce -------------------------------->

    <script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="../../tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script>tinymce.init({
            selector: '.mytextarea',
            width: 1000,
            height: 300,
            plugins: "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker " +
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking " +
            "save table contextmenu directionality emoticons template paste textcolor autosave",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright " +
            "alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | " +
            "forecolor backcolor emoticons | restoredraft spellchecker"
        });</script>

    <!------------ Latest compiled and minified CSS Bootstrap ------------>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Contenu/style.css">

    <title><?= $titre ?></title>
</head>
<body>
<div id="global">

    <!------------------------------ Navigation -------------------------------->

    <div id="iconeNavigation"><button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-menu-hamburger"></span></span></button></div>


    <!----------------------------------- Entête ----------------------------------->
    <header id="headerAccueil" class="row">

        <div class="col-lg-12">
            <a href="" id="titreSites" class="header">
                <h1>Un billet pour l'Alaska</h1></a>
        </div>
        <!------------------------ Message de notification ------------------------->

        <?php if (isset ($session)) {
            $session->flash();
        }; ?>
        <p class="header">Bienvenue ! Pour accéder au tableau de bord c'est par <a href="admin">ici</a></p>
    </header>

    <!----------------------------------- Contenu ---------------------------------->

    <div id="contenu" class="row">
        <?= $contenu; ?>
    </div>

    <!-------------------------------- Pied de page -------------------------------->

    <footer id="piedPage" class="row">
        <a href="Accueil/mentions">Mentions légales</a>
    </footer>
</div>

<!------------------------------------------ Javascript ------------------------------------------>

<script src="../../jquery-3.2.1.min.js"></script>
<script>
    $('#document').ready(function () {

        // Animation Flash message
        var alert = $('#alert');
        if (alert.length > 0) {
            alert.hide().slideDown(500);
            alert.find('.close').click(function (e) {
                e.preventDefault();
                alert.slideUp();
            });
        }

        // Animation barre de navigation
        var navbar = $('#iconeNavigation');
        navbar.click(function(){

        });
    });
</script>
</body>
</html>