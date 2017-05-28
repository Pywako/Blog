<?php

/**
 * Classe Traitant la requête HTTP entrante
 *
 * @version 1.0
 * @author Alice Wong
 */
class Requete
{
    private $parametreGet;
    private $parametrePost;

    /*
     * Constructeur
     * @param array $parametres // Paramètres de la requête
     */
    public function __construct($paramtreGet, $parametrePost)
    {
        $this->parametreGet = $paramtreGet;
        $this->parametrePost = $parametrePost;
    }

    /**
     * Vérification de l'existance d'un paramètre get dand la requête
     *
     * @param $nom // Nom du paramètre
     * @return bool // True si le paramètre existe et valeur non vide
     */
    public function existeParametreGet($nom)
    {
        return(isset($this->parametreGet[$nom]) && $this->parametreGet[$nom] != "");
    }

    /**
     * Vérification de l'existance d'un paramètre post dand la requête
     *
     * @param $nom // Nom du paramètre
     * @return bool // True si le paramètre existe et valeur non vide
     */
    public function existeParametrePost($nom)
    {
        return (isset($this->parametrePost[$nom]) && $this->parametrePost[$nom] != "");
    }

    /**
     * Retourne la valeur du paramètre demandé
     *
     * @param $nom // Nom du paramètre
     * @return mixed // Valeur du paramètre
     * @throws Exception // Le paramètre n'existe pas dans la requête
     */
    public function getParametres($nom)
    {
        if ($this->existeParametreGet($nom))
        {
            return $this->parametreGet;
        }
        elseif ($this->existeParametrePost($nom))
        {
            return $this->parametrePost;
        }
        else
        {
            throw new Exception("Le paramètre '$nom' est absent de la requête.");
        }
    }
}