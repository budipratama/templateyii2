<?php
namespace backend\components;
use Yii;
use backend\models\ConfigurationWeb;
use yii\base\InvalidConfigException;

class Commons
{
    public function Hello(){
        return "Hello Yii2";
    }
    public static function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * @param $to
     * @param $subject
     * @param $body
     * @param array $cc
     * @param array $bcc
     * @param string $file
     */
    public static function sendMail($to,$subject,$body,$cc = [],$bcc = [],$file = ''){
        $EmailAddress = ConfigurationWeb::findOne(12)->tcw_value;
        $EmailPassword = ConfigurationWeb::findOne(13)->tcw_value;
        $EmailPort = ConfigurationWeb::findOne(14)->tcw_value;
        $EmailHost = ConfigurationWeb::findOne(15)->tcw_value;
        $EmailEncryption = ConfigurationWeb::findOne(16)->tcw_value;
        $EmailAlias = ConfigurationWeb::findOne(17)->tcw_value;

        $transport = [
            'class' => 'Swift_SmtpTransport',
            'host' => $EmailHost,
            'username' => $EmailAddress,
            'password' => $EmailPassword,
            'port' => $EmailPort,
            'encryption' => $EmailEncryption
        ];

        Yii::$app->mailer->setTransport($transport);

        Yii::$app->mailer->compose()
            ->setFrom([$EmailAddress => $EmailAlias])
            ->setTo($to)
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();
    }
}