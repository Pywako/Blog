<?php
/**
 * Page de gestion des commentaires dans l'interface admin
 */
$this->titre = "Administration commentaires";?>
<header id="adminCommentaire">
    <h2>Administration Commentaire</h2>
    Ce blog comporte <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
</header>
<div class="table-responsive">
    <table class = "table table-striped table-bordered table-hover">
        <tr>
            <th>Auteur</th>
            <th>Date</th>
            <th>Chapitre</th>
            <th>Commentaire</th>
            <th>Signalement</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($commentaires as $commentaire):
            $chap = $objChapitre->getChapitre($commentaire['chap_id']);?>
            <tr <?php if($commentaire['com_signalement']) echo "class='signalement'"?>>
                <td><?= $this->nettoyer($commentaire['com_auteur']) ?></td>
                <td><time><?= $this->nettoyer($commentaire['com_date']) ?></time></td>
                <td><?php echo $this->nettoyer($chap['numero']); ?></td>
                <td><?= $this->nettoyer($commentaire['com_contenu']) ?></td>
                <td><?= $this->nettoyer($commentaire['com_signalement']) ?></td>

                <td><a id="supprimerCommentaire" href="<?= "admin/supprimerCommentaire/" . $commentaire['com_id']?>">
                        <button type="button" class="btn btn-danger" title="supprimer" alt="supprimer"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                    <a id="RAZCommentaire" href="<?= "admin/remiseAZero/" . $commentaire['com_id']?>">
                        <button type="button" class="btn btn-primary" title="remise à zéro" alt="remiseAZero"><i class="fa fa-circle-o" aria-hidden="true"></i></button></a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
<!---------------- Pagination ------------>
<?php
$url = "admin/commentaires?page=";
include "Vue/pagination.php"?>