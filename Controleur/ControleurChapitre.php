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
        $idChapitre = $this->requete->getParametre("id");
        
        $chapitre = $this->chapitre->getChapitre($idChapitre);
        $commentaires = $this->commentaire->getCommentaires($idChapitre);
        
        $this->genererVue(array('chapitre' => $chapitre, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idChapitre = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
}

