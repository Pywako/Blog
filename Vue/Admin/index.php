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
<a id="ecrire" href="admin/creation"><button>Ecrire un chapitre</button></a>

<h3>Liste des chapitres</h3>
<table>
    <tr>
        <th>Chapitre</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Nombre de commentaire</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($chapitres as $chapitre):?>
        <tr>
            <td><?= $chapitre['numero'] ?></td>
            <td><?= $this->nettoyer($chapitre['titre']) ?></td>
            <td><?= $this->nettoyer($chapitre['date']) ?></td>
            <td><?= $this->nettoyer($chapitre['nbcom']) ?></td>
            <td><a id="supprimerChapitre" href="<?= "admin/supprimerChapitre/" . $chapitre['id']."/". $chapitre['numero']?>"><button>Supprimer un chapitre</button></a><br>
                <a id="modifierChapitre" href="<?= "admin/ModifierChapitre/" . $chapitre['id']."/". $chapitre['numero']?>?>"><button>Modifier un chapitre</button></a></td>
        </tr>
    <?php endforeach; ?>
</table>