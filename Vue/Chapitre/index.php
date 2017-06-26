<?php $this->titre = "Billet pour l'Alaska " . "<br>" . "Chapitre " . $this->nettoyer($chapitre['numero']); ?>

<article class="chapitre">
    <header>
        <h1 class="titreChapitre"><?= $this->nettoyer($chapitre['titre']) ?></h1>
        <time><?= $this->nettoyer($chapitre['date']) ?></time>
    </header>
    <p><?= $chapitre['contenu'] ?></p>
</article>
<hr/>
<div class="commentaire">
    <header>
        <h1 id="titreReponses">Réponses à <?= $this->nettoyer($chapitre['titre']) ?></h1>
    </header>
    <?php

    // Inclusion de la partie HTML

    foreach ($commentaires['parent'] as $commentaire): ?>
        <div class="panel panel-default" id="commentaire-<?= $commentaire['id'] ?>">
            <div class="panel-body">
                <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
                <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
                <p class="text-right">
                    <button type="button" class="btn btn-info reponse" data-id="<?= $commentaire['id'] ?>">Répondre
                    </button>
                    <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id'] ?>">
                        <button type="button" class="btn btn-warning">Signaler</button>
                    </a>
                </p>
                <?php if (isset($commentaires['enfant'][$commentaire['id']])): ?>
                    <?php foreach ($commentaires['enfant'] as $commentaireEnfant): ?>
                        <?php if ($commentaireEnfant['parent_id'] == $commentaire['id']): ?>
                            <div id="commentaire-<?= $commentaireEnfant['id'] ?>"
                                 style="margin-left: 50px;">
                                <?php include("Vue/Chapitre/_commentaires.php"); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <hr/>
    <!-------------- Commenter -------------->
    <form method="post" action="chapitre/commenter" id="formulaireCommenter">
        <input type="hidden" name="parend_id" value="0">
        <h3>Poster un commentaire</h3>
        <div class="form-group">
            <input id="auteur" name="auteur" type="text" class="form-control" placeholder="Votre pseudo"
                   required/><br/>
            <textarea id="txtCommentaire" name="contenu" class="form-control" placeholder="Votre commentaire"
                      required></textarea>
            <input class="sr-only" type="hidden" name="id" value="<?= $chapitre['id'] ?>"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Commenter</button>
        </div>
    </form>
</div>


