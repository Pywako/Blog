<?php
/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 18/05/2017
 * Time: 10:07
 */
$this->titre = "Tableau de bord";?>
<p>
    Bienvenue, <?= $this->nettoyer($login) ?> ! <br>

    Ce blog comporte <?= $this->nettoyer($nbChapitres) ?> chapitre(s)
    et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).<br>
</p>
<div id="adminAction">
    <a id="ecrire" href="admin/creation"><button type="button" class="btn btn-success">Ecrire un chapitre</button></a>
    <a href="admin/commentaires/page/1"><button class="btn btn-primary">Voir tous les commentaires</button></a>
</div>

<!-- Tableau 5 derniers Commentaires-->
<div id="adminCommentaires">
    <?php if(isset($commentaires)):?>
        <h3 class="titreAdmin">Derniers commentaires</h3>
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
                <?php foreach ($commentaires as $commentaire):
                    $chap = $objChapitre->getChapitre($commentaire['chap_id']);?>
                    <tr <?php if($commentaire['com_signalement']) echo "class='signalement'"?>>
                        <td><?= $this->nettoyer($commentaire['com_auteur']) ?></td>
                        <td><time><?= $this->nettoyer($commentaire['com_date']) ?></time></td>
                        <td><?php echo $this->nettoyer($chap['numero']); ?></td>
                        <td><?= $this->nettoyer($commentaire['com_contenu']) ?></td>
                        <td><?= $this->nettoyer($commentaire['com_signalement']) ?></td>

                        <td><a id="supprimerCommentaire" href="<?= "admin/supprimerCommentaire/" . $commentaire['com_id']?>">
                                <button type="button" class="btn btn-danger" title="supprimer" alt="supprimer"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                            <a id="RAZCommentaire" href="<?= "admin/remiseAZero/" . $commentaire['com_id']?>">
                                <button type="button" class="btn btn-primary" title="remise à zéro" alt="remiseAZero"><i class="fa fa-circle-o" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    <?php endif;?>
    <?php if(!isset($commentaires)):?>
        <h4>Pas de commentaires</h4>
    <?php endif;?>
</div>


<!-- Tableau Chapitres-->
<div id="adminChapitres">
    <h3 class="titreAdmin">Liste des chapitres</h3>
    <?php if(isset($chapitres)):?>

        <div class="">
            <table class = "table table-striped table-bordered table-hover table-responsive">
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
                        <td><?php echo $contenu = substr($chapitre['contenu'], 0, 300); ?></td>
                        <td><?= $this->nettoyer($chapitre['nbcom']) ?></td>
                        <td><a id="modifierChapitre" href="<?= "admin/modification/" . $chapitre['id']?>">
                                <button type="button" class="btn btn-info" title="modifier" alt="modifier"><i class="fa fa-pencil" aria-hidden="true"></i></button></a><br>
                            <a id="supprimerChapitre" href="<?= "admin/supprimerChapitre/" . $chapitre['id']?>">
                                <button type="button" class="btn btn-danger" title="supprimer" alt="supprimer"><i class="fa fa-times" aria-hidden="true"></i></button></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif;?>
    <?php if(!isset($chapitres)):?>
        <h4>Aucun Chapitres Publiés</h4>'
    <?php endif;?>
</div>