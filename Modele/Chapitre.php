<?php

require_once 'Framework/Modele.php';

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
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, CHAP_CONTENU as contenu, CHAP_publication as publication, CHAP_nbcom as nbcom from T_CHAPITRE order by CHAP_ID desc';
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
        $sql = 'select CHAP_ID as id, CHAP_numero as numero, CHAP_TITRE as titre, CHAP_DATE as date, CHAP_CONTENU as contenu, CHAP_publication as publication, CHAP_nbcom as nbcom from T_CHAPITRE where CHAP_ID=?';
        $chapitre = $this->executerRequete($sql, array($idChapitre));
        if ($chapitre->rowCount() > 0)
            return $chapitre->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun chapitre ne correspond à l'identifiant '$idChapitre'");
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

    public function ajouterChapitre(Requete $requete)
    {
        $sql =$this->bdd->prepare('INSERT INTO `t_chapitre` (`CHAP_numero`, `CHAP_titre`, `CHAP_contenu`, `CHAP_publication`) VALUES(:numero, :titre, :contenu, :publication');
        $sql->bindValue(':numero',$requete->getParametre(numero), PDO::PARAM_INT);
        $sql->bindValue(':titre', $requete->getParametre(titre), PDO::PARAM_STR);
        $sql->bindValue(':contenu', $requete->getParametre(contenu), PDO::PARAM_STR);
        $sql->bindValue(':publication', $requete->getParametre(publication), PDO::PARAM_INT);
        $sql->execute();
    }

}