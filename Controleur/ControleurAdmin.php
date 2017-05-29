<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Chapitre.php';
require_once 'Modele/Commentaire.php';
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

    public function index()
    {
        $nbChapitres =$this->chapitre->getNombreChapitres();
        $nbCommentaires = $this->requete->getSession()->getAttribut("login");
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbChapitres' =>$nbChapitres, 'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }
}