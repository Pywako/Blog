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
        $nbChapitres    = $this->chapitre->getNombreChapitres();
        if ($nbChapitres > 0){
            $chapitres      = $this->pagination()['chapitres'];
            $titres         = $this->chapitre->getTitres();
            $session        = $this->requete->getSession();
            $nbPage         = $this->pagination()['nbPage'];
            $pageActuelle   = $this->pagination()['pageActuelle'];
            $this->genererVue(array(
                'chapitres' => $chapitres,
                'titres'    => $titres,
                'session'   => $session,
                'nbPage'    => $nbPage,
                'pageActuelle'  => $pageActuelle));
        }
        else{
            $session        = $this->requete->getSession();
            $this->genererVue(array(
                'session'   => $session
                ));
        }
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
        $chapitres       = $this->chapitre->getNChapitres("", $premierChapitre, $nbChapitreParPage);
        $pagination         = array (
            'chapitres'     => $chapitres,
            'nbPage'        => $nbPage,
            'pageActuelle'  => $pageActuelle
        );
        return $pagination;
    }
}