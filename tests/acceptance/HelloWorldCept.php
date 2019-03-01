<?php 
use \Codeception\Util\Locator;

$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/lt/login');
$I->fillField(Locator::firstElement('input[name=\'userIdentifier\']'), 'test');
$I->click('button[type=\'submit\']');
$I->wait(3);
$I->seeElement(Locator::contains('/html/body/div[2]/main/div/div/div/div[1]/div/div/div/div/div[2]/div/div', 'Naudotojas su nurodytais duomenimis nerastas'));

