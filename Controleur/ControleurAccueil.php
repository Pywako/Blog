<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Chapitre.php';

class ControleurAccueil extends Controleur {

    private $chapitre;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    // Affiche la liste de tous les chapitres du blog
    public function index() {
        $chapitres = $this->chapitre->getChapitres();
        $this->genererVue(array('chapitres' => $chapitres));
    }

}

