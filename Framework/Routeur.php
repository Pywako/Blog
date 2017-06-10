<?php
namespace P3_blog\Framework;

/**
 * Classe de redirection des requêtes entrantes
 *
 * Inspirée du SimpleFramework de Frédéric Guillot et du cours de Baptiste Pesquet
 * (https://github.com/fguillot/simpleFramework)
 * (https://github.com/bpesquet/MonBlog/tree/master)
 */

class Routeur
{
    /**
     *
     */
    public function examinerRequete()
    {
        try
        {
            // Récupération des requêtes GET
            $requeteGet = $_GET;
            // Récupération des requêtes POST
            $requetePost = $_POST;
            // Création d'un objet Requette avec Les 2 attribut précédent en entrée
            $requete = new Requete($requeteGet, $requetePost);
            // Création du contrôleur associé à l'action
            $controleur = $this->creerControleur($requete);

            // Renomage de l'action
            $action = $this->creerAction($requete);

            // Execution de l'action par le contrôleur
            $controleur->executerAction($action);
        }
        catch (\Exception $e)
        {
            $this->genererErreur($e);
        }
    }

    /**
     * Instancie le bon controleur en fonction de la requête reçue
     *
     * @param Requete $requete // Requête entrante
     * @return object controleur// une instance du controleur associé à la requête (accueil par défaut)
     */
    private function creerControleur(Requete $requete)
    {

        // Controleur par défaut
        $controleur = "Accueil";

        // création du controleur S'il existe
        if($requete->existeParametrePost('controleur') || $requete->existeParametreGet('controleur'))
        {
            $controleur = $requete->getParametre('controleur');
            $controleur = ucfirst(strtolower($controleur));
        }

        //Création du nom du fichier conrôleur (Controleur/Controleur<$controleur>.php)
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        //Chargement du fichier et création d'un objet associé
        if (file_exists($fichierControleur))
        {
            // Instanciation du contrôleur adapté
            $classeControleur = "P3_blog\Controleur\\" . $classeControleur;
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else{
            throw new \Exception("Fichier '$fichierControleur' introuvable");
        }
    }

    /**
     * Récupération du paramètre de action dans la requête
     *
     * @param Requete $requete // objet requete
     * @return string // Paramètre action
     */
    private function creerAction(Requete $requete)
    {
        $action = "index"; // Action par défaut
        if ($requete->existeParametreGet('action') || $requete->existeParametrePost('action'))
        {
            // Récupération de l'action dans le paramètres
            $action = $requete->getParametre('action');
        }
        return $action; // retour du paramètre action
    }

    /**
     * Générer une vue de l'erreur (exception)
     *
     * @param Exception $exception
     */
    public function genererErreur(\Exception $exception)
    {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}