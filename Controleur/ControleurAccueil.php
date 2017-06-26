<?php
/**
 * Controleur de la page d'accueil
 */

namespace P3_blog\Controleur;
use P3_blog\Framework\Controleur;
use P3_blog\Modele\Chapitre;

class ControleurAccueil extends Controleur
{
    private $chapitre;
    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    // Affiche la liste de tous les chapitres du blog
    public function index() {
        $session        = $this->requete->getSession();
        $nbChapitres    = $this->chapitre->getNombreChapitres();
        if($nbChapitres > 0)
        {
            $chapitre   = $this->chapitre->getDernierChapitre();
            $this->genererVue(array(
                'chapitre'  => $chapitre,
                'session'   => $session));
        }
        else{
            $this->genererVue(array(
                'session' => $session));
        }
    }
    public function mentions() {
        $session    = $this->requete->getSession();
        $this->genererVue(array(
            'session' => $session));
    }
}