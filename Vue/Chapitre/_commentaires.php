<?php
/**
 * Bloc correspondant à un commentaire
 */

?>
<?php if ($niveau < 2): ?>
    <div class="card" id="commentaire-<?= $commentaire['id'] ?>">
        <div class="card-block">
            <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
            <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
            <p class="text-right">
                <button type="button" class="btn btn-info reponse" data-id="<?= $commentaire['id'] ?>"
                        data-niveau="<?= $niveau ?>">Répondre
                </button>
                <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id'] ?>">
                    <button type="button" class="btn btn-warning">Signaler</button>
                </a>
            </p>
        </div>
    </div>

    <?php $id_parent2 = $commentaire['id']; ?>
    <?php if (isset($commentaires['enfant'][$id_parent2])):
        // Boucle sur les enfants?>
        <?php foreach ($commentaires['enfant'] as $key => $commentaireEnfant): ?>
            <?php if ($key == $id_parent2): ?>
                <?php foreach ($commentaireEnfant as $commentaire): ?>
                    <?php $niveau = 2; ?>
                    <!-- commentaire Enfant -->
                    <div style="margin-left: 50px;">
                        <?php include("Vue/Chapitre/_commentaires.php"); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
<?php if ($niveau == 2 && isset($commentaires['enfant'][$id_parent2])): ?>
    <div class="card" id="commentaire-<?= $commentaire['id'] ?>">
        <div class="card-block">
            <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
            <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
            <p class="text-right">
                <button type="button" class="btn btn-info reponse" data-id="<?= $commentaire['id'] ?>"
                        data-niveau="<?= $niveau ?>">Répondre
                </button>
                <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id'] ?>">
                    <button type="button" class="btn btn-warning">Signaler</button>
                </a>
            </p>
        </div>
    </div>
    <?php $id_parent2 = $commentaire['id']; ?>
    <?php if (isset($commentaires['enfant'][$id_parent2])):
        // Boucle sur les enfants?>
        <?php foreach ($commentaires['enfant'] as $key => $commentaireEnfant): ?>
            <?php if ($key == $id_parent2): ?>
                <?php foreach ($commentaireEnfant as $commentaire): ?>
                    <?php $niveau = 3; ?>
                    <!-- commentaire Enfant -->
                    <div style="margin-left: 50px;">
                        <div class="card" id="commentaire-<?= $commentaire['id'] ?>">
                            <div class="card-block">
                                <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
                                <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
                                <p class="text-right">
                                    <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id'] ?>">
                                        <button type="button" class="btn btn-warning">Signaler</button>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
