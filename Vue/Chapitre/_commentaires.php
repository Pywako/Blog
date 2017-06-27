<?php
/**
 * Bloc correspondant à un commentaire
 */
?>
    <div class="card" id="commentaire-<?= $commentaire['id'] ?>">
        <div class="card-block">
            <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
            <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
            <p class="text-right">
                <button type="button" class="btn btn-info reponse" data-id="<?= $commentaire['id'] ?>">Répondre
                </button>
                <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id'] ?>">
                    <button type="button" class="btn btn-warning">Signaler</button>
                </a>
            </p>
        </div>
    </div>

<?php $id_parent_bis = $commentaire['id']; ?>
<?php if (isset($commentaires['enfant'][$id_parent])): ?>
    <?php foreach ($commentaires['enfant'] as $keyBis => $commentaireEnfantBis): ?>
        <?php foreach ($commentaireEnfantBis as $kBis => $commentaire): ?>
            <?php if ($commentaireEnfantBis[$kBis]['parent_id'] == $id_parent_bis): ?>
                <!-- commentaire Enfant -->
                <div style="margin-left: 50px;">
                    <?php include("Vue/Chapitre/_commentaires.php"); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endif; ?>