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

    <!------------ Bootstrap CSS ------------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!------------ feuille  CSS ------------>
    <link rel="stylesheet" href="Contenu/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div id="global">
        <div class="container">
            <div class="masthead">
                <nav class="navbar navbar-light bg-faded rounded mb-3" >
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-toggleable-md" id="navbarCollapse">
                        <ul class="nav navbar-nav text-md-center justify-content-md-between">
                            <li class="nav-item">
                                <a class="nav-link" href="Accueil/index/">Accueil <span class="sr-only">(current)</span></a>
                            </li>
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
                                <a class="nav-link" href="Livre/index/page/1">Table des matières</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin">Plûme</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!----------------------------------- Entête ----------------------------------->
            <header id="headerAccueil" >
                <div>
                    <a href="" id="titreSites" class="header">
                        <h2 class="display-2"><?php echo $titre?></h2></a>
                </div>
                <!------------------------ Message de notification ------------------------->

                <?php if (isset($session)) {
                    $flash = $session->getFlash();
                    if(isset($_SESSION['flash']))
                    {?>
                        <div id="alert" class="alert alert-<?php echo $flash['type'] ?> alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $flash['message']; ?>
                        </div>
                        <?php
                        unset($_SESSION['flash']);
                    }
                }; ?>
                <!------------------------ Panneau Admin ------------------------->
                <?php if(isset($_SESSION['login'])){
                    echo '<a href="admin"><p>Retour au tableau de bord</p></a>'; }?>
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
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $(".alert").alert();
        });
    </script>
</body>
</html>