<?php
/**
 * Bloc correspondant à un commentaire
 */
?>
<div class="panel panel-default" id="commentaire-<?=commentaire['id']?>">
    <div class="panel-body">
        <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
        <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
        <p class="text-right">
            <button type="button" class="btn btn-info reponse" data-id="<?= $commentaire['id']?>">Répondre</button>
            <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id']?>">
                <button type="button" class="btn btn-warning">Signaler</button></a>
        </p>

    </div>
</div>
<div style="margin-left: 50px;">
    <?php if(isset($commentaire['enfant']) && !empty($commentaire['enfant'])):
        foreach ($commentaire['enfant'] as $commentaire) :
            require('Vue/Chapitre/Commentaires.php');
        endforeach;?>
    <?php endif;?>
</div>
