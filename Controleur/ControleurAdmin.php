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
        $chapitres = $this->chapitre->getChapitres();
        $nbChapitres =$this->chapitre->getNombreChapitres();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $msgRetour = $this->getMsgRetour();
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login,
            'msgRetour' => $msgRetour, 'chapitres' => $chapitres, /*'commentaires' => $commentaires*/));
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
    public function modification()
    {
        $chapitreId = $this->requete->getParametre("id");
        $chapitre= $this->chapitre->getChapitre($chapitreId);
        $this->genererVue(array('chapitre'=> $chapitre));
    }

    /**
     * Fonction de création du chapitre dans la bdd
     * Redirection sur l'interface d'administration index()
     */
    public function creer()
    {
        $chapitreId = $this->requete->getParametre("id");
        $numero = $this->requete->getParametre("numero");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $this->chapitre->ajouterChapitre($numero, $titre, $contenu);
        $this->setMsgRetour("Le chapitre $chapitreId a bien été publié.");
        $this->executerAction("index");
    }

    public function modifierChapitre()
    {
        $chapitreId = $this->requete->getParametre("id");
        $numero = $this->requete->getParametre("numero");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenuChapitre");
        $this->chapitre->modifierChapitre($numero, $titre, $contenu, $chapitreId);
        $this->setMsgRetour("Le chapitre $numero a bien été modifié.");
        $this->executerAction("index");
    }

    /**
     * Fonction de suppression du chapitre dans la bdd
     * Redirection sur l'interface d'administration index()
     */
    public function supprimerChapitre()
    {
        $chapitreId = $this->requete->getParametre("id");
        $chapitreNumero = $this->requete->getParametre("numero");
        $this->chapitre->supprimerChapitre($chapitreId);
        $this->setMsgRetour("Le chapitre $chapitreNumero a bien été supprimé.");
        $this->executerAction("index");
    }
}