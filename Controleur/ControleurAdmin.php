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

    /**
     * Fonction permettant de générer la vue index de l'interface d'administration
     */
    public function index()
    {
        $nbChapitres =$this->chapitre->getNombreChapitres();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $msgRetour = $this->getMsgRetour();
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login, 'msgRetour' => $msgRetour));
    }

    /**
     * Fonction générant le panneau de création de chapitre
     *
     */
    public function creation()
    {
        $numeroChapitre = $this->chapitre->getNumDernierChapitre() + 1;
        $this->genererVue(array('numeroChapitre' =>$numeroChapitre));
    }

    /**
     * Fonction de création du chapitre dans la bdd
     * Redirection sur l'interface d'administration
     */
    public function creer()
    {
        $numero = $this->requete->getParametre("numero");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $this->chapitre->ajouterChapitre($numero, $titre, $contenu);
        $this->setMsgRetour("Le chapitre a bien été publié.");
        $this->executerAction("index");
    }
}