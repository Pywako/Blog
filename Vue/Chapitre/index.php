<?php $this->titre = "Billet pour l'Alaska - Jean Forteroche - Chapitre " . $this->nettoyer($chapitre['numero']) . " - " . $this->nettoyer($chapitre['titre']); ?>

<article class="chapitre">
    <header>
        <h1 class="titreChapitre"><?= $this->nettoyer($chapitre['titre']) ?></h1>
        <time><?= $this->nettoyer($chapitre['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($chapitre['contenu']) ?></p>
</article>
<hr />
<div class="commentaire">
    <header>
        <h1 id="titreReponses">Réponses à <?= $this->nettoyer($chapitre['titre']) ?></h1>
    </header>
    <?php foreach ($commentaires as $commentaire): ?>
        <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
        <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
    <?php endforeach; ?>
    <hr />
    <form method="post" action="chapitre/commenter">
        <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"
               required /><br />
        <textarea id="txtCommentaire" name="contenu" rows="4"
                  placeholder="Votre commentaire" required></textarea><br />
        <input type="hidden" name="id" value="<?= $chapitre['id'] ?>" />
        <input type="submit" value="Commenter" />
    </form>
</div>


