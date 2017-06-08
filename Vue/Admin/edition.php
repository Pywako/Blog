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
        <label for="publication">état publication du chapitre : </label>
        <input type="radio" name="publication" value="à publier">
        <input type="radio" name="publication" value="au brouillon" checked><br>
    </p>
    <textarea id="chapitre" name="contenu">Hello, World!</textarea>
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <input type="submit" value = "envoyer">
</form>