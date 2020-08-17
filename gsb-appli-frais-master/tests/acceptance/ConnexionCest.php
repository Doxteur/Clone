<?php 

class ConnexionCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function loginSuccess(AcceptanceTester $I)
    {
        $I->amGoingTo('Connexion avec login et mot de passe connus');
        $I->amOnPage('/');
        $I->fillField('login','dandre');
        $I->fillField('mdp','oppg5');
        $I->click('ok');
        $I->see('David Andre');  
        $I->see('Visiteur médical');  
    }
    // tests
    public function loginFailurePasswd(AcceptanceTester $I)
    {
        $I->amGoingTo('Connexion avec mot de passe inconnu');
        $I->amOnPage('/');
        $I->fillField('login','dandre');
        $I->fillField('mdp','truc');
        $I->click('ok');
        $I->see('Login ou mot de passe incorrect');  
        $I->see('Identification utilisateur');  
    }
    // tests
    public function loginFailureLogin(AcceptanceTester $I)
    {
        $I->amGoingTo('Connexion avec login inconnu');
        $I->amOnPage('/');
        $I->fillField('login','dane');
        $I->fillField('mdp','truc');
        $I->click('ok');
        $I->see('Login ou mot de passe incorrect');  
        $I->see('Identification utilisateur');  
    }
}
