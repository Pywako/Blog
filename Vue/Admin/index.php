<?php
/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 18/05/2017
 * Time: 10:07
 */
$this->titre = "Mon Blog - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s)
 et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<a id="lienDeco" href="connexion/deconnexter">Se déconnexter</a>