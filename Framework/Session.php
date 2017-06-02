<?php

/**
 * Classe modélisant la session
 */
class Session
{
    /**
     * Demarrage d ela session à l'instanciation de l'objet
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Destruction de la session
     */
    public function detruire()
    {
        session_destroy();
    }

    /**
     * Ajoute un attribut et sa valeur à la session
     *
     * @param string $nom // Attribut
     * @param $valeur // Valeur
     */
    public function setAttribut($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }

    /**
     * Vérifie si l'attribut existe dans la session
     *
     * @param string $nom // Nom de l'attribut
     * @return bool // Oui s'il existe et valeur non vide
     */
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }

    /**
     * Retourne la valeur de l'attribut demandé
     *
     * @param string $nom // Nom de l'attribut
     * @return string // Valeur de l'attribut
     * @throws Exception // Attribut n'existe pas dans la session
     */
    public function getAttribut($nom)
    {
        if($this->existeAttribut($nom))
        {
            return $_SESSION[$nom];
        }
        else
        {
            throw new Exception("Attribut '$nom' est absent de la session");
        }
    }
}