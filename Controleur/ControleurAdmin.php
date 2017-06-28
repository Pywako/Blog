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
        $this->chapitre    = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    /**
     * Fonction permettant de générer la vue index de l'interface d'administration
     */
    public function index()
    {
        $nbChapitres    = $this->chapitre->getNombreChapitres();
        $login          = $this->requete->getSession()->getAttribut("login");
        $session        = $this->requete->getSession();

        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $objChapitre = $this->chapitre;

        if($nbChapitres > 0 && $nbCommentaires > 0){ // Chapitre et commentaire
            $offset = 0;
            $limit  = 5;
            $commentaires = $this->commentaire->getNCommentaire("", $offset, $limit);
            $chapitres      = $this->chapitre->getChapitres();
            $this->genererVue(array(
                'nbChapitres'   => $nbChapitres,
                'nbCommentaires'=> $nbCommentaires,
                'login'         => $login,
                'session'       => $session,
                'chapitres'     => $chapitres,
                'commentaires'  => $commentaires,
                'objChapitre'   => $objChapitre));
        }
        else{
            if($nbCommentaires <= 0 && $nbChapitres > 0){ // Chapitre seul
                $chapitres      = $this->chapitre->getChapitres();
                $this->genererVue(array(
                    'nbChapitres'   => $nbChapitres,
                    'nbCommentaires'=> $nbCommentaires,
                    'login'         => $login,
                    'session'       => $session,
                    'chapitres'     => $chapitres));
            }
            else{ // ni chapitre, ni commentaire
                $this->genererVue(array(
                    'nbChapitres'   => $nbChapitres,
                    'nbCommentaires'=> $nbCommentaires,
                    'login'         => $login,
                    'session'       => $session));
            }
        }
    }

    /**
     * Fonction générant le panneau de création de chapitre
     *
     */
    public function creation()
    {
        $numeroChapitre = $this->chapitre->getNumDernierChapitre() + 1;
        $session = $this->requete->getSession();
        $this->genererVue(array(
            'numeroChapitre'=> $numeroChapitre,
            'session'       => $session));

    }

    /**
     * Fonction générant l'interface de modification d'un chapitre
     */
    public function modification()
    {
        $chapitreId = $this->requete->getParametre('id');
        $chapitre= $this->chapitre->getChapitre($chapitreId);
        $session = $this->requete->getSession();
        $this->genererVue(array(
            'chapitre'=> $chapitre,
            'session' => $session));
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

    /**
     * Fonction de modification de chapitre dans la bdd
     * Redirection sur l'interface d'administration index()
     */
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

    /**
     * Fonction générant la page d'administration des commentaires
     */
    public function commentaires()
    {
        $session        = $this->requete->getSession();
        $chapitres      = $this->chapitre->getChapitres();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $objChapitre    = $this->chapitre;
        $commentaires   = $this->pagination()['commentaires'];
        $nbPage         = $this->pagination()['nbPage'];
        $pageActuelle   = $this->pagination()['pageActuelle'];
        $this->genererVue(array(
            'nbCommentaires'=> $nbCommentaires,
            'session'       => $session,
            'chapitres'     => $chapitres,
            'commentaires'  => $commentaires,
            'nbPage'        => $nbPage,
            'objChapitre'   => $objChapitre,
            'pageActuelle'  => $pageActuelle));
    }

    /**
     * Gestion de la pagination des commentaires
     *
     * @return array pagination contenant
     *      les commentaires choisi (10 par page)
     *      le nombre de page
     *      la page actuelle
     */
    public function pagination()
    {
        $nbCommentaires         = $this->commentaire->getNombreCommentaires();
        $nbcommentaireParPage   = 10; //= limit
        $nbPage = ceil($nbCommentaires/$nbcommentaireParPage);
        $page   = $this->requete->getParametre("page");
        if (isset($page))
        {
            $pageActuelle = intval($page);
            if($pageActuelle > $nbPage)
            {
                $pageActuelle = $nbPage;
            }
        }
        else
        {
            $pageActuelle   = 1;
        }
        $premierCommentaire = ($pageActuelle-1) * $nbcommentaireParPage;
        $commentaires       = $this->commentaire->getNCommentaire("", $premierCommentaire, $nbcommentaireParPage);
        $pagination         = array (
            'commentaires'  => $commentaires,
            'nbPage'        => $nbPage,
            'pageActuelle'  => $pageActuelle
        );
        return $pagination;
    }

    public function supprimerCommentaire()
    {
        $commentaireId = $this->requete->getParametre('id');
        $commentaire = $this->commentaire->getOneCommentaire($commentaireId);
        $this->commentaire->supprimerCommentaire($commentaireId);
        $contenuCommentaire = $commentaire['com_contenu'];
        $this->requete->getSession()->setflash("Le commentaire $contenuCommentaire a bien été supprimé.", "success");
        $this->rediriger("admin");
    }
    public function remiseAZero()
    {
        $commentaireId = $this->requete->getParametre('id');
        $unCommentaire = $this->commentaire->getOneCommentaire($commentaireId);
        $contenuCommentaire = $unCommentaire['com_contenu'];
        $signalement = 0;
        $this->commentaire->modifierCommentaire($contenuCommentaire, $signalement, $commentaireId);
        $this->requete->getSession()->setflash("Les signalements du commentaire $contenuCommentaire ont bien été remis 
        à zéro.", "success");
        $this->rediriger("admin");
    }
}