<?php
/**
 * Bloc correspondant à un commentaire
 */
?>
<div class="panel panel-default" id="commentaire-<?= $commentaireEnfant['id'] ?>">
    <div class="panel-body">
        <p><?= $this->nettoyer($commentaireEnfant['auteur']) ?> dit :</p>
        <p><?= $this->nettoyer($commentaireEnfant['contenu']) ?></p>
        <p class="text-right">
            <button type="button" class="btn btn-info reponse" data-id="<?= $commentaireEnfant['id'] ?>">Répondre
            </button>
            <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaireEnfant['id'] ?>">
                <button type="button" class="btn btn-warning">Signaler</button>
            </a>
        </p>
    </div>
</div>
<?php $id_parent = $commentaireEnfant['id'];?>
<?php if (isset($commentaires['enfant'][$commentaireEnfant['id']])): ?>
    <?php foreach ($commentaires['enfant'] as $commentaireEnfant): ?>
        <?php if ($commentaireEnfant['parent_id'] == $id_parent): ?>
            <!-- commentaire Enfant -->
            <div class="panel panel-default" id="commentaire-<?= $commentaireEnfant['id'] ?>"
                 style="margin-left: 50px;">
                <?php include ("Vue/Chapitre/_commentaires.php");?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
