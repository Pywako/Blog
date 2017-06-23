<?php
/**
 * Page de gestion des commentaires dans l'interface admin
 */
$this->titre = "Billet pour l'Alaska - Administration commentaires";?>
<header id="adminCommentaire">
    <h2>Administration Commentaire</h2>
    Ce blog comporte <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
    <a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
    <a href="admin">Retour à l'adminisatration</a>
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
                        <button type="button" class="btn btn-danger" title="supprimer" alt="supprimer"><span class="glyphicon glyphicon-remove"></span></span></button></a>
                    <a id="RAZCommentaire" href="<?= "admin/remiseAZero/" . $commentaire['com_id']?>">
                        <button type="button" class="btn btn-primary" title="remise à zéro" alt="remiseAZero"><span class="glyphicon glyphicon-refresh"></span></span></button></a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
<!---------------- Pagination ------------>
<?php
$url = "admin/commentaires/page/";
include "Vue/pagination.php"?>