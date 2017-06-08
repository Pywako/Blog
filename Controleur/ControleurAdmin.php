<?php
namespace P3_blog\Controleur;
use P3_blog\Modele\Chapitre;
use P3_blog\Modele\Commentaire;

/**
 * Contrôleur des action d'administration
 */

class ControleurAdmin extends ControleurSecurise
{
    private $chapitre;
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        $nbChapitres =$this->chapitre->getNombreChapitres();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }

    public function creer()
    {
        $numero = $this->requete->getParametre("numero");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $publication = $this->requete->getParametre("publication");
        $this->chapitre->ajouterChapitre($numero, $titre, $contenu, $publication);

        $this->executerAction("creer");
    }

}