<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
/*    public function smppIn(AcceptanceTester $I)
    {
    	$I->amOnUrl('http://10.12.12.248/bbm/index.php');
        $I->fillField('#loginform-username', 'irezpratama');
        $I->fillField('#loginform-password', 'r4h4514');
        $I->click('login-button');
        $I->wait(3);
        $I->click('Configuration');
        $I->click('SMPP IN');
        $I->click('Operation List');
        $I->click('Create');
        $I->wait(3);
        
        $I->fillField('#smppin-name', 'Test');
        $I->fillField('#smppin-description', 'smppin-description');
        $I->fillField('#smppin-ip', '192.168.87.7');
        $I->fillField('#smppin-port', '22');
        $I->fillField('#smppin-user', 'budi');
        $I->fillField('#smppin-pass', 'r4h4514');
        $I->fillField('#smppin-bind_type', 1);
        $I->fillField('#smppin-connection_flag', 1);
        $I->fillField('#smppin-conn_status', 1);
        $I->fillField('#smppin-desc_info', 'My Info');
        $I->fillField('#smppin-last_trans', date("Y-m-d H:i:s"));
        $I->fillField('#smppin-msg_per_sec', 2);
        $I->fillField('#smppin-src_ton', 2);
        $I->fillField('#smppin-src_npi', 1);
        $I->fillField('#smppin-submit_time_out', 30);
        $I->click('submit-SmppIn');
    	$I->wait(5);
        
    }*/


    public function smppOut(AcceptanceTester $I)
    {
    	$I->amOnUrl('http://10.12.12.248/bbm/index.php');
        $I->fillField('#loginform-username', 'irezpratama');
        $I->fillField('#loginform-password', 'r4h4514');
        $I->click('login-button');
        $I->wait(3);
        $I->click('Configuration');
        $I->click('SMPP OUT');
        $I->click('Operation List');
        $I->click('Create');
        $I->wait(3);
        
        $I->fillField('#smppout-smpp_conn_id', 1);
        $I->fillField('#smppout-type', 1);
        $I->fillField('#smppout-msg_per_sec', 1);
        $I->fillField('#smppout-src_ton', 2);
        $I->fillField('#smppout-src_npi', 1);
        $I->fillField('#smppout-dest_ton', 1);
        $I->fillField('#smppout-dest_npi', 1);
        $I->fillField('#smppout-submit_time_out', 30);
        $I->click('submit-SmppOut');
    	$I->wait(5);
        
    }
}
