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
        $commentaires = $this->commentaire->getAllCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $session = $this->requete->getSession();
        $objChapitre = $this->chapitre;
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login,
            'session' => $session, 'chapitres' => $chapitres, 'commentaires' => $commentaires, 'objChapitre' => $objChapitre));
    }

    /**
     * Fonction générant le panneau de création de chapitre
     *
     */
    public function creation()
    {
        $numeroChapitre = $this->chapitre->getNumDernierChapitre() + 1;
        $session = $this->requete->getSession();
        $this->genererVue(array('numeroChapitre' =>$numeroChapitre, 'session' => $session));

    }
    public function modification()
    {
        $chapitreId = $this->requete->getParametre('id');
        $chapitre= $this->chapitre->getChapitre($chapitreId);
        $session = $this->requete->getSession();
        $this->genererVue(array('chapitre'=> $chapitre, 'session' => $session));
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
        $this->requete->getSession()->setflash("Le chapitre $chapitreId a bien été publié.", "success");
        $this->rediriger("admin");
    }

    public function modifierChapitre()
    {
        $chapitreId = $this->requete->getParametre("id");
        $numero = $this->requete->getParametre("numero");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenuChapitre");
        $this->chapitre->modifierChapitre($numero, $titre, $contenu, $chapitreId);
        $this->requete->getSession()->setflash("Le chapitre $numero a bien été modifié.", "success");
        $this->rediriger("admin");
    }

    /**
     * Fonction de suppression du chapitre dans la bdd
     * Redirection sur l'interface d'administration index()
     */
    public function supprimerChapitre()
    {
        $chapitreId = $this->requete->getParametre("id");
        $this->chapitre->supprimerChapitre($chapitreId);
        $this->requete->getSession()->setflash("Le chapitre a bien été supprimé.", "success");
        $this->rediriger("admin");
    }

    public function supprimerCommentaire()
    {
        $commentaireId = $this->requete->getParametre('id');
        $this->commentaire->supprimerCommentaire($commentaireId);
        $commentaire = $this->commentaire->getOneCommentaire($commentaireId);
        $contenuCommentaire = $commentaire['contenu'];
        $this->requete->getSession()->setflash("Le commentaire $contenuCommentaire a bien été supprimé.", "success");
        $this->rediriger("admin");
    }

}