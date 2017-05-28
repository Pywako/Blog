<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/billet.php';
require_once 'Modele/Commentaire.php';
/**
 * Contrôleur des action d'administration
 *
 * @author Baptiste Psquet
 */

class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        $nbBillets =$this->billet->getNombreBillets();
        $nbCommentaires = $this->requete->getSession()->getAttribut("login");
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' =>$nbBillets, 'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }
}