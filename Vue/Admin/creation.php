<?php
/**
Page d'écriture du chapitre
 */

$this->titre = "Billet pour l'Alaska - Ecriture" ?>
<header>
    <h2>Ecriture d'un chapitre</h2>
</header>

<form method="post" action="admin/creer">
    <p>
        <label for="titre">Titre du chapitre : </label>
        <input type="text" name="titre" id="titre"> <br>
        <label for="numero">Chapitre n° : </label>
        <input type="text" name="numero" id="numero" value="<?php echo $this->nettoyer($numeroChapitre)?>"> <br>
        <label for="publication">Etat publication du chapitre : </label>
        <label for="publier">Publier</label>
        <input type="radio" name="publication" value="publier">
        <label for="brouillon">Brouillon</label>
        <input type="radio" name="publication" value="brouillon" checked><br>
    </p>
    <textarea id="creerChapitre" name="contenu" placeholder="Ecrire le contenu du chapitre ici">

    </textarea>
    <input type="submit" value = "envoyer">
</form>