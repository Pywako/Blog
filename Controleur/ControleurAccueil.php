<?php
namespace P3_blog\Controleur;
require_once 'Framework/Controleur.php';
require_once 'Modele/Chapitre.php';
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
        $this->genererVue(array('chapitres' => $chapitres));
    }

}

