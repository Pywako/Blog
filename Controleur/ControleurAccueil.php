<?php
namespace P3_blog\Controleur;
use P3_blog\Framework\Controleur;
use P3_blog\Modele\Chapitre;

class ControleurAccueil extends Controleur {

    private $chapitre;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    // Affiche la liste de tous les chapitres du blog
    public function index() {
        $chapitres = $this->chapitre->getChapitres();
        $session = $this->requete->getSession();
        $this->genererVue(array('chapitres' => $chapitres, 'session' => $session));
    }
}