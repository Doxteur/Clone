<?php 
use \Step\Acceptance\VisiteurMedical;

class FichesFraisEtatCest
{
    public function _before(VisiteurMedical $I)
    {
        $I->login();
    }

    // tests
    public function getListeFichesFrais(VisiteurMedical $I)
    {
        $I->amGoingTo('Consultation de la liste des fiches de frais');
        $I->click("Mes fiches de frais");
        $I->see("Mois à sélectionner");
        $I->expect("Liste déroulante avec les mois triés du plus récent au plus ancien");
        $I->seeOptionIsSelected('#lstMois', '02/2018');
   }
}
