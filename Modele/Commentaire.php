<?php
namespace P3_blog\Modele;
use P3_blog\Framework\Modele;
/**
 * Fournit les services d'accès aux genres musicaux 
 *
 */
class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idChapitre) {
        $sql = 'select COM_ID as id, COM_AUTEUR as auteur, COM_DATE as date, COM_CONTENU as contenu, 
COM_signalement as signalement, CHAP_id as chap_id  from T_COMMENTAIRE where CHAP_ID=?';
        $commentaires = $this->executerRequete($sql, array($idChapitre));
        return $commentaires;
    }

    public function getAllCommentaires()
    {
        $sql = 'select COM_ID as com_id, COM_AUTEUR as com_auteur, COM_DATE as com_date, COM_CONTENU as com_contenu, 
COM_signalement as com_signalement, chap_id as chap_id from T_COMMENTAIRE order by com_signalement DESC, COM_DATE DESC';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }

    public function getOneCommentaire($idCommentaire)
    {
        $sql = 'select COM_AUTEUR as com_auteur, COM_DATE as com_date, COM_CONTENU as com_contenu, 
COM_SIGNALEMENT as com_signalement, CHAP_ID as chap_id from T_COMMENTAIRE where COM_ID = :id';
        $oneCommentaire = $this->executerRequete($sql, array("id" => $idCommentaire));
        if ($oneCommentaire->rowCount() > 0)
            return $oneCommentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun commentaire à l'identifiant '$idCommentaire'");
    }

    public function getNCommentaire($params, $offset, $limit)
    {
        $sql = 'SELECT com_id AS com_id, com_auteur AS com_auteur, com_date AS com_date, com_contenu AS com_contenu, 
com_signalement AS com_signalement, chap_id AS chap_id FROM t_commentaire ORDER BY com_signalement DESC, com_id DESC';
        $resultat = $this->executerRequete($sql, array($params), $offset, $limit);
        if($resultat->rowCount() > 0 )
        {
            return $resultat;
        }
        else
            throw new \Exception("offset et limite mal définies");
    }
    public function ajouterCommentaire($auteur, $contenu, $idChapitre) {
        $sql = 'insert into T_COMMENTAIRE(COM_AUTEUR, COM_CONTENU, CHAP_ID)'
            . ' values(?,?,?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idChapitre));
    }

    /**
     * Renvoie le nombre total de commentaires
     *
     * @return int le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'select count(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbCommentaires'];
    }
    public function signaler($commentaireId)
    {
        $sql = "UPDATE t_commentaire SET com_signalement = com_signalement + 1 WHERE com_id = ?";
        $this->executerRequete($sql, array($commentaireId));
    }

    public function modifierCommentaire($contenu, $signalement, $commentaireId)
    {
        $sql = "UPDATE t_commentaire SET com_contenu = ?, com_signalement = ? 
WHERE com_id = ?";
        $this->executerRequete($sql, array($contenu, $signalement, $commentaireId));
    }

    public function supprimerCommentaire($commentaireId)
    {
        $sql = "DELETE FROM t_commentaire WHERE COM_id = ?";
        $this->executerRequete($sql, array($commentaireId));
    }
}