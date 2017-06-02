<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
require_once 'Framework/Requete.php';
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
        $signalement = 0;
        $contenu = $this->requete->getParametre("contenu");
        
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $signalement, $idChapitre);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
}

