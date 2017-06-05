<?php
/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 18/05/2017
 * Time: 10:07
 */
$this->titre = "Billet pour l'Alaska - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbChapitres) ?> chapitre(s)
 et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a><br>
<button><a id="ecrire" href="article"></a>Ecrire un chapitre</button>