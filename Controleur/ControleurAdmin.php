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
        $login = $this->requete->getSession()->getAttribut("login");
        $session = $this->requete->getSession();
        $chapitres = $this->chapitre->getChapitres();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        //$commentaires = $this->commentaire->getAllCommentaires();
        //$commentaires = $this->affichageCommentaire();
        //$page = $this->requete->getSession()->getAttribut("page");
        $commentaires = $this->commentaire->getNCommentaire(" ",0,5);
        $objChapitre = $this->chapitre;
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login,
            'session' => $session, 'chapitres' => $chapitres, 'commentaires' => $commentaires, 'objChapitre' => $objChapitre));
    }

    public function affichageCommentaire()
    {
        //Nb total de commentaire
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $nbPage = $nbCommentaires / 5; // Pagination
        $page = 0;

        // index de pagination
        if ($nb_page < 1) // qu'une seule page de commentaire
        {}
        else if ($nb_page > 1)
        {
            for ($i=0; $i <= $nb_page; $i++ )
            {
                if($page == $i) // Page courrante
                {
                    echo '<span style="color:grey;">' . $i . '</span>';
                }
                else // Autre page
                {
                    echo ' <a href="admin">'.$i.'</a> ';
                    $this->requete->getSession()->setAttribut("page", $i);
                }
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