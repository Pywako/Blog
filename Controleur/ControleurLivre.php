<?php
namespace P3_blog\Controleur;
use P3_blog\Framework\Controleur;
use P3_blog\Modele\Chapitre;

class ControleurLivre extends Controleur {

    private $chapitre;

    public function __construct() {
        $this->chapitre = new Chapitre();
    }

    // Affiche la liste de tous les chapitres du blog
    public function index() {
        $chapitres      = $this->pagination()['chapitres'];
        $session        = $this->requete->getSession();
        $nbPage         = $this->pagination()['nbPage'];
        $pageActuelle   = $this->pagination()['pageActuelle'];
        $this->genererVue(array(
            'chapitres' => $chapitres,
            'session' => $session,
            'nbPage'        => $nbPage,
            'pageActuelle'  => $pageActuelle));
    }
    /**
     * Gestion de la pagination des chapitres
     *
     * @return array pagination contenant
     *      les chapitres choisis (10 par page)
     *      le nombre de page
     *      la page actuelle
     */
    public function pagination()
    {
        $nbChapitre         = $this->chapitre->getNombreChapitres();
        $nbChapitreParPage   = 5; //= limit
        $nbPage = ceil($nbChapitre/$nbChapitreParPage);
        $page   = $this->requete->getParametre("page");
        if (isset($page))
        {
            $pageActuelle = intval($page);
            if($pageActuelle > $nbPage)
            {
                $pageActuelle = $nbPage;
            }
        }
        else
        {
            $pageActuelle   = 1;
        }
        $premierChapitre = ($pageActuelle-1) * $nbChapitreParPage;
        $chapitres       = $this->chapitre->getNCchapitres("", $premierChapitre, $nbChapitreParPage);
        $pagination         = array (
            'chapitres'  => $chapitres,
            'nbPage'        => $nbPage,
            'pageActuelle'  => $pageActuelle
        );
        return $pagination;
    }
}