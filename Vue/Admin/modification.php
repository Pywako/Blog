<?php
/**
 * Vue modification d'un chapitre
 */
$this->titre = "Billet pour l'Alaska - Modifier";
?>

<header>
    <h2>Modification d'un chapitre</h2>
</header>
<form method="post" action="admin/modifierChapitre" class="form-group">
    <p>
        <label for="titre">Titre du chapitre : </label>
        <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $this->nettoyer($chapitre['titre']);?>" required> <br>
        <label for="numero">Chapitre n° : </label>
        <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $this->nettoyer($chapitre['numero']);?>" required> <br>
        <input type="hidden" class="sr-only" name="id" id="id" value="<?php echo $chapitre['id'];?>">
    </p>
    <div id="creerChapitre" name="contenu">
        <textarea id="contenuChapitre" name="contenuChapitre"  class="mytextarea" required>
            <?php echo $chapitre['contenu'];?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary" value = "envoyer">Publier</button>
</form>

<!-------------------------------- Tinymce -------------------------------->

<script src="../../../tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({
        selector: '.mytextarea',
        width: 1000,
        height: 300,
        plugins: "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker " +
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking " +
        "save table contextmenu directionality emoticons template paste textcolor autosave",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright " +
        "alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | " +
        "forecolor backcolor emoticons | restoredraft spellchecker"
    });</script>