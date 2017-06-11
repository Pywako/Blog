<?php
/**
Page d'écriture et modification du chapitre
 */

    $this->titre = "Billet pour l'Alaska - Ecriture";
    ?>
    <header>
        <h2>Ecriture d'un chapitre</h2>
    </header>
    <form method="post" action="admin/creer">
        <p>
            <label for="titre">Titre du chapitre : </label>
            <input type="text" name="titre" id="titre" required> <br>
            <label for="numero">Chapitre n° : </label>
            <input type="text" name="numero" id="numero" value="<?php echo $this->nettoyer($numeroChapitre)?>" required> <br>
            <input type="hidden" name="id" id="id" value="<?php echo $this->nettoyer($numeroChapitre)?>">
        </p>
        <textarea id="creerChapitre" name="contenu" class="mytextarea" required>

    </textarea>
        <input type="submit" value = "envoyer">
    </form>
