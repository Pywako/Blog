<?php
/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 05/06/2017
 * Time: 10:59
 */

namespace P3_blog\Controleur;

class ControleurArticle extends ControleurAdmin
{
    public function ecrire()
    {
        $numero = $requete->getParametre("numero");
        $titre = $requete->getParametre("titre");
        $contenu = $requete->getParametre("contenu");
        $publication = $requete->getParametre("publication");
        $this->chapitre->ajouterChapitre($numero, $titre, $contenu, $publication);

        $this->executerAction("index");
    }
}