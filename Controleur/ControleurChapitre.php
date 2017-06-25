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
        $this->chapitre    = new Chapitre();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un chapitre
    public function index() {
        if (isset($_GET['id']))
        {
            $idChapitre     = $this->requete->getParametre("id");
            $chapitre       = $this->chapitre->getChapitre($idChapitre);
            $commentaires   = $this->commentaire->getCommentaires($idChapitre);
        }
        else{
            $this->requete->getSession()->setflash("Le chapitre sélectionner n'existe pas :(", "danger");
        }
        $session = $this->requete->getSession();
        $this->genererVue(array(
            'chapitre' => $chapitre,
            'commentaires' => $commentaires,
            'session' => $session));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        if(isset($_POST['auteur']) && !empty($_POST['auteur']))
        {
            $auteur = htmlspecialchars($this->requete->getParametre("auteur"));
            if(isset($_POST['contenu']) && !empty($_POST['contenu']))
            {
                $contenu = htmlspecialchars($this->requete->getParametre("contenu"));
                if(isset($_POST['id']) && !empty($_POST['id']))
                {
                    $idChapitre = $this->requete->getParametre("id");
                    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idChapitre);
                    $this->requete->getSession()->setflash("Merci pour votre retour, Commentaire ajouté ! ;)", "success");
                }
                else{
                    $this->requete->getSession()->setflash("id du chapitre non reconnu :(", "danger");
                }
            }
            else{
                $this->requete->getSession()->setflash("Vous n'avez rien écrit :(", "danger");
            }
        }
        else{
            $this->requete->getSession()->setflash("comment vous appelez vous?", "danger");
        }
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    public function signaler() {
        $commentaireId = $this->requete->getParametre("id");
        $commentaire   = $this->commentaire->getOneCommentaire($commentaireId);
        $this->commentaire->signaler($commentaireId);
        $this->requete->getSession()->setflash("Le commentaire a bien été signalé.", "success");
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->rediriger("chapitre", "index", $commentaire['chap_id']);
    }
}

