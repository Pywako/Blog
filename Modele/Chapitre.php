<?php
namespace P3_blog\Modele;
use P3_blog\Framework\Modele;
/**
 * Fournit les services d'accès aux genres musicaux 
 *
 */
class Chapitre extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getChapitres() {
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, 
CHAP_CONTENU as contenu, CHAP_nbcom as nbcom from T_CHAPITRE order by CHAP_ID desc';
        $chapitres = $this->executerRequete($sql);
        return $chapitres;
    }

    /** Renvoie les informations sur un chapitre
     * 
     * @param int $id L'identifiant du chapitre
     * @return array Le chapitre
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getChapitre($idChapitre) {
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, 
CHAP_CONTENU as contenu, CHAP_nbcom as nbcom from T_CHAPITRE where CHAP_ID=?';
        $chapitre = $this->executerRequete($sql, array($idChapitre));
        if ($chapitre->rowCount() > 0)
            return $chapitre->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }

    public function getDernierChapitre(){
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, 
CHAP_CONTENU as contenu, CHAP_nbcom as nbcom from T_CHAPITRE where CHAP_ID = (select max(CHAP_ID) from T_CHAPITRE )';
        $dernierChapitre = $this->executerRequete($sql);
        if ($dernierChapitre->rowCount() > 0)
            return $dernierChapitre->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun chapitre dans la bdd");
    }

    public function getNChapitres($params, $offset, $limit)
    {
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, 
CHAP_CONTENU as contenu, CHAP_nbcom as nbcom from T_CHAPITRE order by CHAP_ID desc';
        $resultat = $this->executerRequete($sql, array($params), $offset, $limit);
        if ($resultat->rowCount() > 0) {
            return $resultat;
        } else
            throw new \Exception("offset et limite mal définies");
    }

    public function getTitres() {
        $sql = 'SELECT chap_numero AS numero, chap_titre AS titre, chap_id AS id FROM t_chapitre ORDER BY chap_id DESC';
        $titres = $this->executerRequete($sql);
        return $titres;
    }
    /**
     * Renvoie le nombre total de chapitres
     *
     * @return int le nombre de chapitres
     */
    public function getNombreChapitres()
    {
        $sql = 'select count(*) as nbChapitres from T_CHAPITRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbChapitres'];
    }

    /**
     * Fonction de récupération du numéro du dernier chapitre publié dans la bdd
     * @return int
     */
    public function getNumDernierChapitre()
    {
        $sql = 'SELECT CHAP_numero AS numero FROM t_chapitre ORDER BY CHAP_id DESC LIMIT 1 OFFSET 0';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['numero'];
    }

    /**
     * Ajout d'un chapitre dans la bdd
     * @param float $numero
     * @param string $titre
     * @param string $contenu
     */
    public function ajouterChapitre($numero, $titre, $contenu)
    {
        $sql = 'insert into T_CHAPITRE(CHAP_NUMERO, CHAP_TITRE, CHAP_CONTENU) VALUES(?,?,?)';
        $this->executerRequete($sql, array($numero, $titre, $contenu));
    }

    /**
     * Fonction de modification d'un chapitre
     * @param int $numero
     * @param string $titre
     * @param string $contenu
     * @param int $chapitreId
     */
    public function modifierChapitre($numero, $titre, $contenu, $chapitreId)
    {
        $sql = "UPDATE t_chapitre SET CHAP_NUMERO = ?, CHAP_titre = ?, CHAP_CONTENU = ?
 WHERE CHAP_id = ?";
        $this->executerRequete($sql, array($numero, $titre, $contenu, $chapitreId));
    }

    /**
     * Fonction de suppression d'un chapitre grâce à son id
     * @param int $chapitreId
     */
    public function supprimerChapitre($chapitreId)
    {
        $sql = "DELETE FROM t_chapitre WHERE CHAP_id = ?";
        $this->executerRequete($sql, array($chapitreId));
    }
}