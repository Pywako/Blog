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
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $session = $this->requete->getSession();
        $this->genererVue(array('session' => $session));
    }

    /**
     * Fonction de connexion, test des login et mot de passe
     * @throws \Exception
     */
    public function connecter()
    {
        if ($this->requete->existeParametrePost("login") && $this->requete->existeParametrePost("mdp"))
        {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            $patternLogin = "#[a-zA-Z0-9]{4}#";
            if(preg_match($patternLogin, $login)){
                $patternMdp = "#[a-zA-Z0-9]{4}#";
                if (preg_match($patternMdp, $mdp)){
                    if($this->utilisateur->connecter($login, $mdp))
                    {
                        $utilisateur = $this->utilisateur->getUtilisateur($login);
                        $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
                        $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                        $this->requete->getSession()->setAttribut("page", 1);
                        $this->rediriger("Admin");
                    }
                    else
                    {
                        $this->requete->getSession()->setflash("Login ou mot de passe incorrects");
                        $this->rediriger("connexion");
                    }
                }else
                {
                    $this->requete->getSession()->setflash("Mot de passe non conforme");
                    $this->rediriger("connexion");
                }
            }else
            {
                $this->requete->getSession()->setflash("Login non conforme");
                $this->rediriger("connexion");
            }
        }
        else
        {
            $this->requete->getSession()->setflash("Action impossible : login ou mot de passe non défini");
            $this->rediriger("connexion");
        }
    }

    /**
     * Fonction de déconnexion, destruction de la session
     */
    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("Accueil");
    }
}