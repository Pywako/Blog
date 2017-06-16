<?php
namespace P3_blog\Controleur;

use P3_blog\Framework\Controleur;
use P3_blog\Modele\Chapitre;
use P3_blog\Modele\Commentaire;
/**
 * Contrôleur des actions liées aux chapitres
 */
class ControleurChapitre extends Controleur {

    private $chapitre;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->chapitre = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un chapitre
    public function index() {
        if(isset($_SESSION['id']))
        {
            $idChapitre = $this->requete->getSession()->getAttribut("id");
        }
        else
        {
            $idChapitre = $this->requete->getParametre("id");
        }
        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getCommentaires($idChapitre);
        $session = $this->requete->getSession();
        $this->genererVue(array('chapitre' => $chapitre, 'commentaires' => $commentaires, 'session' => $session));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idChapitre = $this->requete->getParametre("id");
        $auteur = htmlspecialchars($this->requete->getParametre("auteur"));
        $contenu = htmlspecialchars($this->requete->getParametre("contenu"));
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
        $this->requete->getSession()->setflash("Commentaire ajouté !", "success");
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    public function signaler() {
        $commentaireId = $this->requete->getParametre("id");
        $commentaire = $this->commentaire->getOneCommentaire($commentaireId);
        $this->commentaire->signaler($commentaireId);
        $this->requete->getSession()->setflash("Le commentaire a bien été signalé.", "success");
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->rediriger("chapitre", "index", $commentaire['chap_id']);
    }
}

