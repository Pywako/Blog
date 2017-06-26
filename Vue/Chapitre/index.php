<?php $this->titre = "Billet pour l'Alaska ". "<br>" . "Chapitre " . $this->nettoyer($chapitre['numero']);?>

<article class="chapitre">
    <header>
        <h1 class="titreChapitre"><?= $this->nettoyer($chapitre['titre']) ?></h1>
        <time><?= $this->nettoyer($chapitre['date']) ?></time>
    </header>
    <p><?= $chapitre['contenu'] ?></p>
</article>
<hr />
<div class="commentaire">
    <header>
        <h1 id="titreReponses">Réponses à <?= $this->nettoyer($chapitre['titre']) ?></h1>
    </header>
    <?php foreach ($commentaires as $commentaire):?>
        <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
        <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
        <a id="signalerCommentaire" href="<?= "chapitre/signaler/" . $commentaire['id']?>">
            <button type="button" class="btn btn-warning">Signaler</button></a>
    <?php endforeach; ?>
    <hr />
    <!-------------- Commenter -------------->
    <form method="post" action="chapitre/commenter" id="formulaireCommenter">
        <input type="hidden" name="parend_id" value="0">
        <h3>Poster un commentaire</h3>
        <div class="form-group">
            <input id="auteur" name="auteur" type="text" class="form-control" placeholder="Votre pseudo" required /><br />
            <textarea id="txtCommentaire" name="contenu" class="form-control" placeholder="Votre commentaire" required></textarea>
            <input class="sr-only" type="hidden" name="id" value="<?= $chapitre['id']?>" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Commenter</button>
        </div>
    </form>
</div>


