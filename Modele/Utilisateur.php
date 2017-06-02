<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 */
class Utilisateur extends Modele
{

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $login Le login
     * @param string $mdp le mot de passe
     * @return boolean vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select UTIL_ID from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $mdpVerifier = password_verify($mdp, PASSWORD_BCRYPT);
        $utilisateur = $this->executerRequete($sql, array($login, $mdpVerifier));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisteur
     * @throws Exception si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($login, $mdp)
    {
        $sql = "select UTIL_ID as idUtilisateur, UTIL_LOGIN as login, UTIL_MDP as mdp from T_UTILISATEUR" .
        "where UTIL_LOGIN=? and UTIL_MDP=?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if($utilisateur->rowCount() == 1)
            return $utilisateur->fetch(); // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    private function genererMdp($mdp)
    {
        $hash = password_hash( $mdp, PASSWORD_BCRYPT);
        return $hash;
    }

    public function creerUtilisateur($nom, $mdp)
    {
        $mdpSecurise = $this->genererMdp($mdp);
        $req = "INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_nom`, `UTIL_mdp`)" .
        "VALUES (NULL, $nom, $mdpSecurise)";
        $req->execute();
    }
}