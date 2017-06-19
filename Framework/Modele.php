<?php
namespace P3_blog\Framework;

/**
 * Classe abstraite Modèle
 * Centralise les services d'accès à une base de données
 * Utilise l'API PDO de PHP
 *
 */
abstract class Modele
{
    /**
     * Objet PDO d'accès à la bdd partagé par toutes les instances des classes dérivées
     * @var $bdd
     */
    private static $bdd;

    /**
     * Exécution de la requête sql
     *
     * @param $sql // Requête sql
     * @param null|array $params // Paramètres de la requête
     * @return PDOStatement // Résultats de la requête
     */
    protected function executerRequete($sql, $params = null, $offset = null, $limit = null)
    {
        if(isset($offset) && isset($limit))
        {
        }
        if ($params == null)
        {
            $resultat = self::getBdd()->query($sql); //Execution
        }
        else
        {
            $resultat = self::getBdd()->prepare($sql); // Préparation
            $resultat->execute($params);
        }
        return $resultat;
    }
    protected function bindExecuterRequete($sql, $params, $offset, $limit)
    {
        $sql .= "? LIMIT :offset, :limit";
        $resultat = self::getBdd()->prepare($sql); // Préparation
        $resultat->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $resultat->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $resultat->execute($params);
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la bdd en initialisant la connexion si besoin
     * @return PDO // Objet PDO de la connexion à la bdd
     */
    private static function getBdd()
    {
        if (self::$bdd === null)
        {
            // Récupération des paramètres de configuration bdd
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");

            // Création de la connexion
            self::$bdd = new \PDO($dsn, $login, $mdp, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}