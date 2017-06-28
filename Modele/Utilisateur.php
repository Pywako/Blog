<?php
namespace P3_blog\Modele;
use P3_blog\Framework\Modele;
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
        $sql = "select UTIL_MDP from T_UTILISATEUR where UTIL_LOGIN=?";
        $utilisateur = $this->executerRequete($sql, array($login));
        if($utilisateur->rowCount() == 1)
        {
            $utilisateurTeste = $utilisateur->fetch();
            return(password_verify($mdp, $utilisateurTeste['UTIL_MDP']));
        }
        else{
            return ($utilisateur->rowCount() == 1);
        }
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @return mixed L'utilisteur
     * @throws Exception si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($login)
    {
        $sql = "select UTIL_ID as idUtilisateur, UTIL_LOGIN as login from T_UTILISATEUR where UTIL_LOGIN=?";
        $utilisateur = $this->executerRequete($sql, array($login));
        if($utilisateur->rowCount() == 1)
            return $utilisateur->fetch(); // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    /**
     * Fonction de génération de mot de passe
     * @param $mdp
     * @return bool|string
     */
    private function genererMdp($mdp)
    {
        $hash = password_hash( $mdp, PASSWORD_BCRYPT);
        return $hash;
    }

    /**
     * Fonction de création d'utilisateur
     * @param $nom
     * @param $mdp
     */
    public function creerUtilisateur($nom, $mdp)
    {
        $mdpSecurise = $this->genererMdp($mdp);
        $req = "INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_nom`, `UTIL_mdp`)" .
        "VALUES (NULL, $nom, $mdpSecurise)";
        $req->execute();
    }
}