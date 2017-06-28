<?php
namespace P3_blog\Modele;
use P3_blog\Framework\Modele;
/**
 * Classe permettant d'interagir avec la bdd et préparer, ajouter, supprimer les chapitres
 *
 */
class Chapitre extends Modele {

    /** Renvoie la liste des chapitres du blog
     * 
     * @return PDOStatement La liste des chapitres
     */
    public function getChapitres()
    {
        $sql = 'SELECT 
          chap_id AS id, 
          chap_numero AS numero, 
          chap_titre AS titre, 
          chap_date AS date, 
          chap_contenu AS contenu, 
          chap_nbcom AS nbcom 
          FROM t_chapitre ORDER BY chap_id DESC';
        $chapitres = $this->executerRequete($sql);
        if ($chapitres->rowCount() > 0)
            return $chapitres;
        // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun chapitre");
    }

    /** Renvoie les informations sur un chapitre
     * 
     * @param int $id L'identifiant du chapitre
     * @return array Le chapitre
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getChapitre($idChapitre) {
        $sql = 'select 
          chap_id AS id, 
          chap_numero AS numero, 
          chap_titre AS titre, 
          chap_date AS date, 
          chap_contenu AS contenu, 
          chap_nbcom AS nbcom 
          FROM t_chapitre WHERE chap_id=?';
        $chapitre = $this->executerRequete($sql, array($idChapitre));
        if ($chapitre->rowCount() > 0)
            return $chapitre->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
    }

    public function getDernierChapitre(){
        $sql = 'SELECT 
          chap_id AS id, 
          chap_numero AS numero, 
          chap_titre AS titre, 
          chap_date AS date, 
          chap_contenu AS contenu, 
          chap_nbcom AS nbcom 
          FROM t_chapitre WHERE chap_id = (SELECT MAX(chap_id) FROM t_chapitre )';
        $dernierChapitre = $this->executerRequete($sql);
        if ($dernierChapitre->rowCount() > 0)
            return $dernierChapitre->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun chapitre dans la bdd");
    }

    public function getNChapitres($params, $offset, $limit)
    {
        $sql = 'SELECT 
          chap_id AS id, 
          chap_numero AS numero, 
          chap_titre AS titre, 
          chap_date AS date, 
          chap_contenu AS contenu, 
          chap_nbcom AS nbcom 
          FROM t_chapitre ORDER BY chap_id DESC';
        $resultat = $this->executerRequete($sql, array($params), $offset, $limit);
        if ($resultat->rowCount() > 0) {
            return $resultat;
        } else
            throw new \Exception("offset et limite mal définies");
    }

    public function getTitres() {
        $sql = 'SELECT 
          chap_numero AS numero,
          chap_titre AS titre, 
          chap_id AS id 
          FROM t_chapitre ORDER BY chap_id DESC';
        $titres = $this->executerRequete($sql);
        if ($titres->rowCount() > 0) {
            return $titres;
        } else
            throw new \Exception("Aucun titre trouvé");
    }
    /**
     * Renvoie le nombre total de chapitres
     *
     * @return int le nombre de chapitres
     */
    public function getNombreChapitres()
    {
        $sql = 'SELECT count(*) AS nbChapitres FROM t_chapitre';
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
        $sql = 'SELECT chap_numero AS numero FROM t_chapitre ORDER BY chap_id DESC LIMIT 1 OFFSET 0';
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
        $sql = 'INSERT INTO t_chapitre(chap_numero, chap_titre, chap_contenu) VALUES(?,?,?)';
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
        $sql = "UPDATE t_chapitre SET chap_numero = ?, chap_titre = ?, chap_contenu = ?
          WHERE chap_id = ?";
        $this->executerRequete($sql, array($numero, $titre, $contenu, $chapitreId));
    }

    /**
     * Fonction de suppression d'un chapitre grâce à son id
     * @param int $chapitreId
     */
    public function supprimerChapitre($chapitreId)
    {
        $sql = "DELETE FROM t_chapitre WHERE chap_id = ?";
        $this->executerRequete($sql, array($chapitreId));
    }
}