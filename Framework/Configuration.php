<?php
namespace P3_blog\Framework;
/**
 * Classe de gestion des paramètres de configuration
 *
 *
 */
class Configuration
{
    // Tableau des paramètres de configuration
    private static $parametres;

    /**
     * Renvoie la valeur d'un paramètre de configuration
     *
     * @param $nom
     * @param null $valeurParDefaut
     * @return null
     */
    public static function get($nom, $valeurParDefaut = null)
    {
        if (isset(self::getParametres()[$nom]))
        {
            $valeur = self::getParametres()[$nom];
        }
        else
        {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant au besoin depuis un fichier de configuration
     * Les fichiers de configuration recherchés sont en premier Config/dev.ono puis Config/prod.ini
     *
     * @return array // Tableau des paramètres
     * @throws Exception // Aucun fichier de configuration trouvé
     */
    private static function getParametres()
    {
        if (self::$parametres == null)
        {
            $cheminFichier = "Config/dev.ini";
            if (!file_exists($cheminFichier))
            {
                $cheminFichier = "Config/prod.ini";
            }
            if (!file_exists($cheminFichier))
            {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else
            {
                self::$parametres = parse_ini_file($cheminFichier);
            }
        }
        return self::$parametres;
    }

}