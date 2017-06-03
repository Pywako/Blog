<?php
namespace P3_blog\Controleur;
require_once 'Framework/Controleur.php';
require_once 'Modele/utilisateur.php';
use P3_blog\Framework\Controleur;
use P3_blog\Modele\utilisateur;

/**
 * Controleur de connexion
 */
class ControleurConnexion extends Controleur
{
    private $utilisateur;
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametrePost("login") && $this->requete->existeParametrePost("mdp"))
        {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if($this->utilisateur->connecter($login, $mdp))
            {
                $utilisateur = $this->utilisateur->getUtilisateur($login, $mdp);
                $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
                $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                $this->rediriger("admin");
            }
            else
            {
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'), "index");
            }
        }
        else
            throw new Exception ("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }
}