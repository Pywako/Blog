<?php
namespace P3_blog\Framework;
require_once 'Configuration.php';
/**
 * Classe modélisant une vue
 *
 */
class Vue
{
    // Nom du fichier associé à la vue
    private $fichier;
    // Titre de la vue (défini dans le fichier vue)
    private $titre;

    /**
     * Constructeur de la Vue
     *
     * @param string $action  // Action associé à la vue
     * @param string $controleur // Nom du contrôleur associé à la vue
     */
    public function __construct($action, $controleur = "")
    {
        // Détermination du nom du fichier vue à partir de l'action et du controleur
        // Convention de nommage des fichiers vues : Vue/<$controleur>/<$action>.php
        $fichier = "Vue/";
        if ($controleur != "")
        {
            $racineBlog = Configuration::get("racineBlog", "/");
            $racineBlog = str_replace("/", "", $racineBlog);
            $controleur = str_replace($racineBlog, "", $controleur);
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    /**
     * Génère et affiche la vue
     *
     * @param array $donnees // Données nécessaires à la génération de la vue
     */
    public function generer($donnees)
    {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // On définit une variable locale accessible par la vue pour la racine du blog
        $racineBlog = Configuration::get("racineBlog", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('Vue/gabarit.php', array('titre' => $this->titre, 'contenu' => $contenu, 'racineBlog' => $racineBlog));
        echo $vue; // Affiche la vue générée
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     *
     * @param string $fichier // Chemin du fichier vue à générer
     * @param array $donnees // Données nécessaires à la génération de la vue
     * @return string // Résultat de la génération de la vue
     * @throws Exception // Si le fichier vue est introuvable
     */
    private function genererFichier($fichier, $donnees)
    {
        if (file_exists($fichier))
        {
            // Rendre les éléments du tableau de données accessible dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclusion du fichier vue - résultat stocké dans le tampon
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else
        {
            throw new \Exception("Fichier '$fichier' introuvable");
        }
    }

    private function nettoyer($valeur)
    {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }

}