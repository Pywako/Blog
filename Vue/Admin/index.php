<?php
/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 18/05/2017
 * Time: 10:07
 */
$this->titre = "Billet pour l'Alaska - Administration";?>
<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !

Ce blog comporte <?= $this->nettoyer($nbChapitres) ?> chapitre(s)
 et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a><br>
<a id="ecrire" href="admin/creation"><button type="button" class="btn btn-success">Ecrire un chapitre</button></a>

<h3>Derniers commentaires</h3>
<div class="table-responsive">
    <table class = "table table-striped table-bordered table-hover">
        <tr>
            <th>Auteur</th>
            <th>Date</th>
            <th>Chapitre</th>
            <th>Commentaire</th>
            <th>Signalement</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($commentaires as $commentaire):?>
        <tr <?php if($commentaire['com_signalement']) echo "class='signalement'"?>>
            <td><?= $this->nettoyer($commentaire['com_auteur']) ?></td>
            <td><time><?= $this->nettoyer($commentaire['com_date']) ?></time></td>
            <td><?php echo $this->nettoyer($commentaire['chap_id']); ?></td>
            <td><?= $this->nettoyer($commentaire['com_contenu']) ?></td>
            <td><?= $this->nettoyer($commentaire['com_signalement']) ?></td>

            <td><a id="supprimerCommentaire" href="<?= "admin/supprimerCommentaire/" . $commentaire['com_id']?>">
                    <button type="button" class="btn btn-danger">Supprimer</button></a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>

<h3>Liste des chapitres</h3>
<div class="table-responsive">
    <table class = "table table-striped table-bordered table-hover">
        <tr>
            <th>Chapitre</th>
            <th>Titre</th>
            <th>Date</th>
            <th>extrait</th>
            <th>Nombre de commentaire</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($chapitres as $chapitre):?>
            <tr>
                <td><?= $chapitre['numero'] ?></td>
                <td><?= $this->nettoyer($chapitre['titre']) ?></td>
                <td><?= $this->nettoyer($chapitre['date']) ?></td>
                <td><?php echo $contenu = substr($chapitre['contenu'], 0, 100); ?></td>
                <td><?= $this->nettoyer($chapitre['nbcom']) ?></td>
                <td><a id="modifierChapitre" href="<?= "admin/modification/" . $chapitre['id']?>">
                        <button type="button" class="btn btn-info">Modifier</button></a><br>
                    <a id="supprimerChapitre" href="<?= "admin/supprimerChapitre/" . $chapitre['id']?>">
                        <button type="button" class="btn btn-danger" >Supprimer</button></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>