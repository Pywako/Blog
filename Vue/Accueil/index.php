<?php
/**
Page d'accueil du site
 */
$this->titre = "Billet pour l'Alaska ";?>


<article class="chapitre">
    <header id="headerIntroduction">
        <p id="introduction">Venez voyager le temps d'une parenthèse dans un autre monde.<br>
            De nouvelles terres à explorer, de nouveaux horizon à découvrir.<br>
            Me suivrez vous?</p>
        <a href="Livre/index/page/1" id="btnCommencer"><button class="btn btn-primary">Commencer la lecture</button></a>

    </header>
    <section>
        <h2>Un roman électronique?<br>
            Un univers à porté de clic</h2>
        <p>Une fois toutes les deux semaines, le mercredi à 20h, un chapitre sera publié.
        </p>
    </section>

    <section>
    <h2>Dernier chapitre :</h2>
    <a href="<?= "Chapitre/index/" . $this->nettoyer($chapitre['id']) ?>">
        <h1 class="titreChapitre"><?= $this->nettoyer($chapitre['titre']) ?></h1>
    </a>
    <time><?= $this->nettoyer($chapitre['date']) ?></time>
    <div class="chapitre"><?= $chapitre['contenu'] ?></div>
    </section>

    <section>
        <h2>Quelques mots sur l'auteur</h2>
        <p>Jean ForteRoche est à la fois acteur et écrivain. Enfant il rêvait d'aventure, d'imaginaire et d'action.
            Puis un jour il eu l'occasion de toucher à l'univers du cinéma et y resta près de 10 ans avant de revenir à
            sa passion première pour les mots. Après quelques publication papier, il a décidé de se lancer un nouveau défi:
            Essayer un nouveau mode de publication périodique en ligne. <br>
            Un rythme soutenu, et un fil d'histoire à partager avec ses lecteurs .
        </p>
    </section>
</article>
<hr />

