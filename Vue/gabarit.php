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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Livre de Jean ForteRoche - Un billet pour l'Alaska">
    <meta name="author" content="Jean ForteRoche">

    <base href="<?= $racineBlog ?>">
    <script src="../../jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
            crossorigin="anonymous"></script>

    <!------------ Bootstrap CSS ------------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!------------ feuille  CSS ------------>
    <link rel="stylesheet" href="Contenu/style.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Police de caractères-->
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <div class="container">
        <div class="masthead">
            <nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Accueil</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="Accueil/index/#headerIntroduction">Présentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Accueil/index/#dernierChapitre">Dernier Chapitre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Accueil/index/#auteur">L'auteur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Livre?page=1">Table des matières</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin" title="tableau de bord"><i class="fa fa-paper-plane"
                                                                                        aria-hidden="true"></i></a>
                        </li>

                    </ul>
                    <?php if (isset($_SESSION['login'])): ?>
                        <ul class="navbar-nav navbar-text nav-item">
                            <a id='lienDeco' href='connexion/deconnecter'>Se déconnecter</a>
                        </ul>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <!----------------------------------- Entête ----------------------------------->
        <header id="headerAccueil">
            <div>
                <a href="" id="titreSites" class="header">
                    <h2 class="display-2"><?php echo $titre ?></h2></a>
            </div>
            <!------------------------ Message de notification ------------------------->

            <?php if (isset($session)) {
                $flash = $session->getFlash();
                if ($flash) {
                    ?>
                    <div id="alert" class="alert alert-<?php echo $flash['type'] ?> alert-dismissible fade show"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span
                                    aria-hidden="true">&times;</span></button>
                        <?php echo $flash['message']; ?>
                    </div>
                    <?php
                }
            }; ?>
        </header>

        <!----------------------------------- Contenu ---------------------------------->

        <div id="contenu" class="">
            <?= $contenu; ?>
        </div>

        <!-------------------------------- Pied de page -------------------------------->

        <footer id="piedPage" class="mastfoot">
            <div class="inner">
                <a href="Accueil/mentions">Mentions légales</a>
            </div>
        </footer>
    </div>
</div>

<!------------------------------------------ Javascript ------------------------------------------>
<!-- jQuery first, then Tether, then Bootstrap JS.-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script>
    $(function () {
        // Message d'alerte
        $(".alert").alert();
        //Action click réponse à un commentaire
        $(".reponse").click(function (e) {
            e.preventDefault();
            var $formulaire = $('#formulaireReponse');
            var $this = $(this);
            var parent_id = $this.data('id');
            var $comment = $('#commentaire-' + parent_id);

            $('#parent_id').val(parent_id);
            $comment.after($formulaire);
            $formulaire.show();
        });
    })
    ;
</script>
</body>
</html>