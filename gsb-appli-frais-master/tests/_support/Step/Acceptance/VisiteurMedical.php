<?php
namespace Step\Acceptance;

class VisiteurMedical extends \AcceptanceTester
{

    public function login()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->fillField('login','dandre');
        $I->fillField('mdp','oppg5');
        $I->click('ok');
        $I->see('David Andre');  
        $I->see('Visiteur médical');  
    }

    public function logout()
    {
        $I = $this;
        $I->click('Déconnexion');
        $I->see('Identification utilisateur');  
    }

}