<?php

namespace P3_blog\Modele;

use P3_blog\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 */
class Commentaire extends Modele
{

// Renvoie la liste des commentaires associés à un chapitre
    public function getCommentaires($idChapitre)
    {
        if (isset($idChapitre)) {
            $sql = 'SELECT 
              com_id AS id, 
              com_auteur AS auteur, 
              com_date AS date, 
              com_contenu AS contenu,
              com_signalement AS signalement, 
              chap_id AS chap_id,
              parent_id AS parent_id, 
              com_enfant AS enfant 
              FROM t_commentaire WHERE chap_id=?';
            $req = $this->executerRequete($sql, array($idChapitre));
            $commentaires = $req->fetchAll(\PDO::FETCH_ASSOC);
            return $commentaires;
        } else {
            throw new \Exception("Aucun commentaire à l'identifiant '$idCommentaire'");
        }

    }

    public function getAllCommentaires()
    {
        $sql = 'SELECT 
          com_id AS com_id, 
          com_auteur AS com_auteur,
          com_date AS com_date, 
          com_contenu AS com_contenu, 
          COM_signalement AS com_signalement, 
          chap_id AS chap_id 
          FROM t_commentaire ORDER BY com_signalement DESC, com_date DESC';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }

    public function getOneCommentaire($idCommentaire)
    {
        $sql = 'select 
          com_auteur AS com_auteur, 
          com_date AS com_date, 
          com_contenu AS com_contenu, 
          com_signalement AS com_signalement, 
          chap_id AS chap_id 
          FROM t_commentaire WHERE com_id = :id';
        $oneCommentaire = $this->executerRequete($sql, array("id" => $idCommentaire));
        if ($oneCommentaire->rowCount() > 0)
            return $oneCommentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun commentaire à l'identifiant '$idCommentaire'");
    }

    public function getNCommentaire($params, $offset, $limit)
    {
        $sql = 'SELECT 
          com_id AS com_id, 
          com_auteur AS com_auteur, 
          com_date AS com_date, 
          com_contenu AS com_contenu, 
          com_signalement AS com_signalement, 
          chap_id AS chap_id 
          FROM t_commentaire ORDER BY com_signalement DESC, com_id DESC';
        $resultat = $this->executerRequete($sql, array($params), $offset, $limit);
        if ($resultat->rowCount() > 0) {
            return $resultat;
        } else
            throw new \Exception("offset et limite mal définies");
    }

    public function ajouterCommentaire($auteur, $contenu, $idChapitre)
    {
        $sql = 'INSERT INTO t_commentaire(com_auteur, com_contenu, chap_id)'
            . ' VALUES(?,?,?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idChapitre));
    }

    /**
     * Renvoie le nombre total de commentaires
     *
     * @return int le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'SELECT count(*) AS nbCommentaires FROM t_commentaire';
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
        $sql = "UPDATE t_commentaire SET com_contenu = ?, com_signalement = ? WHERE com_id = ?";
        $this->executerRequete($sql, array($contenu, $signalement, $commentaireId));
    }

    public function supprimerCommentaire($commentaireId)
    {
        $sql = "DELETE FROM t_commentaire WHERE com_id = ?";
        $this->executerRequete($sql, array($commentaireId));
    }

    /**Préparation des commentaires
     * @param $idChapitre
     */
    public function formaterCommentaires($idChapitre)
    {
        $commentaires = $this->getCommentaires($idChapitre);
        $tableauCommentaires = array(
            "parent"   => [],
            "enfant"        => []
        );

        foreach ($commentaires as $commentaire)
        {
            if($commentaire['parent_id'] == null)
            {
                $tableauCommentaires["parent"][] = $commentaire;
            }
            else{
                $tableauCommentaires["enfant"][$commentaire['parent_id']] = $commentaire;
            }
        }
        return $tableauCommentaires;
    }
}