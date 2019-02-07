<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->wait(10); // wait for page to be opened
        $I->see('My Application');

        $I->seeLink('About');
        $I->click('About');

        $I->see('This is the About page.');
    }
}
