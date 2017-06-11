<?php
/**
Page d'écriture et modification du chapitre
 */
if (empty($chapitre)) // Ecriture
{
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
        <textarea id="creerChapitre" name="contenu" placeholder="Ecrire le contenu du chapitre ici" required>

    </textarea>
        <input type="submit" value = "envoyer">
    </form>

<?php}
else // Modification
{
    $this->titre = "Billet pour l'Alaska - Modifier";
    ?>
    <header>
        <h2>Modification d'un chapitre</h2>
    </header>
    <form method="post" action="admin/modifierChapitre">
        <p>
            <label for="titre">Titre du chapitre : </label>
            <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($chapitre['titre'])?>" required> <br>
            <label for="numero">Chapitre n° : </label>
            <input type="text" name="numero" id="numero" value="<?php echo $this->nettoyer($chapitre['numero'])?>" required> <br>
        </p>
        <textarea id="creerChapitre" name="contenu" value="<?= $this->nettoyer($chapitre['contenu'])?>" required>
        </textarea>
        <input type="hidden" name="id" id="id" value="<?php echo $this->nettoyer($chapitre['numero'])?>">
        <input type="submit" value = "envoyer">
    </form>

<?php } ?>