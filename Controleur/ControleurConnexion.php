<?php
namespace P3_blog\Controleur;

use P3_blog\Framework\Controleur;
use P3_blog\Modele\utilisateur;

/**
 * Controleur de connexion
 */
class ControleurConnexion extends Controleur
{
    private $utilisateur;
    private $msgErreur;
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        if(empty($this->msgErreur))
        {
            $this->genererVue();
        }
        else
        {
            $this->genererVue($this->msgErreur);
        }
    }

    public function connecter()
    {
        if ($this->requete->existeParametrePost("login") && $this->requete->existeParametrePost("mdp"))
        {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if($this->utilisateur->connecter($login, $mdp))
            {
                $utilisateur = $this->utilisateur->getUtilisateur($login);
                $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
                $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                $this->rediriger("Admin");
            }
            else
            {
                $this->msgErreur = array('msgErreur' => 'Login ou mot de passe incorrects');
                $this->executerAction("index");
            }
        }
        else
            throw new \Exception ("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("Accueil");
    }
}