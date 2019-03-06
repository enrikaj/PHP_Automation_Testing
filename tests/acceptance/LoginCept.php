<?php

use \Codeception\Util\Locator;

class LoginCept
{

    private $usernameValid;
    private $usernameInvalid;

    public function _before()
    {
        // Should read from file
        $this->usernameValid = "valid_username";
        $this->usernameInvalid = "invalid_username";
    }

    public function validLogin(AcceptanceTester $I)
    {
	    $I->wantTo('Correct data passed, should login');
	    $I->amOnPage('/lt/login');

	    $I->fillField(Locator::firstElement('input[name=\'userIdentifier\']'), $this->usernameValid);
	    $I->click('button[type=\'submit\']');

	    $alertElementXpath = "//div[contains(@class, 'alert alert-danger')]/div";
	    $I->wait(5);
	    $I->dontSeeElement(Locator::contains($alertElementXpath, 'Naudotojas su nurodytais duomenimis nerastas'));
    }

    public function invalidLogin(AcceptanceTester $I)
    {
	    $I->wantTo('When login is invalid, show notification');
	    $I->amOnPage('/lt/login');

	    $I->fillField(Locator::firstElement('input[name=\'userIdentifier\']'), $this->usernameInvalid);
	    $I->click('button[type=\'submit\']');

	    $alertElementXpath = "//div[contains(@class, 'alert alert-danger')]/div";
	    $I->waitForElement($alertElementXpath, 2);
	    $I->seeElement(Locator::contains($alertElementXpath, 'Naudotojas su nurodytais duomenimis nerastas'));
    }

}
