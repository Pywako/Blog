<?php
/**
 * Vue modification d'un chapitre
 */
$this->titre = "Billet pour l'Alaska - Modifier";
?>
<header>
    <h2>Modification d'un chapitre</h2>
</header>
<form method="post" action="admin/modifierChapitre">
    <p>
        <label for="titre">Titre du chapitre : </label>
        <input type="text" name="titre" id="titre" value="<?php echo $this->nettoyer($chapitre['titre'])?>" required> <br>
        <label for="numero">Chapitre n° : </label>
        <input type="text" name="numero" id="numero" value="<?php echo $this->nettoyer($chapitre['numero'])?>" required> <br>
        <input type="hidden" name="id" id="id" value="<?php echo $chapitre['id']?>">
    </p>
    <textarea id="contenuChapitre" name="contenuChapitre"  class="mytextarea" required>
        <?php echo $chapitre['contenu']?>
        </textarea>

    <input type="submit" value = "envoyer">
</form>