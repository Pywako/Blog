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
    <?php
    $commentaireParId =[];

    // tableau de commentaires indexé par leur id
    foreach ($commentaires as $commentaire) {
        $commentaireParId[$commentaire['id']] = $commentaire;
    }

    //Entrer les valeurs enfants (tableau commentaire) pour le champs enfant d echaque parent
    foreach ($commentaires as $key => $commentaire){
        if($commentaire['parent_id'] != 0) // Réponse
        {
            $commentaireParId[$commentaire['parent_id']]['enfant']= $commentaire;
            unset($commentaireParId[$key]);
        }
        /*
        // Seconde boucle pour compléter les enfants des enfants
        foreach ($commentaireParId as $k => $commentaireEnfant)
        {
            if($commentaireEnfant['parent_id']!=0)
            {
                $commentaireParId[$commentaireEnfant['parent_id']]['enfant'] = $commentaireEnfant;
            }
        }
        */
    }
    //$commentaires = $commentaireParId;
    // Inclusion de la partie HTML
    /*
    foreach ($commentaireParId as $key=>$commentaire):?>
        <?php require ('Vue/Chapitre/Commentaires.php');
        ?>
    <?php endforeach;
    */
    ?>
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


