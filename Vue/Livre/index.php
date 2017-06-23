<?php $this->titre = "Billet pour l'Alaska";
?>
<!------------ Table des matières-------------->
<div id="tableMatiere">
    <table>
        <tr>
            <th>Table des matières</th>
        </tr>
        <?php foreach ($titres as $titre):?>
        <tr>
            <td><a href="<?= "Chapitre/index/" . $this->nettoyer($titre['id']) ?>">
                    <h2><?= $this->nettoyer($titre['titre']) ?></h2>
                </a>
            </td>
        </tr>
    <?php endforeach;?>
    </table>
</div>
<?php
$url = "/commentaires/page/";
include "Vue/pagination.php"?>

<?php foreach ($chapitres as $chapitre):
    ?>
    <article class="chapitre">
        <header>
            <a href="<?= "Chapitre/index/" . $this->nettoyer($chapitre['id']) ?>">
                <h1 class="titreChapitre"><?= $this->nettoyer($chapitre['titre']) ?></h1>
            </a>
            <time><?= $this->nettoyer($chapitre['date']) ?></time>
        </header>
        <p><?= $chapitre['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach;
include "Vue/pagination.php"?>

