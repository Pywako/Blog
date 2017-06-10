<?php
namespace P3_blog\Framework;

/**
 * Created by PhpStorm.
 * User: Pywa
 * Date: 26/05/2017
 * Time: 11:08
 */
abstract class Controleur
{
    // Action à réaliser
    private $action;

    // Requête entrante
    protected $requete;
    protected $msgErreur;
    protected $msgRetour;

    /**
     * Exécution de l'action à réaliser
     * Appel de la méthode portant le même nom que l'objet controleur actif
     *
     * @param string $action
     * @throws \Exception
     */

    public function executerAction($action)
    {
        if(method_exists($this, $action))
        {
            $this->action = $action;
            $this->{$this->action}();
        }
        else
        {
            $classeControleur = get_class($this);
            throw new \Exception ("Action '$action' nom définie dans la classe '$classeControleur' ");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Les classe dérivées devront implémenter cette action par défaut
     * @return mixed
     */

    public abstract function index();

    /**
     * Génération de la vue correspondante à l'action par défaut
     * @param array $donneesVue
     */
    protected function genererVue($donneesVue = array())
    {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actif
        $classeControleur = get_class($this);
        $nomControleur = str_replace("Controleur\\", "", $classeControleur);
        // Instanciation et génération de la Vue
        if (isset($this->msgErreur) && $this->msgErreur != null)
        {
            $vue = new Vue($this->action, $nomControleur, $this->msgErreur, 'erreur');
        }
        else if (isset($this->msgRetour) && $this->msgRetour != null)
        {
            $vue = new Vue($this->action, $nomControleur, $this->msgRetour, 'retour');
        }
        else
        {
            $vue = new Vue($this->action, $nomControleur);
        }

        $vue->generer($donneesVue);
    }

    /**
     * Définission de la requête entrante
     *
     * @param Requete $requete // Requête entrante
     */
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     *
     * @param string $controleur Contrôleur
     * @param string $action Action Action
     */
    protected function rediriger($controleur, $action = null)
    {
        $racineBlog = Configuration::get("racineBlog", "/");
        // Redirection vers l'url Racine_site/controleur/action
        header("Location:" . $racineBlog . $controleur . "/" . $action);
    }
    protected function setMsgErreur($msgErreur)
    {
        if (isset($msgErreur) && $msgErreur != null)
        {
            $this->msgErreur = $msgErreur;
        }
        else
        {
            throw new \Exception ("Message d'erreur non défini");
        }
    }
    protected function setMsgRetour(string $msgRetour)
    {
        if (isset($msgRetour) && $msgRetour != null)
        {
            $this->msgRetour = $msgRetour;
        }
        else
        {
            throw new \Exception ("Message de retour non défini");
        }
    }

    protected function getMsgErreur()
    {
        if (isset($msgErreur))
        {
            return $this->msgErreur;
        }
    }
    protected function getMsgRetour()
    {
        if (isset($msgRetour))
        {
            return $this->msgRetour;
        }
    }
}